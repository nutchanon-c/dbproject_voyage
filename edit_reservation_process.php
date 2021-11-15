<?php
    session_start();
    require_once('connect.php');
    $rrid = $_POST['RRID'];
    $rid = $_POST['ReservationID'];

    // if POST status = 1, set $st = 1, else set $st = 0
    if($_POST['Status'] == '1'){
        $st = 1;
    }
    else{
        $st = 0;
    }

    // echo $st;
    // echo "<br>";
    // echo $rrid;
    $sql = "UPDATE room SET Status = '$st' WHERE room_id = (SELECT room_id FROM room_reservation WHERE RR_ID = $rrid);";
    if($mysqli->query($sql)){
        echo "Room Status Updated";
        // add button to go back to admin_reservation.php
        // echo "<br>";
        // echo "<form action='admin_reservation.php' method='post'>";
        // // echo "<input type='hidden' name='ReservationID' value='".$rid."'>";
        // echo "<input type='submit' value='Back'>";
        // echo "</form>";
        // header back to admin_reservation.php
    }
    else{
        echo "Error updating record: " . $mysqli->error;
    }



?>