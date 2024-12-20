<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cineplex - Movie Theatre</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <style>
        body {
    
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-image: url('image/dark.jpg'); /* Replace 'background.jpg' with your image file */
    background-size: auto;
}




.bgimage {
    position: relative;
    width: 100%;
    height: 100vh;
    overflow: hidden;
}

.bg-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    z-index: 0;
    transition: opacity 1s ease-in-out; /* Adjust transition timing here */
}

/*  */

.movie-list-wrapper {
    display: flex;
    flex-wrap: wrap;
}

.movie-list-item {
    width: 30%;
    margin: 10px;
    text-align: center;
}

.movie-list-item-img {
    width: 100%;
    height: auto;
}

.movie-list-item-title {
    font-size: 18px;
    font-weight: bold;
    margin-top: 10px;
}

.movie-list-item-desc {
    font-size: 14px;
    margin-top: 5px;
    color: #555;
}

.mid {
    text-align: center;
    margin: 20px 0;
}


/*  */





.banner {
    text-align: center;
    padding: 30px;
    margin: 0;
    background-color: #000;
    color: #fff;
}

.movies {
    padding: 20px;
    display: flex;
    flex-wrap: nowrap; /* Prevent wrapping to new lines */
    justify-content: flex-start; /* Align movies to the start */
    overflow-x: auto; /* Enable horizontal scrolling */
}

