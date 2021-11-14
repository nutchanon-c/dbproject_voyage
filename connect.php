<?php
    //variable for connecting to database
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'voyage_db';
    //Connect with the database
    $mysqli = new mysqli($host, $user, $password, $dbname);
    //Feedback when connection error
    if ($mysqli->connect_errno) {
        echo $mysqli->connect_errno . " : " . $mysqli->connect_error;
}
