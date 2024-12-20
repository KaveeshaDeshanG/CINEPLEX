<?php
include("dbconn.php");

// Fetch data from the database
$query = "SELECT id, name FROM movies";
$result = mysqli_query($conn, $query);

// Check if query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Seat Booking</title>
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Lato&display=swap');
/* @import url('https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap'); */

* {
    box-sizing: border-box;
}

body {
    font-family: 'Lato', sans-serif;
    /* background-color: #242333; */
    /* background: url("myke-simon-atsUqIm3wxo-unsplash.jpg"),
        linear-gradient(rgba(0, 0, 0, .9), rgba(0, 0, 0, 0.9)); */
    background: linear-gradient(rgba(0, 18, 50, 0.84), rgba(0, 0, 0, 0.95)),
        url("./lloyd-dirks-4SLz_RCk6kQ-unsplash.jpg") bottom;
    background-size: cover;
    color: #fff;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: rgb(0, 18, 50);
    padding-top: 25px;

}

.movie-container {
    margin: 20px 0;
}

.select-box {
  margin-top: 10px;
}

.movie-container select {
    background-color: #fff;
    font-family: 'Lato',
        sans-serif;
    border: 0;
    border-radius: 5px;
    font-size: 18px;
    outline: none;
    margin-left: 10px;
    padding: 5px 15px 5px 15px;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    /* Will remove the browser style and let you use your own style */
}


.container {
    /*  it simply enables a 3D-space for children elements. */
    perspective: 1000px;
    -webkit-perspective: 1000px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.row-container {
    margin-top: 30px;
}


.seat {
    background-color: #444451;
    height: 12px;
    width: 15px;
    margin: 5px;
    border-radius: 10px;

    height: 30px;
    width: 35px;
    background: #fff;
    border: 2px solid #314c81;
    transition: all .2s ease;
}

.seat.selected {
    background-color: #6feaf6;
    background-color: #31d7a9;
}

.seat.occupied {
    background-color: grey;
}

.seat:nth-of-type(2) {
    margin-right: 18px;
}

.seat:nth-last-of-type(2) {
    margin-left: 18px;
}

.seat:not(.occupied):hover {
    /* Selecting seats that do not have "occupied" class */
    cursor: pointer;
    transform: scale(1.2);
}

.showcase .seat:not(.occupied):hover {
    cursor: default;
    transform: scale(1);
}

.showcase {
    background-color: rgba(0, 0, 0, 0.1);
    padding: 5px 10px;
    border-radius: 5px;
    color: #777;
    list-style-type: none;
    display: flex;
    justify-content: space-between;
}

.showcase li {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 10px;
}

.showcase li small {
    margin-left: 2px;
}

.row {
    display: flex;
}

.screen {
    background-color: #fff;
    height: 70px;
    width: 100%;
    margin: 15px 0;
    transform: rotateX(-45deg);
    box-shadow: 0 3px 10px rgba(255, 255, 255, .7);
}

p.text {
    margin: 5px 0;
}

p.text span {
    color: #6feaf5;
}

.movie-screen {
    margin-top: 35px;
    margin-bottom: 35px;
    text-align: center;
}

.movie-screen img {
    max-width: 85%;
}

.subtitle {
    position: relative;
    text-align: center;
    font-weight: 600;
    text-transform: uppercase;
    padding: 10px;
    color: #31d7a9;
    font-size: 16px;
    max-width: 270px;
    margin-left: auto;
    margin-right: auto;
}

.subtitle:before,
.subtitle:after {
    position: absolute;
    content: '';
    left: 50%;
    -webkit-transform: translateX(-50%);
    transform: translateX(-50%);
    height: 1px;
    background: #213a69;
}

.subtitle:before {
    width: 80%;
    top: 0;
}

.subtitle:after {
    width: 100%;
    bottom: 0;
}

.text {
    font-size: 18px;
}

#count,
#total {
    font-size: 24px;
    padding: 0 8px;
}

.text-wrapper {
    margin-top: 10px;
}

@media (max-width: 576px) {

    body {
        padding-top: 30px;
    }

    .movie-container select {
        font-size: 14px;
    }

    .seat {
        height: 21px;
        width: 23px;
    }

    .movie-screen img {
        max-width: 92%;
    }

    .subtitle {
        font-size: 13px;
        padding: 7px;
    }

    .seat:nth-of-type(2) {
        margin-right: 12px;
    }

    .seat:nth-last-of-type(2) {
        margin-left: 12px;
    }

    .movie-screen {
        margin-top: 25px;
        margin-bottom: 20px;
    }

    .text {
        font-size: 14px;
    }

    #count,
    #total {
        font-size: 18px
    }
}


        </style>
</head>

