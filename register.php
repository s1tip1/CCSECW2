<html>
<head>
<link href="./loginstyle.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>

    html, body {
    height: 100%;
    }

    body {
     background-color: #2c3531;
     line-height: 1000px;
     height: 1000px;
    }
    </style>

</head>
<body>
<form method="POST">
    <center>
    <input type="text" name="username" placeholder="Enter username" required />
    <input type="text" name="email" placeholder="Enter email" required />
    <input type="text" name="password" placeholder="Enter password" required />

    <input type="submit" name="Login" value="Login"> </center>
</form>
</body>
</html>

<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    //Load Composer's autoloader
    require 'vendor/autoload.php';
    include 'dbConfig.php';

    if (isset($_POST["Login"]))
    {
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Enable verbose debug output
            $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;

            //Send using SMTP
            $mail->isSMTP();

            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';

            //Enable SMTP authentication
            $mail->SMTPAuth = true;

            //SMTP username
            $mail->Username = 'sarahtipperr@gmail.com';

            //SMTP password
            $mail->Password = 'mahzalrigonypvki';

            //Enable TLS encryption;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('sarahtipperr@gmail.com', 'globalfinance');

            //Add a recipient
            $mail->addAddress($email, $username);

            //Set email format to HTML
            $mail->isHTML(true);

            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);


            $mail->Subject = 'Email verification';
            $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';

            $mail->send();
            // echo 'Message has been sent';
            $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
            // connect with database
            $DATABASE_HOST = 'localhost';
            $DATABASE_USER = 'root';
            $DATABASE_PASS = '';
            $DATABASE_NAME = 'customer';
            $conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
            if ( mysqli_connect_errno() ) {
	        // If there is an error with the connection, stop the script and display the error.
	        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
            }

            // insert in users table
            $insert = $db->query("INSERT INTO adminaccounts (username, password, email, verification_code, email_verified_at ) VALUES ('" . $username . "',  '" . $password . "', '" . $email . "', '" . $verification_code . "', NOW())");
            if($insert){
                header("Location: email-verification.php?email=" . $email);
            }else{
                $statusMsg = "Did not go into database."; 

            }

            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>
