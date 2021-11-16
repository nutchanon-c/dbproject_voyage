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

        #view_hotel_info_button {
            background-color: #459E8D;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
        }

        .hotel_list_div {
            width: 100vh;
            display: inline-block;
            margin-top: 5em;
            margin-bottom: 1em;
            margin-left: 20em;
            display: block;
            justify-content: center;
            align-items: center;
        }

        .hotel_list_item {
            width: 100%;
            display: inline-block;
            margin-top: 1em;
            margin-bottom: 5em;
            margin-left: 5em;
            /* display: block; */

            /* flex-direction: column;
            justify-content: space-between;
            align-items: center; */
        }

        .hotel_list_item button {
            margin-left: 1em;
        }

        .hotel_list_item img {
            /* put to the left */
            float: left;
            width: 15em;
            height: 10em;
            margin-right: 1em;
            border-radius: 15px;
            margin-right: 5em;
            border: 1px solid #ddd;   
            object-fit: cover;
        }


        .hotel_list_item div{
            margin-left: 1em;
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
            if (isset($_GET['signin'])) {
                echo '<a href="home.php?signin=69"><img src="./assets/logo.png" width="150px" height="150px" style="cursor: pointer;"></a>';
            } else {
                echo '<a href="home.php"><img src="./assets/logo.png" width="150px" height="150px" style="cursor: pointer;"></a>';
            }
            ?>
            <span>
                <?php
                if (isset($_GET['signin'])) {
                    echo '<button type="submit" id="signin_button" onClick=document.location.href="profile.php?signin=69&user_id=' . $_SESSION['User_ID'] . '">' . $_SESSION['FirstName'] . '</button>';
                    // make sign out text
                    echo '<button type="submit" id="signout_button" onClick=document.location.href="logout.php?signin=69&user_id=' . $_SESSION['User_ID'] . '">Sign Out</button>';
                } else {
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

                    if(isset($_GET['country'])){
                        $_SESSION['country'] = $_GET['country'];
                    }
                    if(isset($_GET['city'])){
                        $_SESSION['city'] = $_GET['city'];
                    }

                    if(isset($_GET['signin'])){
                        echo '<form name="search_form" action="hotel_list.php?signin=69" method="GET">';
                    }
                    else{
                        echo '<form name="search_form" action="hotel_list.php" method="GET">';
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
                        
                        if (isset($_GET['country'])){
                            if($_GET['country']==$row['country']){
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
                if (isset($_GET['country'])){
                    $_SESSION['country'] = $_GET['country'];
                    require_once('connect.php');
                    $q = 'SELECT DISTINCT city FROM hotel WHERE country="'.$_GET['country'].'" ORDER BY city;';
                    if($result=$mysqli->query($q)){
                        echo '<select id="city_select" name="city" onchange="this.form.submit();">';
                        echo '<option selected disabled>Select City</option>';
                        while($row=$result->fetch_array()){
                            if (isset($_GET['city'])){
                                if($_GET['city']==$row['city']){
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
                // if(isset($_GET['signin'])){
                //     echo '<a href="hotel_list.php?signin=69&country='.$_SESSION['country'].'&city='.$_SESSION['city'].'"><img src="./assets/search_icon.png" style="background-color: #459E8D; border-radius: 7px; padding: 1em; vertical-align:middle; width: 2em; height: 2em; cursor: pointer;"></a>';
                //     }
                //     else{
                //         echo '<a href="hotel_list.php?country='.$_SESSION['country'].'&city='.$_SESSION['city'].'"><img src="./assets/search_icon.png" style="background-color: #459E8D; border-radius: 7px; padding: 1em; vertical-align:middle; width: 2em; height: 2em; cursor: pointer;"></a>';
                //     }
                    ?>
                </form>
        </div>
    </div>


    </div>

    <div class="hotel_list_div">
        <!-- Bigest container-->
        <div>
            <!-- This div contain picture of the hotel, inline element-->
            <img src="" alt="">
        </div>
        <div class="hotel_list_item_holder">
            <!--This div contain information-->
            <?php
            //Connect database
            require_once('connect.php');
            $country = $_SESSION['country'];
            $city = $_SESSION['city'];
            //Query
            $q = "SELECT Hotel_ID, HotelName, FullAddress, Picture FROM hotel WHERE City = '$city' AND Country = '$country';";
            if ($result = $mysqli->query($q)) {
                // echo $country;
                // echo $city;
                while ($row = $result->fetch_array()) {
                    // add hotel picture on the left
                    
                    echo '<div class="hotel_list_item">';
                    echo '<img src="./assets/hotels/' . $row['Picture'] . '" alt="">';
                    echo "<h2>" . $row['HotelName'] . "</h2>";
                    echo $row['FullAddress'];
                    echo '<div class="viewButton"';
                    if (isset($_GET['signin'])) {
                        // echo '<input type="submit" class="button" name="view_hotel_info" onClick=document.location.href="hotel_info.php?signin=69&hotel_id="'.$row['Hotel_ID'].' value="View"/>';
                        echo '<button type="submit" id="view_hotel_info_button" onClick=document.location.href="hotel_info.php?signin=69&hotel_id=' . $row['Hotel_ID'] . '">View</button>';
                    } else {
                        echo '<button type="submit" id="view_hotel_info_button" onClick=document.location.href="hotel_info.php?hotel_id=' . $row['Hotel_ID'] . '">View</button>';
                    }
                    echo '</div>';
                    echo '</div>';
                    
                }
            }

            ?>
        </div>
        <div>
            <!--This is the book now button section-->

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