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
        .as_container{
            text-align: center;
            width: 50vw;
            /* height: 100vh; */
            /* display: flex;
            align-items: center;
            justify-content: center; */
            vertical-align: middle;
            background-color: #fbfbfb;
            margin-top: 5em;
            border-radius: 15px;
            padding: 2em;
            /* margin-left: 1em;
            margin-right: 1em; */
            }
        .as_container input{
            margin: 0.5em;
        }
        .as_container #submit_button{
                /* float: right; */
                background-color: #459E8D;
                border: none;
                color: white;
                padding: 15px 30px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                border-radius: 10px;
                cursor: pointer;
        }
            .container{
                display: flex;
            align-items: center;
            justify-content: center;
            }
        
    </style>
</head>
<body>
    <?php session_start(); ?>
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
                        echo '<button type="submit" id="signin_button" onClick=document.location.href="profile.php?signin=69&user_id='.$_SESSION['User_ID'].'">'.$_SESSION['FirstName'].'</button>';
                        // make sign out text
                        echo '<button type="submit" id="signout_button" onClick=document.location.href="logout.php?signin=69&user_id='.$_SESSION['User_ID'].'">Sign Out</button>';
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
<div class="container">
<div class="as_container">
    <h2>Additional Services Selection</h2>
<?php 
    //Start session
    // session_start();
    //

    // checkboxes for additional services
    // links to reservation summary
    // query chosen choices to RR_AS
    require_once('connect.php');

    // select all from additional_service table
    echo "<form action='reservation_summary.php?signin=69' method='post'>";
    $query = "SELECT * FROM additional_service";
    if($result = $mysqli->query($query)){
        while($row = $result->fetch_array()){
            $as_id = $row['AS_ID'];
            $as_name = $row['Type'];
            $as_price = $row['Price'];
            // create form with checkboxes for each additional service and submit button
            echo "<input type='checkbox' name='$as_id' value='$as_id'>$as_name - $as_price<br>"; 
        }
    
    }
    
    else{
        echo "Error: " . $query . "<br>" . mysqli_error($dbc);
    }
    // submit button
    echo "<input type='submit' id='submit_button' 'value='Submit'>";
    echo "</form>";
?>
</div>
</div>
</body>
</html>
