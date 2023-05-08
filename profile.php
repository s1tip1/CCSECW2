
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Global Finance Car Purchase</title>
    <link href="../styles/main.css" rel="stylesheet" />
    <link href="../styles/shopRevamp.css" rel="stylesheet" />
    <link href="../styles/searchbar.css" rel="stylesheet" />

  </head>
  	
  <body>

  <div id="basket-overlay">
    <div id="overlay-container">
      <div style="clear: both; padding: 15px 32px;">
        <label for="rent-days">Would you like to finance or purchase this car?</label>
      </div>
      <a class="button" onclick="addToBasket(currIndex + 1)" style="float: right;">Purchase Car</a>
      <a class="button" onclick="cancelBasket()" style="float: left;">Cancel</a>
      <a class="button" onclick="addToBasket(currIndex + 1)" style="float: center;">Finance Car</a>
    </div>
  </div>

  <div class="navigation">
  <ul id="navbar-top">
  <div class = "navbarImage">
  <img src="../logo2.png">
  </div>
  <li style= "color:white;padding: 14px 16px;font-weight:1000">Global Finance Car Purchase</li>
  <li><a href="../shopRevamp.php">Cars</a></li>
  <li><a href="../basket.php">View Basket</a></li>
  <li><a href="../about.php">Contact Us</a></li>
  <li><a href="profile.php">Account</a></li>
  <li><a href="../phploginadmin/register.php">Admin</a></li>  
  <li><a href="logout.php">Logout</a></li>
    
     </ul>
   </div>

  <script src="./js/searchbar.js"></script>
  <script src="./js/hidebar.js"></script>
  <script src="./js/activepage.js"></script>

  </body>
</html>

<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'customer';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<html>
<body>
</div>
  <div style="padding:20px;margin-top:30px;height:15px;">
  </div>
		<div class="content">
	

<div id="info">
  <article>
    <h2 style="text-align: center; padding:20px">Account Details</h2>
    <div style="width: 70%; margin: auto; padding: 2em; background-color: #232324; box-shadow: 2px 3px 10px rgba(0,0,0,.25); border-radius: 10px;">
      <table style="width: 100%">
      </table>
      <tr>
						<td><center><b>Username:</b></center></td>
						<td><center><?=$_SESSION['name']?></center></td>
					</tr>
					<tr>
						<td><center><b>Hashed Password:</b></center></td>
						<td><center><?=$password?></center></td>
					</tr>
					<tr>
						<td><center><b>Email:</b></center></td>
						<td><center><?=$email?></center></td>
					</tr>
    </div>
  </article>
</div>