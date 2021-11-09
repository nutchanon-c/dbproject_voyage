<?php 

session_start();

require_once("connect.php");

        //Retrive username and password using POST method
        $uname = $_POST['username'];
        $pass = $_POST['password'];
        //Query to find the data that match the username and password given.
        $q = "SELECT User_ID, Username, Password, FirstName FROM user WHERE Username='$uname' AND Password='$pass'";
        //Execute the query command.
        $result = $mysqli->query($q);
        //Check if the combination of username and password is exist.
        if ($result->num_rows === 1) {

            $row = $result->fetch_array();
            //Record the userID of the user into the session.
            $_SESSION['User_ID'] = $row['User_ID'];
            $_SESSION['FirstName'] = $row['FirstName'];
            //Redirect the user into the new page (User information page)
            header("Location: home.php?signin=69");
            //Exit the command
            exit();

        }else{
            //Display the error massage into the index page.
            header("Location: login.php?signin=deny");
            exit();
        }


    
?>
