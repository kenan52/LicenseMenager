<?php
session_start();
if(!isset($_SESSION['uid']) && empty($_SESSION['uid'])){
    header("Location: login.php");   
}
require "Class/connection.class.php";
require "Class/database.class.php";
require "Class/view.class.php";
$view = new View;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/main.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit License</title>
</head>
<body>
    <div class="wrapper">
        <?php
            include "inc/nav.php";
        ?>
        <div class="box boxsmall">
        <div id="itemflex"> 
        <?php
            $view->showLicenseEdit($_GET['id']);
        ?>
        </div>
        </div>
</body>
</html>