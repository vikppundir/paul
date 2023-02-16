<!DOCTYPE html>
<html lang="en">

<body class="h-100 bg-gradient-theme-light">
    <div class="container h-100">
        <div class="row h-100 d-flex justify-content-center align-items-center">
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
                                    <div class="btn button-background mt-6 align-items-center d-block mx-auto w-100 round-button login" onclick="login();">Login</div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
   
</body>
</html>