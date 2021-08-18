<?php

use models\Database;
use models\Newsletter;
use models\NewsletterDB;

require 'vendor/autoload.php';

// fetch the movies from db and send it as a json
$movieDB = new NewsletterDB();

echo json_encode($movieDB->getAllNewsletter());
