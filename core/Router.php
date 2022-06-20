<?php

namespace core;

use core\Request;
use core\Response;

class Router
{
    public Request $request;
    public Response $response;
    public array $routers;
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
    public function get($path, $callback)
    {
        $this->routers['get'][$path] = $callback;
    }
    public function post($path, $callback)
    {
        $this->routers['post'][$path] = $callback;
    }
    public function resolve()
    {
        $path = $this->request->path();
        $method = $this->request->method();
        $callback = $this->routers[$method][$path] ?? false;
        if ($callback === false) {
            $this->response->statusCode(404);
            return "Not Found";
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        if (is_array($callback)) {
            Application::$app->controller= new $callback[0];
            $callback[0]= Application::$app->controller;
        }

        return call_user_func($callback,$this->request);
    }
    public function renderView($view,$params)
    {
        $layoutView = $this->renderLayout();
        $contentView = $this->renderOnlyView($view,$params);
        return str_replace("{{content}}", $contentView, $layoutView);
    }
    public function renderLayout()
    {
        $layout=Application::$app->controller->layout;
        ob_start();
        require_once Application::$path . "/views/layouts/$layout.php";
        return ob_get_clean();
    }
    public function renderOnlyView($view,$params)
    {
        foreach($params as $key=>$value){   
            $$key=$value; 
        }
        ob_start();
        require_once Application::$path . "/views/$view.php";
        return ob_get_clean();
    }
}
