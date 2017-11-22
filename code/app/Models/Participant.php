<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 22-11-17
 * Time: 21:56
 */

namespace App\Models;


class Participant extends Person
{
    protected $tableName = "participants";
    protected $eventid;

    /**
     * @return mixed
     */
    public function getEventid()
    {
        return $this->eventid;
    }

    /**
     * @param mixed $eventid
     */
    public function setEventid($eventid)
    {
        $this->eventid = $eventid;
    }


}