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

    <div class="summary">
        <?php
        session_start();
        require_once('connect.php');
        $hotel_name = "HOTEL NAME";
        $hotel_address ="HOTEL ADDRESS";
        echo "<h1>Reservation Summary: ".$hotel_name."</h1>";
        echo "<h3>".$hotel_address."</h3>";

        // loop through $_POST[] 1 to 13 and check isset for each one
        // if isset, echo the value
        // if not isset, echo "N/A"
        echo $_SESSION['Reservation_ID'];

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

        for ($i = 1; $i <= 13; $i++) {
            // get AS_ID from addional_service table
            $AS_ID = $i;
            $sql = "SELECT * FROM additional_service WHERE AS_ID = '$AS_ID'";
            $result = $mysqli->query($sql);
            $row = $result->fetch_assoc();
            $AS_name = $row['Type'];            
            if (isset($_POST[$i])) {
                echo "<p>".$AS_name."</p>";
            } else {
                // echo "<p>".$i.": ".$AS_name." - Not Selected</p>";
            }
        }



        ?>
        
        <!-- create radio buttons to choose between "Credit Card" and "Cash" labeled payment method -->
        <div class="payment_method">
        <form action="reservation_confirmation.php" method="post">
            <input type="radio" name="payment_method" value="credit_card" checked>Credit Card<br>
            <input type="radio" name="payment_method" value="cash">Cash<br>
            <input type="submit" value="Confirm Reservation" name="confirm">
        </div>
    </form>

    </div>

    
    


</body>

</html>