<body>

    <div class="movie-container">
        <label>Pick a movie:</label>
        <form id="booking_form" method="post" action="booking.php">
        <select id="movie" name="movie" >
        <?php
            // Fetching movie names from the database and populating the dropdown
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
            }
            ?>
            <input type="hidden" name="selected_seats" id="selected_seats">
    <input type="hidden" name="total_price" id="total_price">       

        </select>
    </div>
    Select number of seats <br/>
  <input type="number" class="select-box" id="Numseats" required>
    <ul class="showcase">
        <li>
            <div class="seat"></div>
            <small>N/A</small>
        </li>
        <li>
            <div class="seat selected"></div>
            <small>Selected</small>
        </li>
        <li>
            <div class="seat occupied"></div>
            <small>Occupied</small>
        </li>
    </ul>

    <div class="container">
        <div class="movie-screen">
          <h3> Screen </h3>
        </div>

        <div class="row-container">
            <div class="row">
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
            </div>
            <div class="row">
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat occupied"></div>
                <div class="seat occupied"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
            </div>
            <div class="row">
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat occupied"></div>
                <div class="seat occupied"></div>
            </div>
            <div class="row">
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
            </div>
            <div class="row">
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat occupied"></div>
                <div class="seat occupied"></div>
                <div class="seat"></div>
                <div class="seat"></div>
                <div class="seat"></div>
            </div>
            

            <div class="text-wrapper">
                <p class="text">Selected Seats <span id='count'>0</span>
                    <p class="text">Total Price $<span id="total">0</span></p>

                    
            </div>
            <button type="submit" class="btt">Confirm</button>
        
        </div>
                </form>

    </div>
    


    <!-- <div class="text-wrapper">
        <p class="text">Selected Seats <span id='count'>0</span>
            <p class="text">Total Price ₹<span id="total">0</span></p>
    </div> -->

    <script>
const seats = document.querySelectorAll(".row .seat:not(.occupied)");
const seatContainer = document.querySelector(".row-container");
const count = document.getElementById("count");
const total = document.getElementById("total");
const movieSelect = document.getElementById("movie");
const seatsSelect = document.getElementById("Numseats");


populateUI();

let ticketPrice = +movieSelect.value;

// Save selected movie index and price
function setMovieData(movieIndex, moviePrice) {
  localStorage.setItem("selectedMovieIndex", movieIndex);
  localStorage.setItem("selectedMoviePrice", moviePrice);
}

function updateSelectedCount() {
  const selectedSeats = document.querySelectorAll(".container .selected");

  seatsIndex = [...selectedSeats].map(function(seat) {
    return [...seats].indexOf(seat);
  });

  localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex));

  let selectedSeatsCount = selectedSeats.length;
  count.textContent = selectedSeatsCount;
  total.textContent = selectedSeatsCount * ticketPrice;
}

// Get data from localstorage and populate
function populateUI() {
  const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));

  if (selectedSeats !== null && selectedSeats.length > 0) {
    seats.forEach(function(seat, index) {
      if (selectedSeats.indexOf(index) > -1) {
        seat.classList.add("selected");
      }
    });
  }

  const selectedMovieIndex = localStorage.getItem("selectedMovieIndex");

  if (selectedMovieIndex !== null) {
    movieSelect.selectedIndex = selectedMovieIndex;
  }
}

// Movie select event

movieSelect.addEventListener("change", function(e) {
  ticketPrice = +movieSelect.value;
  setMovieData(e.target.selectedIndex, e.target.value);
  updateSelectedCount();
});

// Adding selected class to only non-occupied seats on 'click'

seatContainer.addEventListener("click", function(e) {
  const selectedSeats = document.querySelectorAll(".container .selected").length;
 const maxSeatsSelected = parseInt(document.getElementById("Numseats").value);
  if (selectedSeats > maxSeatsSelected && !e.target.classList.contains("selected") ) {
    alert('Max seats reached! Please de-select any seat to continue!')
  }
 else if (
e.target.classList.contains("selected") ||
    e.target.classList.contains("seat") &&
    !e.target.classList.contains("occupied")
  ) {
    e.target.classList.toggle("selected");
    updateSelectedCount();
  }
});

// Initial count and total rendering
updateSelectedCount();
        </script>

        <script>
            // Add event listener to the confirm button
document.querySelector(".btt").addEventListener("click", function() {
    const selectedSeats = document.querySelectorAll(".container .selected");
    const seatNumbers = [...selectedSeats].map(seat => seat.textContent);
    const totalPrice = parseInt(document.getElementById("total").textContent);

    // Set hidden input values
    document.getElementById("selected_seats").value = JSON.stringify(seatNumbers);
    document.getElementById("total_price").value = totalPrice;

    // Submit the form
    document.getElementById("booking_form").submit();
});

</script>

    <script src='script.js'></script>
</body>

</html>