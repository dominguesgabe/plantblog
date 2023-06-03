<?php

//$connect = mysqli_connect(
//    '192.168.172.51', # service name
//    'root', # username
//    '123', # password
//    'plant_blog' # database table
//);
//
//$table_name = "users";
//
//$query = "SELECT * FROM $table_name";
//
//$response = mysqli_query($connect, $query);
//
//echo "<strong>$table_name: </strong>";
//while($row = mysqli_fetch_assoc($response))
//{
//    echo "<p>".$row['id']."</p>";
//    echo "<p>".$row['name']."</p>";
//    echo "<p>".$row['birth_date']."</p>";
//    echo "<hr>";
//}

require 'bootstrap.php';

return router();