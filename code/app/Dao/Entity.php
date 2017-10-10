<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 2-10-17
 * Time: 21:27
 */

namespace App\Dao;

use Illuminate\Support\Facades\DB;

abstract class Entity
{
    private $pdo;
    public $id;
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
            $propsToImplode[] = '`'.$pName.'` = "'.$this->{$pName}.'"';
        }
        $valuePairs = implode(',',$propsToImplode);

        $sql = '';

        if($this->id > 0){
            $sql = 'Update '.$this->getTableName().' SET '. $valuePairs.' WHERE id = '.$this->id;
        }
        if($this->id > 0){
            $sql = 'insert into '.$this->getTableName().' SET '. $valuePairs.' id = '.$this->id;
        }
        $result = $this->pdo->exec($sql);
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

        foreach($class->getProperties(\ReflectionProperty::PUBLIC) as $prop) {
            if (isset($object[$prop->getName()])) {
                $prop->setValue($entity,$object[$prop->getName()]);
            }
        }
        $entity->initialize();
        return $entity;
    }
    public static function find ($options = []) {

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
        $raw =  DB::connection()->getPdo()->execute($query);
        dd($raw);

        foreach ($raw as $rawRow) {
            $result[] = self::morph($rawRow);
        }
        return $result;
    }
}