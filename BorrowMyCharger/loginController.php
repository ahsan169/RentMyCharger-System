<?php
 require('model/databaseCon.php');
 require('model/loginRentalUser.php');
 require('model/loginHomeOwner.php');


 $RUUserName = filter_input(INPUT_POST,'RUUserName', FILTER_SANITIZE_STRING);
 $RUPassword = filter_input(INPUT_POST,'RUPassword', FILTER_SANITIZE_STRING);
 $HOUserName = filter_input(INPUT_POST,'HOUserName', FILTER_SANITIZE_STRING);
 $HOPassword = filter_input(INPUT_POST,'HOPassword', FILTER_SANITIZE_STRING);
  
 $action1 = filter_input(INPUT_POST,'action1', FILTER_SANITIZE_STRING);
  

    switch($action1){
    case "login_rental_user":
            loginRentalUser($RUUserName, $RUPassword);
            break;


    case "login_home_user":
            loginHomeOwner($HOUserName, $HOPassword);
            break;

    default:
           
    }

?>