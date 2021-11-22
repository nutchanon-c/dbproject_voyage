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
<div class="container">
<div class="headbar">
            <?php
            session_start();
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
        $reservationid = $_GET['reservation_id'];
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


            // echo "<h1>$rstatus</h1>";
            echo "<h1>Reservation Detail: ".$hotelname."</h1>";
            echo "<h2>Hotel Address: ".$hotel_address."</h2>";
            echo "<h3>Room Type: ".$room_type."</=>";
            echo "<h3>Check In: ".$checkin."</h3>";
            echo "<h3>Check Out: ".$checkout."</h3>";
            echo "<h3>Room Price: ".$room_price."</h3>";
            echo "<h3>Number of guests: ".$guestNo."</h3>";
            // if rstatus = 0: echo "Pending", else if rstatus = 1: echo "Confirmed", if status = 2 echo "Finished"
            if($rstatus == 0){
                echo "<h2>Status: Pending</h2>";
            } else if($rstatus == 1){
                echo "<h2>Status: Confirmed</h2>";
            }
            else if($rstatus == 2){
                echo "<h2>Status: Finished</h2>";
            }
            else if($rstatus == 3){
                echo "<h2>Status: Cancelled</h2>";
            }

            // if status = 2: show a write review button that links to review.php
            // if($rstatus == 2){
            //     echo "<button type='submit' id='review_button' onClick='document.location.href=\"review.php?reservation_id=$reservationid\"'>Write a Review</button>";
            // }

            // count the number of results from the user_review table where reservation_id = $reservationid
            $sql2 = "SELECT * FROM user_review WHERE reservation_id = $reservationid";
            if($result2 = $mysqli->query($sql2)){
                $num_reviews = $result2->num_rows;
                // echo "<h2>Number of reviews: ".$num_reviews."</h2>";
            }
            // echo $rstatus;
            // if num_reviews = 0: show a write review button that links to review.php. Else, disable the button and label "Already Reviewed"
            // echo $num_reviews;
            if($num_reviews == 0){
                if($rstatus == 2){
                    echo "<button type='submit' id='review_button' onClick='document.location.href=\"review.php?signin=69&reservation_id=$reservationid\"'>Write a Review</button>";
                } 
                // if num_reviews = 0 and rstatus = 1: disable the button and label "Reservation Pending"
                else if($rstatus == 1){
                    echo "<button type='submit' id='review_button' disabled>Reservation Confirmed! Please Review After Your Visit</button>";
                }
                else if($rstatus == 0){
                    echo "<button type='submit' id='review_button' disabled>Reservation Pending</button>";
                }
                // if num_reviews = 0 and rstatus = 3: disable the button and label "Reservation Cancelled"
                else if($rstatus == 3){
                    echo "<button type='submit' id='review_button' disabled>Reservation Cancelled</button>";
                }     
            }    
            else{
                echo "<button type='submit' id='review_button' disabled>Already Reviewed</button>";
            }


        
            

        }
        else{
            echo "Error: ".$mysql->error;
        }
        ?>
    </div>

    
    


</body>

</html>