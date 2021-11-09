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


    <!-- 2 textbox to fill out username and password with sign in and register button -->
    <div class="container" style="background-color: white; border-radius: 15px; padding: 5em; margin: 2em; margin-top: 5em; text-align:center;">
        <div class="login_form">
            <form action="login_check.php" method="post">
                <h1>Sign in</h1>
                <input type="text" name="username" placeholder="Username" required>
                <br>
                <input type="password" name="password" placeholder="Password" required>
                <br>
                <?php
                    if(isset($_GET['signin'])){
                        echo "<h4>Incorrect Username or Password</h4>";
                    }
                ?>
                <button type="submit" name="login">Sign in</button>
                <p>Not a member? <a href="register.php">Register</a></p>
            </form>
        </div>
    </div>
    


</body>

</html>