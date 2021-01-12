<?php
namespace Mvc\Controllers;

use Mvc\Core\Controller;
use Mvc\Models\TaskModel;
use Mvc\Models\TaskRepository;

class TasksController extends Controller
{
    /**
     * Repository muốn tương tác
     * @var TaskRepositoryInterface|\Mvc\Models
     */
    protected $taskRepository;

    /* Khởi tạo */
    public function __construct()
    {
        $this->taskRepository = new TaskRepository;
    }

    /* hàm Show tất cả task */
    function index()
    {
        $tasks = new TaskModel;
        $d['tasks'] = $this->taskRepository->getAll($tasks);
        $this->set($d);
        $this->render("index");
    }

    /* hàm Thêm 1 new task */
    function create()
    {
        extract($_POST);

        if (isset($title) && isset($description) && !empty($title) && !empty($description))
        {
            $task = new TaskModel;
            $task->title = $title;
            $task->description =$description;
 
            if ($this->taskRepository->add($task))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    /* hàm Sửa task với id */
    function edit($id)
    {
        extract($_POST);

        $task = new TaskModel;
        $d["task"] = $this->taskRepository->get($id);

        if (isset($title) && isset($description) && !empty($title) && !empty($description))
        {
            $task->id = $id;
            $task->title = $title;
            $task->description = $description;
            
            if ($this->taskRepository->edit($task))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->set($d);
        $this->render("edit");
    }

    /* hàm Xóa task với id */
    function delete($id)
    {
        $task = new TaskModel;
        $task->id = $id;
        
        if ($this->taskRepository->delete($task))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
