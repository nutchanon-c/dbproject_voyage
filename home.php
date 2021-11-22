<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyage</title>
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    require_once('connect.php');
                    $q = 'SELECT DISTINCT city FROM hotel WHERE country="'.$_POST['country'].'" ORDER BY city;';
                    if($result=$mysqli->query($q)){
                        echo '<select id="city_select" name="city" onchange="this.form.submit();">';
                        echo '<option selected disabled>Select City</option>';
                        while($row=$result->fetch_array()){
                            if (isset($_POST['city'])){
                                if($_POST['city']==$row['city']){
                                    echo '<option selected value="'.$row['city'].'">'.$row['city'].'</option>';
                                }
                                else{
                                    echo '<option value="'.$row['city'].'">'.$row['city'].'</option>';
                                }
                            }
                            else{
                                echo '<option value="'.$row['city'].'">'.$row['city'].'</option>';
                            }
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
                <?php
                // echo '<a href="hotel_list.php?country="'.$_SESSION['country'].'&city='.$_SESSION['city'].'><img src="./assets/search_icon.png" style="background-color: #459E8D; border-radius: 7px; padding: 1em; vertical-align:middle; width: 2em; height: 2em; cursor: pointer;"></a>';
                if(isset($_POST['city'])){
                    $_SESSION['city'] = $_POST['city'];
                    // create button that submits the value of country and city to hotel_list.php and signin=69
                    if(isset($_GET['signin'])){
                    echo '<a href="hotel_list.php?signin=69&country='.$_SESSION['country'].'&city='.$_SESSION['city'].'"><img src="./assets/search_icon.png" style="background-color: #459E8D; border-radius: 7px; padding: 1em; vertical-align:middle; width: 2em; height: 2em; cursor: pointer;"></a>';
                    }
                    else{
                        echo '<a href="hotel_list.php?country='.$_SESSION['country'].'&city='.$_SESSION['city'].'"><img src="./assets/search_icon.png" style="background-color: #459E8D; border-radius: 7px; padding: 1em; vertical-align:middle; width: 2em; height: 2em; cursor: pointer;"></a>';
                    }

                    // echo '<a href="hotel_list.php?country='.$_SESSION['country'].'&city='.$_SESSION['city'].'"><img src="./assets/search_icon.png" style="background-color: #459E8D; border-radius: 7px; padding: 1em; vertical-align:middle; width: 2em; height: 2em; cursor: pointer;"></a>';
                }
                ?>
                 
            </form>  
        </div> 
    </div>
<div class="recommended-holder">
    <h3 style="font-size: 24px;">Recommended Places</h3>

    <table id="recommended_places_table">
        <tr>
            <td>
                <?php
                    if(isset($_GET['signin'])){ echo '<a href="hotel_list.php?signin=69&country=Thailand&city=Bangkok"><img src="./assets/bkk.png"></a>';}
                    else{ echo '<a href="hotel_list.php?country=Thailand&city=Bangkok"><img src="./assets/bkk.png"></a>';}
                ?>
                <!-- <img src="./assets/bkk.png"> -->
            </td>
            <td>
                <?php
                    if(isset($_GET['signin'])){ echo '<a href="hotel_list.php?signin=69&country=United+Kingdom&city=London"><img src="./assets/london.png"></a>';}
                    else{ echo '<a href="hotel_list.php?country=United+Kingdom&city=London"><img src="./assets/london.png"></a>';}
                ?>
                <!-- <img src="./assets/london.png"> -->
            </td>
            <td>
                <?php
                    if(isset($_GET['signin'])){ echo '<a href="hotel_list.php?signin=69&country=United%20States&city=Chicago(IL)"><img src="./assets/chicago.png"></a>';}
                    else{ echo '<a href="hotel_list.php?country=United%20States&city=Chicago(IL)"><img src="./assets/chicago.png"></a>';}
                ?>
                <!-- <img src="./assets/chicago.png"> -->
            </td>
            <td>
                <?php
                    if(isset($_GET['signin'])){ echo '<a href="hotel_list.php?signin=69&country=United%20States&city=Los%20Angeles(CA)"><img src="./assets/la.png"></a>';}
                    else{ echo '<a href="hotel_list.php?country=United%20States&city=Los%20Angeles(CA)"><img src="./assets/la.png"></a>';}
                ?>
                <!-- <img src="./assets/la.png"> -->
            </td>
            <td>
                <?php
                    if(isset($_GET['signin'])){ echo '<a href="hotel_list.php?signin=69&country=Japan&city=Tokyo"><img src="./assets/tokyo.png"></a>';}
                    else{ echo '<a href="hotel_list.php?country=Japan&city=Tokyo"><img src="./assets/tokyo.png"></a>';}
                ?>
                <!-- <img src="./assets/tokyo.png"> -->
            </td>
            <td>
                <?php
                    if(isset($_GET['signin'])){ echo '<a href="hotel_list.php?signin=69&country=Japan&city=Osaka"><img src="./assets/osaka.png"></a>';}
                    else{ echo '<a href="hotel_list.php?country=Japan&city=Osaka"><img src="./assets/osaka.png"></a>';}
                ?>
                <!-- <img src="./assets/osaka.png"> -->
            </td>
        </tr>
        <tr id="recommended-places-names">
            <td>
                Bangkok, Thailand
            </td>
            <td>
                London, UK
            </td>
            <td>
                Chicago, USA
            </td>
            <td>
                Los Angeles, USA
            </td>
            <td>
                Tokyo, Japan
            </td>
            <td>
                Osaka, Japan
            </td>
        </tr>
    </table>

    <div class="placeholder">

    </div>
</div>
</body>

</html>