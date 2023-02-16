<?php
 if (!defined('ACCESS')) header("location:../");

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
class Mailer extends PHPMailer
{

    public function __construct($exceptions = null)
    {
        parent::__construct($exceptions);
        $this->isSMTP();
        $this->Host = '';
        $this->SMTPAuth = false;
        $this->Username = '';
        $this->Password = '';
        $this->SMTPSecure = 'tls';
        $this->Port = 587;
    }

    /**
     * Overrides parent send()
     *
     * @return boolean
     */
    public function sendTo($to)
    {

        try
        {
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $this->isSMTP(); //Send using SMTP
            $this->Host = SMTP_HOST; //Set the SMTP server to send through
            $this->SMTPAuth = true; //Enable SMTP authentication
            $this->Username = SMTP_USERNAME; //SMTP username
            $this->Password = SMTP_PASSWORD; //'ahioldlwzscucbuu';                               //SMTP password
            $this->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
            $this->Port = SMTP_PORT; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Recipients
            $this->setFrom('vikaswmi@gmail.com', 'IntrboSS');
            $this->addAddress($to['email'],$to['name']); //Add a recipient
            //$mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            ///  $mail->addBCC('bcc@example.com');
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            //Content
            $this->isHTML(true); //Set email format to HTML
            $this->Subject = $to['subject'];
            $this->Body = $to['body'];
            $this->AltBody = $to['body'];
            $return = array(
                'status code' => 200,
                'rensponse' => 'success',
                'count' => 0,
                'data' => ['message' => 'email send successfuly ', 'code' =>0]
            );
            parent::send();
        }
        catch(Exception $e)
        {
            $return = array(
                'status code' => 200,
                'rensponse' => 'success',
                'count' => 0,
                'data' => ['message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}", 'code' =>0]
            );
            
        }
        finally {
               
              return json_encode($return, JSON_PRETTY_PRINT);
          }
        
    }
}



