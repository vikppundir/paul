
let projectName = '/'
// global functions
function request(url, data, callback,action = null) {
	var xhr = new XMLHttpRequest();
	xhr.open('POST', url, true);
	var loader = document.createElement('div');
	loader.className = 'loader';
	document.body.appendChild(loader);
	xhr.addEventListener('readystatechange', function() {
		if(xhr.readyState === 4) {
			if(callback) {
				callback(xhr.response);
			}
			loader.remove();
		}
	});

	var formdata = data ? (data instanceof FormData ? data : new FormData(document.querySelector(data))) : new FormData();

	var csrfMetaTag = document.querySelector('meta[name="csrf_token"]');
	if(csrfMetaTag) {
		formdata.append('csrf_token', csrfMetaTag.getAttribute('content'));
	}
	if(action != null){
	   
	   formdata.append('action',action);
 
	}

	xhr.send(formdata);
}


// index.php
function logout() {
	request('api/app/logout', false, function(data) {
		if(data === '0') {
			window.location = 'login';
		}
	});
}



function businessRegistration(e){
    
	request(projectName+'session/v2/api/app/business', '#businessRegistration', function(data) {
	   
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;
		
		data = JSON.parse(data);
	//	if(!(data instanceof Array)) {throw Exception('bad data');}
		//Show errors to user
	//	for(var i = 0;i < data.length;++i) {
			switch(data.code) {
			case 0:
				window.location = projectName+'admin/category/?name='+data.name;
				break;
			case 1:
				document.getElementById('errs').innerHTML += '<div class="err">Invalid name entered. (only use letters, spaces,number, and hyphens)</div>';
				break;
			case 2:
				document.getElementById('errs').innerHTML += '<div class="err">This category already exists </div>';
				break;
			case 3:
				document.getElementById('errs').innerHTML += '<div class="err">Please try Agin some think wrong please and reload this page</div>';
				break;
			case 4:
				document.getElementById('errs').innerHTML += '<div class="err">Invalid CSRF Token... Nice try</div>';
				break;
			default:
				document.getElementById('errs').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
		   }
	   // }
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	},'create');
}



function createCategory(e){
    
	request(projectName+'session/v2/api/app/category', '#categoryCreate', function(data) {
	   
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;
		
		data = JSON.parse(data);
	//	if(!(data instanceof Array)) {throw Exception('bad data');}
		//Show errors to user
	//	for(var i = 0;i < data.length;++i) {
			switch(data.code) {
			case 0:
				window.location = projectName+'admin/category/?name='+data.name;
				break;
			case 1:
				document.getElementById('errs').innerHTML += '<div class="err">Invalid name entered. (only use letters, spaces,number, and hyphens)</div>';
				break;
			case 2:
				document.getElementById('errs').innerHTML += '<div class="err">This category already exists </div>';
				break;
			case 3:
				document.getElementById('errs').innerHTML += '<div class="err">Please try Agin some think wrong please and reload this page</div>';
				break;
			case 4:
				document.getElementById('errs').innerHTML += '<div class="err">Invalid CSRF Token... Nice try</div>';
				break;
			default:
				document.getElementById('errs').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
		   }
	   // }
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	},'create');
}


function createSkin() {
     debugger;
	request(projectName+'dashboad/api/app/skin', '#skin', function(data) {
	   
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;
		
		data = JSON.parse(data);
	//	if(!(data instanceof Array)) {throw Exception('bad data');}
		//Show errors to user
	//	for(var i = 0;i < data.length;++i) {
			switch(data.code) {
			case 0:
				window.location = projectName+'dashboad/skin/?skin='+data.name;
				break;
			case 1:
				document.getElementById('errs').innerHTML += '<div class="err">Invalid name entered. (only use letters, spaces,number, and hyphens)</div>';
				break;
			case 2:
				document.getElementById('errs').innerHTML += '<div class="err">This skin already exists </div>';
				break;
			case 3:
				document.getElementById('errs').innerHTML += '<div class="err">Please try Agin some think wrong please and reload this page</div>';
				break;
			case 4:
				document.getElementById('errs').innerHTML += '<div class="err">Invalid CSRF Token... Nice try</div>';
				break;
			default:
				document.getElementById('errs').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
		   }
	   // }
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	});
}

