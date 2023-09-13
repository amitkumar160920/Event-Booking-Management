<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
function sent_mail($email,$data){
$mail = new PHPMailer();
$mail->IsSMTP();
//$mail->Mailer = "smtp";
$mail->SMTPDebug = 3;
$mail->Debugoutput = 'html';
$mail->Host = 'tls://smtp.gmail.com:587';
$mail->SMTPOptions = array(
   'ssl' => array(
     'verify_peer' => false,
     'verify_peer_name' => false,
     'allow_self_signed' => true
    )
);
$mail->Port = 465;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "dbms83688@gmail.com";
$mail->Password = 'wurjmoymlifpvkiv';
$mail->setFrom("dbms83688@gmail.com", 'Book_Event website');
$mail->addReplyTo('dbms83688@gmail.com', '');
$mail->addAddress($email, '');
$mail->Subject = 'Welcome';
$mail->Body    = $data;
$mail->AltBody = 'This is a plain-text message body';
print_r($mail);
if (!$mail->send())
{
    return "Mailer Error: " . $mail->ErrorInfo;
}
else
{
    return array('flag' => "1"); 
}
}

?>