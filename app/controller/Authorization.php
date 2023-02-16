<?php
defined('ACCESS') || header("location:../");
/**
 *  Authorization class
 *  include login , create account ,delete acoount function
 */

header("Content-Type: application/json; charset=UTF-8");
class Authorization
{

    public function login()
    {

        $return = array(
            'status_code' => 200,
            'rensponse' => 'success',
            'count' => null,
            'data' => []
        );
        if ($_SERVER['REQUEST_METHOD'] === 'POST'):
            if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['csrf_token']) && auth::validateToken($_POST['csrf_token'])):

                $email = $_POST['email'];
                $password = $_POST['password'];
                $hourAgo = time() - 60 * 60;
                $data = query()->select('SELECT users.id,password,verified,COUNT(loginattempts.id) FROM users LEFT JOIN loginattempts ON users.id = user AND timestamp > :timestamp WHERE email =:email GROUP BY users.id', array(
                    ':timestamp' => $hourAgo,
                    ':email' => $email
                ));
                // print_r($data);
                $data = json_decode($data);
                $count = 'COUNT(loginattempts.id)';

                if ($data->count):

                    if ($data->data[0]->verified):

                        if ($data->data[0]->$count <= MAX_LOGIN_ATTEMPTS_PER_HOUR):

                            if (password_verify($password, $data->data[0]->password)):
                                $_SESSION['loggedin'] = true;
                                query()->insert('DELETE FROM loginattempts where user=:id', array(':id' => $data->data[0]->id));
                                $return['data'] = array(
                                    'auth' => 'success',
                                    'code' => 0
                                );
                            else:

                                query()->insert('INSERT into loginattempts(id,user,ip,timestamp) VALUES(?,?,?,?)', array(null,$data->data[0]->id,$_SERVER['REMOTE_ADDR'],time()));
                                $return['data'] = array(
                                    'auth' => 'failed',
                                    'messages' => 'invelid Password',
                                    'code' => 1
                                );
                            endif;

                        else:
                            $return['data'] = array(
                                'auth' => 'failed',
                                'messages' => 'login attempts exceeded',
                                'code' => 3
                            );
                        endif;

                    else:
                        $return['data'] = array(
                            'auth' => 'failed',
                            'messages' => 'Email not verifed',
                            'code' => 4
                        );
                    endif;

                else:
                    $return['data'] = array(
                        'auth' => 'failed',
                        'messages' => 'Invelid Email',
                        'code' => 1
                    );
                endif;

            endif;

        else:
           http_response_code(405);
           $return = array(
            'status_code' => 405,
            'rensponse' => 'unsuccess',
            'count' => 0,
            'data' => array(
              'auth' => 'failed',
              'messages' => 'Invalid methoud',
              'code' => 5
            )
        );
        endif;

        print_r(json_encode($return, JSON_PRETTY_PRINT));
    }

    public function registeration()
    {
        $errors = [];

        if (!isset($_POST['name']) || strlen($_POST['name']) > 255 || !preg_match('/^[a-zA-Z- ]+$/', $_POST['name']))
        {
            $errors[] = 1;
        }
        if (!isset($_POST['lastname']) || strlen($_POST['lastname']) > 255 || !preg_match('/^[a-zA-Z- ]+$/', $_POST['lastname']))
        {
            $errors[] = 1;
        }
        if (!isset($_POST['email']) || strlen($_POST['email']) > 255 || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $errors[] = 2;
        }
        else if (!checkdnsrr(substr($_POST['email'], strpos($_POST['email'], '@') + 1) , 'MX'))
        {
            $errors[] = 3;
        }
        if (!isset($_POST['password']) || !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[\~?!@#\$%\^&\*])(?=.{8,})/', $_POST['password']))
        {
            $errors[] = 4;
        }
        else if (!isset($_POST['confirm-password']) || $_POST['confirm-password'] !== $_POST['password'])
        {
            $errors[] = 5;
        }

        if (count($errors) === 0)
        {
            if (isset($_POST['csrf_token']) && auth::validateToken($_POST['csrf_token']))
            {
         
                    //Check if user with same email already exists
                    $data = query()->select('SELECT id FROM users WHERE email=?', array($_POST['email']));
                    //print_r($data);
                    $data = json_decode($data);
                    if ($data && $data->count === 0)
                    {
                        //Actually create the account
                        $OTP = (int)random_int(000001,999999);

                        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $body = 'Hi '.$_POST['name'];
                        $body .=  "welcome Intrbo community and your one time password is here {$OTP}";
                        $sendTo = array('email'=>$_POST['email'],'name' =>$_POST['name'],'subject'=>'Welcome "brand name" ','body' => $body);
          
                        $id = (int)query()->insert('INSERT INTO users (name,lastName,email,password,roll) VALUES (?,?,?,?,?)',array($_POST['name'],$_POST['lastname'],$_POST['email'],$hash,'user'));
                        $id = query()->insert('INSERT INTO otp (userId,userEmail,otpType,otp) VALUES (?,?,?,?)',array($id,$_POST['email'],'registration',$OTP));
                        if ($id !== - 1)
                        {
                            
                          $mailer = new mailer();
                          $data = $mailer->sendTo($sendTo);
                          $data = json_decode($data);
                            if ($data->data->code === 0)
                            {
                                $_SESSION['otpEmail'] = $_POST['email'];
                                $errors[] = 0;
                            }
                            else
                            {
                                $errors[] = 10;
                            }
                        }
                        else
                        {
                            //Failed to insert into database
                            $errors[] = 6;
                        }
                       
                    }
                    else
                    {
                        //This email is already in use
                        $errors[] = 7;
                    }
                
          
            }
            else
            {
                //Invalid CSRF Token
                $errors[] = 9;
            }
        }

        echo json_encode($errors);

    }

    public function updateAcount()
    {

        if (isset($_POST['id']) && isset($_SESSION['loggedin']) && isset($_POST['csrf_token']) && auth::validateToken($_POST['csrf_token'])):

        endif;

    }
    public function deleteAcount()
    {

        if (isset($_POST['id']) && isset($_SESSION['loggedin']) && isset($_POST['csrf_token']) && auth::validateToken($_POST['csrf_token'])):

        endif;

    }

    public function verifyOTP()
    {

        if (isset($_POST['OTP']) && isset($_SESSION['otpEmail']) && isset($_POST['csrf_token']) && auth::validateToken($_POST['csrf_token'])):
          
             $data = query()->select('SELECT id,otp FROM otp WHERE userEmail=? and otpType=? ORDER BY created_at DESC limit 1', array($_SESSION['otpEmail'],'registration'));
             $data = json_decode($data);

             if($data->count != 0):

             if($data->data[0]->otp == $_POST['OTP']):

               if(query()->update("UPDATE users SET verified=:num WHERE email=:email", array(':num'=> 1,':email' => $_SESSION['otpEmail']))):
                
                query()->delete('DELETE  FROM otp WHERE id=? or userEmail=?', array($data->data[0]->id,$_SESSION['otpEmail']));
                 unset($_SESSION['otpEmail']);
                 $_SESSION['loggedin'] = true;
                  echo 0;
                 
                // not verify status
                 else: echo 2; endif;
                 
                 //otp wrong
                else: echo 1;  endif;
              
                //otp not found
               else: echo 3; endif;
            ///if token is not valid or session destroy 
            else: echo 4;
            
        endif;

    }

}