<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Global Finance Car Purchase</title>
    <link href="./styles/main.css" rel="stylesheet" />
    <link href="./styles/shopRevamp.css" rel="stylesheet" />

  </head>
  	
  <body>

  <div id="basket-overlay">
    <div id="overlay-container">
      <div style="clear: both; padding: 15px 32px;">
        <label for="rent-days">Would you like to add this car to your basket?</label>
      </div>
      <a class="button" onclick="addToBasket(currIndex + 1)" style="float: right;">Add to Basket</a>
      <a class="button" onclick="cancelBasket()" style="float: left;">Cancel</a>
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
  <li><a href="./phplogin/index.html">Account</a></li>
  <li><a href="./phploginadmin/register.php">Admin</a></li>  
  <li><a href="./phplogin/logout.php">Logout</a></li>


  <script src="./js/hidebar.js"></script>
  <script src="./js/activepage.js"></script>

  </div>
  <div style="padding:20px;margin-top:30px;height:15px;">
  </div>
  <main>
<h1> Cars </h1>
<p></p>
      <article id="movies-list">
        <div id="movie-l" class="movie-bg">
            <img class="movie-image"/>
        </div>
        <div id="movie-m">
            <div class="movie-arrow"  onclick="switchMovies(-1)">
                <img id="arrow-l" src="arrow1.png"/>
            </div>
            <div id="movie-m-img">
                <img class="movie-image"/>
            </div>
            <div class="movie-arrow" onclick="switchMovies(1)">
                <img id="arrow-r" src="arrow1.png"/>
            </div>
        </div>
        <div id="movie-r" class="movie-bg">
            <img class="movie-image"/>
        </div>
      </article>
    </main>

    <div id="movie-details">
        <!-- Populated via script -->
        <h2 style="float: left;"></h2>
        <img style="float: right;" id="btn-expand-desc" onclick="showDescription()" src="arrow1.png"/>
        <a class="button" style="float: left;" onclick="showOverlay()">Purchase</a>
        <p style="clear: both;"></p>
        <br>
            <p id="movies-model"><strong>Model: </strong></p>
            <p id="movies-brand"><strong>Brand: </strong></p>
            <p id="movies-power"><strong>Power: </strong></p>
            <p id="movies-year"><strong>Year: </strong></p>
            <p id="movies-engine"><strong>Engine: </strong></p>
            <p id="movies-colour"><strong>Colour: </strong></p>
            <p id="movies-price"><strong>Price: </strong></p>
    </div>

    <script src="./js/moviesRevamp.js"></script>
    <script>

    function sleepMS(ms) {
      return new Promise(resolve => setTimeout(resolve, ms));
    }
        const urlParams = new URLSearchParams(window.location.search);
        const movieId = parseInt(urlParams.get("id"));

      initialise();

      async function initialise() {
          if (movieId || movieId === 0) {
          currIndex = movieId;

            if (movieId === 0) {
              changeImgs(0);
            }
            else if (movieId === movies.length - 1) {
              changeImgs(2);
            }
            else {
              changeImgs(-1);
            }

            makeDescription();   //  Description update

            await sleepMS(400);

            showDescription();
        }
        else {
          changeImgs(0);   //  Image update 
          makeDescription();   //  Description update
        }
      }
    
      function showOverlay() {
        document.getElementById("basket-overlay").style.display = "block"; // Show overlay
      }

      function cancelBasket() {
        document.getElementById("basket-overlay").style.display = "none"; // Hide overlay
      }

      function addToBasket(movieId) {
        // add car to the basket
        const movie = movies.find((movie) => movie.id === movieId);
        if (!movie) return;

        // Get the basket from local storage, or just an empty array if it doesn't exist
        const basket = JSON.parse(localStorage.getItem("basket") ?? "[]");

        for (let i = 0; i < basket.length; i++) {   // Don't allow the same car to be purchased twice 
          if (basket[i].id == movieId) {  // car already in basket
            alert("You have already added this car to your basket")
            return;
          }
        }


        basket.push(movie);
        localStorage.setItem("basket", JSON.stringify(basket));

        alert("You have added this car to your basket.");

        document.getElementById("basket-overlay").style.display = "none"; // Hide overlay
      }
    </script>

  </body>
</html>
