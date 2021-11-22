<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyage</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <style>
        body {
            font-family: 'Ramabhadra', sans-serif;
        }
</style>
</head>
<body>
<?php session_start(); ?>
<div class="container">
<div class="headbar">
            <?php
                if(isset($_GET['signin'])){
                    echo '<a href="home.php?signin=69"><img src="./assets/logo.png" width="150px" height="150px" style="cursor: pointer;"></a>';
                }
                else{
                    echo '<a href="home.php"><img src="./assets/logo.png" width="150px" height="150px" style="cursor: pointer;"></a>';
                }
                ?>
                <span>
                    <?php
                    echo '<div class="headbar_btns">';
                    if(isset($_GET['signin'])){
                        echo '<button type="submit" id="signin_button" onClick=document.location.href="profile.php?signin=69&user_id='.$_SESSION['User_ID'].'">'.$_SESSION['FirstName'].'</button>';
                        // make sign out text
                        echo '<button type="submit" class="logout_button" id="signout_button" onClick=document.location.href="logout.php?signin=69&user_id='.$_SESSION['User_ID'].'">Sign Out</button>';
                    }
                    else{
                        echo '<button type="submit" id="signin_button" onClick=document.location.href="login.php">Sign in</button>';
                    }
                    echo '</div>';
                    ?>
                </span>      
        </div>        
    </div>

    <div class="background_image" style="position: absolute; width: 100%">
        <img src="./assets/bg.png">
    </div>

    <div class="summary">
        <?php
        // session_start();
        require_once('connect.php');

        // echo $_SESSION['User_ID'];
        $reservationid = $_SESSION['Reservation_ID'];
        // echo $reservationid;

        // select * from reservation, room_reservaion, room, hotel where room_reservation.reservation_id = reservation.reservation_id AND room.room_ID = room_reservation.room_ID and room.Hotel_ID = hotel.Hotel_ID;
        $sql = "SELECT *, Reservation.Status FROM reservation, room_reservation, room, hotel WHERE room_reservation.reservation_id = $reservationid AND room.room_ID = room_reservation.room_ID and room.Hotel_ID = hotel.Hotel_ID AND reservation.reservation_id = $reservationid";

        if($result = $mysqli->query($sql)){
            if($result->num_rows > 0){

                $row = $result->fetch_array();
                $hotelname = $row['HotelName'];
                $room_type = $row['Room_Type'];
                $checkin = $row['CheckIn_Date'];
                $checkout = $row['CheckOut_Date'];
                $room_price = $row['Price'];
                $guestNo = $row['CustomerAmount'];
                $hotel_address = $row['FullAddress'];
                $hotel_id = $row['Hotel_ID'];
                $reservation_id = $row['Reservation_ID'];
                $room_id = $row['Room_ID'];
                $user_id = $_SESSION['User_ID'];    
                $rstatus = $row['Status'];      
                $_SESSION['Hotel_ID'] = $hotel_id;
                

            } else{
                echo "No records matching your query were found.";
            }

            $totalPrice = $_SESSION['totalPrice'];
            // if post = credit_card, insert into transaction table the values of reservation_id, cardinfo_id, current date, current time, total price
            // get the cardinfo_id from the cardinfo table where cardinfo.user_id = user_id
            $sql1 = "SELECT cardinfo_id FROM cardinfo WHERE User_ID = $user_id";        
            if($result = $mysqli->query($sql1)){
                if($result->num_rows > 0){
                    $row = $result->fetch_array();
                    $cardinfo_id = $row['cardinfo_id'];
                    if($_POST['payment_method'] == "credit_card"){
                        $sql2 = "INSERT INTO transaction (Reservation_ID, CardInfo_ID, Transaction_Date, Transaction_Time, Total) VALUES ($reservation_id, $cardinfo_id, CURDATE(), CURTIME(), $totalPrice)";
                        if($mysqli->query($sql2)){
                            // echo "<br>";
                            // echo "Transaction Successful";
                            
                            // update Status of reservation table to be 1 where reservation_id = reservation_id
                            $sql3 = "UPDATE reservation SET Status = 1 WHERE Reservation_ID = $reservation_id";
                            if($mysqli->query($sql3)){
                                // echo "<br>";
                                // echo "Reservation Status Updated";
                                
                                // update status of room in room table to be 1 where room_reservation.room_id = room_id and room_reservation.reservation_id = reservation_id
                                $sql4 = "UPDATE room SET Status = 1 WHERE Room_ID = (SELECT room_id from room_reservation WHERE room_reservation.Reservation_ID = $reservation_id)";
                                if($mysqli->query($sql4)){
                                    // echo "<br>";
                                    // echo "Room Status Updated";
                                }
                                else{
                                    echo "Error updating record: " . $mysqli->error;
                                }

                            }
                            else{
                                echo "<br>";
                                echo "Error: ".$mysql->error;
                            }
                        }
                        else{
                            echo "Error: ".$mysql->error;
                        }
                    }
                    // if post['payment_method'] == "cash", set status to 0
                    // else{
                    //     $sql4 = "UPDATE reservation SET Status = 0 WHERE Reservation_ID = $reservation_id";
                    //     if($mysqli->query($sql4)){
                    //         echo "<br>";
                    //         echo "Reservation Status Updated";
                    //     }
                    //     else{
                    //         echo "<br>";
                    //         echo "Error: ".$mysql->error;
                    //     }
                    // }
                }
            }

            $sql = "SELECT *, Reservation.Status FROM reservation, room_reservation, room, hotel WHERE room_reservation.reservation_id = $reservationid AND room.room_ID = room_reservation.room_ID and room.Hotel_ID = hotel.Hotel_ID AND reservation.reservation_id = $reservationid";

            if($result = $mysqli->query($sql)){
                if($result->num_rows > 0){
    
                    $row = $result->fetch_array();
        
                    $rstatus = $row['Status'];      
                    
    
                }
            }

            // echo "<h1>$rstatus</h1>";
            echo "<h1>Reservation Detail: ".$hotelname."</h1>";
            echo "<h2>Hotel Address: ".$hotel_address."</h2>";
            echo "<h2>Room Type: ".$room_type."</h2>";
            echo "<h2>Check In: ".$checkin."</h2>";
            echo "<h2>Check Out: ".$checkout."</h2>";
            echo "<h2>Room Price: ".$room_price."</h2>";
            echo "<h2>Total Price: ".$totalPrice."</h2>";
            echo "<h2>Number of guests: ".$guestNo."</h2>";
            // if rstatus = 0: echo "Pending", else if rstatus = 1: echo "Confirmed", if status = 2 echo "Finished"
            if($rstatus == 0){
                echo "<h2>Status: Pending</h2>";
            } else if($rstatus == 1){
                echo "<h2>Status: Confirmed</h2>";
            }
            else if($rstatus == 2){
                echo "<h2>Status: Finished</h2>";
            }

            // back to home page button
            echo '<a href="home.php?signin=69"><button type="submit" id="back_button">Back to Home Page</button></a>';




        
            

        }
        else{
            echo "Error: ".$mysql->error;
        }


        ?>
    </div>

    
    


</body>

</html>