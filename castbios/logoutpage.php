<?php
session_start();
unset($_SESSION['name']);
header ('Location: list-castbios-users.php');