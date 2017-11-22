<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 22-11-17
 * Time: 20:34
 */

namespace App\Models;


class Event extends Entity
{
    protected $tableName = "events";
    protected $title;
    protected $date;
    protected $description;
    protected $creator;
    protected $img;
    protected $attendable;

    /**
     * @return mixed
     */
    public function getCreator()
    {
        return User::find($this->creator);
    }

    public static function getMostRecent(){
        return Event::findAll();
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

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
     * @param mixed $creator
     */
    public function setCreator($creator)
    {
        $this->creator = $creator;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @return mixed
     */
    public function getAttendable()
    {
        return $this->attendable;
    }

    /**
     * @param mixed $attendable
     */
    public function setAttendable($attendable)
    {
        $this->attendable = $attendable;
    }


}