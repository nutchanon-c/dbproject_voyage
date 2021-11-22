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
<?php session_start(); //Start the session to use the value kept in the ?>
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
                <input type="text" name="card_number" id="card_number" minlength="16" maxlength="16" required>
            </div>
            <!-- <div class="form_input">
                <label for="expiration_date">Expiration date</label>
                <input type="text" name="expiration_date" id="expiration_date" required>
            </div> -->
            
            <div class ="form_input">                
            <lable for="expireMM">Expiration date</lable>
            <select name='expireMM' id='expireMM'>
            <option value=''  selected disabled>Month</option>
            <option value='01'>January</option>
            <option value='02'>February</option>
            <option value='03'>March</option>
            <option value='04'>April</option>
            <option value='05'>May</option>
            <option value='06'>June</option>
            <option value='07'>July</option>
            <option value='08'>August</option>
            <option value='09'>September</option>
            <option value='10'>October</option>
            <option value='11'>November</option>
            <option value='12'>December</option>
        </select> 
        <select name='expireYYYY' id='expireYY'>
            <option value=''  selected disabled>Year</option>
            <option value='2020'>2020</option>
            <option value='2021'>2021</option>
            <option value='2022'>2022</option>
            <option value='2023'>2023</option>
            <option value='2024'>2024</option>

        </select> 
        <input class="inputCard" type="hidden" name="expiry" id="expiry" maxlength="4"/>

            </div>
            <div class="form_input">
                <input type="submit" value="Submit" name="submit">
            </div>
        </form>
    </div>
    </div>

    <?php 
        require_once('connect.php');
        // session_start();
        $uid = $_SESSION['User_ID'];
        // echo $uid;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Fetch all the value
            $fname = $_POST['first_name'];
            $lname = $_POST['last_name'];
            $ad = $_POST['address'];
            $zip = $_POST['zip_code'];
            $cn = $_POST['card_number'];
            // $ed = $_POST['expiration_date'];
            $ed = $_POST['expireYYYY'].'-'.$_POST['expireMM'].'-01';
            // echo 'console.log('.$ed.')';
            //Extract the first string
            $firstDigit = $cn[0];
            if($firstDigit == '3'){
            $cardType = 'American Express';
            }
            elseif($firstDigit == '4'){
            $cardType = 'Visa';
            }
            elseif($firstDigit == '5'){
            $cardType = 'MasterCard';
            }
            elseif($firstDigit == '6'){
            $cardType = 'Discover';
            }
            else{
            $cardType = 'Random';
            }



            $lastFour = $cn[-4].$cn[-3].$cn[-2].$cn[-1];

            $card = "SELECT Last4 FROM cardinfo WHERE user_id=".$uid;

                if($result2 = $mysqli->query($card)){
                    $row2 = $result2->fetch_array();
                    if(empty($row2)){
                        $qi = "INSERT INTO cardinfo values ('','$uid', '$fname', '$lname', '$ad', '$zip', '$cn', '$ed','$cardType', '$lastFour');";
                        //Execute
                        if($result=$mysqli->query($qi)){
                            header("Location: profile.php?signin=69");
                            // echo $ed;
                        }
                        else{
                            echo "query failed:".$mysqli->error;
                        }
                    }
                    else{
                        //Update the existing card
                        $qu = "UPDATE cardinfo SET FirstName ='$fname', LastName = '$lname', Address = '$ad', ZipCode = '$zip',CardNumber = '$cn', AuthExpDate = '$ed', CardType = '$cardType', Last4 = '$lastFour' WHERE User_ID = '$uid';";
                        //Execute
                        if($result=$mysqli->query($qu)){
                            header("Location: profile.php?signin=69");
                            // echo $ed;
                        }
                        else{
                            echo "query failed:".$mysqli->error;
                    }
                    
                }
            }
                else{
                    echo 'Query Error';
                }

            //Query command
            /* $q = "INSERT INTO cardinfo values ('','$uid', '$fname', '$lname', '$ad', '$zip', '$cn', '$ed','$cardType', '$lastFour');";
            //Execute
            if($result=$mysqli->query($q)){
                header("Location: profile.php?signin=69");
            }
            else{
                echo "query failed:".$mysqli->error;
            } */
        }
    ?>
    


</body>

</html>