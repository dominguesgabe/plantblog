<?php

//$connect = mysqli_connect(
//    '192.168.172.51', # service name
//    'root', # username
//    '123', # password
//    'plant_blog' # model table
//);
//
//$table_name = "users";
//
//$query = "SELECT * FROM $table_name";
//
//$response = mysqli_query($connect, $query);

require 'bootstrap.php';

try {
    router();
} catch (Exception $e) {
    var_dump($e->getMessage());
}
