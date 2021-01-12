<?php
namespace Mvc\Models;

use Mvc\Models\TaskResourceModel;
use Mvc\Models\TaskModel;

class TaskRepository {

    /**
     * @var TaskRepositoryModel| \Mvc\Models
     */
    
    protected $taskResourceModel;

    /* Khởi tạo */
    public function __construct()
    {
        $this->taskResourceModel = new TaskResourceModel;
    }

    /**
     * Get's all tasks.
     *
     * @return mixed
     */

    public function getAll($model)
    {
        return $this->taskResourceModel->all($model);
    }

    /**
     * Create a task.
     *
     * @param int
     * @param array
     */

    public function add($model)
    {
        return $this->taskResourceModel->save($model);
    }

    /**
     * Get's a task by it's ID
     *
     * @param int
     */

    public function get($id)
    {
        return $this->taskResourceModel->getId($id);
    }

    /**
     * Update a task.
     *
     * @param int
     * @param array
     */

    public function edit($model)
    {
        return $this->taskResourceModel->save($model);
    }

    /**
     * Deletes a task.
     *
     * @param int
     */

    public function delete($model)
    {
        return $this->taskResourceModel->delete($model);
    }
    
}
