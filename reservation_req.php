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
<div class="container">
        <div class="headbar">
                <a href="home.php"><img src="./assets/logo.png" width="150px" height="150px" style="cursor: pointer;"></a>
                <span><button type="submit" id="signin_button" onClick='document.location.href="login.php"'>Sign in</button></span>      
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
    <form action="reservation_req.php" method="POST">
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
        <div class="form_group">
            <label for="room_number">Number of Rooms</label>
            <input type="number" name="room_number" id="room_number" min="1" max="10" required>
    </div>
        <button type="submit" name="submit">Reserve</button>
    </div>


    


</body>

</html>