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

        .profile_name {
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

        .profile_info button {
            background-color: #459E8D;
            border: none;
            color: white;
            height: 2em;
            width: auto;
            /* padding: 15px 30px; */
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
            margin-left: 0.5em;
        }
    </style>
</head>

<body>
    <?php session_start(); //Start the session to use the value kept in the 



    ?>
    <div class="container">
        <div class="headbar">
            <?php
            if (isset($_GET['signin'])) {
                echo '<a href="home.php?signin=69"><img src="./assets/logo.png" width="150px" height="150px" style="cursor: pointer;"></a>';
            } else {
                echo '<a href="home.php"><img src="./assets/logo.png" width="150px" height="150px" style="cursor: pointer;"></a>';
            }
            ?>
            <span>
                <?php
                if (isset($_GET['signin'])) {
                    echo '<button type="submit" id="signin_button">' . $_SESSION['FirstName'] . '</button>';
                } else {
                    echo '<button type="submit" id="signin_button" onClick=document.location.href="login.php">Sign in</button>';
                }
                ?>
            </span>
        </div>


    </div>

    <div class="background_image" style="position: absolute; width: 100%">

        <img src="./assets/bg.png">

    </div>

    <!-- display all profile information from database using php-->
    <div class="profile_info">
        <?php
        require_once('connect.php');
        $q = "SELECT * FROM user WHERE user_id=" . $_SESSION['User_ID'];
        // $result = mysqli_query($conn, $query);
        if ($result = $mysqli->query($q)) {
            while ($row = $result->fetch_array()) {

                echo '<div class="profile_name"><h1> Profile: ' . $row['FirstName'] . ' ' . $row['LastName'] . '</h1>';
                // add edit profile button

                // echo '<div class="profile_image">
                // <img src="'.$row['image'].'" width="200px" height="200px">
                // </div>';
                echo '
                <div class="profile_name">First Name: ' . $row['FirstName'] . '</div>
                <div class="profile_name">Last Name: ' . $row['LastName'] . '</div>
                <div class="profile_name">Email: ' . $row['Email'] . '</div>
                <div class="profile_name">Tel: ' . $row['Tel'] . '</div>
                <div class="profile_name">Address: ' . $row['Address'] . '</div>
                <div class="profile_name">Date of Birth: ' . $row['DOB'] . '</div>
                <div class="profile_name">Gender: ' . $row['Gender'] . '</div>       
                ';
                // display DOB and Gender
                $card = "SELECT Last4 FROM cardinfo WHERE user_id=" . $_SESSION['User_ID'];
                if ($result2 = $mysqli->query($card)) {
                    $row2 = $result2->fetch_array();
                    if (is_null($row2)) {
                        echo '<div class="profile_name">No credit card registered<span><button onClick=document.location.href="add_card.php?signin=69" name="acb">Add Card</button></span></div>';
                    } else {
                        echo '<div class="profile_name">Registered Card: ************' . $row2['Last4'] . '<span><button onClick=document.location.href="add_card.php?signin=69" name="acb">Change Card</button></span></div>';
                    }
                } else {
                    echo 'Query Error';
                }
                echo '<a href="edit_profile.php?signin=69"><button type="submit" id="edit_profile_button" style="background-color: #FD7767 ">Edit Profile</button></a>';
            }
        }
        ?>

        <?php
        //Start session
        // session_start();
        //Obtain the userID from the value saved in the session
        // $userid = $_SESSION['User_ID'];
        // //Connect to the database
        // require_once('connect.php');
        //Query command for retriving the information
        // $q = "SELECT * FROM user WHERE User_ID = $userid";
        // //Execute
        // $result = $mysqli->query($q);
        // echo "<h1> Profile: ".$result['FirstName']." ".$result['LastName']."</h1>";

        // if($result = $mysqli->query($q)){
        //     // $_SESSION['FirstName'] = $fname;
        //     header("Location: profile.php?signin=69");
        //     echo "<h1> Profile: ".$result['FirstName']." ".$result['LastName']."</h1>";
        // }
        // else{
        //     echo "query failed:".$mysqli->error;
        // }
        ?>
        <!-- <h1>
        Profile
    </h1>
    <table>
        <tr>
           <td>First Name</td>
           <td><?php //$result['FirstName'] 
                ?></td> 
        </tr>
        <tr>
           <td>Last Name</td>
           <td><?php //$result['LastName'] 
                ?></td> 
        </tr>
        <tr>
           <td>E-mail</td>
           <td><?php //$result['Email'] 
                ?></td> 
        </tr>
        <tr>
           <td>Date of Birth</td>
           <td><?php //$result['DOB'] 
                ?></td> 
        </tr>
        <tr>
           <td>Address</td>
           <td><?php //$result['Address'] 
                ?></td> 
        </tr>
        <tr>
           <td>Tel</td>
           <td><?php //$result['Tel'] 
                ?></td> 
        </tr>
    </table> -->





        <!------------------------------- Part ล่าง ----------------------------------------->
        <h1>Reservations</h1>

        <?php
        $r = "select Reservation.Reservation_ID, HotelName, CheckIn_Date, CheckOut_Date FROM Reservation, Room_Reservation, Room, Hotel WHERE Reservation.Reservation_ID = Room_Reservation.Reservation_ID AND Room_Reservation.Room_ID = Room.Room_ID AND Room.Hotel_ID = Hotel.Hotel_ID;";
        $count = 1;
        if ($result = $mysqli->query($r)) {
            while ($row = $result->fetch_array()) {
                echo $count . ". " . $row['HotelName'] . ": " . $row['CheckIn_Date'] . " to " . $row['CheckOut_Date'];
                echo '<button onClick=document.location.href="reservation_detail.php?signin=69&reservation_id=' . $row['Reservation_ID'] . '">Detail</button>';
                echo '<br>';
                $count++;
            }
        }

        ?>

</body>

</html>