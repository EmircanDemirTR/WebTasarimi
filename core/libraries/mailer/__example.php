<?
require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();                                   // send via SMTP
$mail->Host     = "mail.alanadi.com"; // SMTP servers
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "info@alanadi.com";  // SMTP username
$mail->Password = "parola"; // SMTP password

$mail->From     = $_POST['mailad'];
$mail->Fromname = $_POST['isim'];
$mail->AddAddress("info@alanadi.com","Ornek Isim");
$mail->Subject  =  $_POST['baslik'];
$mail->Body     =  $_POST['mesaj'];

if(!$mail->Send())
{
   echo "Mesaj Gönderildi <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Mesaj Gönderildi";


?>
