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


<!-- create registration form with username, password, email, first name, last name, date of birth, address, tel -->
<div class="container" style="text-align: center;">
    <div class="form_container">
        <form action="register.php" method="post">
            <div class="form_title">
                <h1>Register</h1>
            </div>
            <div class="form_input">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="form_input">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form_input">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form_input">
                <input type="text" name="firstname" placeholder="First name" required>
            </div>
            <div class="form_input">
                <input type="text" name="lastname" placeholder="Last name" required>
            </div>
            <div class="form_input">
                <input type="date" name="dob" placeholder="Date of birth" required>
            </div>
            <div class="form_input">
                <input type="text" name="address" placeholder="Address" required>
            </div>
            <div class="form_input">
                <input type="text" name="tel" placeholder="Tel" required>
            </div>
            <div class="form_input">
                <input type="submit" name="submit" value="Register">
            </div>
        </form>
    </div>
    


</body>

</html>