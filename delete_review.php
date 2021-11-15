<?php
    session_start();
    require_once('connect.php');
    $reviewid = $_GET['Review_ID'];
    $sql = "DELETE FROM user_review WHERE Review_ID = '$reviewid'";
    if($mysqli->query($sql)){
        echo "Review Deleted";
        header("Location: admin_comment.php");

    }
    else{
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }

?>