<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow My Charger</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <style>
    body {
      background-color: #F5F5F5;
    }
    #registerHome {
      border-color: #12143D;  
      color:#12143D;
    }
    #registerHome:hover {
      border-color: #12143D;  
      background-color: #12143D;
      color:whitesmoke;
    }
    #register {
      background-color: #12143D;
      color:white;
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
    #RUPassword, #RUUserName, #RUFullName {
      border:none;
      border-bottom: 1px solid #DADADA;
      width: 300px;
      border-radius: 0px;
    }
    .container-fluid {
      border:1px solid black;
      width: 1920px;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .form-floating {
      width: auto;
    }

    .form{
      width: 500px;
      margin-left: -60px;
    }
  </style>
  </head>
    

<body style='width: 60vw; height: 100%; min-height: 100vh;'>


<div class="container-fluid pt-5">
    <div class="row">
    <div class="card border-0 shadow rounded-3 my-5 form">
      <IMG SRC="img/register.gif" style="width: 500px; height:480px; padding-top:50px;"></div>
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5 form">
          <div class="card-body p-4 p-sm-5">
            <h3 class="card-title text-center mb-5 fw-light fs-5">Register Rental User</h3>
 
            <form action="../registerController.php" method = "post" id="add_rental_form" class="add_rental_form" >
            <input type="hidden" name="action" value= "insert_rental_user">
 
              <div class="form-floating mb-4">
       
        		<input type="text" name="RUFullName" class="form-control" id="RUFullName" placeholder="Enter Full Name" required>
                
              </div>
              
              
              <div class="form-floating mb-4">
    
        	  <input type="text" name="RUUserName" class="form-control" id="RUUserName"  placeholder="Enter User Name" required>
                
              </div>
              
              
			<div class="form-floating mb-4">

        		<input type="password" name="RUPassword" class="form-control" id="RUPassword"  placeholder="Enter Password" required>

              </div>
             

		      <hr>
            
              <div class="d-grid">
                <button class="btn btn-primary text-uppercase fw-bold" id="register" type="submit">Register</button>
                <input type="button" id="registerHome" value="Register As Home Owner" class="btn btn-outline-primary text-uppercase fw-bold" onClick="window.location = 'register_home_owner.php'" />

                <hr>

              <input type="button" id="login" value="Already a User? Login!" class="btn btn-warning fw-bold" onClick="window.location = 'rental_login.php'" />
              </div>
            </form>
            
             
          </div>
        </div>
      </div>
    </div>
  </div>


  </body>
</html>