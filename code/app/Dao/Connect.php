<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 2-10-17
 * Time: 21:34
 */

class connect
{
    private static $pdo = null;

    private function __construct()
    {
    }
    static function getPdo(){
        if(null == self::$pdo){
            try{
                self::$pdo = new PDO('mysql:host=localhost;dbname='.env('DB_DATABASE').';charset=utf8mb4', env('DB_HOST'), env('DB_PASSWORD'));
                dd(self::$pdo);
            }
            catch (\Exception $e){
                throw new \Exception('error database settings niet goed nie moet');
            }
        }
    }
}