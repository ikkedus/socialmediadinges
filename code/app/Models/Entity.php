<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 2-10-17
 * Time: 21:27
 */
namespace App\Models;

use Illuminate\Support\Facades\DB;

abstract class Entity
{
    private $pdo;
    public $id = 0;
    public $createdon;
    public $updatedon;


    protected $tableName = "";

    function __construct()
    {
        $this->pdo = DB::connection()->getPdo();
    }

    private function getTableName(){
        $class = new \ReflectionClass($this);
        $tableName = '';
        if($this->tableName != ''){
            $tableName = $this->tableName;
        }else{
            $tableName = strtolower($class->getShortName());
        }
        return $tableName;
    }

    public function save(){
        $class = new \ReflectionClass($this);
        $propsToImplode = [];

        foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $prop){
            $pName = $prop->getName();
            if($pName === "id"){
                continue;
            }
            $propsToImplode[] = '`'.$pName.'` = "'.$this->{$pName}.'"';
        }
        $valuePairs = implode(',',$propsToImplode);

        $sql = '';

        if($this->id > 0){
            $sql = 'Update '.$this->getTableName().' SET '. $valuePairs.' WHERE id = '.$this->id;
        }
        if($this->id === 0){
            $sql = 'insert into '.$this->getTableName().' SET '. $valuePairs;

        }
        $result = $this->pdo->exec($sql);
        if($this->id === 0){
            $this->id = $this->pdo->lastInsertId();
        }
        dd($this);
        return $result;
    }
    public function thrash(){
        $sql = 'DELETE from '.$this->getTableName().' WHERE id = '.$this->id;
        $result = $this->pdo->exec($sql);
        return $result;
    }
    public static function morph(array $object){
        $class = new \ReflectionClass(get_called_class());
        $entity = $class->newInstance();
        foreach($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $prop) {
            if (isset($object[$prop->getName()])) {
                $prop->setValue($entity,$object[$prop->getName()]);
            }
        }
        //$entity->initialize();
        return $entity;
    }
    public static function find ($options = []) {
        if(($entity = self::findAll($options)) != null){
            return $entity[0];
        }
        return null;
    }
    public static function findAll ($options = []) {

        $class = new \ReflectionClass(get_called_class());
        $entity = $class->newInstance();
        $tableName = '';
        if($entity->tableName != ''){
            $tableName = $entity->tableName;
        }else{
            $tableName = strtolower($class->getShortName());
        }
        $result = [];
        $query = 'select * from '.$tableName." ";
        $whereConditions = [];

        if (is_array($options)) {
            foreach ($options as $key => $value) {
                $whereConditions[] = '`'.$key.'` = "'.$value.'"';
            }
            $query .= " WHERE ".implode(' AND ',$whereConditions);

        } elseif (is_string($options)) {
            $query .= 'WHERE '.$options;
        } else {
            throw new \Exception('Wrong parameter type of options');
        }
        $dbo = DB::connection()->getPdo();
        $sth = $dbo->prepare($query);
        $sth->execute();
        $raw = $sth->fetchAll();
        foreach ($raw as $rawRow) {
            $result[] = self::morph($rawRow);
        }
        return $result;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCreatedon()
    {
        return $this->createdon;
    }

    /**
     * @param mixed $createdon
     */
    public function setCreatedon($createdon)
    {
        $this->createdon = $createdon;
    }

    /**
     * @return mixed
     */
    public function getUpdatedon()
    {
        return $this->updatedon;
    }

    /**
     * @param mixed $updatedon
     */
    public function setUpdatedon($updatedon)
    {
        $this->updatedon = $updatedon;
    }
}