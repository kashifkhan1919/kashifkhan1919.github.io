<?php

  $name=trim(stripslashes($_POST['name']));
  $phone=trim(stripslashes($_POST['phone']));
  $message=trim(stripslashes($_POST['message']));
  $form_no=trim(stripslashes($_POST['form_no']));

require("testmailscript/class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "macfixstation.in";

$mail->SMTPAuth = true;
//$mail->SMTPSecure = "ssl";
$mail->Port = 587;
$mail->Username = "enquiry@eazyysell.com";
$mail->Password = "Eazyy@12345";

$mail->From = "enquiry@eazyysell.com";
$mail->FromName = "eazyysell.com";
$mail->AddAddress("eazyysell@gmail.com");


$mail->AddBCC("kashif.khan19195@gmail.com");
//$mail->AddReplyTo("mail@mail.com");

$mail->IsHTML(true);

$mail->Subject = "eazyysell.com";
$mail->Body = "Name = $name".'<br>'."
               Phone = $phone ".'<br>'."
               Form No = $form_no ".'<br>'."
               Message = $message";
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
    echo "<script>alert('Please try again!')</script>";
    echo "<script>window.location.replace('index.html')</script>";
}
else{


  echo "<script>alert('Successfully submitted')</script>";
    echo "<script>window.location.replace('index.html')</script>";

}


?>