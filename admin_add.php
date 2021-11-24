<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admincss.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Add Admin</title>
    <style>
        input[type='text']{
            height: 2em;
        }
        input[type='password']{
            height: 2em;
        }
        input[type='email']{
            height: 2em;
        }
        select{
            height: 2em;
        }
        </style>
</head>
<body>
    <div class="container">
<nav class="navbar">
            <!--This is a ApeTech logo section-->
            <div class="navhead">
                <div class="cir">
                    <!--This is the circle around the logo-->
                    <img src="./assets/logo.png" alt="ApeTech">
                    <!--This is the ApeTech logo itself-->
                </div>
            </div>
            <!--This is a nav hyperlink list section-->
            <div class="navmenu">
                <list class="Llink">
                    <ul class="Plink">
                        <li class="bullet"><a href="admin_hotel.php">Hotel Information</a></li>
                        <li class="bullet"><a href='admin_userinfo.php'>User Information</a></li>
                        <li class="bullet"><a href='admin_reservation.php'>Reservation Information</a></li>
                        <li class="bullet"><a href='admin_transaction.php'>Transaction Information</a></li>
                        <li class="bullet"><a href='admin_comment.php'>User Comment</a></li>
                        <li class="bullet"><a href='admin_addser.php'>Additional Service</a></li>
                        <li class="bullet"><a href='admin_Staff.php'>Staff Information</a></li>
                    </ul>
                </list>
                <div class="navfooter">
                    <a href="logout.php" class="signout">Signout</a>
                </div>
            </div>
        </nav>
        <div class="infoContent" >
        <header class="infoheader">
        </header>
            <form action="admin_add_process.php" method="post" style="display: flex; flex-direction: column; margin: 2em; width: 50%;">
            
                <h1>Add Admin</h1>
                <br>
                <input type="text" name="username" placeholder="Username" required>
                <br>
                <input type="password" name="password" placeholder="Password" required>
                <br>
                <input type="email" name="email" placeholder="Email" required>
                <br>
                <input type="text" name="firstname" placeholder="First name" required>
                <br>
                <input type="text" name="lastname" placeholder="Last name" required>
                <br>
                <input placeholder="Date of Birth" class="textbox-n" type="text" name="dob" onfocus="(this.type='date')" id="date" required>
                <br>
                <input type="text" name="address" placeholder="Address" required>
                <br>
                <input type="text" name="tel" placeholder="Tel" required>
                <br>

            <!-- add gender selection -->
            <label for="gender"> Select you gender</label>
            <select name="gender" required>
                <option value="none" selected disabled>Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            

            <br>

                <input type="submit" name="submit" value="Register">
           
        </form>
        </div>
        </div>
 
</body>
</html>

