<?php

use models\Database;
use models\Newsletter;
use models\NewsletterDB;

require 'vendor/autoload.php';

$letterID = $_POST['letterId'];
$letterDB = new NewsletterDB();
$flag = $letterDB->deleteNewsletter($letterID);

echo $flag;
