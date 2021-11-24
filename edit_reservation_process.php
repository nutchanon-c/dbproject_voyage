<?php
    session_start();
    require_once('connect.php');
    $rrid = $_POST['RRID'];
    $rid = $_POST['ReservationID'];

    
    // if POST status = 1, set $st = 1, else set $st = 0
    if($_POST['Status'] == '1'){
        $st = 1;
    }
    elseif($_POST['Status'] == '0'){
        $st = 1;
    }
    else{
        $st = 0;
    }
    $res = $_POST['Status'];

    // echo $st;
    // echo "<br>";
    // echo $rrid;
    $sql1 = "SELECT room_id FROM room_reservation WHERE reservation_id = $rid;";
    if($result = $mysqli->query($sql1)){
        while($row = $result->fetch_array()){
            echo $row['room_id'];
            $id = $row['room_id'];
            echo $id;
            $sql = "UPDATE room SET Status = '$st' WHERE room_id = $id;";
            if($mysqli->query($sql)){
                echo "Room Status Updated";
               
            }
            else{
                echo "Error updating record: " . $mysqli->error;
            }
        }
    }
    $sql2 = "UPDATE reservation SET status = $res WHERE `Reservation_ID` = $rid";
    if($mysqli->query($sql2)){
        echo "Reservation Status Updated";
        header("Location: admin_reservation.php");
    }
    else{
        echo "Error updating record: " . $mysqli->error;
    }
 




?>