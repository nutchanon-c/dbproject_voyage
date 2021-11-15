<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- use styles.css -->
    <link rel="stylesheet" href="styles.css">
    <title>Edit Profile</title>
    <style>
        body {
            font-family: 'Ramabhadra', sans-serif;
            
        }
        .profile_name{
        /* font-size: 20px; */
        font-weight: bold;
        text-align: center;
        background-color: #f2f2f2;
        margin-left: 20px;
        border-radius: 25px;
        /* margin: auto; */
        margin-top: 1em;
        padding: 1em;        
        }
        .profile_info{
            /* center of screen */
            margin-left: 20px;
            margin-right: 20px;
            margin-top: 1em;
            margin-bottom: 1em;
            border-radius: 25px;
            padding: 1em;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
        }
</style>
</head>
<body>
<?php session_start(); //Start the session to use the value kept in the 

        
    
?>
<div class="container">
    <div class="headbar">
        <?php
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
<div class="profile_info">
<?php
    require_once('connect.php');
    $sql = "SELECT * FROM user WHERE user_id = '".$_SESSION['User_ID']."'";
    $result = $mysqli -> query($sql);
    $row = $result->fetch_assoc();
   
    echo "<form action='edit_profile_finish.php' method='post'>";
    echo "<h2>Edit Profile</h2>";
    echo "<table>";
    echo "<input type='hidden' name='UserID' value='".$_SESSION['User_ID']."'>";
    // echo user id
    echo "<tr><td>User ID:</td><td><input type='text' name='UserID' value='".$row['user_id']."' disabled></td></tr>";
    // echo username
    echo "<tr><td>Username:</td><td><input type='text' name='Username' value='".$row['Username']."' disabled></td></tr>";
    echo "<tr><td>Password:</td><td><input type='text' name='Password' value='".$row['Password']."'></td></tr>";
    // echo FirstName
    echo "<tr><td>First Name:</td><td><input type='text' name='FirstName' value='".$row['FirstName']."'></td></tr>";
    // echo LastName
    echo "<tr><td>Last Name:</td><td><input type='text' name='LastName' value='".$row['LastName']."'></td></tr>";
    // echo Email
    echo "<tr><td>Email:</td><td><input type='text' name='Email' value='".$row['Email']."'></td></tr>";
    // echo Address
    echo "<tr><td>Address:</td><td><input type='text' name='Address' value='".$row['Address']."'></td></tr>";
    // echo Tel
    echo "<tr><td>Tel:</td><td><input type='text' name='Tel' value='".$row['Tel']."'></td></tr>";
    // echo DOB
    echo "<tr><td>DOB:</td><td><input type='date' name='DOB' value='".$row['DOB']."'></td></tr>";

    // make a select box to choose Gender
    echo '
    <tr><td>
    Gender:</td><td>
    <select name="gender" required>
        <option value="none" selected disabled>Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    </select>
    </td></tr>
    ';


    // make a select box to choose between 0 and 1 for Role. 0 for user, 1 for admin
    // echo "<tr><td>Role:</td><td><select name='Role'>";
    // if ($row['Role'] == 0) {
    //     echo "<option value='0' selected>User</option>";
    //     echo "<option value='1'>Admin</option>";
    // } else {
    //     echo "<option value='0'>User</option>";
    //     echo "<option value='1' selected>Admin</option>";
    // }

    echo "</table>";
    // submit button
    echo "<input type='submit' value='Edit'>";
    echo "</form>";

?>
</div>

</div>
</body>
</html>