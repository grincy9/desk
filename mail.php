<?php
//
// UPDATE Username and Password fields.
//
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once './vendor/autoload.php' ;

class Mail {
    public static function send($to, $subject, $message) {
    $mail = new PHPMailer(true) ;
    try {
        //SMTP Server settings
        $mail->isSMTP(); 
                                                  
        $mail->Host       = "";                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = '' ;                     
        $mail->Password   = '';                    
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587; 
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //Recipients
        $mail->setFrom('o.cakir@ug.bilkent.edu.tr', 'verification');
        $mail->addAddress($to, 'Onur Bey');     //Add a recipient
        // You can add more than one address
        // See further option of recipients cc, bcc in phpmailer docs.

        // Attachment
        // See Documentation of phpmailer

        //Content
        $mail->isHTML(true);  //Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
    
        $mail->send();
        echo 'Message has been sent to Administrator';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
   }
}