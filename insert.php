 <!DOCTYPE html>
 <html>
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Global Finance Car Purchase</title>
    <link href="../styles/main.css" rel="stylesheet" />
    <link href="./styles/shopRevamp.css" rel="stylesheet" />
  	

  <div class="navigation">
  <ul id="navbar-top">
  <div class = "navbarImage">
  <img src="../logo.png">
  </div>
  <li style= "color:white;padding: 14px 16px;font-weight:1000">Global Finance Car Purchase</li>
  <li><a href="../shopRevamp.php">Cars</a></li>
  <li><a href="../basket.php">View Basket</a></li>
  <li><a href="../about.php">Contact Us</a></li>
  <li><a href="../phplogin/index.html">Account</a></li>
  <li><a href="../phploginadmin/register.php">Admin</a></li>  
  <li><a href="../phplogin/logout.php">Logout</a></li>


  </div>
  <div style="padding:20px;margin-top:30px;height:15px;">
  </div>
  
    </head>

<body>
    <center>
        <?php

        $conn = mysqli_connect("localhost", "root", "", "customer");
         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }

        $full_name =  $_REQUEST['full_name'];
        $street_address = $_REQUEST['street_address'];
        $city =  $_REQUEST['city'];
        $email_address =  $_REQUEST['email_address'];
        $house_number = $_REQUEST['house_number'];
        $postcode = $_REQUEST['postcode'];
         

        $sql = "INSERT INTO details  VALUES ('$full_name',
            '$street_address','$city','$email_address','$house_number', '$postcode')";
         
        if(mysqli_query($conn, $sql)){
            echo "<h3>Your application has been processed. You will hear back in 3-5 days. Please navigate back to the previous page if you wish to upload files and have not yet done this. </h3>";
 
            echo nl2br("\n$full_name\n $street_address\n "
                . "$city\n $email_address\n $house_number\n $postcode");
        } else{
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        mysqli_close($conn);
        ?>
    </center>

     </form>
</body>

</html>
