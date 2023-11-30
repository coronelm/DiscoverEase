<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sm3101";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ItemID, DateTime, Location, Status FROM tblostitems";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="item_list.css">
<style>
  
</style>
</head>
<body>
  
<div class="container">
    <center>

    <table>
        <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            echo '<div class="table-container">' 
            .'<div class="list">' . 
            '<p>' . $row["ItemID"] . '</p>' .
            '<p>' . $row["Location"] . '</p>' .
            '<p>' . $row["DateTime"] . '</p>' .
            '<p>' . $row["Status"] . '</p>' .
            '</div>'.
            '<button class="view" name="view" id="view">VIEW</button>' 
            ."</div>";
       
            
            }
        } else {
            echo "colspan='6'>No records found.";
        }
        ?>
    </table>

    </center>
    </div>
</body>
</html>