<?php
session_start();
  function loginHomeOwner($HOUserName, $HOPassword){
    
      $HOUserName_ = input_varify($HOUserName);
      $HOPassword_ = input_varify($HOPassword);

      $conn = mysqli_connect('localhost','root','1234','borrowmycharger');

      $query1 = "SELECT * FROM home_owner WHERE HOUserName = '{$HOUserName_}' AND HOPassword = '{$HOPassword_}' LIMIT 1";
      $ShowResult = mysqli_query($conn, $query1);

      if($ShowResult){

          if(mysqli_num_rows($ShowResult) == 1){

              $user = mysqli_fetch_assoc($ShowResult);
              $_SESSION['HOid'] = $user['HOid'];
              header("Location: view/home_home_owner.php");
          }
          else{

            header("Location: view/index.php?error");
              

          }

      }

  }

   // protect from sql injection and XSS
   function input_varify($data){

    //Remove empty space from user input
    $data = trim($data);

    //Remove back slash from user input
    $data  = stripslashes($data);

    //convert special chars to html entities
    $data = htmlspecialchars($data);

    return $data;
}

  
?>