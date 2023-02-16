<?php
defined('ACCESS') || header("location:../");
/**
 * user : WMI
 * date : 20/08/2022
 * Root Class is handling URl Path
 * require class are called here and magic function include the file by class name
 * the router file have the router
 */

/// load a defind value
require_once getcwd() . '/connection/connect.php';

//Load Composer's autoloader
require_once 'vendor/autoload.php';

//router load
require_once getcwd() . '/router/spl_autoload_register.php';

$router = new \Bramus\Router\Router();
//echo $_SESSION['roll'];
define('ABSPATH', $router->getBasePath());
$router->before('GET|POST', '/dashboad/.*', function() {
        if(!is_supper_admin()): header("Location:".ABSPATH); endif;
});

$router->before('GET|POST', '/session/admin/.*', function() {
    
        if(!is_supper_admin()):
        if(!is_admin()): header("Location:".ABSPATH); endif;
        endif;
        


});



$router->before('GET|POST', '/admin/.*', function() {
    
        if(!is_supper_admin()):
        if(!is_admin()): header("Location:".ABSPATH); endif;
        endif;
});



/// all api envarment here
$router->mount('/api/app', function () use ($router)
{

    $router->post("/login", function ()
    {
        $login = new Authorization();
        $login->login();

    });

    $router->post("/register", function ()
    {
        $login = new Authorization();
        $login->registeration();
    });

    $router->post("/verifyotp", function ()
    {
        $login = new Authorization();
        $login->verifyOTP();
    });

});



$router->mount('/dashboad/api/app', function () use ($router)
{
 
    
    $router->post("/component", function ()
    {
        $login = new components();
        $login->create();
    });
    
    $router->post("/endpoint", function ()
    {
        $login = new endpoint();
        $login->create();
    });
    
    $router->post("/page", function ()
    {
        $post = new templates();
        $post->create();
    });
    
    $router->post("/skin", function ()
    {
        $post = new skin();
        $post->create();
    });

});

$router->mount('/session/admin/v2/api/app', function () use ($router)
{
    
    $router->match("GET|POST","/category", function ()
    {
        $category = new category();
        $category->init();
       
    });
    

});


$router->mount('/session/v2/api/app', function () use ($router)
{
    
    $router->post("/category", function ()
    {
        $category = new category();
        $category->init();
       
    });

    $router->match("GET|POST","/business", function ()
    {
        
        $business = new business();
        $business->init();
       
    });
    

});

// dashoad menus envarment
$router->mount('/dashboad', function () use ($router)
{
    
    
    
    $router->get('/', function ()
    {
        if(!is_supper_admin()): header("Location:".ABSPATH); endif;
        viewD('header');
        viewD('dashboad');
        viewD('footer');

    });

    $router->get('/(\d+)', function ($id)
    {
        echo ' id ' . htmlentities($id);
    });

    $router->match('GET|POST','/component', function ()
    {
         viewD('header');
         viewD('components');
         viewD('footer');
  

    });

    $router->match('GET|POST','/endpoint', function ()
    {
        viewD('header');
        viewD('endpoint');
        viewD('footer');
    });
    
    $router->match('GET|POST','/page', function ()
    {
         viewD('header');
         viewD('page');
         viewD('footer');
  

    });
    
    $router->match('GET|POST','/skin', function ()
    {
         viewD('header');
         viewD('skin');
         viewD('footer');
  

    });
    
   $router->match('GET|POST','/media', function ()
    {
         viewD('header');
         viewD('media');
         viewD('footer');
  

    });
    
  
});

$router->get('/v2/{id}/plugin/endpoint/{name}',function($id, $name){
    $dir = 'app/api/endpoint';
   $count = sql("select * from endpoint where endpoint_id=:id and name=:name",array(':id'=>$id,':name'=>$name))->count;
   $fileName = "{$dir}/{$name}.php";
   if($count === 1):if(file_exists($fileName)) echo'<pre>'; include $fileName; echo'</pre>';else:
   endif;
});

// for google login call back functiion this class define in src folder
$router->get('google/auth/', 'loginWithGoogle@login');

// this is logout method call define in controller
$router->get('/logout', 'Authorization@logout');

//login function
$router->get("/login", function ()
{
    $google = new loginWithGoogle();
    !isset($_SESSION['IntrbologinEmail']) || header("Location:" . ABSPATH . "dashboad");
    require_once 'view/dashboad/login.php';
    require_once 'view/dashboad/footer.php';
});

// signUp function
$router->get("/signup", function ()
{
    $google = new loginWithGoogle();
    require_once 'view/dashboad/registration.php';
    require_once 'view/dashboad/footer.php';

});

require_once 'adminRouter.php';
require_once 'frentRouter.php';


$router->set404(function ()
{

    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    header('HTTP/1.1 404 Not Found');
    
    view('page404');
});

$router->run();

//session_destroy();

