<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 23-10-17
 * Time: 21:23
 */

namespace App\Models;


class UserMemberOf extends Entity
{
    protected $tableName="memberofproject";

    protected $userid;

    protected $projectid;

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param mixed $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return mixed
     */
    public function getProjectid()
    {
        return $this->projectid;
    }

    /**
     * @param mixed $projectid
     */
    public function setProjectid($projectid)
    {
        $this->projectid = $projectid;
    }


}