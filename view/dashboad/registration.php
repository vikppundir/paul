
<?php if ( !defined('ACCESS') ) header("location:../"); ?>
	<div class="dash-container h-100">
		<div class="dash-row h-100 d-flex justify-content-center align-items-center">
            
			<div class="col-md-5 mx-auto" id="register_from" style="<?php if(isset($_SESSION['otpEmail'])) echo 'display:none'; ?>">
				<div class="form-outer bg-white pt-3 pb-4 pr-2 pl-2 rounded">
					<h1 class="mb-2">Sign Up</h1>
					<p class="mb-6">Want to sign-up fill out this form!</p>
					<div id="errs" class="errcontainer"></div>
					<div class="form-inner">
						<form action="" method="post" id="registerForm">
							<label for="exampleFormControlInput1" class="form-label">First Name</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend"> <span class="input-group-text bg-white  border-bottom-1" id="basic-addon1"><i class="fa fa-user icon mr-1"></i></span> </div>
								<input type="text" name="name" class="form-control outline-none border-bottom-1" placeholder="Enter your name" aria-label="Username" aria-describedby="basic-addon1" onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}"> </div>
							<label for="exampleFormControlInput1" class="form-label">Last Name</label>
							<div class="input-group mb-3">
								<div class="input-group-prepend"> <span class="input-group-text bg-white  border-bottom-1" id="basic-addon1"><i class="fa fa-user icon mr-1"></i></span> </div>
								<input type="text" name="lastname" class="form-control outline-none border-bottom-1" placeholder="Enter your last name" aria-label="Username" aria-describedby="basic-addon1" onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}"> </div>
							<label for="exampleFormControlInput1" class="form-label">Enter your mail</label>
							<div class="input-group  mb-6">
								<div class="input-group-prepend"> <span class="input-group-text bg-white  border-bottom-1" id="basic-addon1"><i class="fa fa-envelope icon mr-1"></i></span> </div>
								<input type="email" name="email" class="form-control outline-none border-bottom-1" placeholder="Please enter your email" aria-label="Username" aria-describedby="basic-addon1" onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}"> </div>
							<label for="exampleFormControlInput1" class="form-label">New password</label>
							<div class="input-group">
								<div class="input-group-prepend"> <span class="input-group-text bg-white  border-bottom-1" id="basic-addon1"><i class="fa fa-lock icon mr-1"></i></span> </div>
								<input type="password" name="password" class="form-control outline-none border-bottom-1" onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}" placeholder="Enter your new password" aria-label="Username"  aria-describedby="basic-addon1"> </div>
							<p class="mb-6 grey-color">Must be at least 8 characters.</p>
							<label for="exampleFormControlInput1" class="form-label">Confirm password</label>
							<div class="input-group mb-6">
								<div class="input-group-prepend"> <span class="input-group-text bg-white  border-bottom-1" id="basic-addon1"><i class="fa fa-lock icon mr-1"></i></span> 
                               </div>
								<input type="password" name="confirm-password" class="form-control outline-none border-bottom-1" placeholder="Both passwords must match" onkeydown="if(event.key === 'Enter'){event.preventDefault();register();}" aria-label="confirm-password" aria-describedby="basic-addon1"> 
                            </div>
					</div>
					<div class="dash-btn button-background mt-6 align-items-center d-block mx-auto w-100 round-button register" onclick="register();">Register</div>
				</div>
				</form>
                </div>
            <div class="col-md-5 mx-auto verify-otp" id="verify-otp" style="<?php if(isset($_SESSION['otpEmail'])) echo 'display:block'; ?>">
                <div class="form-outer bg-white pt-3 pb-4 pr-2 pl-2 rounded" >
					<h1 class="mb-2">Verify OTP</h1>
					<p class="mb-6">Please a OTP to signup!</p>
                    <div id="sucessMsg" class="errcontainer"></div>
					<div id="errsotp" class="errcontainer"></div>
					<div class="form-inner">
                      <form method="post" id="verifyOtpForm">
                          
                          <label for="exampleFormControlInput1" class="form-label">Enter OTP </label>
						  <div class="input-group">
							   <div class="input-group-prepend"> <span class="input-group-text bg-white  border-bottom-1" id="basic-addon1"><i class="fa fa-lock icon mr-1"></i></span> 
                               </div>
								<input type="number" name="OTP" class="form-control outline-none border-bottom-1" placeholder="Enter OTP" aria-label="OTP" aria-describedby="basic-addon1" onkeydown="if(event.key === 'Enter'){event.preventDefault();verifyOtp();}"> 
                           </div>
                           <div class="dash-btn button-background mt-6 align-items-center d-block mx-auto w-100 round-button register" onclick="verifyOtp();">Verify</div>

                      </form>
                 </div>
              </div>
         </div>
    
		</div>
	</div>
	</div>
	</div>
