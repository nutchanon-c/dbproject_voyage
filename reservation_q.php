<?php 
    //Set up
    session_start();
    require_once('connect.php');

    //Get the value
    $uid = $_SESSION['User_ID'];
    $hotel = $_SESSION['Hotel_ID'];
    $ci = $_POST['checkin_date'];
    $co = $_POST['checkout_date'];
    $gn = $_POST['guest_number'];
    $rn = $_POST['room_number'];

    $q = "INSERT INTO reservation values ('', '$uid', 0, $gn, '', '$ci', '$co' )";

    if($result = $mysqli->query($q)){
        $q2 = "SELECT Reservation_ID from reservation WHERE User_ID='$uid' AND CheckIn_Date = '$ci' AND CheckOut_Date = '$co' AND CustomerAmount = $gn";
        if($reserID = $mysqli->query($q2)){
            $rid = $reserID->fetch_array();
            $_SESSION['Reservation_ID'] = $rid;
        }
        $r = "SELECT Room_ID from ROOM where Status = 0 LIMIT $rn";
        if($roomArray = $mysqli->query($r)){
            while($rr = $roomArray->fetch_array()){
                $r2 = "INSERT INTO room_reservation values ('', $rid, $rr)";
                if($result = $mysqli->query($r2)){
                    echo "YOS";
                }
                else{
                    echo "query failed:".$mysqli->error;
                }
            }
        }
        
        
        
        header("Location: additionalService.php?signin=69");
    }
    else{
        echo "Error: ".$mysqli->error;
    }

?>