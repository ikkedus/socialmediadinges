<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 23-10-17
 * Time: 21:13
 */

namespace App\Models;


class Entry extends Entity
{
    protected $tableName = "entries";

    protected $description;

    protected $projectid;

    protected $postedby;

    protected $type;

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPostedby()
    {
        return $this->postedby;
    }

    /**
     * @param mixed $postedby
     */
    public function setPostedby($postedby)
    {
        $this->postedby = $postedby;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
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