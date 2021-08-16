<?php

use models\Database;
use models\Newsletter;
use models\NewsletterDB;

require 'vendor/autoload.php';

// fetch the posted serialized json and process it
$letterID = $_POST['letterId'];
$letterContent = $_POST['textarea'];
$letterDB = new NewsletterDB();

$letterTemp = $letterDB->updateNewsletter($letterID, $letterContent);

echo true;
