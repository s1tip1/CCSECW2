<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Global Finance Car Purchase</title>
    <link href="./styles/main.css" rel="stylesheet" />
    <link href="./styles/shopRevamp.css" rel="stylesheet" />
    <link href="/styles/searchbar.css" rel="stylesheet" />

  </head>
  	
  <body>

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
  <li><a href="./phploginadmin/index.html">Admin</a></li>  
  <li><a href="./phplogin/logout.php">Logout</a></li>

  <script src="./js/hidebar.js"></script>
  <script src="./js/searchbar.js"></script>

  </div>
  <div style="padding:20px;margin-top:30px;height:15px;">
  </div>
<h1 style="text-align: center; padding:20px"> Car Dealerships</h1>
<p><b><center>Enter your city into the text box below the map to find a dealership with your car in stock.</center></b></p>

<div id="main">
    <article>
      <div style="width: 70%; margin: auto; padding: 2em; background-color: #232324; box-shadow: 2px 3px 10px rgba(0,0,0,.25); border-radius: 10px;">
      <div id = "map"></div>
      <table style="width: 100%"></table>
      
<head>
  <title>Local dealerships</title>
  
  <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5Bnti_kIRecrSCZN6JLifMYuakI2m9rY&libraries=places"></script>
</head>
<script>
  var map;
  var service;
  var infowindow;

  function initialize() {
      var area = new google.maps.LatLng(52.4128, -1.5090);
      var options = {
      componentRestrictions: {country: 'gb'}}

      map = new google.maps.Map(document.getElementById('map'), {
          center: area,
          zoom: 15
      })

      var input = document.getElementById('searchTextField');

      let autocomplete = new google.maps.places.Autocomplete(input, options)

      autocomplete.bindTo('bounds', map)

      let marker = new google.maps.Marker({
          map: map
      })

      google.maps.event.addListener(autocomplete, 'place_changed', () => {
          let place = autocomplete.getPlace()
          console.log(place)
          console.log(place.photos[0].getUrl())

          if (place.geometry.viewport) {
              map.fitBounds(place.geometry.viewport)
          } else {
              map.setCenter(place.geometry.location)
              map.setZoom(10)
          }
          marker.setPosition(place.geometry.location)
          marker.setVisible(true)

          let request = {
              location: place.geometry.location,
              radius: '1000',
              type: ['car_dealer']
          }

          service = new google.maps.places.PlacesService(map)
          service.nearbySearch(request, callback)

      })

  }

  function callback(results, status) {
      if (status == google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
              var place = results[i];
              createMarker(results[i]);
          }
      }
  }


  function createMarker(place) {
      var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
      });

      google.maps.event.addListener(marker, 'click', function () {
          alert(place.name);
          window.open(place.photos[0].getUrl(), "_blank");
      });
  }

  google.maps.event.addDomListener(window, 'load', initialize)
</script>
<body>
  <input id="searchTextField" type="text" size="205">
</body>

</html>

          <style>
              #map{ height: 400px;
                    width: 100%;}
           </style>          
        </body>
       </table>
    </article>
  </div>
</body>

</body>

</html>