.movie {
    margin: 0 10px; /* Add some space between movies */
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    text-align: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
.movie img {
    width: 100%;
    height: auto;
    border-radius: 5px;
    margin-bottom: 10px;
}


button {
    background-color: #ffcc00;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #ff9900;
}









footer {
    background-color: #0e0e0e;
    color: #fff;
    padding: 50px 0;
}

.container {
    /* max-width: 1200px; */
    width: auto !important;
    margin: 0 auto;
    padding: 0 20px;
}

.footer-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.footer-section {
    flex: 1;
    margin-bottom: 20px;
}

.footer-section h3 {
    font-size: 20px;
    margin-bottom: 15px;
    padding-left: 50px;
}

.footer-section p {
    font-size: 16px;
    line-height: 1.5;
    
}

.footer-section ul {
    list-style: none;
    padding-left: 50px;
}

.footer-section ul li {
    margin-bottom: 10px;
}

.footer-section ul li a {
    color: #fff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-section ul li a:hover {
    color: #ffcc00;
}

.footer-bottom {
    text-align: center;
    margin-top: 50px;
    font-size: 14px;
}

.footer-section{
    text-align: justify;
    padding-left: 100px;
}











a.navbar-brand{
    font-size: 300%;
}

.navbar{   

    top: 10px;
}


.mid h2{
    text-align: left;
    color: #f3efef;
    padding-left: 20px;

 }

 .ticket-button {
    /* background-color: #ffcc00; */
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.ticket-button:hover {
    background-color: #ff9900;
    
}

/* .navbar-nav.navbar-right .logout-button {
    display: none;
} */





.movie-list-wrapper {
  position: relative;
  overflow: hidden;
}
.movie-list-container {
  padding: 0 10px;
}
.movie-list {
  display: flex;
  align-items: center;
  height: 300px;
  transform: translateX(0);
  transition: all 1s ease;
}
.movie-list-item {
  margin: 0 10px;
  position: relative;
}
.movie-list-item:hover .movie-list-item-img {
  transform: scale(1.2);
  margin: 0 20px;
  opacity: 0.9;
}
.movie-list-item:hover .movie-list-item-title,
.movie-list-item:hover .movie-list-item-desc,
.movie-list-item:hover .movie-list-item-button {
  opacity: 1;
}
.movie-list-item-img {
  transition: all 1s ease-in-out;
  width: 400px;
  height: 200px;
  object-fit: cover;
  border-radius: 20px;
}
.movie-list-item-title {
  background-color: #333;
  border-radius: 20px;
  color: white;
  padding: 5px 20px;
  font-size: 28px;
  font-weight: bold;
  position: absolute;
  top: 5px;
  left: 50px;
  opacity: 0;
  transition: 1s all ease-in-out;
}
.movie-list-item-desc {
  background-color: #333;
  border-radius: 20px;
  color: white;
  padding: 10px 20px;
  font-size: 12px;
  position: absolute;
  top: 55px;
  left: 50px;
  width: 200px;
  text-align: justify;
  opacity: 0;
  transition: 1s all ease-in-out;
}
.movie-list-item-button {
  padding: 10px 20px;
  background-color: #333;
  color: white;
  border-radius: 10px;
  font-weight: bold;
  border: none;
  outline: none;
  position: absolute;
  bottom: 30px;
  left: 50px;
  opacity: 0;
  transition: 1s all ease-in-out;
}
i.arrow {
  color: lightgray;
  font-size: 75px;
  transition: 0.5s all ease;
  cursor: pointer;
  position: absolute;
  top: 1px;
  right: 5px;
}
i.arrow:hover {
  transform: scale(1.2);
}

.featured-title {
  width: 350px;
  height: 500px;
  border-radius: 20px;
  transition: all 0.5s ease;
  object-fit: cover;
}
.featured-title:hover {
  transform: scale(1.2);
  margin: 0px 20px;
}
.featured-desc {
 color:white;
  width: 600px;
  margin: 25px 0;
  text-align: justify;
  margin-left: 427px;
    margin-top: -200px;
    font-size:24px;
    
    
}
.featured-desc:hover{
  transform: scale(1.2);
  
}
.featured-button {
  padding: 5px 20px;
  border-radius: 10px;
  border: none;
  outline: none;
  color: black;
  background-color: cyan;
  font-weight: bold;
}

.container {
    /* min-width: 1900px; */
    background-image: url('main/image/dark.jpg'); /* Replace 'background.jpg' with your image file */
  min-height: calc(100vh - 50px);
  

}

.content-container {
  margin: 0;
  
}
.featured-content {
    
  height: 100vh;
  /*   background-color: tomato; */
  padding-top: 225px;
  padding-left: 80px;
}













* {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

#sliderDots {
  max-width: 1000px;
  position: relative;
  margin: auto;
  display: flex;
  justify-content: center;
  align-items: center;
  height: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}



/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.5s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 5.5s;
}

@keyframes fade {
  from {opacity: .4}
  to {opacity: 1}
}


.mid-new{
    text-align: left;
}










/* Movie List Wrapper */
.movie-list-wrapper {
    position: relative;
    width: 100%;
    overflow-x: auto; /* Allow horizontal scrolling */
    white-space: nowrap; /* Prevent wrapping of movie items */
}


/* Scroll Arrow Styling */
.scroll-arrow {
    position: absolute;
    top: 50%;
    right: 10px;
    font-size: 30px;
    cursor: pointer;
    background-color: rgba(0, 0, 0, 0.5);
    color: #fff;
    padding: 10px;
    border-radius: 50%;
    transform: translateY(-50%);
    transition: background-color 0.3s;
}

.scroll-arrow:hover {
    background-color: rgba(0, 0, 0, 0.8);
}

    </style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Sen&family=Vollkorn+SC&display=swap" rel="stylesheet">
</head>


<body>

  <div class="container">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
  <div class="navbar navbar-inverse">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-12">
  
                      <div class="navbar-header">
                          <button class="navbar-toggle" data-target="#mobile_menu" data-toggle="collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                          <a href="#" class="navbar-brand">MILANO</a>
                      </div>
  
                      <div class="navbar-collapse collapse" id="mobile_menu">
                          <ul class="nav navbar-nav">
                              <li ><a href="index.php">Home</a></li>
                              <li><a href="#" id="aboutUsLink">About Us</a> </li>
                              <li><a href="seat.php" class="ticket-button"  >Buy Tickets</a></li>
                              
                              <li><a href="tiket.php">Movies</a></li>
                              <li><a href="#" id="ContactUSLink">Contact Us</a></li>
                          </ul>

  
                          <form id="login-form">
  
                          <ul class="nav navbar-nav navbar-right">
                              <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php if(!isset($_SESSION['uname'])){echo"Profile";}else{echo $_SESSION['uname']; } ?> </a></li>
  
                              
                                      <?php if(!isset($_SESSION['uname'])){echo"<li><a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class='glyphicon glyphicon-log-in'></span> Login / Sign Up <span class='caret'></span></a>
                                  <ul class='dropdown-menu'>
                                    <form id='login-form'>
                                      <li><a href='login.php'>Login</a></li>
                                    </form>
                                      <li><a href='register.php'>Sign Up</a></li>";}else{echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> LogOut</a></li>"; } ?>

                                  </ul>
                              </li>
                          </ul>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <script>
    document.getElementById("aboutUsLink").addEventListener("click", function(event) {
      event.preventDefault(); // Prevent default link behavior
      
      // Scroll to the footer
      document.getElementById("footer").scrollIntoView({ behavior: "smooth" });
  })
  
  </script>

<script>
  document.getElementById("ContactUSLink").addEventListener("click", function(event) {
    event.preventDefault(); // Prevent default link behavior
    
    // Scroll to the footer
    document.getElementById("footer").scrollIntoView({ behavior: "smooth" });
});

</script>
  
 
    <div class="content-container">
        
          <div class="mySlides fade">
          <div class="featured-content" alt="Background Image 1" class="bg-img" style="background:linear-gradient(to bottom, rgba(0,0,0,0),#151515), url('image/bg1.jpg'); background-size: 100%; background-repeat: no-repeat;">
            
            
            <img class="featured-title" src="image/avg.jpeg" alt="">
            <p class="featured-desc">
              Earth's mightiest heroes must come together and learn to fight as a team if they are going to stop the mischievous Loki and his alien army from enslaving humanity. </p>
                        
            </div>
            </div>
            
            
            <div class="mySlides fade">
            <div class="featured-content" alt="Background Image 1" class="bg-img" style="background:linear-gradient(to bottom, rgba(0,0,0,0),#151515), url('image/nun.jpg'); background-size: 100%; background-repeat: no-repeat;">
            
            
            <img class="featured-title" src="image/nunlogo.jpg" alt="">
            <p class="featured-desc">
              The project was announced in June 2018, with MacKay and Chapman signing on in October and the rest of the cast joining the following March. Filming took place from April to June 2019 in the UK, with cinematographer Roger Deakins and editor Lee Smith using long takes to have the entire film appear as two continuous shots.            </p>
            
            </div>
            </div>
            
            
            <div class="mySlides fade">
            <div class="featured-content" alt="Background Image 1" class="bg-img" style="background:linear-gradient(to bottom, rgba(0,0,0,0),#151515), url('image/transformers1.jpg'); background-size: 100%; background-repeat: no-repeat;">
            
            
            <img class="featured-title" src="image/tslogo.jpg" alt="">
            <p class="featured-desc">
              As the son of Odin (Anthony Hopkins), king of the Norse gods, Thor (Chris Hemsworth) will soon inherit the throne of Asgard from his aging father. However, on the day that he is to be crowned, Thor reacts with brutality when the gods' enemies, the Frost Giants, enter the palace in violation of their treaty.            </p>
            </p>
            
            </div>
            </div>
            
            
            
            </div>
            
            
            
            <!-- The dots/circles -->
            <div id="sliderDots">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            </div>
            
          </div>
            
            
            
            <script>
            
            let slideIndex = 0;
            
            
            
            showSlides();
            
            // Automatic Slideshow function //
            function showSlides() {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}    
            for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex-1].style.display = "block";  
            dots[slideIndex-1].className += " active";
            setTimeout(showSlides, 5000); // Change image every 2 seconds
            }
            
            
            </script>

    <!-- Banner Section -->
    <section class="banner">
        <h2>Welcome to MILANO</h2>
        <p>Experience the magic of cinema with us</p>
    </section>

    <!-- "Now Showing" Section -->
    <div class="mid">
        <h2>Now Showing</h2>
    </div>

    <div class="movie-list-wrapper">
        <div class="movie-list">
            <!-- PHP code to dynamically fetch movies -->
            <?php include 'fetch_movies.php'; ?> <!-- This loads the movies from the database -->
        </div>
        
    </div>

    <script src="script.js"></script> <!-- Custom JS file -->


    <section class="banner" >
    <div class="mid-new">
        <h2>Up Coming....</h2>
    </div>
    </section>

    <div class="movie-list">
            <!-- PHP code to dynamically fetch movies -->
            <?php include 'fetch_cmovies.php'; ?> <!-- This loads the movies from the database -->
        </div>
