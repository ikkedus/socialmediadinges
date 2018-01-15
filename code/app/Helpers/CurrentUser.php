<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 15-1-18
 * Time: 23:09
 */

namespace App\Helpers;


use App\Models\User;
use Illuminate\Support\Facades\Session;

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
}