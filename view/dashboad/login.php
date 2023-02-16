<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf_token" content="<?php echo auth::createToken(); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo ABSPATH; ?>asset/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo ABSPATH; ?>asset/css/admin/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>login Page</title>
</head>

<body class="h-100 bg-gradient-theme-light">
    <div class="dash-container h-100">
        <div class="dash-row h-100 d-flex justify-content-center align-items-center">
            <div class="col-md-5 mx-auto">
                <div class="form-outer bg-white pt-4 pb-4 pr-2 pl-2 rounded">
                    <h1 class="text-center mb-6">Login</h1>
                    <div class="form-inner">
                        <div id="errs" class="errorcontainer"></div>
                        <form id="loginForm">
                                        
                                        <label for="exampleFormControlInput1" class="form-label">Username</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text bg-white  border-bottom-1" id="basic-addon1"><i class="fa fa-user icon mr-1"></i></span>
                                            </div>
                                            <input type="text" name="email" class="form-control outline-none border-bottom-1" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" onkeydown="if(event.key === 'Enter'){event.preventDefault();login();}" required>
                                          </div>

                                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text bg-white  border-bottom-1" id="basic-addon1"><i class="fa fa-lock icon mr-1"></i></span>
                                        </div>
                                        <input type="password" name="password" class="form-control outline-none border-bottom-1" placeholder="password" aria-label="Username" aria-describedby="basic-addon1" onkeydown="if(event.key === 'Enter'){event.preventDefault();login();}" required>
                                      </div>
                                      
                                      <p class="text-right  mb-3">forgot password?</p>
                                    </div>
                                    <div class="dash-btn button-background mt-6 align-items-center d-block mx-auto w-100 round-button login" onclick="login();">Login</div>
                                    <?php echo $google->button('Login With Google'); ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
   
</body>
</html>