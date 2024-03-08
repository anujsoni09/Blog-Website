<?php
if(isset($_POST['name']))
{
    $server = "localhost";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($server, $username, $password);

    if(!$conn)
    {
        die("Connection to this DB failed due to". mysqli_connect_error());
    }

    //echo "Successful connection to DB";

    $name = $_POST['name'];
    $email = $_POST['email'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $links = $_POST['links'];

    $sql = "INSERT INTO `healthtalks`.`content_shared` (`NAME`, `E-MAIL`, `TITLE`, `CONTENT`, `LINKS`, `MOMENT`) VALUES ('$name', '$email', '$title', '$content', '$links', current_timestamp());";
    
    //echo $sql;

    if ($conn -> query($sql) == true)
    {
        // echo "Submission Successful !";
        $submit = true;
    }

    else
    {
        echo "ERROR: $sql <br> $conn->error";
    }

    $conn -> close();
}
?>









<?php
$conn = mysqli_connect("localhost", "root", "", "healthtalks");

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
    $mail -> Username = "healthtalks247@gmail.com";
    $mail -> Password = "PASS247healthtalks";
    $mail -> SMTPSecure = 'tls';
    $mail -> Port = 587;

    $mail -> setFrom("healthtalks247@gmail.com");
    $sql = "select * from content_shared order by moment desc limit 1";
    $res = mysqli_query ($conn, $sql);
    if(mysqli_num_rows($res)>0)
    {
        $mail -> addReplyTo("healthtalks247@gmail.com");

    while ($x = mysqli_fetch_assoc($res))
    {
        $mail -> addBCC($x['E-MAIL']);
    }

    $mail -> isHTML(true);
    $mail -> Subject = 'Received your Content';
    $mail -> Body = '<h1> CONGRATULATIONS! </h1> <h2>Your content has been recorded</h2> 
    <br><br><br> 
    <p><i>Thank you for sharing your Thoughts and Experiences about your Healthy Lifestyle with us.
    <br><br>
    This will help millions of others out there to learn and enhance their lives.
    <br><br>
    We really appreciate your Contribution!
    </p></i> 
    <br><br>
    <hr>
    Also, if you have a good content related to Health, Nutrition and/or Fitness and want to get it posted on our
    website you can also mail us your content to us. 
    <br> 
    We hope that you enjoy the Journey with us and live a Healthy and Happy Life. 
    <br><br> 
    Warm Regards,
    <br> 
    HealthTalks Team';
    $mail -> AltBody = ' CONGRATULATIONS! Thanks for joining us in the "Journey" towards a "Healthy Life"... A fit body is one that is disease-free and active. There are several ways by which one can acquire fitness. Health is such a luxury that not everyone is granted easily. Therefore if you have good health, then you can earn your riches. Therefore the balance between the physical and mental health must be well maintained by everyone... We hope that you enjoy the Journey with us and live a Healthy and Happy Life...  Warm Regards, HealthTalks Team';
    
    if($mail-> send())
    {
        //echo "Success";
    }

    else 
    {
        //echo "Failure";
    }
    }

    else
    {
        //echo "No data found";
    }
?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="contentconfirmation.css">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
</head>

<body background="https://cdn.wallpapersafari.com/44/15/3CZUWi.jpg">
<br><br><br>
    <h1>Congratulations !!!</h1>
    <h2> ' Your Content has been Recorded '</h2>

    <br>

    <p id="first">Thank-you for sharing your Thoughts and Experiences with us...
    </p>

    <br>

    <p id="second">
        This will help millions of others out there to learn and enhance their lifestyles...
    </p>

    <br><br><br><br><br><br>

    <center><button><a href="Home.html">Go to Home</a></button></center>

</body>

</html>