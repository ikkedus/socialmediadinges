<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 15-1-18
 * Time: 23:09
 */

namespace App\Helpers;


use App\Models\User;

class CurrentUser
{
    public static function GetUser()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
        return User::find(["id"=> $_SESSION["userid"]]);
    }
    public static function IsAuthenticated()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
        return isset($_SESSION["userid"]);
    }
    public static function IsAdmin()
    {
        if(!isset($_SESSION))
        {
            session_start();
        }
        if(!self::IsAuthenticated())
        {
            return false;
        }
        return User::find(["id"=> $_SESSION["userid"]])->getAdmin();
    }

}