<?php
namespace Mvc\Models;

use Mvc\Models\TaskResourceModel;
use Mvc\Models\TaskModel;

class TaskRepository {
    protected $taskResourceModel;

    public function __construct()
    {
        $this->taskResourceModel = new TaskResourceModel;
    }

    public function getAll($model){
        return $this->taskResourceModel->all($model);
    }

    public function add($model){
        return $this->taskResourceModel->save($model);
    }

    public function get($id){
        return $this->taskResourceModel->getId($id);
    }

    public function edit($model){
        return $this->taskResourceModel->save($model);
    }

    public function delete($model){
        return $this->taskResourceModel->delete($model);
    }
    
}
