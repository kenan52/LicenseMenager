<?php
session_start();
require "../Class/connection.class.php";
require '../Class/database.class.php';

$database = new Database;
#Security
if(!isset($_SESSION['uid']) && empty($_SESSION['uid'])){
    header("Location: login.php");   
}

#Delete accom
if (isset($_GET['delete'])) {
    if ($database->deleteLicense($_GET['delete'])) {
        header("Location: ../index.php"); 
    }else {
        header("Location: ../index.php?error=true"); 
    }
}
#editLicense
if (isset($_GET['edit'])) {
    $database->editLicenseInfo($_GET['id'], $_POST['name'], $_POST['type'], $_POST['period'], $_POST['creator']);
}
#Create license
if (isset($_GET['insert'])) {
    $database->insertLicense($_POST['name'], $_POST['type'], $_POST['period'], $_POST['creator']);
}

?>