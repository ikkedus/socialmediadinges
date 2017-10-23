<?php
/**
 * Created by PhpStorm.
 * User: martin
 * Date: 23-10-17
 * Time: 21:06
 */

namespace App\Models;


class Project extends Entity
{
    protected $tableName = "projects";
    protected $ownerid;
    protected $title;
    protected $description;
    protected $img;

    public function getOwner(){
        return User::find($this->ownerid);
    }

    public function getMembers(){
        $ids = $this->getIds(UserMemberOf::findAll(["projectid"=>$this->id]));
        $in = '('.implode(',',$ids).')';
        return User::findAll("id in ".$in);
    }

    public function getFiles(){
        return FileEntry::findAll(["projectid"=>$this->id]);
    }

    public function getEntries(){
        return Entry::findAll(["projectid"=>$this->id]);
    }

    public function addMember($memberid){
        if(UserMemberOf::find(['id'=> $memberid]) === null && $this->getId() !== null){
            $umo = new UserMemberOf();
            $umo->setUserid($memberid);
            $umo->setProjectid($this->getId());
            return $umo->save();
        }
        return false;
    }
    public function addFileEntry($entry){
        if(!($entry instanceof FileEntry)){
            return false;
        }
        $entry->setProjectid($this->getId());
        return $entry->save();
    }
    public function addEntry($entry){
        if(!($entry instanceof Entry)){
            return false;
        }
        $entry->setProjectid($this->getId());
        return $entry->save();
    }
    public function removeMember($id){
        $user = UserMemberOf::find(['userid'=>$id]);
        $user->thrash();
    }
    public function removeFileEntry($id){
        $user = FileEntry::find(['id'=>$id]);
        $user->thrash();
    }
    public function removeEntry($id){
        $user = Entry::find(['id'=>$id]);
        $user->thrash();
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
    public function getOwnerid()
    {
        return $this->ownerid;
    }

    /**
     * @param mixed $ownerid
     */
    public function setOwnerid($ownerid)
    {
        $this->ownerid = $ownerid;
    }
}