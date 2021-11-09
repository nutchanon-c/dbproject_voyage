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


<!-- create credit card information form with first name, last name, address, zip code, card number, expiration date-->
<div class="container" style="text-align: center;">
    <div class="card_form_container">
        <h2>Add a new card</h2>
        <form action="add_card.php" method="post">
            <div class="form_input">
                <label for="first_name">First name</label>
                <input type="text" name="first_name" id="first_name" required>
            </div>
            <div class="form_input">
                <label for="last_name">Last name</label>
                <input type="text" name="last_name" id="last_name" required>
            </div>
            <div class="form_input">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" required>
            </div>
            <div class="form_input">
                <label for="zip_code">Zip code</label>
                <input type="text" name="zip_code" id="zip_code" required>
            </div>
            <div class="form_input">
                <label for="card_number">Card number</label>
                <input type="text" name="card_number" id="card_number" required>
            </div>
            <div class="form_input">
                <label for="expiration_date">Expiration date</label>
                <input type="text" name="expiration_date" id="expiration_date" required>
            </div>
            <div class="form_input">
                <input type="submit" value="Submit" name="submit">
            </div>
        </form>
    </div>
    </div>
    


</body>

</html>