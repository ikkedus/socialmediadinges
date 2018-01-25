<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 30-10-17
 * Time: 22:15
 */

namespace App\Models;


class ContentBlock extends Entity
{
    protected $tableName="contentblocks";

    protected $name;

    protected $content;

    protected $pageid;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return htmlspecialchars_decode($this->content);
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {

        $this->content = htmlspecialchars($content);
    }

    /**
     * @return mixed
     */
    public function getPageid()
    {
        return $this->pageid;
    }

    /**
     * @param mixed $pageid
     */
    public function setPageid($pageid): void
    {
        $this->pageid = $pageid;
    }


}