<?php 

include 'db.inc.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';


//FETCH NAMES AND EMAILS FROM THE SERVER - overly simplified because everything makes me sad right now.

$sql = "SELECT * FROM user";
$stmt = $db->prepare($sql);


$stmt->execute();

$recipients = $stmt->fetchAll();

$emails = array_column($recipients, 'email');
$names = array_column($recipients, 'name');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="styles/style.css" />
    <script src="scripts/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/b55d11ffa3.js" crossorigin="anonymous"></script>   
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Eblast</title>
</head>
<body>

<?php include 'header.php'; ?>

<h1>Admin Email Users Feature</h1>
    <form width="600px" id="contactForm" method="post" action="">
        
        <h3>Subject:</h3>
        
        <input name="subject" id="formSubject" type="text" placeholder="Subject Line"/>
        <h3>Email Message:</h3>
        <textarea name="body" id="formBody" rows=6 placeholder="Write your email here" type="text"> </textarea>
        <br>
        <input type="submit" id="formEblast" name="eblast" value="Send Email">

    </form> 

    <h2>Recipient List</h2>
        <!-- THIS IS JUST AN EXAMPLE TABLE OF THE NAMES/EMAILS TO BE USED LATER -->
        <div id="recipient-list">
        <div class="table-responsive">
            <table class="table table-bodered table-striped">
                <tr>
                    <th>USER ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>

                </tr>
            
                    <?php
                    $count = 0;
                    foreach($recipients as $row) {
                        $count = $count + 1;
                        echo '
                        <tr>
                            <td>'.$row["userID"].'</td>
                            <td>'.$row["name"].'</td>
                            <td>'.$row["email"].'</td>
                        </tr>
                        ';
                    }   
                    
                    ?>
                

            </table>
        </div>
    </div>



   
    <?php
if(isset($_POST['eblast'])) { 
    if(isset($_POST['subject']) && isset($_POST['body'])){
            for ($i = 0; $i<count($recipients); $i++) {
        
                 $subject =  $_POST['subject'];
                 $body = $_POST['body'];
                 $name = $names[$i];
                 $email = $emails[$i];

                // PHP MAILER SCRIPT

                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->Mailer = "smtp";
                
                try {
                    //Server settings
                    $mail->SMTPDebug = 1;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Mailer = "smtp";
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'BigShinyTakesInstitute@gmail.com';                     //SMTP username
                    $mail->Password   = 'thisisagoodpassword';                               //SMTP password
                    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                    //Recipients
                    $mail->setFrom('BigShinyTakesInstitute@gmail.com', 'Entertainment-Hub');
                    $mail->addAddress($email, $name);     //Add a recipient
                
                
                    //Attachments
                    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                
                    //Content
                
                    
                
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = $_POST['subject'];
                    $mail->Body    = $_POST['body'];
                    $mail->AltBody = strip_tags($body);
                
                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }    
        
    }
}

        ?>
</body>
<?php include 'footer.php'; ?>
</html>