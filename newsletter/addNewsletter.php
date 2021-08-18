<?php

use models\Database;
use models\Newsletter;
use models\NewsletterDB;

require 'vendor/autoload.php';

// fetch the posted serialized json and process it
$letterText = ($_POST['textarea']);
$letterDB = new NewsletterDB();
$letterObj = new Newsletter(
    $letterText
);

$letterTemp = $letterDB->addNewsletter($letterObj);

echo true;
