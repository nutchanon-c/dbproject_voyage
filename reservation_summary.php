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
        $hotel_name = "HOTEL NAME";
        $hotel_address ="HOTEL ADDRESS";
        echo "<h1>Reservation Summary: ".$hotel_name."</h1>";
        echo "<h3>".$hotel_address."</h3>";
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