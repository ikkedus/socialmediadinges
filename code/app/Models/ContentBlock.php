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
    protected $tableName="content_block";

    protected $name;

    protected $content;

    protected $type;

    protected $is_slide;

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType(ContentBlockType $type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getisSlide()
    {
        return $this->is_slide;
    }

    /**
     * @param mixed $is_slide
     */
    public function setIsSlide($is_slide)
    {
        $this->is_slide = $is_slide;
    }
}