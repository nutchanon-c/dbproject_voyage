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
            <?php
            session_start();
                if(isset($_GET['signin'])){
                    echo '<a href="home.php?signin=69"><img src="./assets/logo.png" width="150px" height="150px" style="cursor: pointer;"></a>';
                }
                else{
                    echo '<a href="home.php"><img src="./assets/logo.png" width="150px" height="150px" style="cursor: pointer;"></a>';
                }
                ?>
                <span>
                    <?php
                    echo '<div class="headbar_btns">';
                    if(isset($_GET['signin'])){
                        echo '<button type="submit" id="signin_button" onClick=document.location.href="profile.php?signin=69&user_id='.$_SESSION['User_ID'].'">'.$_SESSION['FirstName'].'</button>';
                        // make sign out text
                        echo '<button type="submit" class="logout_button" id="signout_button" onClick=document.location.href="logout.php?signin=69&user_id='.$_SESSION['User_ID'].'">Sign Out</button>';
                    }
                    else{
                        echo '<button type="submit" id="signin_button" onClick=document.location.href="login.php">Sign in</button>';
                    }
                    echo '</div>';
                    ?>
                </span>      
        </div>        
    </div>

    <div class="background_image" style="position: absolute; width: 100%">
        <img src="./assets/bg.png">
    </div>

    <div class="summary">
        <?php
        require_once('connect.php');
        // select hotel name from sessions' 'Hotel_ID'
        $sql = "SELECT HotelName FROM hotel WHERE Hotel_ID = '".$_SESSION['Hotel_ID']."'";
                    
        if($result = $mysqli->query($sql)){
            if($result->num_rows > 0){
                $row = $result->fetch_array();
                
                $hotel_name = $row['HotelName'];
                
            }
            else{
                echo "No results";
            }
        }
        else{
            echo "Error: ".$mysqli->error;
        }


        // echo hotelname
        // echo '<h1>'.$hotel_name.'</h1>';

                


        echo '<h1>Review For '.$hotel_name.'</h1>';

        // get CheckIn Date, CheckOut_Date from reservation from reservation_id
        $sql = "SELECT CheckIn_Date, CheckOut_Date FROM reservation WHERE Reservation_ID = '".$_GET['reservation_id']."'";
        if($result = $mysqli->query($sql)){
            if($result->num_rows > 0){
                $row = $result->fetch_array();
                
                $check_in = $row['CheckIn_Date'];
                $check_out = $row['CheckOut_Date'];
                
            }
            else{
                echo "No results";
            }
        }
        else{
            echo "Error: ".$mysqli->error;
        }

        // show CheckIn_Date, CheckOut_Date
        echo '<h2>Check In: '.$check_in.'</h2>';
        echo '<h2>Check Out: '.$check_out.'</h2>';
        // make rating form
        echo '<form action="addreview.php?reservation_id='.$_GET['reservation_id'].'" method="post">';
        echo '<label for="rating">Rating</label>';
        echo '<select name="rating" id="rating">';
        echo '<option value="1">1</option>';
        echo '<option value="2">2</option>';
        echo '<option value="3">3</option>';
        echo '<option value="4">4</option>';
        echo '<option value="5">5</option>';
        echo '</select>';
        echo '<br>';
        echo '<label for="comment">Comment</label>';
        echo '<textarea name="comment" id="comment" cols="30" rows="10"></textarea>';
        echo '<br>';
        echo '<input type="submit" value="Submit">';
        echo '</form>';



        ?>
    </div>

    
    


</body>

</html>