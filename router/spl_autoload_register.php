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

      if (file_exists(getcwd() . "/connection/{$class_name}.php")) 
         include_once getcwd() . '/connection/' . $class_name . '.php';
       
      if (file_exists(getcwd() . '/model/' . $class_name . '.php')) 
         include_once getcwd() . '/model/' . $class_name . '.php';  

      if (file_exists(getcwd() . '/app/controller/' . $class_name . '.php')) 
         include_once getcwd() . '/app/controller/' . $class_name . '.php';

      if (file_exists(getcwd() . '/app/' . $class_name . '.php')) 
         include_once getcwd() . '/app/' . $class_name . '.php'; 

      if (file_exists(getcwd() . '/src/' . $class_name . '.php')) 
         include_once getcwd() . '/src/' . $class_name . '.php'; 


    });
 
 new auth();
 
   if(file_exists(getcwd() . '/function/method.php' )) 
         include_once getcwd() . '/function/method.php';
