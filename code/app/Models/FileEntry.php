<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 23-10-17
 * Time: 21:19
 */

namespace App\Models;


class FileEntry extends Entity
{
    protected $tableName = "filentries";

    protected $url;

    protected $projectid;

    protected $postedby;

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
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