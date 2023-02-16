<?php 
defined('ACCESS') || header("location:../");
class loginWithGoogle extends Google_Client
{

   public function __construct($exceptions = array())
   {
      parent::__construct($exceptions);
      $this->client = $exceptions;
      $this->setClientId(clientID);
      $this->setClientSecret(clientSecret);
      $this->setRedirectUri(redirectUri);
      $this->addScope("email");
      $this->addScope("profile");

    }
  
   function login()
    {
       
        // authenticate code from Google OAuth Flow
        if (isset($_GET['code'])):
            $token = $this->fetchAccessTokenWithAuthCode($_GET['code']);
            $this->setAccessToken($token['access_token']);
            // get profile info
            $google_oauth = new Google_Service_Oauth2($this);
            $google_account_info = $google_oauth->userinfo->get();
            $email = $google_account_info->email;
            $name = $google_account_info->givenName;
            $lastName = $google_account_info->familyName??'';
            $picture = $google_account_info->picture;
            $status = $google_account_info->verifiedEmail;

            $data = query()->select('SELECT id FROM users WHERE email=?', array($email));
            $data = json_decode($data);
            if ($data && $data->count === 0):
            
             query()->insert('INSERT INTO users (name,lastName,email,password,verified,roll) VALUES (?,?,?,?,?,?)',array($name,$lastName,$email,'',$status,'user'));
          
            endif;

            $_SESSION['IntrbologinEmail'] = $email; 
          
             echo "<script>  window.location ='".ABSPATH ."' </script>";
         
          endif;

        }


        function button($buttonTest=null){
          return "<a class='btn button-background mt-6 align-items-center d-block mx-auto w-100 round-button' href='" . $this->createAuthUrl() . "'>{$buttonTest??'Login with Google'}</a>";
    }
}

?>