function createPage() {
	request(projectName+'dashboad/api/app/page', '#createComponent', function(data) {
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;
		
		data = JSON.parse(data);
	//	if(!(data instanceof Array)) {throw Exception('bad data');}
		//Show errors to user
	//	for(var i = 0;i < data.length;++i) {
			switch(data.code) {
			case 0:
				window.location = projectName+'dashboad/page/?page='+data.name;
				break;
			case 1:
				document.getElementById('errs').innerHTML += '<div class="err">Invalid name entered. (only use letters, spaces, and hyphens)</div>';
				break;
			case 2:
				document.getElementById('errs').innerHTML += '<div class="err">This templete already exists </div>';
				break;
			case 3:
				document.getElementById('errs').innerHTML += '<div class="err">Please try Agin some think wrong please and reload this page</div>';
				break;
			case 4:
				document.getElementById('errs').innerHTML += '<div class="err">Invalid CSRF Token... Nice try</div>';
				break;
			default:
				document.getElementById('errs').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
		   }
	   // }
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	});
}

function createComponent() {
	request(projectName+'dashboad/api/app/component', '#createComponent', function(data) {
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;
		
		data = JSON.parse(data);
	//	if(!(data instanceof Array)) {throw Exception('bad data');}

		//Show errors to user
	//	for(var i = 0;i < data.length;++i) {
			switch(data.code) {
			case 0:
				window.location = projectName+'dashboad/component/?component='+data.name;
				break;
			case 1:
				document.getElementById('errs').innerHTML += '<div class="err">Invalid name entered. (only use letters, spaces, and hyphens)</div>';
				break;
			case 2:
				document.getElementById('errs').innerHTML += '<div class="err">This component already exists </div>';
				break;
			case 3:
				document.getElementById('errs').innerHTML += '<div class="err">Please try Agin some think wrong please and reload this page</div>';
				break;
			case 4:
				document.getElementById('errs').innerHTML += '<div class="err">Invalid CSRF Token... Nice try</div>';
				break;
			default:
				document.getElementById('errs').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
		   }
	   // }
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	});
}


function createEndpoint() {
	request(projectName+'dashboad/api/app/endpoint', '#createEndpoint', function(data) {
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;
		data = JSON.parse(data);
	//	if(!(data instanceof Array)) {throw Exception('bad data');}
    // debugger;
		//Show errors to user
	//	for(var i = 0;i < data.length;++i) {
			switch(data.code) {
			case 0:
				window.location = projectName+'dashboad/endpoint/?endpoint='+data.name;
				break;
			case 1:
				document.getElementById('errs').innerHTML += '<div class="err">Invalid name entered. (only use letters, spaces, and hyphens)</div>';
				break;
			case 2:
				document.getElementById('errs').innerHTML += '<div class="err">This endpoint already exists </div>';
				break;
			case 3:
				document.getElementById('errs').innerHTML += '<div class="err">Please try Agin some think wrong please and reload this page</div>';
				break;
			case 4:
				document.getElementById('errs').innerHTML += '<div class="err">Invalid CSRF Token... Nice try</div>';
				break;
			default:
				document.getElementById('errs').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
		   }
	   // }
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	});
}

function deleteAccount() {
	request('api/app/deleteAccount', false, function(data) {
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;
		switch(data) {
			case '0':
				window.location = 'register';
				break;
			case '1':
				document.getElementById('errs').innerHTML += '<div class="err">Failed to delete account. Please try again later.</div>';
				break;
			case '2':
				document.getElementById('errs').innerHTML += '<div class="err">Failed to connect to database. Please try again later.</div>';
				break;
			case '3':
				document.getElementById('errs').innerHTML += '<div class="err">You are not logged in.</div>';
				break;
			case '4':
				document.getElementById('errs').innerHTML += '<div class="err">Invalid CSRF Token... Nice try</div>';
				break;
			default:
				document.getElementById('errs').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
		}
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	});
}

// login.php
function login() {
	//debugger;
	request('api/app/login', '#loginForm', function(data) {
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;
		var data = JSON.parse(data);
		switch(data.data.code) {
			case 0:
				window.location = './';
				break;
			case 1:
				document.getElementById('errs').innerHTML += '<div class="err">Incorrect username or password</div>';
				break;
			case 2:
				document.getElementById('errs').innerHTML += '<div class="err">Failed to connect to database. Please try again later.</div>';
				break;
			case 3:
				document.getElementById('errs').innerHTML += '<div class="err">You have exceeded the max number of login attempts per hour. Try again in an hour.</div>';
				break;
			case 4:
				document.getElementById('errs').innerHTML += '<div class="err">Your email has not been validated. Please check your email for a validation link or <a href="./validate">click here</a> to send another link</div>';
				break;
			case 5:
			     document.getElementById('errs').innerHTML += '<div class="err">Please Enter Your email address</div>';
			     break;
			case 6:
			     document.getElementById('errs').innerHTML += '<div class="err">Please Enter Your Password</div>';
			     break;

			default:
				document.getElementById('errs').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
		}
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	});
}

