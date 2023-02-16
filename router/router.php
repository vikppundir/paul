<?php
defined('ACCESS') || header("location:../");
 /**
  *  its is spl_autoload_register function which inclue all file.
  */

    spl_autoload_register(function ($class_name) {
       
      if (file_exists(getcwd() . '/validation/' . $class_name . '.php')) 
         include_once getcwd() . '/validation/' . $class_name . '.php';
      
      if (file_exists(getcwd() . '/server/' . $class_name . '.php')) 
         include_once getcwd() . '/server/' . $class_name . '.php';

      if (file_exists(getcwd() . '/connection/' . $class_name . '.php')) 
         include_once getcwd() . '/connection/' . $class_name . '.php';
       
      if (file_exists(getcwd() . '/model/' . $class_name . '.php')) 
         include_once getcwd() . '/model/' . $class_name . '.php';  

      if (file_exists(getcwd() . '/app/controller/' . $class_name . '.php')) 
         include_once getcwd() . '/app/controller/' . $class_name . '.php';

      if (file_exists(getcwd() . '/auth/' . $class_name . '.php')) 
         include_once getcwd() . '/auth/' . $class_name . '.php';  

      if (file_exists(getcwd() . '/app/' . $class_name . '.php')) 
         include_once getcwd() . '/app/' . $class_name . '.php'; 

      if (file_exists(getcwd() . '/src/' . $class_name . '.php')) 
         include_once getcwd() . '/src/' . $class_name . '.php'; 


    });

    /**
     * Holds the registered routes
     *
     * @var array $routes
     */
    $routes = [];
    
    /**
     * Register a new route
     *
     * @param $action string
     * @param \Closure $callback Called when current URL matches provided action
     */
    function route($action, Closure $callback)
    {
        global $routes;
        $action = trim($action, '/');
        $action = preg_replace('/{[^}]+}/','(.*)',$action);

        $routes[$action] = $callback;
    }
    
    /**
     * Dispatch the router
     *
     * @param $action string
     */
    function dispatch($action)
    {
        global $routes;
       
        $action = trim($action, '/');

        $callback = null;

        $params =[];

        foreach($routes as $route => $handler):

          if(preg_match("%^{$route}$%",$action, $matches) === 1):

             $callback = $handler;

             $params = $matches;

             unset($matches[0]);

             break;

          endif;

        endforeach; 
        
        if(!$callback || !is_callable($callback)):
          
         http_response_code(404);
         header("HTTP/1.0 404 Not Found");
          require_once 'view/template/header.php';
         require_once 'view/page/404-page.html';
         exit;
        endif;
        
        echo call_user_func($callback, ...$params);
    }