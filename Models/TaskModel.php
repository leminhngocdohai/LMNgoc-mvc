<?php
namespace Mvc\Models;

use Mvc\Core\Model;
use Mvc\Models\TaskResourceModel;

class TaskModel extends Model {
    protected $id;
    protected $title;
    protected $description;

    public function __set($name, $value)
    {
        $this->{$name} = $value;
    }

    public function __get($name)
    {
        return $this->{$name};
    }
}
