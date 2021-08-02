<?php

// This acts as an api controller contacting the OMDB and returns the result of the  query


isset($_GET['t']) == true ? $title = $_GET["t"] : $title = "";
isset($_GET['y']) == true ? $year = $_GET["y"] : $year = "";
isset($_GET['i']) == true ? $imdbID = $_GET["i"] : $imdbID = "";
 
$path = "https://www.omdbapi.com/?t=" . $title . "&y=" . $year . "&i=" . $imdbID . "&apikey=f2d7d841";
$json = file_get_contents($path);
header('Content-Type: application/json');
echo json_encode($json);
