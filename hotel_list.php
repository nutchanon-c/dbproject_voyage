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
    <?php
    session_start();
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
                        echo '<button type="submit" id="signin_button" onClick=document.location.href="profile.php?signin=69&user_id='.$_SESSION['User_ID'].'">'.$_SESSION['FirstName'].'</button>';
                        // make sign out text
                        echo '<button type="submit" id="signout_button" onClick=document.location.href="logout.php?signin=69&user_id='.$_SESSION['User_ID'].'">Sign Out</button>';
                    }
                    else{
                        echo '<button type="submit" id="signin_button" onClick=document.location.href="login.php">Sign in</button>';
                    }
                    ?>   
        </div> 
    
       
    </div>

    <div class="background_image" style="position: absolute; width: 100%">

    <img src="./assets/bg.png">

    </div>
    <div class="searchbox-holder">
        <div class="searchthing">
            <span>
                <span id="containerforlabel">
                <?php
                    
                    if(isset($_GET['signin'])){
                        echo '<form name="search_form" action="home.php?signin=69" method="POST">';
                    }
                    else{
                        echo '<form name="search_form" action="home.php" method="POST">';
                    }
                    ?>
                
                  <label for="country_select" id="country_label">country</label>
                  <select id="country_select" name="country" onchange="this.form.submit();">
                  <option selected disabled>Select Country</option>
                  <?php
                  require_once('connect.php');
                  $q = 'SELECT DISTINCT country FROM hotel ORDER BY country;';
                  if($result=$mysqli->query($q)){
                    while($row=$result->fetch_array()){
                        
                        if (isset($_POST['country'])){
                            if($_POST['country']==$row['country']){
                                echo '<option selected value="'.$row['country'].'">'.$row['country'].'</option>';
                            }
                            else{
                                echo '<option value="'.$row['country'].'">'.$row['country'].'</option>';
                            }
                        }
                        else{
                            echo '<option value="'.$row['country'].'">'.$row['country'].'</option>';
                        }
                    }
                }
                  ?>
                  </select>
                 
                    
                </span>
                <span id="containerforlabel">
                <label for="city_select" id="city_label">city</label>

                <?php
                if (isset($_POST['country'])){
                    $_SESSION['country'] = $_POST['country'];
                    $q = 'SELECT DISTINCT city FROM hotel WHERE country="'.$_POST['country'].'" ORDER BY city;';
                    if($result=$mysqli->query($q)){
                        echo '<select id="city_select" name="city">';
                        echo '<option selected disabled>Select City</option>';
                        while($row=$result->fetch_array()){
                            echo '<option value="'.$row['city'].'">'.$row['city'].'</option>';
                        }
                        echo '</select>';
                    }
                }
                else{
                    echo '<select id="city_select" name="city" disabled>';
                    echo '<option selected disabled>Select Country First</option>';
                    echo '</select>';
                }
                
                ?>
      
                </span>
                <img src="./assets/search_icon.png" style="background-color: #459E8D; border-radius: 7px; padding: 1em; vertical-align:middle; width: 2em; height: 2em; cursor: pointer;">
            </form>  
        </div> 
    </div>


</div>

    <div> <!-- Bigest container-->
        <div><!-- This div contain picture of the hotel, inline element-->
            <img src="" alt="">
        </div>
        <div><!--This div contain information-->
            <?php
                //Connect database
                require_once('connect.php');
                $country = $_GET['country'];
                $city = $_GET['city'];
                //Query
                $q = "SELECT HotelName, FullAddress FROM hotel WHERE City = $city AND Country = $country;";
                $result = $mysqli->query($q);
                echo "<h2>".$result['HotelName']."</h2>";
                echo $result['FullAddress'];
            ?>           
        </div>
        <div><!--This is the book now button section-->
            <button onclick="">Book Now!!!</button>
        </div>
        
    </div>
</body>

</html>