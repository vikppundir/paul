<?php 
defined('ACCESS') || header("location:../");


     /// database connction Credentials  
     define('dbSERVER', 'localhost');
     define('dbUSER', 'u492773924_paul');
     define('dbPASSWORD', '2Dw>mN7dH!d!');
     define('dbNAME', 'u492773924_paul');

	 /// login with google api 
	 define('clientID', '669317464723-1n3cppjelaujm69ep0fe7buqtg37klpu.apps.googleusercontent.com');
	 define('clientSecret','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');
     define('redirectUri','https://paul.formalmonkey.com/google/auth');

	// Email Credentials
	define('SMTP_HOST', 'smtp.gmail.com');
	define('SMTP_PORT', 465);
	define('SMTP_USERNAME', 'vikaswmi@gmail.com');
	define('SMTP_PASSWORD', 'eehenqjkasfiarbo');
	//define('SMTP_FROM', 'noreply@mydomain.com');
	define('SMTP_FROM_NAME', 'Intrbo LaunchPad');

	// Global Variables
	define('MAX_LOGIN_ATTEMPTS_PER_HOUR', 5);
	define('MAX_EMAIL_VERIFICATION_REQUESTS_PER_DAY', 3);
	define('MAX_PASSWORD_RESET_REQUESTS_PER_DAY', 3);
	define('PASSWORD_RESET_REQUEST_EXPIRY_TIME', 60*60);
	define('CSRF_TOKEN_SECRET', 'rert125fdg');
	define('VALIDATE_EMAIL_ENDPOINT', 'https://paul.formalmonkey.com/project/validate'); #Do not include trailing /
	define('RESET_PASSWORD_ENDPOINT', 'https://paul.formalmonkey.com/project/resetpassword'); #Do not include trailing /
    define('DOMAIN',(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
	// Code we want to run on every page/script
	date_default_timezone_set('UTC'); 
	//error_reporting(0);
	session_set_cookie_params(['samesite' => 'Strict']);
	session_start();
	ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);