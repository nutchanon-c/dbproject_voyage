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
</head>
<body>
<nav class='navbar'>
            <!-- link to Admin Home Page -->
            <a href='admin_home.php' class='navbar-brand'>Admin Home</a>
            <list>
                <ul>
                    <li><a href='admin_hotel.php'>Hotel Information</a></li>
                    <li><a href='admin_userinfo.php'>User Information</a></li>
                    <li><a href='admin_reservation.php'>Reservation Information</a></li>
                    <li><a href='admin_transaction.php'>Transaction Information</a></li>
                    <li><a href='admin_comment.php'>User Comment</a></li>
                    <li><a href='admin_addser.php'>Additional Service</a></li>
                    <li><a href='admin_Staff.php'>Staff Information</a></li>
                    
                </ul>
            </list>
            <!-- logout button to go back to home.php -->
            <a href='logout.php' class='navbar-brand'>Logout</a>
            <hr>
        </nav>
<form action="admin_add_process.php" method="post">
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

</body>
</html>

