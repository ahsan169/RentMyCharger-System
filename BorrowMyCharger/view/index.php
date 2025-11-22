<?php
    if(isset($_GET['error'])) {
        error();
    }
   
?>
<html>
   
   <head>
      <title>Login Page</title>
      <link rel="stylesheet" type="text/css" href="css/cardview.css" />
      <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <style>

        #registerHome {
      border-color: #12143D;  
      color:#12143D;
      margin-top: -15px;
      background-color: whitesmoke;
    }
    #registerHome:hover {
      border-color: #12143D;  
    }
    #register {
      background-color: #12143D;
      color:white;
      margin-top: -15px;
      border-color: #12143D;
    }
    #login {
      background-color: white;
      border: none;  
      color:#12143D;
      border-bottom: 1px solid #12143D;
      border-radius: 0px;
      padding-left: 0px;
      padding-right: 0px;
      padding-bottom: 0px;
    }
      </style>
   </head>
   
   <body style='background-color: whitesmoke '>

      <div class="contact">
  <h2 class="contact-title">
    Borrow My Charger <br>At Most Affordable Prices</br>
  </h2>
  
  <div class="contact-form" style="background-color: #12143D;">
      <!-- add a map image vector style  -->
      
      <img src="img/map.jpg" alt="map" style="width: 100%; height: 100%; border-radius: 20px;">
      <!-- <button class='button-dark'>Login As  Owner </button>
      <button class="button-dark">Login As Tenant </button> -->
      <button class="btn btn-primary  text-uppercase fw-bold" id="register" onClick="window.location = 'register_home_owner.php'">I Have a Charger!</button>
      <input type="button" value="Can I Borrow?" id="registerHome" class="btn btn-outline-primary text-uppercase fw-bold" onClick="window.location = 'register_rental_user.php'" />
  </div>
</div>

</body>
</html>