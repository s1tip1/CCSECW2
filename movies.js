//cars list

const movies = [
  {
    id: 1,
    Model: "Porsche Cayenne",
    Brand: "Porsche",
    Power: "340 PS",
    Year : "2020",
    Engine: "Turbo S-E Hybrid",
    Colour: "Red",
    image: "2020-porsche-cayenne-red-exterior.png",
    price: 63700.00,
  },
  {
    id: 2,
    Model: "",
    Brand: "",
    Features: "",
    Year : "",
    Engine: "",
    Colour: "",
    image: "",
    price: 0.5,
  },
  {
    id: 3,
    name: "Spider-Man 3",
    year: 2007,
    genre: "Action, Adventure, Sci-Fi",
    certificate: "12",
    director: "Sam Raimi",
    writer: "Sam Raimi, Ivan Raimi, Alvin Sargent",
    actors: "Tobey Maguire, Kirsten Dunst, Topher Grace",
    description: "Peter Parker and M.J. seem to finally be on the right track in their complicated relationship, but trouble looms for the superhero and his lover. Peter's Spider-Man suit turns black and takes control of him, not only giving Peter enhanced power but also bringing out the dark side of his personality. Peter must overcome the suit's influence as two supervillains, Sandman and Venom, rise up to destroy him and all those he holds dear. ",
    releaseDate: "04 May 2007",
    image: "spiderMan3.png",
    price: 0.5,
  },
  {
    id: 4,
    name: "Don't Breathe",
    year: 2016,
    genre: "Crime, Horror, Thriller",
    certificate: "18",
    director: "Fede Alvarez",
    writer: "Fede Alvarez, Rodo Sayagues",
    actors: "Stephen Lang, Jane Levy, Dylan Minnette",
    description: "Three delinquents break into the house of Norman, a Gulf War veteran who is blind, to steal his money. However, much to their horror, they discover that Norman is not as defenceless as he seems.",
    releaseDate: "26 Aug 2016",
    image: "dont_breathe.png",
    price: 1.29,
  },
  {
    id: 5,
    name: "The Dark Knight",
    year: 2008,
    genre: "Action, Crime, Drama",
    certificate: "15",
    director: "Christopher Nolan",
    writer: "Jonathan Nolan, Christopher Nolan, David S. Goyer",
    actors: "Christian Bale, Heath Ledger, Aaron Eckhart",
    description: "After Gordon, Dent and Batman begin an assault on Gotham's organised crime, the mobs hire the Joker, a psychopathic criminal mastermind who offers to kill Batman and bring the city to its knees.",
    releaseDate: "18 Jul 2008",
    image: "the_dark_knight.png",
    price: 2.99,
  },
  {
    id: 6,
    name: "The Matrix",
    year: 1999,
    genre: "Action, Sci-Fi",
    certificate: "15",
    director: "Lana Wachowski, Lilly Wachowski",
    writer: "Lilly Wachowski, Lana Wachowski",
    actors: "Keanu Reeves, Laurence Fishburne, Carrie-Anne Moss",
    description:
      "When a beautiful stranger leads computer hacker Neo to a forbidding underworld, he discovers the shocking truth--the life he knows is the elaborate deception of an evil cyber-intelligence.",
    releaseDate: "31 Mar 1999",
    image: "the_matrix.png",
    price: 1.79,
  },
  {
    id: 7,
    name: "Demonic",
    year: 2021,
    genre: "Horror",
    certificate: "18",
    director: "Neill Blomkamp",
    writer: "Neill Blomkamp",
    actors: "Andrea Agur, Nathalie Boltt, Terry Chen",
    description: "A young woman unleashes terrifying demons when supernatural forces at the root of a decades-old rift between mother and daughter are ruthlessly revealed.",
    releaseDate: "20 Aug 2021",
    image: "demonic.png",
    price: 1.49,
  },
  {
    id: 8,
    name: "The Power of the Dog",
    year: 2021,
    genre: "Drama, Romance, Western",
    certificate: "15",
    director: "Jane Campion",
    writer: "Jane Campion, Thomas Savage",
    actors: "Benedict Cumberbatch, Kirsten Dunst, Jesse Plemons",
    description:
      "Charismatic rancher Phil Burbank inspires fear and awe in those around him. When his brother brings home a new wife and her son, Phil torments them until he finds himself exposed to the possibility of love.",
    releaseDate: "01 Dec 2021",
    image: "the_power_of_the_dog.png",
    price: 1.79,
  },
  {
    id: 9,
    name: "Spider-Man 2",
    year: 2004,
    genre: "Action, Adventure, Sci-Fi",
    certificate: "12",
    director: "Sam Raimi",
    writer: "Stan Lee, Steve Ditko, Alfred Gough",
    actors: "Tobey Maguire, Kirsten Dunst, Alfred Molina",
    description:
      "Peter Parker is beset with troubles in his failing personal life as he battles a brilliant scientist named Doctor Otto Octavius.",
    releaseDate: "30 Jun 2004",
    image: "spiderman_2.png",
    price: 2.49,
  },
  {
    id: 10,
    name: "Wrath of Man",
    year: 2021,
    genre: "Action, Crime, Thriller",
    certificate: "15",
    director: "Guy Ritchie",
    writer: "Nicolas Boukhrief, Éric Besnard, Guy Ritchie",
    actors: "Jason Statham, Holt McCallany, Josh Hartnett",
    description: "H is a mysterious man who starts working for a cash moving truck company. He becomes known for using amazing precision and dexterity to neutralise robbers. However, H is actually out for revenge.",
    releaseDate: "07 May 2021",
    image: "wrath_of_man.png",
    price: 1.49,
  },
];

// DOM generation code below

function createElementFromString(htmlString) {   // Return element from HTML string
  let temp = document.createElement("div");
  temp.innerHTML = htmlString;

  return temp.firstElementChild;
}

function generateMovieDOM(movieIndex) {   // Generate DOM content for a movie
  const parent = document.querySelector("#movies-list");
  const movie = movies[movieIndex];

  const template = `<div class="movie">
    <img class="movie-image" src="${movie.image}" alt="${movie.name}" />
    <div class="movie-content">
      <h4 style="margin: 0">${movie.name}</h4>
      <p>
      ${movie.description}
      </p>
    </div>
    <div class="movie-buttons">
      <a href="/movie.html?id=${movie.id}">View Movie</a><br />
      <label>Days to rent:</label><br />
      <input id="days-to-rent-${movie.id}" value="3" /><br /> <br>
      <button style="width: 100px; height: 50px" onclick="addToBasket(${movie.id})">Add to Basket</button>
    </div>
  </div>`

  const elmnt = createElementFromString(template);
  parent.insertBefore(elmnt, null);
}

function generateAll() {    // Generate all movies
  for (let i = 0; i < movies.length; i++) {
    generateMovieDOM(i);
  }
}