// register.php
function register() {
	request(projectName+'api/app/register', '#registerForm', function(data) {
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;
		try {
			data = JSON.parse(data);
			if(!(data instanceof Array)) {throw Exception('bad data');}

			//Show errors to user
			for(var i = 0;i < data.length;++i) {
				switch(data[i]) {
					case 0:
						document.getElementById('sucessMsg').innerHTML += '<div>Your account has been created!</div><div>Please validate your email by checking your inbox for a validation OTP before logging in.</div>';
						document.getElementById('registerForm').style.display = "none";
						document.getElementById('verifyOtpForm').style.display = "block";
						break;
					case 1:
						document.getElementById('errs').innerHTML += '<div class="err">Invalid name entered. (only use letters, spaces, and hyphens)</div>';
						break;
					case 2:
						document.getElementById('errs').innerHTML += '<div class="err">Invalid email entered.</div>';
						break;
					case 3:
						document.getElementById('errs').innerHTML += '<div class="err">Email does not exist. (This domain does not have a mail server)</div>';
						break;
					case 4:
						document.getElementById('errs').innerHTML += '<div class="err">Password must contain: <ul><li>At least 8 characters</li><li>At least one lower case letter</li><li>At least one upper case letter</li><li>At least one number</li><li>At least one special character (~?!@#$%^&*)</li></ul></div>';
						break;
					case 5:
						document.getElementById('errs').innerHTML += '<div class="err">Passwords do not match. Please re-enter your confirmed password.</div>';
						break;
					case 6:
						document.getElementById('errs').innerHTML += '<div class="err">Failed to add account to database. Please try again later.</div>';
						break;
					case 7:
						document.getElementById('errs').innerHTML += '<div class="err">An account with this email already exists</div>';
						break;
					case 8:
						document.getElementById('errs').innerHTML += '<div class="err">Failed to connect to the database. Please try again later.</div>';
						break;
					case 9:
						document.getElementById('errs').innerHTML += '<div class="err">Invalid CSRF Token. Please try again later.</div>';
						break;
					case 10:
						document.getElementById('errs').innerHTML += '<div class="err">Failed to send email. Please try again later.</div>';
						break;
					case 11:
						document.getElementById('errs').innerHTML += '<div class="err">Failed to insert request into database. Please try again later.</div>';
						break;
					case 12:
						document.getElementById('errs').innerHTML += '<div class="err">You have exceeded your number of allowed validation requests per day</div>';
						break;
					case 13:
						document.getElementById('errs').innerHTML += '<div class="err">The user with this email is already validated</div>';
						break;
					case 14:
						document.getElementById('errs').innerHTML += '<div class="err">A user with this email does not exist</div>';
						break;
					case 15:
						document.getElementById('errs').innerHTML += '<div class="err">Failed to connect to database. Please try again later.</div>';
						break;
					default:
						document.getElementById('errs').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
				}
			}
		}
		catch(e) {
			document.getElementById('errs').innerHTML = '<div class="err">An unknown error occurred. Please try again later.</div>';
		}
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	});
}

// validate OTP
function verifyOtp() {
	request('api/app/verifyotp', '#verifyOtpForm', function(data) {
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
console.log(data.replace(/\s/g,''));
		switch(data.replace(/\s/g,'')) {
			case '0':
				window.location.reload();
				document.getElementById('verifyOtpForm').reset();
				break;
			case '1':
				document.getElementById('errs').innerHTML += '<div class="err">Wrong OTP</div>';
				break;
			case '2':
					document.getElementById('errs').innerHTML += '<div class="err">Somthing wrong with update your status Please reset and try again</div>';
					break;
			case '3':
					document.getElementById('errs').innerHTML += '<div class="err">Please resend OTP to verify</div>';
					break;
			case '4':
					document.getElementById('errs').innerHTML += '<div class="err">Please resend opt Your session destory or token not validate</div>';
					break;
			default:
				document.getElementById('errs').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
		}
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	});
}
// validateEmail.php
function sendValidateEmailRequest() {
	request('api/app/sendValidationEmail', '#validateEmailForm', function(data) {
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;

		switch(data) {
			case '0':
				document.getElementById('errs').innerHTML += '<div>Email Sent... Check your email and click the link in the email to validate your email.</div>';
				document.getElementById('validateEmailForm').reset();
				break;
			case '1':
				document.getElementById('errs').innerHTML += '<div class="err">Failed to send email. Please try again later.</div>';
				break;
			case '2':
				document.getElementById('errs').innerHTML += '<div class="err">Failed to insert request into database. Please try again later.</div>';
				break;
			case '3':
				document.getElementById('errs').innerHTML += '<div class="err">You have exceeded your number of allowed validation requests per day</div>';
				break;
			case '4':
				document.getElementById('errs').innerHTML += '<div class="err">The user with this email is already validated</div>';
				break;
			case '5':
				document.getElementById('errs').innerHTML += '<div class="err">A user with this email does not exist</div>';
				break;
			case '6':
				document.getElementById('errs').innerHTML += '<div class="err">Failed to connect to database. Please try again later.</div>';
				break;
			default:
				document.getElementById('errs').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
		}
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	});
}

