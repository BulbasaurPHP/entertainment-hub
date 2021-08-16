<?php

use models\Database;
use models\Newsletter;
use models\NewsletterDB;

require 'vendor/autoload.php';

// fetch the movies from db and send it as a json
$newsletterDB = new NewsletterDB();
$id = $_GET["id"];
// echo $id;
echo json_encode($newsletterDB->getANewsletter($id));
// echo var_dump($_GET);
