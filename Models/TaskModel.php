<?php
namespace Mvc\Models;

use Mvc\Core\Model;
use Mvc\Models\TaskResourceModel;

class TaskModel extends Model {
    public $id;
    public $title;
    public $description;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
    }

}
