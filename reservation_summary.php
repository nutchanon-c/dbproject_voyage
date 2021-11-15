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
                    if(isset($_GET['signin'])){
                        echo '<button type="submit" id="signin_button">'.$_SESSION['FirstName'].'</button>';
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

    <div class="summary">
        <?php
        session_start();
        require_once('connect.php');
        $totalPrice = 0;
        $asPrice = 0;
        $rPrice = 0;
        // $hotel_name = "HOTEL NAME";
        // $hotel_address ="HOTEL ADDRESS";
        // echo $_SESSION['User_ID'];

        // echo "<h1>Reservation Summary: ".$hotel_name."</h1>";
        // echo "<h3>".$hotel_address."</h3>";
        // echo $_SESSION['Room_Type'];
        // loop through $_POST[] 1 to 13 and check isset for each one
        // if isset, echo the value
        // if not isset, echo "N/A"
        // echo $_SESSION['Reservation_ID'];
        
        // echo $_SESSION['RoomAmt'];
        // select * from Hotel, Room, Reservation, Room_Reservation where Hotel.Hotel_ID = Room.Hotel_ID and Room.Room_ID = Room_Reservation.Room_ID and Room_Reservation.Reservation_ID = Reservation.Reservation_ID and Reservation.Reservation_ID = $_SESSION['Reservation_ID'];
        $reserid = $_SESSION['Reservation_ID'];
        $sql = "SELECT * FROM Hotel, Room, Reservation, Room_Reservation WHERE Hotel.Hotel_ID = Room.Hotel_ID and Room.Room_ID = Room_Reservation.Room_ID and Room_Reservation.Reservation_ID = Reservation.Reservation_ID and Reservation.Reservation_ID = $reserid;";
        if($result = $mysqli->query($sql)){
            if($result->num_rows > 0){
                while($row = $result->fetch_array()){
                    $hotel_name = $row['HotelName'];
                    $hotel_address = $row['FullAddress'];
                    $room_type = $row['Room_Type'];
                    $room_price = $row['Price'];
                    // $room_number = $row['Room_Number'];
                    $check_in = $row['CheckIn_Date'];
                    $check_out = $row['CheckOut_Date'];
                    $guestNo = $row['CustomerAmount'];
                
                }
            }
        }
        echo "<h1>Reservation Summary: ".$hotel_name." - ".$room_type."</h1>";
        echo "<h3>".$hotel_address."</h3>";
        
        // make a table to show Check-in Date, Check-out Date, guestNo
        echo "<table>";
        echo "<tr><td>Check-in Date: </td><td>".$check_in."</td></tr>";
        echo "<tr><td>Check-out Date: </td><td>".$check_out."</td></tr>";
        echo "<tr><td>Guest No: </td><td>".$guestNo."</td></tr>";
        echo "</table>";



        // get room_id from room_reservation where reservation_id = $_SESSION['Reservation_ID']
        
        $q = "SELECT room_id FROM room_reservation WHERE reservation_id = '".$_SESSION['Reservation_ID']."'";
        $result = $mysqli->query($q);
        while($row = $result->fetch_array()) {
            $room_id = $row['room_id'];
            // get RR_ID from room_reservation where reservation_id = $_SESSION['Reservation_ID'] and room_id = $room_id
            $rrid = "SELECT RR_ID FROM room_reservation WHERE reservation_id = '".$_SESSION['Reservation_ID']."' AND room_id = '".$room_id."'";
            $rr_result = $mysqli->query($rrid);
            while($rr_row = $rr_result->fetch_array()) {
                $rr_id = $rr_row['RR_ID'];
                for ($i = 1; $i <= 13; $i++) {
                    // get AS_ID from addional_service table
                    $AS_ID = $i;
                    $sql = "SELECT * FROM additional_service WHERE AS_ID = '$AS_ID'";
                    $result = $mysqli->query($sql);
                    $row = $result->fetch_assoc();
                    $AS_name = $row['Type'];            
                    if (isset($_POST[$i])) {
                        // insert into RR_AS with $rr_id and $AS_ID
                        $sql = "INSERT INTO RR_AS (RR_ID, AS_ID) VALUES ('$rr_id', '$AS_ID')";
                        $mysqli->query($sql);


                    } else {
                        // echo "<p>".$i.": ".$AS_name." - Not Selected</p>";
                    }
                }
        }
    }

        

        // find number of days between check-in and check-out
        $checkin = strtotime($check_in);
        $checkout = strtotime($check_out);
        $datediff = $checkout - $checkin;
        echo "<p> Price Per Day: ".$room_price." Baht</p>";
        $rPrice = $room_price * $datediff / (60 * 60 * 24);
        $totalPrice += $room_price * $datediff / (60 * 60 * 24);
        
        echo "<p>Total Room Price: ".$rPrice." Baht</p>";
        echo '<h2>Additional Services</h2>';
        for ($i = 1; $i <= 13; $i++) {
            // get AS_ID from addional_service table
            $AS_ID = $i;
            $sql = "SELECT * FROM additional_service WHERE AS_ID = '$AS_ID'";
            $result = $mysqli->query($sql);
            $row = $result->fetch_assoc();
            $AS_name = $row['Type'];            
            if (isset($_POST[$i])) {
                echo "<p>".$AS_name." - ".$row['Price']." Baht</p>";
                // add price of additional service to total price
                $totalPrice += $row['Price'];
                $asPrice += $row['Price'];
            } else {
                // echo "<p>".$i.": ".$AS_name." - Not Selected</p>";
            }
        }

        echo "<p>Total Additional Service Cost: ".$asPrice." Baht</p>";
        echo "<h2>Total Price: ".$totalPrice." Baht</h2>";
        $_SESSION['totalPrice'] = $totalPrice;
        // insert into TotalPrice of Reservation table
        $sql = "UPDATE Reservation SET TotalPrice = '$totalPrice' WHERE Reservation_ID = '$reserid'";
        // $mysqli->query($sql);
        if($mysqli->query($sql) === TRUE){
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $mysqli->error;
        }

        ?>
        
        <!-- create radio buttons to choose between "Credit Card" and "Cash" labeled payment method -->
        <div class="payment_method">
        <!-- label for payment_method -->
        <label for="payment_method">Payment Method:</label>
        <form action="reservation_confirmation.php?signin=69" method="post">
            <input type="radio" name="payment_method" value="credit_card" checked>Credit Card<br>
            <input type="radio" name="payment_method" value="cash">Cash<br>
            <input type="submit" value="Confirm Reservation" name="confirm">
        </div>
    </form>

    </div>

    
    


</body>

</html>