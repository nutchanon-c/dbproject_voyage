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
    $_SESSION['RoomAmt'] = $rn;

    // $q = "INSERT INTO reservation values ('', '$uid', 0, $gn, '', '$ci', '$co' )";
    $q = "INSERT INTO reservation (user_id, status, customeramount, checkin_date, checkout_date) values('$uid',0,$gn,'$ci','$co');";
    

    if($result = $mysqli->query($q)){
        $q2 = "SELECT Reservation_ID from reservation WHERE User_ID='$uid' AND CheckIn_Date = '$ci' AND CheckOut_Date = '$co' AND CustomerAmount = $gn";
        if($reserID = $mysqli->query($q2)){
            $rid = $reserID->fetch_array();
            $_SESSION['Reservation_ID'] = $rid[0];
            var_dump($rid[0]);

        }
        else{
            echo "query failed:".$mysqli->error;
        }
        $r = "SELECT Room_ID, Room_Type from ROOM where Status = 0 AND room.hotel_ID = $hotel LIMIT $rn";
        if($roomArray = $mysqli->query($r)){
            while($row = $roomArray->fetch_assoc()){
                $_SESSION['Room_Type'] = $row['Room_Type'];
                $reserID = $_SESSION['Reservation_ID'];
                $roomID = $row['Room_ID'];
                $r2 = "INSERT INTO room_reservation values ('', $reserID, $roomID)";
                if($result = $mysqli->query($r2)){
                    echo "ROOM RESERVED";
                }
                else{
                    echo "query failed:".$mysqli->error;
                }

                $r3 = "UPDATE room SET Status = 1 WHERE Room_ID = $roomID";
                if($result = $mysqli->query($r3)){
                    echo "ROOM RESERVED";
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