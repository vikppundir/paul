
<?php
defined('ACCESS') || header("location:../");


$router->before('GET|POST', '/mentor/.*', function() {
    
    
       if(!is_login()): header("Location:".ABSPATH); endif;

});

  //profile page router 
  
  
 $router->get('/profile/{name}/id/(\d+)', function ($name,$id) use ($router)
  {
       $business = new business(); 
       $data = json_decode($business->userDetails($id,filter_var($name,FILTER_SANITIZE_STRING),true))??null;
       if($data->count !== 0):
           
       $GLOBALS['userDetails'] = $data->data[0]??null;
        
       view('ProfilePage');
       else:
          $router->trigger404(); return; 
      endif;
    
   }); 
   
   
   //category page router
 $router->get('/cp/{name}', function ($CatName) use ($router)
  {
    
    $CatName= htmlentities($CatName);
    $category = sql("select * from category where url = '{$CatName}' ")->data;
    if(!empty($category[0])): $GLOBALS['category'] = $category[0]; view('category'); else: $router->trigger404(); return;  endif;
     
   });
   
   
   //post page router 
   
 $router->get('/post/{name}', function ($PastName)
  {
      
    echo "post Page coming soon {$PastName}";
    
   });
   
   
   
  // start single page router
   $router->get('/mentor/registration', function ()
   {
      
      view('Registration');
    
   });
      $router->get('/mentor', function ()
   {
      
      view('mentor');
    
   });
   $router->get('/mentorees', function ()
   {
      
      view('mentoree');
    
   });
   
   $router->get('/search', function ()
   {
      
      view('category');
    
   });
      $router->get('/home-new', function ()
   {
      
      view('new-home-page');
    
   });
      $router->get('/noah', function ()
   {
      
      view('single-mentor-page');
    
   });
   
   // Request a quate
   $router->get('/Request-a-quate', function ()
   {
      
      view('RequestAQuote');
    
   });
   // RecomendATrader
   $router->get('/recomend-a-trader', function ()
   {
      
      view('RecomendATrader');
    
   });
   // Verification check
   $router->get('/verification-check', function ()
   {
      
      view('VerifiicationChcekTrader');
    
   });
   
// start single page router
   $router->get('/', function ()
   {
      
   view('homePage');
    
   });
  
 // $router->get('/{Pagename}/', function ($pageName)
  // {
      
  // view($pageName,true);
    
 //  });
