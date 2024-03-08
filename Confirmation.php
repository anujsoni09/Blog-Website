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
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    $sql = "INSERT INTO `healthtalks`.`newsletter_subs` (`NAME`, `E-MAIL`, `AGE GROUP`, `GENDER`, `MOMENT`) VALUES ('$name', '$email', '$age', '$gender', current_timestamp());";
    
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
    $mail -> Username = "healthy.newsletter247@gmail.com";
    $mail -> Password = "PASSnewsletter247";
    $mail -> SMTPSecure = 'tls';
    $mail -> Port = 587;

    $mail -> setFrom("healthy.newsletter247@gmail.com");
    $sql = "select * from newsletter_subs order by moment desc limit 1";
    $res = mysqli_query ($conn, $sql);
    if(mysqli_num_rows($res)>0)
    {
        $mail -> addReplyTo("healthtalks247@gmail.com");

    while ($x = mysqli_fetch_assoc($res))
    {
        $mail -> addBCC($x['E-MAIL']);
    }

    $mail -> isHTML(true);
    $mail -> Subject = 'Congratulations! You Subscribed Successfully';
    $mail -> Body = '<h1> CONGRATULATIONS! </h1> Thanks for joining us in the Journey towards a "Healthy Life"... 
    <br><br><br> 
    <p><i>How you feel affects every single day of your life, which is why you work so hard to get well and stay
    well. No matter your journey, we’re here to support, guide, and inspire you.
    <br><br>
    We cut through the confusion with straightforward, expert-reviewed, person-first experiences — all
    designed to help you make the best decisions for yourself and the people you love.
    </p></i> 
    <br><br>
    If you have a good content related to Health, Nutrition and/or Fitness and want to get it posted on our
    website you can mail us your content.
    <br>
    We will really appreciate your contribution.
    <hr> 
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
    <title>HealthyTalks</title>
    <link rel="stylesheet" href="confirmation.css">
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
</head>

<body
    background="https://www.teahub.io/photos/full/223-2236173_geometry-triangles-gradient-purple-abstract-wallpaper-purple-geometric.jpg">
    <h1>Congratulations!</h1>

    <br>

    <h2>
        ' You've subscribed successfully '
    </h2>

    <p><i>Thank you for joining us in the Journey towards a Healthy Lifestyle.</i></p>

    <p>We wish you good luck on one of the important journeys you are going to undertake with us. With just a little
        patience and persistence we'll be able to achieve our goal of a Healthy Lifestyle.
    </p>

    <br>
    <button><a href="Home.html">Go to Home</a></button>
</body>

</html>