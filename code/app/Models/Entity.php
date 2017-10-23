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
    protected $id = 0;
    protected $createdon = null;
    protected $updatedon = null;
    protected $tableName = "";

    function __construct()
    {
        //todo:dit vervangen naar de regulieren versie van pdo
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
        if($this->id != 0){
            $this->updatedon = date("Y-m-d H:i:s");
        }
        if($this->createdon === null){
            $this->createdon = date("Y-m-d H:i:s");
        }
        foreach ($class->getProperties(\ReflectionProperty::IS_PROTECTED) as $prop){
            $pName = $prop->getName();
            if($pName === "id" || $pName == "tableName"){
                continue;
            }
            $propsToImplode[] = $this->format($pName);
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
        return $result;
    }
    public function format($pName){
        $return = '`'.$pName.'` =  ';
        $type = gettype($this->{$pName});
        switch ($type){
            case $type === "boolean":
                $return .= ($this->{$pName} ? "true" : "false");
            break;
            case $type === "integer":
                $return .= "".($this->{$pName});
                break;
            default:
                $return .= ($this->{$pName} ? '"'.$this->{$pName}.'"' : "null");
                break;
        }
        return $return;
    }
    public function thrash(){
        $sql = 'DELETE from '.$this->getTableName().' WHERE id = '.$this->id;
        $result = $this->pdo->exec($sql);
        return $result;
    }
    public static function morph(array $object){
        $class = new \ReflectionClass(get_called_class());
        $entity = $class->newInstance();
        foreach($class->getProperties(\ReflectionProperty::IS_PROTECTED) as $prop) {
            if (isset($object[$prop->getName()])) {
                $prop->setAccessible( true );
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

        if (is_array($options) && $options != []) {
            foreach ($options as $key => $value) {
                $whereConditions[] = '`'.$key.'` = "'.$value.'"';
            }
            $query .= " WHERE ".implode(' AND ',$whereConditions);

        } elseif (is_string($options)) {
            $query .= 'WHERE '.$options;
        } else {
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

    protected function getIds($obj){
        if(is_array($obj)){
            $ids = array_map(function($value){
                return $value->getId();
            },$obj);
        }else{
            $ids = $obj.getId();
        }
        return $ids;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCreatedon()
    {
        return $this->createdon;
    }

    /**
     * @return mixed
     */
    public function getUpdatedon()
    {
        return $this->updatedon;
    }
}