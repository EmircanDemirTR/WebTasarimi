<?php

$subject = "Site İletisim Form";
$EmailMessage='
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0" style="border:1px solid #efefef; padding:15px;">
<tr>
  <td colspan="2">
      <div style="font-family:Arial; font-size:20px; color:#00997d; padding:5px; text-align:left; font-weight:600;">
          <img src="https://soloteknoloji.com.tr/img/logo_black.png" style="height:50px;">
      </div>
  </td>
 </tr>
<tr>
  <td colspan="2">
  <div style="font-family:Arial; font-size:20px; color:#00997d; padding:15px 0 20px 5px; text-align:left; font-weight:600; border-bottom:1px solid #efefef;">
  Site İletisim Form	</div>	</td>
 </tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td width="183" style="border-bottom:1px solid #efefef;">
  <div style="font-family:Arial; font-size:14px; color:#252525; padding:10px 5px; font-weight:600;">
  Adınız ve Soyadınız :	</div>	</td>
  <td width="315" style="border-bottom:1px solid #efefef;">
  <div style="font-family:Arial; font-size:14px; text-decoration: none; color:#252525; padding:10px 5px;">
  '.$_POST["e1"].'	</div>	</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>

<tr>
  <td width="183" style="border-bottom:1px solid #efefef;">
  <div style="font-family:Arial; font-size:14px; color:#252525; padding:10px 5px; font-weight:600;">
  Mail Adresiniz :	</div>	</td>
  <td width="315" style="border-bottom:1px solid #efefef;">
  <div style="font-family:Arial; font-size:14px; text-decoration: none; color:#252525; padding:10px 5px;">
  '.$_POST["e2"].'	</div>	</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>


<tr>
  <td width="183" style="border-bottom:1px solid #efefef;">
  <div style="font-family:Arial; font-size:14px; color:#252525; padding:10px 5px; font-weight:600;">
  Telefon :	</div>	</td>
  <td width="315" style="border-bottom:1px solid #efefef;">
  <div style="font-family:Arial; font-size:14px; text-decoration: none; color:#252525; padding:10px 5px;">
  '.$_POST["e3"].'	</div>	</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>


<tr>
  <td width="183" style="border-bottom:1px solid #efefef;">
  <div style="font-family:Arial; font-size:14px; color:#252525; padding:10px 5px; font-weight:600;">
  Konu :	</div>	</td>
  <td width="315" style="border-bottom:1px solid #efefef;">
  <div style="font-family:Arial; font-size:14px; text-decoration: none; color:#252525; padding:10px 5px;">
  '.$_POST["e4"].'	</div>	</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>

<tr>
  <td width="183" style="border-bottom:1px solid #efefef;">
  <div style="font-family:Arial; font-size:14px; color:#252525; padding:10px 5px; font-weight:600;">
  Mesajınız :	</div>	</td>
  <td width="315" style="border-bottom:1px solid #efefef;">
  <div style="font-family:Arial; font-size:14px; text-decoration: none; color:#252525; padding:10px 5px;">
  '.$_POST["e5"].'	</div>	</td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
</table>';


	$mail             = new PHPMailer();
	$mail->SetLanguage("en", 'mailer/language/');
	$mail->IsSMTP();
	//$mail->SMTPDebug = 2;
	$mail->CharSet = 'UTF-8'; 
	$mail->Debugoutput = 'html';			// enable SMTP authentication
	$mail->SMTPAuth   = true; 	
	$mail->SMTPSecure = 'tls';
	$mail->Host       = "smtp.gmail.com";					// sets GMAIL as the SMTP server
	$mail->Port       = 587;                  						// set the SMTP port for the GMAIL server
	$mail->Username   = "wsiteform@gmail.com";					// GMAIL username
	$mail->Password   = "44!aj256?";									// GMAIL password
	$mail->From       = "wsiteform@gmail.com";
	$mail->FromName   = "Site İletisim Form";
	$mail->Subject    = $subject;
	$mail->Body       = $EmailMessage;
	//$mail->AddAddress("info@inovaks.com.tr", "Site Form");
	$mail->AddAddress("hasanaslan@fikirkahvesi.com.tr", "Site Form");
	$mail->IsHTML(true); 											// send as HTML
	if(!$mail->Send()) {
	//echo $mail->ErrorInfo;
	  header("location: ". $getData->urlCreateLang("1098",systemLanggg())."?p=fail"); 
		exit; 
	}else{
	
	header("location: ". $getData->urlCreateLang("1098",systemLanggg())."?p=success"); 
		exit; 
		
	}



?>