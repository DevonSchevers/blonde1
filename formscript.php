<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
        
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
// Checks if form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '//////////////',
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
        $msg = 'Please make sure you check the security CAPTCHA box.';
    }
    else {

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = '//////////////';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = '//////////////;
        $mail->Password = '//////////////';
        $mail->setFrom('//////////////, 'Admin');
        $mail->addReplyTo('//////////////);
        $mail->addAddress('//////////////', '//////////////');
        $name = isset($_POST['name']) ? $_POST['name'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
            $mail->Subject = 'PHPMailer contact form';
            $mail->isHTML(false);
            $mail->Body = <<<EOT
Email: {$email}
Name: {$name}
Message: {$_POST['message']}
EOT;
            if (!$mail->send()) {
                $msg = 'Sorry, something went wrong. Please try again later.';
            }
            else {
                $msg = 'Message sent! Thanks for contacting me.';
            }
        }    
        
} 
} ?>


