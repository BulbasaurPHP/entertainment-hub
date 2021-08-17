<?php

require 'vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../styles/style.css" />
    <script src="../scripts/bootstrap.bundle.js"></script>
    <script src="https://kit.fontawesome.com/b55d11ffa3.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/zcn2jovpyxgp6h9jrv49qzc6wd8fo4mk3sc5nufhezkc4ao1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <title>Newsletter Management</title>
</head>

<body>

    <?php include '../header.php'; ?>

    <h1>Newsletter Template Library</h1>
    <div class="container">
        <h3>Available Templates</h3>
        <div class="template__inner"></div>
    </div>
    <div class="container">
        <form id="newsletterForm">
            <textarea rows="30" id="textarea" name="textarea">
                Newsletter
            </textarea>
            <input type="hidden" name="letterId" id="letterId">
        </form>
        <div>
            <button class='btn btn-outline-info m-3' onclick='addNewsLetter();'>Add</button>
            <button class=' btn btn-outline-success m-3' id='updateButton' onclick='updateNewsLetter();' disabled>Update</button>
            <button class='btn btn-outline-danger m-3' id='deleteButton' onclick='deleteNewsLetter();' disabled>Delete</button>
            <button class='btn btn-outline-primary m-3' onclick='copyNewsletter();'>Copy to Clipboard</button>

        </div>
        <p class="text-danger text-center" id="addFail"></p>
        <p class="text-success text-center" id="addPass"></p>
    </div>

    <p class="text-danger text-center" id="addFail"></p>
    <p class="text-success text-center" id="addPass"></p>
</body>
<?php include '../footer.php'; ?>

</html>


<script type="text/javascript" language="javascript">
    window.onload = fetchFromDB


    //tiny Code
    tinymce.init({
        selector: 'textarea',
        plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
        toolbar: 'a11ycheck addcomment showcomments casechange checklist code export formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
    });



    function deleteRow(i) {
        var row = document.getElementById("row" + i);
        row.parentNode.removeChild(row);
    }

    let i = 0;

    function fetchNewsletter(id) {
        console.log("Fetching FROM DB");
        $.ajax({
            type: "GET",
            url: "fetchNewsletter.php?id=" + id,
            dataType: 'JSON',
            success: function(data) {
                var json = data[0];
                tinyMCE.activeEditor.setContent(json.content);
                document.getElementById('letterId').value = json.id;
                $("#updateButton").prop('disabled', false);
                $("#deleteButton").prop('disabled', false);
                return true;
            },
            error: function(data) {
                console.log("Fetching Letters : Failed");
                // console.log(data);
                // $('#addFail').text("Movie cannot be deleted from Database");
            }

        });
        return true;
    }

    function copyNewsletter() {
        document.getElementById('textarea').textContent = tinyMCE.activeEditor.getContent();
        var copyText = document.getElementById('textarea');
        navigator.clipboard.writeText(copyText.value);
    }

    function addNewsLetter() {
        document.getElementById('textarea').textContent = tinyMCE.activeEditor.getContent();
        $.ajax({
            type: "POST",
            url: "addNewsletter.php",
            data: $('#newsletterForm').serialize(),
            success: function(data) {
                console.log("Udating DB : Pass");
                console.log(data);
                $('#addPass').text("Newsletter Added to Database");
                fetchFromDB();
            },
            error: function(data) {
                console.log("Updating DB : Fail");
                console.log(data);
                $('#addFail').text("Newsletter cannot be added to Database");
            }
        });
    }

    function deleteNewsLetter() {
        $.ajax({
            type: "POST",
            url: "deleteNewsletter.php",
            data: $('#newsletterForm').serialize(),
            success: function(data) {
                console.log("Udating DB : Pass");
                console.log(data);
                $('#addPass').text("Newsletter deleted from Database");
                tinyMCE.activeEditor.setContent("");
                fetchFromDB();
            },
            error: function(data) {
                console.log("Updating DB : Fail");
                console.log(data);
                $('#addFail').text("Newsletter cannot be deleted from Database");
            }
        });
    }

    function updateNewsLetter() {
        document.getElementById('textarea').textContent = tinyMCE.activeEditor.getContent();
        $.ajax({
            type: "POST",
            url: "updateNewsletter.php",
            data: $('#newsletterForm').serialize(),
            success: function(data) {
                console.log("Udating DB : Pass");
                console.log(data);
                $('#addPass').text("Newsletter Updated in Database");
            },
            error: function(data) {
                console.log("Updating DB : Fail");
                console.log(data);
                $('#addFail').text("Newsletter cannot be updated in Database");
            }
        });
    }

    function fetchFromDB() {
        console.log("Fetching FROM DB");
        $(".template__inner").html("");
        $.ajax({
            type: "GET",
            url: "fetchNewsletters.php",
            dataType: 'JSON',
            success: function(data) {
                var json = data;
                for (letter of json) {
                    var id = letter.id;
                    // console.log(letter.id);
                    // console.log(letter.content);
                    var content = letter.content;
                    var letterDiv = "<span class='template__item'><button class='btn btn-outline-success m-3' onclick='fetchNewsletter(" + id + ");'>Newsletter:" + id + "</button> </span>";
                    $(".template__inner").append(letterDiv);
                    i++;
                    // console.log(letter);
                }
                return true;
            },
            error: function(data) {
                console.log("Fetching Letters : Failed");
                // console.log(data);
                // $('#addFail').text("Movie cannot be deleted from Database");
            }

        });
        return true;
    }
</script>