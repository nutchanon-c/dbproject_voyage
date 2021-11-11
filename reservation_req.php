<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyage</title>
    <link rel="stylesheet" href="styles.css">
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
                    if(isset($_GET['signin'])){
                        echo '<button type="submit" id="signin_button" onClick=document.location.href="profile.php?signin=69&user_id='.$_SESSION['User_ID'].'">'.$_SESSION['FirstName'].'</button>';
                        // make sign out text
                        echo '<button type="submit" id="signout_button" onClick=document.location.href="logout.php?signin=69&user_id='.$_SESSION['User_ID'].'">Sign Out</button>';
                    }
                    else{
                        echo '<button type="submit" id="signin_button" onClick=document.location.href="login.php">Sign in</button>';
                    }
                    ?>
                </span>      
        </div> 
    
       
    </div>

    <div class="background_image" style="position: absolute; width: 100%">
        <img src="./assets/bg.png">
    </div>

    <div class="reservation_details">
    <!-- hotel name -->
    <h1>HOTEL NAME</h1>
    <!-- hotel address -->
    <!-- <h2> -->
        
         <?php
         $hotel_address = "ADDRESS PLACEHOLDER";
            // echo $hotel_name . "<br>";
            echo $hotel_address . "<br>";
        ?>
        <!-- </h2> -->

    <!-- reservation form with checkin date, checkout date, and number of guests -->
    <form action="reservation_q.php?signin=69" method="POST">
        <div class="form_group">
            <label for="checkin_date">Check-in Date</label>
            <input type="date" name="checkin_date" id="checkin_date" required>
        </div>
        <div class="form_group">
            <label for="checkout_date">Check-out Date</label>
            <input type="date" name="checkout_date" id="checkout_date" required>
        </div>
        <div class="form_group">
            <label for="guest_number">Number of Guests</label>
            <input type="number" name="guest_number" id="guest_number" min="1" max="10" required>
        </div>
        <!-- add input for number of rooms -->

        <?php
        require_once('connect.php');
        $d = "SELECT COUNT(*) AS num FROM room WHERE room.Hotel_ID = ".$_GET['HotelID']." AND room.Room_Type = '".$_GET['RoomType']."' AND room.status = 0 AND room.bedType_ID = ".$_GET['BedTypeID'].' ;';

        if($inner = $mysqli->query($d)){
            // $temp=0;
            while($row2 = $inner->fetch_array() /* and $temp<100 */){
                // echo "<option value=".$row['num']."></option>";
                // $temp++;
                // echo $row2['num'];
                // if (isset($_GET['signin'])){
                //     echo '<form action="addtionalService.php?signin=69" method="POST">';
                // }
                // else{
                //     echo '<form action="addtionalService.php">';
                // }
                
                // echo "<select name = ".$row['Room_Type'].">";
                // for($i = 1; $i <= intval($row2['num']); $i++){
                //     echo "<option value=".$i.">".$i."</option>";
                //     echo $i;
                // }
                // echo "</select>";
                //  echo "<button type='submit'name=".$row['Room_Type']."value=".$row['Room_Type']." >Book Now</button>";
                // echo "</form>";
                echo '<div class="form_group">';
            echo '<label for="room_number">Number of Rooms</label>';
            echo '<input type="number" name="room_number" id="room_number" min="1" max="'.$row2['num'].'" required>';
            echo '</div>';
            }
        }
        else{
                echo "query failed:".$mysqli->error;
            }
        ?>


        <!-- <div class="form_group">
            <label for="room_number">Number of Rooms</label>
            <input type="number" name="room_number" id="room_number" min="1" max="10" required>
    </div> -->
            
    <!-- goes to ADDITIONALSERVICE.PHP -->
        <button type="submit" name="submit">Next</button>
    </div>
        </form>

        <?php 
        
            require_once('connect.php');

            $uid = $_SESSION['User_ID'];
            $hotel = $_SESSION['Hotel_ID'];

        ?>
    


</body>

</html>