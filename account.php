<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Global Finance Car Purchase</title>
    <link href="/styles/main.css" rel="stylesheet" />
    <link href="/styles/shopRevamp.css" rel="stylesheet" />
    <link href="/styles/searchbar.css" rel="stylesheet" />
  
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
  <img src="logo2.png">
  </div>
  <li style= "color:white;padding: 14px 16px;font-weight:1000">Global Finance Car Purchase</li>
  <li><a href="shopRevamp.php">Cars</a></li>
  <li><a href="basket.php">View Basket</a></li>
  <li><a href="about.php">Contact Us</a></li>
  <li><a href="account.php">Account</a></li>
  <li><a href="admin.php">Admin</a></li>  
  
  <li style="float:right"><a href="login.php" onclick="return confirm('Are you sure you want to log out?');">Log Out</a></li>
  

     </ul>
   </div>

  <script src="./js/searchbar.js"></script>
  <script src="./js/hidebar.js"></script>
  <script src="./js/activepage.js"></script>

  </div>
  <div style="padding:20px;margin-top:30px;height:15px;">
  </div>


  <div id="main">
    <article>
      <h1 style="text-align: center; padding:20px">Account Details</h1>
      <div style="width: 70%; margin: auto; padding: 2em; color:white; box-shadow: 2px 3px 10px rgba(0,0,0,.25); border-radius: 10px;">
        <table style="width: 100%">
          <thead>
            <tr>
              <th>Username:</th>
              <th></th>
            </tr>
          </thead>
      </div>
    </article>
  </div>
</body>
</html>