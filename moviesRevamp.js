
const movies = [
  {
    id: 1,
    model: "Porsche Cayenne",
    brand: "Porsche",
    power: "340 PS",
    year : "2020",
    engine: "Turbo S-E Hybrid",
    colour: "Red",
    image: "2020-porsche-cayenne-red-exterior.png",
    price: 63700.00,
  },
  {
    id: 2,
    model: "Audi R8 Coupe",
    brand: "Audi",
    power: "620 PS",
    year : "2022",
    engine: "V10 Mid-Engine",
    colour: "Silver",
    image: "audi_r8_grey.png",
    price: 134805.00,
  },
  {
    id: 3,
    model: "BMW i8 Roadster",
    brand: "BMW",
    power: "374 PS",
    year : "2020",
    engine: "Three-cylinder Engine",
    colour: "Black",
    image: "bmw_i8.png",
    price: 147500.00,
  },
  {
    id: 4,
    model: "Mercedes A 180 Sport Executive Hatchback",
    brand: "Mercedes",
    power: "249 PS",
    year : "2021",
    engine: "1.34 L 4-cylinder",
    colour: "Silver",
    image: "mercedes.webp",
    price: 30375.00,
  },
  {
    id: 5,
    model: "Nissan GT-R Nismo",
    brand: "Nissan",
    power: "480 PS",
    year : "2023",
    engine: "3.8L Twin-turbocharged VR38DE",
    colour: "Grey",
    image: "Nissan-GT-R-Nismo-PNG-Isolated-HD.png",
    price: 113540.00,
  },
  {
    id: 6,
    model: "Aston Martin DB11",
    brand: "Aston Martin",
    power: "528 PS",
    year : "2022",
    engine: "V12 twin-turbo engine",
    colour: "Blue",
    image: "astonmartin.png",
    price: 155200.00,
  },
  {
    id: 7,
    model: "Jaguar F Type 4000",
    brand: "Jaguar",
    power: "575",
    year : "2022",
    engine: "AJ-V8",
    colour: "Black",
    image: "jaguar.png",
    price: 54053.00,
  },
  {
    id: 8,
    model: "Range Rover Evoque S",
    brand: "Range Rover",
    power: "246 PS",
    year : "2023",
    engine: "2.0L Turbo 4 Cylinder Mild Hybrid",
    colour: "White",
    image: "rangerover.png",
    price: 58175.00,
  },
];

const movieImages = document.querySelectorAll("#movies-list .movie-image");
const navArrows = document.querySelectorAll("#movies-list .movie-arrow");

var currIndex = 0;
var movieCount = movies.length;

function changeImgs(ignore) {   // Change images of all except the index specified by ignore (-1 for none)
  let ub = 2;
  let lb = -1;

  if (ignore === 2) {
      navArrows[1].style.visibility = "hidden";   // Hide right nav arrow
      ub = 1;
  }
  else if (ignore === 0) {
      navArrows[0].style.visibility = "hidden";   // Hide left nav arrow
      lb = 0
  }
  else {
      navArrows[1].style.visibility = "visible";  // Unhide arrows
      navArrows[0].style.visibility = "visible";
  }

  for (let i = lb; i < ub; i++) {
      movieImages[i + 1].src = movies[currIndex + i].image;
  }
}

const movieDetails = document.querySelector("#movie-details");
const movieTitle = movieDetails.children[0];
const expandBtn = movieDetails.children[1];
const movieDesc = movieDetails.children[3];

function createElementFromString(htmlString) {   // Return element from HTML string
  let temp = document.createElement("div");
  temp.innerHTML = htmlString;

  return temp.firstElementChild;
}

async function makeDescription() {     // Update description below image
  let height = 130 + window.scrollY;  // Calculate height to scroll

  movieDetails.style.top = `${height}px`;   // Hide
  await sleepMS(400)

  movieTitle.innerHTML = movies[currIndex].model;
  
  

  // Code from hbcs coursework to register movie details:

  document.getElementById("movies-model").innerHTML = `<strong>Model: </strong>${movies[currIndex].model}`;
  document.getElementById("movies-brand").innerHTML = `<strong>Brand: </strong>${movies[currIndex].brand}`;
  document.getElementById("movies-power").innerHTML = `<strong>Power: </strong>${movies[currIndex].power}`;
  document.getElementById("movies-year").innerHTML = `<strong>Year: </strong>${movies[currIndex].year}`;
  document.getElementById("movies-engine").innerHTML = `<strong>Engine: </strong>${movies[currIndex].engine}`;
  document.getElementById("movies-colour").innerHTML = `<strong>Colour: </strong>${movies[currIndex].colour}`;
  document.getElementById("movies-price").innerHTML = `<strong>Price: </strong>£${movies[currIndex].price}`;



var descExpanded = false;

}

function showDescription() {    // Scroll movieDetails to reveal full contents
  if (!descExpanded) {
      let clientRect = movieDetails.getBoundingClientRect();
      let height = clientRect.bottom - clientRect.top - 120;

      expandBtn.style.transform = "rotate(90deg)";   // Replace with minus symbol

      window.scroll({
          top: height,
          left: 0,
          behavior: "smooth"
      });

      descExpanded = true;
  }
  else {
      expandBtn.style.transform = "rotate(-90deg)";   // Replace with plus symbol

      window.scroll({
          top: 0,
          left: 0,
          behavior: "smooth"
      });
      
      descExpanded = false;
  }
}

async function switchMovies(dir) {    // Switch movies to the right (dir = 1) or left (dir = -1)
  movieImages[1].parentNode.style.transition = "box-shadow 250ms ease-out";    // Make transition faster
  movieImages[1].parentNode.style.boxShadow = "0px 0px 66px 0px rgba(255, 255, 255, 0.15)";   // Dim glow

  if (currIndex + dir < 1) {
      currIndex = 0;
      movieImages[0].src = "";

      changeImgs(0);
  }
  else if (currIndex + dir > movieCount - 2) {
      currIndex = movieCount - 1;
      movieImages[2].src = "";

      changeImgs(2);
  }
  else {
      currIndex = currIndex + dir;   // Update currIndex

      changeImgs(-1);
  }

  makeDescription();
  
  await sleepMS(250);  // Wait for transition

  movieImages[1].parentNode.style.transition = "box-shadow 1s ease-out";   // Reset transition
  movieImages[1].parentNode.style.boxShadow = "0px 0px 66px 27px rgba(255, 255, 255, 0.15)";  // Glow again


function handleKeypress(key) {
  switch(key) {
      case "ArrowLeft":    // Left
          switchMovies(-1);
          break;
      case "ArrowRight":    // Right
          switchMovies(1);
          break;
      case "Enter":
          showDescription();  // Expand description when pressing enter
          break;
      default:
          return;
  }
}

document.onkeydown = e => {   // Dispatch keydown to handleKeypress
  handleKeypress(e.key);
}

document.onscroll = e => {
  if (window.scrollY > 32 && !descExpanded) {   // Check if user has scrolled down
      descExpanded = true;
      expandBtn.style.transform = "rotate(90deg)";   // Replace with minus symbol
  }
  else if (window.scrollY < 32) {     // User scrolled back up
      descExpanded = false;
      expandBtn.style.transform = "rotate(-90deg)";   // Replace with plus symbol
  }
  }}
