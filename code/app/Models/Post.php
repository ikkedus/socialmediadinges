<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 11-10-17
 * Time: 22:53
 */

namespace App\Models;


class Post extends Entity
{
    protected $userid;
    protected $post;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userid;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return mixed
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param mixed $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }
}