<?php
namespace App\Models;

use Illuminate\Support\Facades\Hash;

class User extends Entity
{
    protected $username;
    protected $password;
    protected $admin;
    protected $tableName = "users";

    public static function validateUser($username,$password){
        if($user = User::find(["username"=>$username])){
            if(Hash::check($password,$user->password)){
                return $user;
            }
        }
        return false;
    }
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = Hash::make($password);
    }
    public function getPassword(){
        return $this->password;
    }
    /**
     * @return mixed
     */
    public function getAdmin()
    {
        return $this->admin;
    }
    public function getPosts(){
        return Post::findAll(["userid"=>$this->id]);
    }
    /**
     * @param mixed $admin
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }

}

