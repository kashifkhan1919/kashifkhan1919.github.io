<?php
// Checks if form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LerhaIUAAAAAOX4QQYhjqk_ah07RiICCARKjVF8',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        // What happens when the CAPTCHA wasn't checked
        echo '<h2 style="color:#cc0000;">Please go back and make sure you check the security CAPTCHA box.</h2><br>';
		
    } else {
        // If CAPTCHA is successfully completed...

        // Paste mail function or whatever else you want to happen here!
        $name=trim(stripslashes($_POST['name']));
  $phone=trim(stripslashes($_POST['phone']));
  $refcode=trim(stripslashes($_POST['refcode']));
  $message=trim(stripslashes($_POST['message']));
  $form_no=trim(stripslashes($_POST['form_no']));

require("testmailscript/class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "macfixstation.com";

$mail->SMTPAuth = true;
//$mail->SMTPSecure = "ssl";
$mail->Port = 587;
$mail->Username = "enquiry@macfixstation.com";
$mail->Password = "Macfixst@67890";

$mail->From = "enquiry@macfixstation.com";
$mail->FromName = "macfixstation.com";
$mail->AddAddress("macfixstation@gmail.com");


$mail->AddBCC("kashif_khan1919@yahoo.com");
//$mail->AddReplyTo("mail@mail.com");

$mail->IsHTML(true);

$mail->Subject = "macfixstation.com";
$mail->Body = "Name = $name".'<br>'."
               Phone = $phone ".'<br>'."
			   Referel Code = $refcode ".'<br>'."
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
    }
} 
?>