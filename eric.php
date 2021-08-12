<html>

<head>
    <title>Entertainment Hub</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <script src="scripts/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/b55d11ffa3.js" crossorigin="anonymous"></script>

</head>

<body>
<?php
require_once 'header.php';
?>
<main id="main">
    <!-- Main container -->
    <div id="hero-div" class="container-fluid text-center">
        <div class="container-fluid">
            <!-- One row means a breakpoint in layout -->
            <div class="row page-container">

                <!-- First row : Title on left, registration on right -->
                <div class="col-8">

                    <div class="container ">
                        <div class="row">
                            <h1 class="title">Entertainment Hub</h1>
                        </div>
                        <!-- upcoming nomination, newest movie list, nomination leaderboard -->
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="feature-box col filler-square">
                                        <h3 class=feature-box-title>Upcoming Events</h3>
                                        <div class="feature-icon">
                                            <i class="fa-5x fas fa-calendar-day"></i>
                                        </div>
                                    </div>
                                    <div class="feature-box col filler-square">
                                        <h3 class=feature-box-title>New Movies</h3>
                                        <div class="feature-icon">
                                            <i class="fa-5x fas fa-film"></i>
                                        </div>
                                    </div>
                                    <div class="feature-box col filler-square">
                                        <h3 class=feature-box-title>Leaderboards</h3>
                                        <div class="feature-icon">
                                            <i class="fa-5x fas fa-trophy"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- registration col -->
                <div class="col-4">
                    <?
                    include_once 'register.php';
                    ?>
                </div>
            </div>
        </div>
        <!-- second row : slider for movies -->
        <div class="row movie-slider">
            <div class="col page-container">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <h1 class="amazon">Amazon  Buys  MGM  Studios</h1>
                            <img src="Images/banner.png" alt="movie poster of Red Dawn">
                        </div>
                        <div class="carousel-item">
                            <h1 class="amazon">Watch  These  Blockbusters</h1>
                            <img src="images/poster_1 copy.jpeg" alt="movie poster of Red Dawn">
                            <img src="images/carousel/2.png" alt="movie poster of No Time to Die">
                            <img src="images/3_creed.jpeg" alt="movie poster of Creed II">

                        </div>
                        <div class="carousel-item">
                            <h1 class="amazon">Join  AmazonPrime  Now</h1>
                            <img src="Images/prime.jpeg" alt="Amazon prime image">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container page-container social-media">
                <div class="row">
                    <div class="col">
                        <h3>What's Trending</h3>
                        <p>Check it out!!</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                    <div class="col">
                        <h3>Prize Pool Contest</h3>
                        <p>Nominate and WIN!!</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                    <div class="col">
                        <h3>Quiz</h3>
                        <p>Buy Popcorns with Knowledge!!</p>
                        <a href="#" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="row" style="height: 300px;">
            <div class="col page-container watchlist">
                <h3 class=" m-lg-4"> Watchlist of the Week</h3>
                <div class="row text-lg-start">
                    <ol class="col-md-6"><h5 class="text-lg-center">Most Watched Movies</h5>
                        <li><a href="#">Pulp Fiction</a></li>
                        <li><a href="#">The Wolf of Wallstreet</a></li>
                        <li><a href="#">Pursuit of Happiness</a></li>
                        <li><a href="#">October Sky</a></li>
                        <li><a href="#">Joker</a></li>
                    </ol>
                    <ol class="col-md-6"> <h5 class="text-lg-center">Most Watched Shows</h5>
                        <li><a href="#">Breaking Bad</a></li>
                        <li><a href="#">Friends</a></li>
                        <li><a href="#">The Office</a></li>
                        <li><a href="#">The Flash</a></li>
                        <li><a href="#">The Big Bang Theory</a></li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
</main>
<!-- <main id="main" class="page-container">
        <?
include_once 'register.php';
?>
        <p> CONTENT</p>
        <p> CONTENT</p>
        <p> CONTENT</p>
        <p> CONTENT</p>
        <p> CONTENT</p>
        <p> CONTENT</p>
        <p> CONTENT</p>
        <p> CONTENT</p>
        <p> CONTENT</p>
        <p> CONTENT</p>
        <p> CONTENT</p>
        <p> CONTENT</p>
        <p> CONTENT</p>
        <p> CONTENT</p>
    </main> -->
<?php
include 'footer.php';
?>
</body>

</html>