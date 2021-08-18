<?php
session_start();
unset($_SESSION['name']);
header ('Location: list-newmovies-users.php');