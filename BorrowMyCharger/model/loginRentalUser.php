<?php
session_start();
 function loginRentalUser($RUUserName, $RUPassword){
      $conn = mysqli_connect('localhost','root','1234','borrowmycharger');

      $RUUserName_ = input_varify_($RUUserName);
      $RUPassword_ = input_varify_($RUPassword);


      $query1 = "SELECT * FROM rental_user WHERE RUUserName = '{$RUUserName_}' AND RUPassword = '{$RUPassword_}' LIMIT 1";
      $ShowResult = mysqli_query($conn, $query1);

      if($ShowResult){

          if(mysqli_num_rows($ShowResult) == 1){

              $user = mysqli_fetch_assoc($ShowResult);
              $_SESSION['RUid'] = $user['RUid'];
              header("Location: view/select_charging_point.php");
          }
          else{

            header("Location: view/index.php?error");
              

          }

      }

  }


  // protect from sql injection and XSS
  function input_varify_($data){

    //Remove empty space from user input
    $data = trim($data);

    //Remove back slash from user input
    $data  = stripslashes($data);

    //convert special chars to html entities
    $data = htmlspecialchars($data);

    return $data;
  }
?>