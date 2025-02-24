<?php
    // local
    $mysqli = new mysqli("localhost","root","","database");
   
    //heroku
   //$mysqli = new mysqli("","","","");

    // Check connection
    if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
// Set charset to UTF-8
$mysqli->set_charset("utf8");

