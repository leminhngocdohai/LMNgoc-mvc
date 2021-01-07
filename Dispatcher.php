<?php
namespace Mvc;
use Mvc\Request;

class Dispatcher
{

    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        
        Router::parse($this->request->url, $this->request);
        
        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $file = 'Mvc\Controllers\\' . ucfirst($this->request->controller) . "Controller";
        return $controller = new $file;
    }

}
?>