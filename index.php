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
    <link href="https://fonts.googleapis.com/css?family=Kulim+Park&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <?php
            include "inc/nav.php";
        ?>
        <div class="box">
          <a href="createLicense.php"><button class="btn" style="float: right;">Add License</button></a>
            <form action="" method="post">
              
              <input type="text" id="myInput" name="term" placeholder="Search...">

              <select name="type" class="select">
                <option value="">All types</option>
                <option value="monthly">Monthly</option>
                <option value="yearly">Yearly</option>
              </select>

              <button class="btn" type="submit"><i class="fa fa-search"></i></button>
            </form>
            <table id="myTable">
            <tr class="header">
                <th style="width:60%;">Name</th>
                <th style="width:40%;">Creator</th>
                <th style="width:40%;">Actions</th>
            </tr>
            <?php
            @$view->showAllLicense($_POST['term'].$_POST['type']);
            ?>
            </table>
        </div>
    </div>
    <script src="JS/main.js"></script>
</body>
</html>