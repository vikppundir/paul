<?php
defined('ACCESS') || header("location:../");
/**
 * user : WMI
 * date : 20/08/2022
 * Root Class is handling URl Path
 * require class are called here and magic function include the file by class name
 * the router file have the router
 */
require_once getcwd() . '/router/router.php';

new auth();
new db();
 

function query()
{
    return $query = new query();
}

route("intrbo", function ()
{

    return 'Home page coming Soon';

});



route("/{__dir__}/api/app/login/", function ()
{
    $login = new Authorization();
    $login->login();
});

route("/{__dir__}/api/app/register/", function ()
{
    $login = new Authorization();
    $login->registeration();
});
route("/{__dir__}/api/app/verifyotp/", function ()
{
    $login = new Authorization();
    $login->verifyOTP();
});



route("/{__dir__}/dashboad", function ()
{   
    if(!isset($_SESSION['loggedin'])) header("Location:{$domin}/intrbo/login");
    require_once 'view/page/dashboad.php';

});

route("/{__dir__}/login", function ()
{
    if (isset($_SESSION['loggedin'])) header("Location:{$domin}/intrbo/dashboad");
    require_once 'view/template/header.php';
    require_once 'view/page/login.php';
    require_once 'view/template/footer.php';
});

route("/{__dir__}/signup", function ()
{
    if (isset($_SESSION['loggedin'])) header("Location:{$domin}/intrbo/dashboad");
    require_once 'view/template/header.php';
    require_once 'view/page/registration.php';
    require_once 'view/template/footer.php';

});

route('{__dir__}/user/{username}/?/id/{id}/?', function ($url,$username, $id)
{
   
   echo '<br>' .$url . '   '.  '' .'    ' . $username . '  '  . $id;
   
});

$action = $_SERVER['REQUEST_URI'];
dispatch($action);

//session_destroy();
//$_SESSION['otpEmail'] = true;