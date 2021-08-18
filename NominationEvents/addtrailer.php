<?php
use Models\{ Database,Nominations};

require_once 'vendor/autoload.php';


$db = Database::getDb();
$e = new Nominations();

if(isset($_POST['addTrailer'])){

    $maxsize = 5242880; // 5MB
    if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != '')
        {
            $nomination_id = $_POST["nomination_id"];
        $name = $_FILES['file']['name'];
        $target_dir = "trailers/";
        $target_file = $target_dir . $_FILES["file"]["name"];

        // Select file type
        $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

        // Check extension
        if( in_array($extension,$extensions_arr) ){

            // Check file size
            if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
                echo "File too large. File must be less than 5MB.";
            }else{
                // Upload
                   if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                    // Insert record

                    $count = $e->addtrailer($db,$nomination_id,$name,$target_file);

                    echo "Upload successfully.";
                }
            }

        }else{
            echo "Invalid file extension.";
        }
    }else{
         echo "Please select a file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Entertainment Hub</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../styles/style.css" />
    <script src="../scripts/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/b55d11ffa3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Add Nomination Events</title>

</head>
<body>
<?php require_once '../header.php'; ?>
<h2>Add Trailer </h2>
<form action="" method="POST" enctype='multipart/form-data'>
    <div class="form-group">
        <label for="nominationid">Nomination ID </label>
        <input type="number" class="form-control" name="nomination_id" id="nomination_id" value="" placeholder="Please enter Nomination Id"/>
    </div>
    <div class="form-group">
        <label for="location">Please enter the Location : </label>
        <input type="file" name="file"/>
    </div>
    <a href="#" class="btn btn-success float-left">Back</a>
    <button type="submit" name="addTrailer" class="btn btn-primary float-right" id="btn-submit">Add Trailer</button>
</form>
<footer>
    <?php require_once '../footer.php'; ?>
</footer>
</body>
</html>
