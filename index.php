<html>

<head>
    <title>Entertainment Hub</title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <script src="scripts/bootstrap.bundle.js"></script>
</head>

<body>
    <?php
    require_once 'header.php';
    ?>
    <main id="main">
        <!-- Main container -->
        <div class="container-fluid">
            <!-- One row means a breakpoint in layout -->
            <div class="row page-container">
                <!-- First row : Title on left, registration on right -->
                <div class="col-8">

                    <div class="container">
                        <div class="row">
                            <h1>Now Running : Batman V Superman</h1>
                        </div>
                        <!-- upcoming nomination, newest movie list, nomination leaderboard -->
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col filler-square">
                                        <span>Placeholder</span>
                                    </div>
                                    <div class="col filler-square">
                                        <span>Placeholder</span>
                                    </div>
                                    <div class="col filler-square">
                                        <span>Placeholder</span>
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
                                <p>Carousel Items comes here with movie banner </p>
                            </div>
                            <div class="carousel-item">
                                <p>Carousel Items comes here with movie banner </p>
                            </div>
                            <div class="carousel-item">
                                <p>Carousel Items comes here with movie banner </p>
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

            <div class="row social-media">
                <div class="container page-container">
                    <div class="row">
                    <div class="col">
                    <h3>Social Media Trends</h3>
                    <p>Info about this feature</p>
                    <a href="#" class="btn btn-primary bg-transparent">Learn More</a>
                </div>
                <div class="col">
                    <h3>Prize Pool Contest</h3>
                    <p>Info about this feature</p>
                    <a href="#" class="btn btn-primary bg-transparent">Learn More</a>
                </div>
                <div class="col">
                    <h3>Quiz</h3>
                    <p>Info about this feature</p>
                    <a href="#" class="btn btn-primary bg-transparent">Learn More</a>
                </div>
                    </div>
                </div>
                
            </div>
            <div class="row movie-slider" style="height: 300px;">
                <div class="col page-container">
                    <h3> Top 10 movies of the week, dynamically generated</h3>
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