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

    <div class="reservation_details">

         <?php
         require_once('connect.php');
         $hid = $_GET['HotelID'];

        $sql = "SELECT HotelName, FullAddress FROM hotel WHERE Hotel_ID = '$hid'";
        if($result = $mysqli->query($sql)){
            if($result->num_rows > 0){
                while($row = $result->fetch_array()){
                    echo '<h1>'.$row['HotelName'].'</h1>';
                    echo '<h2>'.$row['FullAddress'].'</h2>';
                }
            }
        }

        ?>


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

                echo '<div class="form_group">';

                // if count = 0, make disabled text box form showing no rooms available
                if($row2['num'] == 0){
                    echo '<label for="room_number">Number of Rooms</label>';
                    echo '<input type="number" name="room_number" id="room_number" min="0" max="0" placeholder="No rooms available" disabled> ';
                }
                else{
                    echo '<label for="room_number">Number of Rooms</label>';
                    echo '<input type="number" name="room_number" id="room_number" min="1" max="'.$row2['num'].'" placeholder="Maximum Room: '.$row2['num'].'"required>';
                }
            
            echo '</div>';
            }
        }
        else{
                echo "query failed:".$mysqli->error;
            }
        ?>


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