<?php 
namespace starter\core;

class Router {
    public Request $request;
    protected array $routes = [];

    public function __construct(Request $request)
    {   
        $this->request = $request;
    }
    public function get($path, $callback) 
    {
        $this->routes['get'][$path] = $callback;
        
    }
    public function post($path, $callback) {
	   
		$this->routes['post'][$path] = $callback;	
	}
    public function resolve() 
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback == null) {
            return "Not found";
        }
        if (is_string($callback)) {
            return $this->renderView($callback);   
        }
        echo call_user_func($callback, $this->request);
    }
    public function renderView($view) {
        ob_start();
        include_once (dirname(__DIR__) . "/views/$view.php");
    }
}