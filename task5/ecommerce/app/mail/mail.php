<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once __DIR__.'\..\..\vendor\autoload.php';
class mail
{
    # This way right OR pass Parametar to function sendMail()

    // private $emailTo;
    // private $subject;
    // private $body;

    // function __construct()
    // {
    //     $this->emailTo = $emailTo;
    //     $this->subject = $subject;
    //     $this->body = $body;
    // }

    public function sendMail($emailTo,$subject,$body)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'webdevphpgroupenggalal@gmail.com';     //SMTP username
            $mail->Password   = '159357852654';                         //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('webdevphpgroupenggalal@gmail.com', 'Ecommerce');
            $mail->addAddress($emailTo);     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;

            $mail->send();
            // echo 'Message has been sent';
            return TRUE;
        } catch (Exception $e) {
            // $e= "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return $mail->ErrorInfo;
        }


    }
}


//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.


// function save_mail($mail)
// {
//     //You can change 'Sent Mail' to any other folder or tag
//     $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';

//     //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
//     $imapStream = imap_open($path, $mail->Username, $mail->Password);

//     $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
//     imap_close($imapStream);

//     return $result;