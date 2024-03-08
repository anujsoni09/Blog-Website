<?php
$conn = mysqli_connect("localhost", "root", "", "newsletters");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

    // Setup
    $mail = new PHPMailer;
    $mail -> isSMTP();
    $mail -> Host = "smtp.gmail.com";
    $mail -> SMTPAuth = true;
    $mail -> Username = "healthy.newsletter247@gmail.com";
    $mail -> Password = "passnewsletter247";
    $mail -> SMTPSecure = 'tls';
    $mail -> Port = 587;

    $mail -> setFrom("healthy.newsletter247@gmail.com");
    $sql = "select * from newsletter_subscriptions";
    $res = mysqli_query ($conn, $sql);
    if(mysqli_num_rows($res)>0)
    {
        $mail -> addReplyTo("healthy.newsletter247@gmail.com");

    //$mail -> attachment('');

    while ($x = mysqli_fetch_assoc($res))
    {
        $mail -> addBCC($x['E-MAIL']);
    }

    $mail -> isHTML(true);
    $mail -> Subject = 'Congratulations! Your Subscription is Successful';
    $mail -> Body = '<h1> CONGRATULATIONS! </h1> Thanks for joining us in the Journey towards a "Healthy Life"... <br><br><br> <i>"A fit body is one that is disease-free and active. There are several ways by which one can acquire fitness. Health is such a luxury that not everyone is granted easily. Therefore if you have good health, then you can earn your riches. Therefore the balance between the physical and mental health must be well maintained by everyone."</i> <hr> <br> We hope that you enjoy the Journey with us and live a Healthy and Happy Life. <br><br> Warm Regards,<br> Healthy Talks Team';
    $mail -> AltBody = ' CONGRATULATIONS! Thanks for joining us in the "Journey" towards a "Healthy Life"... A fit body is one that is disease-free and active. There are several ways by which one can acquire fitness. Health is such a luxury that not everyone is granted easily. Therefore if you have good health, then you can earn your riches. Therefore the balance between the physical and mental health must be well maintained by everyone... We hope that you enjoy the Journey with us and live a Healthy and Happy Life...  Warm Regards, Healthy Talks Team';
    
    if($mail-> send())
    {
        echo "Success";
    }

    else 
    {
        echo "Failure";
    }
    }

    else
    {
        echo "No data found";
    }
?>