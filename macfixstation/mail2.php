<?php

  $name=trim(stripslashes($_POST['name']));
  $phone=trim(stripslashes($_POST['phone']));
  $message=trim(stripslashes($_POST['message']));
  $form_no=trim(stripslashes($_POST['form_no']));

require("testmailscript/class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "macfixstation.com";

$mail->SMTPAuth = true;
//$mail->SMTPSecure = "ssl";
$mail->Port = 143;
$mail->Username = "enquiry@macfixstation.com";
$mail->Password = "Macfixst@67890";

$mail->From = "enquiry@macfixstation.com";
$mail->FromName = "macfixstation.com";
$mail->AddAddress("macfixstation@gmail.com");


$mail->AddBCC("kashif.khan19195@gmail.com");
//$mail->AddReplyTo("mail@mail.com");

$mail->IsHTML(true);


$mail->Subject = "macfixstation.com";
$mail->Body = "
               Phone   = $phone ".'<br>'."
               From No = $form_no ";
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
    echo "<script>alert('Please try again!')</script>";
    echo "<script>window.location.replace('index.php')</script>";
}
else{

  echo '<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 815171352;
var google_conversion_label = "HUx7CM2kkoEBEJiO2oQD";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/815171352/?label=HUx7CM2kkoEBEJiO2oQD&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
';

  echo "<script>alert('Successfully submitted')</script>";
    echo "<script>window.location.replace('index.php')</script>";

}


?>