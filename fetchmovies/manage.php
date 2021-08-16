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

    <h1>Manage Movies</h1>
    <div class="container">
        <a href="index.php" class="btn btn-success mb-3">Fetch Movies</a>
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
                        <th>Poster</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <p class="text-danger text-center" id="addFail"></p>
    <p class="text-success text-center" id="addPass"></p>
    <form id="deleteMovie">
        <input type="hidden" name="serialValue" id="serialValue">
    </form>
</body>
<?php include '../footer.php'; ?>

</html>


<script type="text/javascript" language="javascript">
    window.onload = fetchFromDB
    let i = 0;

    function fetchFromDB() {
        var mname = $("#title").val();
        var year = $("#year").val();
        var imdbId = $("#imdbId").val();
        console.log(mname);
        console.log(year);
        $.ajax({
            type: "GET",
            url: "fetchMovies.php",
            dataType: 'JSON',
            success: function(data) {
                var json = data;
                console.log("#####################");
                console.log(json);
                console.log("#####################");
                for (movie of json) {
                    var title = movie.name;
                    var dir = movie.director;
                    var actors = movie.actors;
                    var year = movie.release_year;
                    var genre = movie.genre_id;
                    var date = movie.release_date;
                    var posterIMG = movie.poster_img;
                    var id = movie.id;

                    var tr_str = "<tr id=row" + i + " class='table-row'>" +
                        "<td class='movie-title'>" + title + "</td>" +
                        "<td class='dir'>" + dir + "</td>" +
                        "<td class='actor'>" + actors + "</td>" +
                        "<td class='year'>" + year + "</td>" +
                        "<td class='genre'>" + genre + "</td>" +
                        "<td class='date'>" + date + "</td>" +
                        "<td class='poster'><img src='" + posterIMG + "' width='100'></td>" +
                        "<td><button class='btn btn-danger' onclick='deleteRow(" + i + "," + id + ")'>X</button></td>" +
                        "</tr>";
                    $("#resultTable tbody").append(tr_str);
                    i++;
                }
                return true;
            }
        });
        return true;
    }

    function deleteRow(i, id) {
        document.getElementById('serialValue').value = id;
        $.ajax({
            type: "POST",
            url: "deleteMovie.php",
            data: $('#deleteMovie').serialize(),
            success: function(data) {
                console.log("Deleting Movie : Pass");
                console.log(data);
                var row = document.getElementById("row" + i);
                row.parentNode.removeChild(row);
            },
            error: function(data) {
                console.log("Deleting Movie : Fail");
                console.log(data);
                $('#addFail').text("Movie cannot be deleted from Database");
            }
        });

    }
</script>