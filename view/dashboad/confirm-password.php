<?php if ( !defined('ACCESS') ) header("location:../"); ?>
    <div class="dash-container h-100">
        <div class="dash-row h-100 d-flex justify-content-center align-items-center">
            <div class="col-md-5 mx-auto">
                <div class="form-outer bg-white pt-4 pb-4 pr-2 pl-2 rounded">
                    <h1 class="mb-3">Create new password</h1>
                    <p class="mb-6">Your new password must be different from previous used passwords</p>
                    <div class="form-inner">
                        <form action="">
                           
                              
                        
                                        
                                        <label for="exampleFormControlInput1" class="form-label">New password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text bg-white  border-bottom-1" id="basic-addon1"><i class="fa fa-lock icon mr-1"></i></span>
                                            </div>
                                            <input type="password" class="form-control outline-none border-bottom-1" placeholder="Enter your new password" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                        <p class="mb-6 grey-color">Must be at least 8 characters.</p>
                      



                                    <label for="exampleFormControlInput1" class="form-label">Confirm password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text bg-white  border-bottom-1" id="basic-addon1"><i class="fa fa-lock icon mr-1"></i></span>
                                        </div>
                                        <input type="password" class="form-control outline-none border-bottom-1" placeholder="Both passwords must match" aria-label="Username" aria-describedby="basic-addon1">
                                      </div>
                                      
                                      <p class="mb-6 grey-color">Must be at least 8 characters.</p>
                                    </div>
                                    <button class="dash-btn button-background mt-6 align-items-center d-block mx-auto w-100 round-button">Reset Password</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
