
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Global Finance Car Purchase</title>
    <link href="../styles/main.css" rel="stylesheet" />
    <link href="../styles/shopRevamp.css" rel="stylesheet" />

  </head>
  	
 

    <script src="../js/hidebar.js"></script>
    <script src="../js/searchbar.js"></script>

    <style>

html, body {
height: 100%;
}

body {
 background-color: #2c3531;
 text-align: center;
}
</style>

  <head>

  </div>
  <div style="padding:20px;margin-top:30px;height:15px;">
  </div>

    <link href="./style.css" rel="stylesheet" >
    <title><center>Customer Finance</center></title>
  </head>
<div class="checkout-panel">
  <div class="panel-body">
  
    <h1 class="title"><center>Customer Finance</center></h1>
    <div><center>Please fill out the below form to apply for car finance.</center></div>

 

   </head>
   <body>
      <center>
         <form action="insert.php" method="post">
             
<p>
               <label for="fullName">Full Name:</label>
               <input type="text" name="full_name" id="fullName">
            </p>
 
             
<p>
         <label for="streetAddress">Street Address:</label>
        <input type="text" name="street_address" id="streetAddress">
        </p>
 
             
<p>
                   <label for="City">City:</label>
                  <input type="text" name="city" id="City">
            </p>
 
             
<p>
               <label for="emailAddress">Email Address:</label>
               <input type="text" name="email_address" id="emailAddress">
            </p>
 
             
<p>
               <label for="houseNumber">House Number:</label>
               <input type="text" name="house_number" id="houseNumber">
            </p>
            
<p>
               <label for="postCode">Postcode:</label>
               <input type="text" name="postcode" id="postCode">
            </p>
 
 
            <input type="submit" value="Submit">
         </form>
      </center>


   </body>
  </div>
</div>
</html>


<html>
  <form action="../upload.php" method="POST"
  enctype="multipart/form-data">

  <h1><center>Upload Files</center></h1>
  <p> <center>
    For finance approval you must provide <b>one</b> of the following documents: <br>
    <b>1)</b> Bank Statement covering the past year or <b>2)</b> Property Bill evidence <br>

    You may upload files in the format .pdf, .txt or .docx . <br> <br>

    Select files to upload:
   
  <!-- name of the input fields are going to
      be used in our php script-->
      <input type="file" name="file">
     <input type="submit" name="submit" value="Upload">
</center>
</p>

</form>

  <div class="panel-footer">
    <div class="agree">
    <label for="agree-bc1d" class="u-label u-label-18"><center> I accept the <a href= ../about.php target="_blank">Terms of Service<center></a>
      <center><input type="checkbox" id="agree" name="agree" class="u-agree-checkbox" required=""></center>
      </label>
    </div>
   <center><button class="btn next-btn" onclick="window.location.href='insert.php';"> Confirm</button></center>
  </div>
 
    </form>
</div>
</div>
</body>
</html>
