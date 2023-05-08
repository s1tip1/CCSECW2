<html>
    <head>
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
<body
<form method="POST">
    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
   <center> <input type="text" name="verification_code" placeholder="Enter verification code" required />

    <input type="submit" name="verify_email" value="Verify Email"> </center>
</form>
</body>
</html>

<?php

    if (isset($_POST["verify_email"]))
    {
        $email = $_POST["email"];
        $verification_code = $_POST["verification_code"];

        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "customer");

        // mark email as verified
        $sql = "UPDATE adminaccounts SET email_verified_at = NOW() WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
        $result  = mysqli_query($conn, $sql);

        if (mysqli_affected_rows($conn) == 0)
        {
            die("Verification code failed.");
        }

        header("Location: ../3306/index.php");;
        exit();
    }

?>