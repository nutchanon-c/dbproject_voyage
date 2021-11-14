<?php 

    // include database connection
    // include 'db_connect.php';
    require_once('connect.php');
    session_start();

    // if form is submitted
    if($_POST){
        // get values
        $id = $_SESSION['User_ID'];
        // $name = $_POST['name'];
        // $email = $_POST['email'];
        $review = $_POST['comment'];
        $rating = $_POST['rating'];
        $date = date('Y-m-d');
        $time = date('H:i:s');

        // echo id, review, rating, date, time
        echo $id;
        echo $review;
        echo $rating;
        echo $date;
        echo $time;
        $rid = $_GET['reservation_id'];

        // $status = 'active';

        // insert query
        $query = "INSERT INTO user_review(User_ID, Reservation_ID, Comment, Rating, Date, Time) VALUES('$id', '$rid', '$review', '$rating', '$date', '$time')";

        // execute query
        $result = $mysqli->query($query);

        // if query is successful
        if($result){
            // redirect to review page
            header('Location: profile.php?signin=69');
        }else{
            die('Unable to add review.');
        }
    }

?>