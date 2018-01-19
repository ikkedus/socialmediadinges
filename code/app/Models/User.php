<?php
namespace App\Models;

use Illuminate\Support\Facades\Hash;

class User extends Person
{
    protected $tableName = "users";
    protected $username;
    protected $password;
    protected $admin;
    protected $locked;

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
        return Post::findAll("1=1 ORDER BY date limit 3");
    }
    /**
     * @param mixed $admin
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }

    /**
     * @return mixed
     */
    public function getLocked()
    {
        return $this->locked;
    }

    /**
     * @param mixed $locked
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;
    }

}

