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
                <a href="home.php"><img src="./assets/logo.png" width="150px" height="150px" style="cursor: pointer;"></a>
                <div class="headbar_btns">
                <span><button type="submit" id="signin_button" onClick='document.location.href="login.php"'>Sign in</button></span>      
                </div>
                
        </div>        
    </div>

    <div class="background_image" style="position: absolute; width: 100%">
<img src="./assets/bg.png">
</div>


<!-- create registration form with username, password, email, first name, last name, date of birth, address, tel -->
<div class="container" style="text-align: center;">
    <div class="form_container">
        <form action="adduser.php" method="post">
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
                <input placeholder="Date of Birth" class="textbox-n" type="text" name="dob" onfocus="(this.type='date')" id="date" required>
            </div>
            <div class="form_input">
                <input type="text" name="address" placeholder="Address" required>
            </div>
            <div class="form_input">
                <input type="text" name="tel" placeholder="Tel" required>
            </div>

            <!-- add gender selection -->
            <div class="form_input" >
            <label for="gender"> Select you gender</label>
            <select name="gender" required>
                <option value="none" selected disabled>Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            </div>


            
            



            <div class="form_input">
                <input type="submit" name="submit" value="Register">
            </div>
        </form>
    </div>
 

</body>

</html>