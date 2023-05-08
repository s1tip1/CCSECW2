<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Global Finance Car Purchase</title>
    <link href="./styles/main.css" rel="stylesheet" />
    <link href="./styles/shopRevamp.css" rel="stylesheet" />
    <link href="/styles/searchbar.css" rel="stylesheet" />


  </head>   <style>

html, body {
height: 100%;
}

body {
 color: white;

}
</style>
  	
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
  <li><a href="phploginadmin/register.php">Admin</a></li>  
  <li><a href="./phplogin/logout.php">Logout</a></li>

  <script src="./js/hidebar.js"></script>
  <script src="./js/searchbar.js"></script>

  </div>
  <div style="padding:20px;margin-top:30px;height:15px;">
  </div>

    <div id="main">
      <article>
        <h1 style="text-align: center; padding:20px">Basket</h1>
        <div style="width: 70%; margin: auto; padding: 2em; background-color: #232324; color: white; box-shadow: 2px 3px 10px rgba(0,0,0,.25); border-radius: 10px;">
          <table style="width: 100%">
            <thead>
              <tr>
                <th>Car</th>
                <th>Price</th>
              </tr>
            </thead>
            <tbody id="basket"></tbody>
          </table>
          <br>
          <hr />
          <div id="price-label"><strong>Total Price:</strong> £<span id="total-price"></span></div>
          <hr />
          <br>
          <button class="button" onclick="window.location.href='/shopRevamp.php'">Continue Shopping</button>
          <button class="button" onclick ="localStorage.setItem('basket', '[]'); location.reload();">Clear Basket</button>
        </div>
      </article>
    </div>
  </body>

  <script src="./js/moviesRevamp.js"></script>
  <script src="./js/activepage.js"></script>

  <script>
    function padPrice(price) {
      let splitPrice = price.split('.')[1];

      if (splitPrice) {  // Pad zero if required
        if (splitPrice.length < 2) {
          price += "0";
        }
      }
      return price;
    }


    function proceedPayment() {
      if (!localStorage.getItem("basket") || localStorage.getItem("basket") === "[]") {
        alert("You have nothing to purchase. Please add a car to proceed");
      }
      else {
        window.location.href = '/order.php';
      }
    }

    const basketContainer = document.getElementById("basket");
    const basket = JSON.parse(localStorage.getItem("basket") ?? "[]");

    function removeItem(id) {
      basket.pop(id);
      localStorage.setItem("basket", JSON.stringify(basket));

      location.reload();
    }

    let totalPrice = 0.0;

    for (let i = 0; i < basket.length; i++) {
      let basketItem = basket[i];

      basketContainer.insertAdjacentHTML(
        "beforeend",
        `
            <tr>
                <td>${basketItem.model}</td>
                <td>£${padPrice((Math.round(basketItem.price * 100)/100).toString())}</td>
                <td><button class="button" onclick="removeItem(${i})">Remove</button></td>
            </tr>
        `
      );
      totalPrice += basketItem.price ;
    }

    let showPrice = document.getElementById("total-price");

    showPrice.textContent = padPrice((Math.round(totalPrice * 100) / 100).toString());

  </script>


<div id="purchasing">
  <article>
    <h1 style="text-align: center; padding:20px">Method of Purchase</h1>
    <div style="width: 70%; margin: auto; padding: 2em; background-color: #232324; box-shadow: 2px 3px 10px rgba(0,0,0,.25); border-radius: 10px;">
      <table style="width: 100%">
        <div id="Method of Purchase"></div>
      </table>
      <button class="button" onclick="window.location.href='purchasecar.php'">Purchase Car</button>
      <button class="button" style="float:right" onclick="window.location.href='./7058/index.php' ">Finance Car</button>
    </div>
  </article>
</div>
</body>

</html>
