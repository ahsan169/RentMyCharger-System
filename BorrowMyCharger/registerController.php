<?php 
        require('model/databaseCon.php');
        require('model/rentalUser.php');       
         require('model/homeOwner.php');


    
        $RUid = filter_input(INPUT_POST,'RUid', FILTER_VALIDATE_INT);
        $RUUserName = filter_input(INPUT_POST,'RUUserName', FILTER_SANITIZE_STRING);
        $RUFullName = filter_input(INPUT_POST,'RUFullName', FILTER_SANITIZE_STRING);
        $RUPassword = filter_input(INPUT_POST,'RUPassword', FILTER_SANITIZE_STRING);

        $HOUserName = filter_input(INPUT_POST,'HOUserName', FILTER_SANITIZE_STRING);
        $HOFullName = filter_input(INPUT_POST,'HOFullName', FILTER_SANITIZE_STRING);
        $HOPassword = filter_input(INPUT_POST,'HOPassword', FILTER_SANITIZE_STRING);


        $action = filter_input(INPUT_POST,'action', FILTER_SANITIZE_STRING);
        

        switch($action){
            case "insert_rental_user":
                add_rental_user($RUUserName, $RUFullName, $RUPassword);
                header("Location: view/rental_login.php");
                break;

        case "insert_home_owner":
                add_home_user($HOUserName, $HOFullName, $HOPassword);
                header("Location: view/home_login.php");
                break;

            default:
          
        }





?>


