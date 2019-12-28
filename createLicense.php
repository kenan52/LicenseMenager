<?php
session_start();
if(!isset($_SESSION['uid']) && empty($_SESSION['uid'])){
    header("Location: login.php");   
}
require "Class/connection.class.php";
require "Class/database.class.php";
require "Class/view.class.php";

$database = new Database;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="CSS/main.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper"> 
        <?php
            include "inc/nav.php";
        ?>
        <div class="box boxsmall">
        <div class="itemflex"> 
            <form method="post" action="CRUD/crud.php?insert">
                <table class="tableInsert">
                    <tr>
                        <th colspan="2" >Add license</th>  
                    </tr>
                    <tr id="idlicense">
                    <td><input type="hidden" name="id" value=""></td>
                    </tr>
                    <tr>
                    <td>Name</td>
                    <td><input type="text" class="form-control" name="name" value="" placeholder="Enter name"></td>
                    </tr>
                    <tr>
                    <td>Type</td>
                    <td>
                        <select class="inputSelect" name="type" value="">
                            <option value="Monthly">Monthly</option>
                            <option value="Yearly">Yearly</option>
                        </select>
                    </td>
                    </tr>
                    <tr>
                        <td>Period</td>
                        <td><input type="text" class="form-control" name="period" value="" placeholder="Enter Period"></td>
                    </tr>
                    <tr>
                        <td>Creator</td>
                        <td><input type="text" class="form-control" name="creator" value="" placeholder="Enter creator"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><input type="submit" class="primary-btn" name="edit" value="Add License"></td>
                    </tr>
                </table>
                </form>
        </div>
        </div>
</body>
</html>