// resetPassword.php
function passwordResetRequest() {
	request('api/app/passwordResetRequest', '#resetPasswordForm', function(data) {
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;

		switch(data) {
			case '0':
				document.getElementById('errs').innerHTML += '<div>An email has been sent if an account with that email exists</div>';
				document.getElementById('resetPasswordForm').reset();
				break;
			case '1':
				document.getElementById('errs').innerHTML += '<div class="err">Failed to send email. Please try again later.</div>';
				break;
			case '2':
				document.getElementById('errs').innerHTML += '<div class="err">Failed to insert request into database. Please try again later.</div>';
				break;
			case '3':
				document.getElementById('errs').innerHTML += '<div class="err">You have exceeded your number of allowed reset requests per day. Try again later.</div>';
				break;
			case '4':
				document.getElementById('errs').innerHTML += '<div class="err">Failed to connect to database. Please try again later.</div>';
				break;
			case '5':
				document.getElementById('errs').innerHTML += '<div class="err">Invalid CSRF token</div>';
				break;
			case '6':
				document.getElementById('errs').innerHTML += '<div class="err">You must enter an email</div>';
				break;
			default:
				document.getElementById('errs').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
		}
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	});
}
function changePassword() {
	request('api/app/changePassword', '#changePasswordForm', function(data) {
		document.getElementById('errs').innerHTML = "";
		var transition = document.getElementById('errs').style.transition;
		document.getElementById('errs').style.transition = "none";
		document.getElementById('errs').style.opacity = 0;
		try {
			data = JSON.parse(data);
			if(!(data instanceof Array)) {throw Exception('bad data');}

			//Show errors to user
			for(var i = 0;i < data.length;++i) {
				switch(data[i]) {
					case 0:
						document.getElementById('errs').innerHTML += '<div>Your password has been reset! You can now <a href="./login">login</a></div>';
						document.getElementById('changePasswordForm').reset();
						break;
					case 1:
					case 2:
					case 7:
						document.getElementById('errs').innerHTML += '<div class="err">Invalid password reset request. If this is a mistake send a new request and click the link in the email.</div>';
						break;
					case 3:
						document.getElementById('errs').innerHTML += '<div class="err">Password must contain: <ul><li>At least 8 characters</li><li>At least one lower case letter</li><li>At least one upper case letter</li><li>At least one number</li><li>At least one special character (~?!@#$%^&*)</li></ul></div>';
						break;
					case 4:
						document.getElementById('errs').innerHTML += '<div class="err">Passwords do not match. Please re-enter your confirmed password.</div>';
						break;
					case 5:
						document.getElementById('errs').innerHTML += '<div class="err">Failed to update password in the database. Please try again later.</div>';
						break;
					case 6:
						document.getElementById('errs').innerHTML += '<div class="err">This password reset request has expired. Please send another email.</div>';
						break;
					case 8:
						document.getElementById('errs').innerHTML += '<div class="err">Failed to connect to the database. Please try again later.</div>';
						break;
					case 9:
						document.getElementById('errs').innerHTML += '<div class="err">Invalid CSRF Token. Please try again later.</div>';
						break;
					default:
						document.getElementById('errs').innerHTML += '<div class="err">An unknown error occurred. Please try again later.</div>';
				}
			}
		}
		catch(e) {
			document.getElementById('errs').innerHTML = '<div class="err">An unknown error occurred. Please try again later.</div>';
		}
		setTimeout(function() {
			document.getElementById('errs').style.transition = transition;
			document.getElementById('errs').style.opacity = 1;
		}, 10);
	});
}

