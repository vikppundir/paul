<?php

defined('ACCESS') || header("location:../");


// dashoad menus envarment
$router->mount('/admin', function () use ($router)
{
    
    
    $router->get('/', function ()
    {
        if(!is_supper_admin()):
        if(!is_admin()): header("Location:".ABSPATH); endif;
        endif;
        viewD('admin/header');
        viewD('admin/sidebar');
        viewD('admin/dashboad');
        viewD('admin/footer');

    });

    $router->match('GET|POST','/category/', function ()
    {    
        $catOBJ = new category();

        $catOBJ->update();
         viewD('admin/header');
         viewD('admin/sidebar');
         viewD('admin/category');
         viewD('admin/footer');
  

    });
    $router->match('GET|POST','/category/type/{name}', function ($name)
    {    
        $catOBJ = new category();
        $type = $name;
        $catOBJ->update();
         viewD('admin/header');
         viewD('admin/sidebar');
         viewD('admin/category');
         viewD('admin/footer');
  

    });

  
});