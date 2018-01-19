<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 17-1-18
 * Time: 22:25
 */

namespace App\Models;


class Page extends Entity
{
    protected $tableName = "pages";
    protected $title;
    protected $content;
    protected $banner;
    protected $writer;
    protected $published;

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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getBanner()
    {
        return $this->banner;
    }

    /**
     * @param mixed $banner
     */
    public function setBanner($banner)
    {
        $this->banner = $banner;
    }

    /**
     * @return mixed
     */
    public function getWriter()
    {
        return $this->writer;
    }


    /**
     * @param mixed $writer
     */
    public function setWriter($writer)
    {
        $this->writer = $writer;
    }
    /**
     * @return mixed
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @param mixed $published
     */
    public function setPublished($published)
    {
        $this->published = $published;
    }

}