</div>
</div>

<script>
  // JavaScript to handle the scroll on arrow click
document.getElementById('scrollArrow').addEventListener('click', function() {
    const movieListWrapper = document.querySelector('.movie-list-wrapper');
    movieListWrapper.scrollBy({
        left: 300, // Scroll 300px to the right
        behavior: 'smooth' // Smooth scrolling
    });
});

</script>



    <script>
        const arrows = document.querySelectorAll("i.arrow");
    const movieList = document.querySelectorAll(".movie-list");
    
    arrows.forEach((arrow, i) => {
      const movieItemsLength = movieList[i].querySelectorAll("img").length;
      let clickCounter = 0;
      arrow.addEventListener("click", () => {
        clickCounter++;
        let ratio = window.innerWidth / 270;
        if (window.innerWidth <= 765) {
          let valueOfX = movieList[i].computedStyleMap().get("transform")[0].x
            .value;
          if (movieItemsLength - (5 + clickCounter) + (5 - ratio) >= 0) {
            movieList[i].style.transform = `translateX(${valueOfX - 290}px)`;
          } else {
            movieList[i].style.transform = "translateX(0)";
            clickCounter = 0;
          }
        } else {
          let valueOfX = movieList[i].computedStyleMap().get("transform")[0].x
            .value;
          if (movieItemsLength - (5 + clickCounter) >= 0) {
            movieList[i].style.transform = `translateX(${valueOfX - 290}px)`;
          } else {
            movieList[i].style.transform = "translateX(0)";
            clickCounter = 0;
          }
        }
        // let valueOfX = movieList[i].computedStyleMap().get("transform")[0].x.value;
        // if (movieItemsLength - (5 + clickCounter) >= 0) {
        //   movieList[i].style.transform = `translateX(${valueOfX - 290}px)`;
        // } else {
        //   movieList[i].style.transform = "translateX(0)";
        //   clickCounter = 0;
        // }
      });
    });
    
    // For White Theme
    const toggleBall = document.querySelector(".toggle");
    const toToggleItems = document.querySelectorAll(
      ".toggle, .toggle-ball, h2, .sidebar, .navbar-container, .container, footer"
    );
    toggleBall.addEventListener("click", () => {
      toToggleItems.forEach((item) => {
        item.classList.toggle("active");
      });
    });
    
    </script>


<footer>
    
        <div class="footer-content" id="footer">
            <div class="footer-section about">
                <h3>About Us</h3>
                <p>Milano is dedicated to providing an exceptional movie-going experience. With state-of-the-art facilities and a wide selection of movies, we aim to make every visit memorable.
                    Our mission is to create an immersive and entertaining environment for movie lovers of all ages. We strive to offer the latest blockbuster films along with classic favorites, ensuring there's something for everyone to enjoy.
                    At Cineplex, we value customer satisfaction above all else. We are committed to delivering top-notch service and continuously improving our offerings to exceed our customers' expectations.
                </p>
            </div>
            <div class="footer-section links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="movie.html">Movies</a></li>
                    <li><a href="seat.php">Tickets Booking</a></li>
                    <!-- <li><a href="#">Contact</a></li> -->
                </ul>
            </div>
            <div class="footer-section contact">
                <h3>Contact Us</h3>
                <p><i class="fas fa-map-marker-alt"></i> 123 new Lane, Earth, Heaven</p>
                <p><i class="fas fa-envelope"></i> info@milano.com</p>
                <p><i class="fas fa-phone"></i> 070 3025160</p>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2024 Milano. All rights reserved.
        </div>
    </div>
</footer>



    
</body>
</html>
