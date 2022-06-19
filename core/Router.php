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
            $callback[0] = new $callback[0];
        }

        return call_user_func($callback);
    }
    public function renderView($view)
    {
        $layoutView = $this->renderLayout();
        $contentView = $this->renderOnlyView($view);
        return str_replace("{{content}}", $contentView, $layoutView);
    }
    public function renderLayout()
    {
        ob_start();
        require_once Application::$path . "/views/layouts/main.php";
        return ob_get_clean();
    }
    public function renderOnlyView($view)
    {
        ob_start();
        require_once Application::$path . "/views/$view.php";
        return ob_get_clean();
    }
}
