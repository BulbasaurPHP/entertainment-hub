<?php

require 'vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../styles/style.css" />
    <script src="../scripts/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/b55d11ffa3.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Add Movies</title>
</head>

<body>

    <?php include '../header.php'; ?>

    <h1>Add Movies to Database</h1>
    <div class="container">
        <a href="manage.php" class="btn btn-success">Manage Movies</a>
        <div class="row m-5">
            <div class="col m-3">
                <form class="" id="form1" onsubmit="return fetchFromOMDB();">
                    <div class="form-group m-3">
                        <label for="title" class="form-label w-50 text-center">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group m-3">
                        <label for="imdbId" class="form-label w-50 text-center">IMDB ID</label>
                        <input type="text" class="form-control" id="imdbId" name="imdbId">
                    </div>
                    <div class="m-3 form-group">
                        <label for="year" class="form-label w-50 text-center">Year of release</label>
                        <input type="text" name="year" id="year" class="form-control" placeholder="" aria-describedby="year of release">
                    </div>
                    <input type="submit" class="btn btn-success" value="Fetch Movie">
                </form>
            </div>
            <div class="col card">
                <div class="m-5">
                    <h3>Instructions</h3>
                    <ol class="list-group list-group-flush">
                        <li>Search Movies by Title and/or Year of release.</li>
                        <li>If you know the movie's IMDB ID search using that for accurate result.</li>
                        <li>Once the search is completed, the bottom table will be populated.</li>
                        <li>Remove irrelevant results using the <span class="btn btn-danger">X</span> button.</li>
                        <li>Click on <span class="btn btn-primary">Add to Database</span></li>
                        <li>Success or Error message will be shown on updation.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" id="fetchResult">
            <table id="resultTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Director</th>
                        <th>Actors</th>
                        <th>Release Year</th>
                        <th>Genre</th>
                        <th>Release Date</th>
                        <th class="d-none">Poster</th>
                        <th>Preview</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <form id="addToDB">
        <input type="hidden" name="serialValue" id="serialValue">
        <input type="submit" name="submit" class="btn btn-primary" value="Add to Database">
    </form>
    <p class="text-danger text-center" id="addFail"></p>
    <p class="text-success text-center" id="addPass"></p>
</body>
<?php include '../footer.php'; ?>

</html>


<script type="text/javascript" language="javascript">
    let i = 0;

    function fetchFromOMDB() {
        var mname = $("#title").val();
        var year = $("#year").val();
        var imdbId = $("#imdbId").val();
        console.log(mname);
        console.log(year);
        $.ajax({
            type: "GET",
            url: "omdb.php?t=" + mname + "&y=" + year + "&i=" + imdbId,
            dataType: 'JSON',
            success: function(data) {
                var json = JSON.parse(data);
                var title = json.Title;
                var dir = json.Director;
                var actors = json.Actors;
                var year = json.Year;
                var genre = json.Genre;
                var date = json.Released;
                var posterIMG = json.Poster;

                var tr_str = "<tr id=row" + i + " class='table-row'>" +
                    "<td class='movie-title'>" + title + "</td>" +
                    "<td class='dir'>" + dir + "</td>" +
                    "<td class='actor'>" + actors + "</td>" +
                    "<td class='year'>" + year + "</td>" +
                    "<td class='genre'>" + genre + "</td>" +
                    "<td class='date'>" + date + "</td>" +
                    "<td class='poster d-none'>" + posterIMG + "</td>" +
                    "<td><img src='" + posterIMG + "' width='75'></td>" +
                    "<td><button class='btn btn-danger' onclick='deleteRow(" + i + ")'>X</button></td>" +
                    "</tr>";
                $("#resultTable tbody").append(tr_str);
                i++;
                return false;
            }
        });
        return false;
    }

    function deleteRow(i) {
        var row = document.getElementById("row" + i);
        row.parentNode.removeChild(row);
    }

    $("#addToDB").submit(function(event) {
        event.preventDefault();
        var movieObjects = [];
        var rows = document.getElementsByClassName("table-row");
        for (const row of rows) {

            const movie = {
                movieTitle: row.getElementsByClassName("movie-title")[0].textContent,
                director: row.getElementsByClassName("dir")[0].textContent,
                actors: row.getElementsByClassName("actor")[0].textContent,
                year: row.getElementsByClassName("year")[0].textContent,
                genre: row.getElementsByClassName("genre")[0].textContent,
                date: row.getElementsByClassName("date")[0].textContent,
                poster: row.getElementsByClassName("poster")[0].textContent
            };
            movieObjects.push(movie);
        }

        console.log(movieObjects);
        var values = JSON.stringify(movieObjects);
        console.log("##############################");
        console.log(values);
        console.log("##############################");
        document.getElementById("serialValue").value = values;

        var values = $(movieObjects).serialize();
        $.ajax({
            type: "POST",
            url: "addMovie.php",
            data: $('#addToDB').serialize(),
            success: function(data) {
                console.log("Udating DB : Pass");
                console.log(data);
                $('#addPass').text("Movies Added to Database");
            },
            error: function(data) {
                console.log("Updating DB : Fail");
                console.log(data);
                $('#addFail').text("Movies cannot be added to Database");
            }
        });

    });

    // function AddtoDB() {

    //     var movieObjects = [];
    //     var rows = document.getElementsByClassName("table-row");
    //     for (const row of rows) {

    //         const movie = {
    //             movieTitle: row.getElementsByClassName("movie-title")[0].textContent,
    //             director: row.getElementsByClassName("dir")[0].textContent,
    //             actors: row.getElementsByClassName("actor")[0].textContent,
    //             year: row.getElementsByClassName("year")[0].textContent,
    //             genre: row.getElementsByClassName("genre")[0].textContent
    //         };
    //         movieObjects.push(movie);
    //     }

    //     console.log(movieObjects);
    //     var values = JSON.stringify(movieObjects);
    //     console.log("##############################");
    //     console.log(values);
    //     console.log("##############################");
    //     document.getElementById("serialValue").value = values;

    //     var values = $(movieObjects).serialize();
    //     $.ajax({
    //         type: "POST",
    //         url: "addMovie.php",
    //         data: values,
    //         success: function(data) {
    //             console.log("Send for updating DB");
    //             $('#addPass').text = "Movies Added to Database";
    //         },
    //         error: function(data) {
    //             console.log("Send for updating DB");
    //             $('#addFail').text = "Movies cannot be added to Database";
    //         }
    //     });
    // }

    // function addValuePost(){
    //     var movieObjects = [];
    //     var rows = document.getElementsByClassName("table-row");
    //     for (const row of rows) {

    //         const movie = {
    //             movieTitle: row.getElementsByClassName("movie-title")[0].textContent,
    //             director: row.getElementsByClassName("dir")[0].textContent,
    //             actors: row.getElementsByClassName("actor")[0].textContent,
    //             year: row.getElementsByClassName("year")[0].textContent,
    //             genre: row.getElementsByClassName("genre")[0].textContent
    //         };
    //         console.log(movie);
    //         movieObjects.push(movie);
    //     }

    //     console.log(movieObjects);
    //     var values = JSON.stringify(movieObjects);
    //     console.log("##############################");
    //     console.log(values);
    //     console.log("##############################");
    //     document.getElementById("serialValue").value = values;
    //     return true;
    // }
</script>