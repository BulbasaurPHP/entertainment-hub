<html>

<head>
    <title>Entertainment Hub</title
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../styles/style.css" />
    <script src="../scripts/bootstrap.bundle.js"></script>
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
                            <h1 class="amazon">MGM  Studios Belongs To Amazon Now</h1>
                            <img src="../Images/carousel/banner.png" alt="movie poster of Red Dawn">


                        </div>
                        <div class="carousel-item">
                            <h1 class="amazon">Watch  These  Blockbusters on Amazon-MGM</h1>
                            <img src="../Images/carousel/poster_1 copy.jpeg" alt="movie poster of Red Dawn">
                            <img src="../Images/carousel/2.png" alt="movie poster of No Time to Die">
                            <img src="../Images/carousel/3_creed.jpeg" alt="movie poster of Creed II">

                        </div>
                        <div class="carousel-item">
                            <h1 class="amazon">Join  Amazon  Prime  Now</h1>
                            <img src="../Images/carousel/prime.jpeg" alt="Amazon prime image">
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
                        <p><a href="../leaguepdo/Nominate.php">Nominate and WIN!!</a></p>
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
            <div class="container watchlist">
                <h3 class=" m-lg-4"> Watchlist of the Week</h3>
                    <div class="row">
                        <div class="row col-md-6 border border-4 text-center">
                            <h3>Most Watched Movies</h3>
                            <div class="col-sm-4 border-3">
                                <a href="">
                                    <img src="../styles/pulp_fic.jpg" alt="pulp fiction">
                                    <div class="caption">
                                        <p>Pulp Fiction</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="">
                                    <img src="../Images/Watchlist/DD.jpeg" alt="D&D">
                                    <div class="caption">
                                        <p>Dumb & Dumber</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="" >
                                    <img src="../Images/Watchlist/IM.jpeg" alt="Iron Man">
                                    <div class="caption">
                                        <p>Iron Man</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row col-md-6 border border-4 text-center">
                            <h3>Most Watched Shows</h3>
                            <div class="col-sm-4">
                                <a href="" >
                                    <img src="../styles/bb.jpeg" alt="Breaking Bad">
                                    <div class="caption">
                                        <p>Breaking Bad</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="" >
                                    <img src="../Images/Watchlist/tbbt.jpeg" alt="TBBT">
                                    <div class="caption">
                                        <p>The BigBang Theory</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="" >
                                    <img src="../Images/Watchlist/got.jpeg" alt="Game of Thrones">
                                    <div class="caption">
                                        <p>Game of Thrones</p>
                                    </div>
                                </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include 'footer.php';
?>
</body>

</html>