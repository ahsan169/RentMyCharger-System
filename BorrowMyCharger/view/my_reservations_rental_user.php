

<html>
  <head>
    <?php require('../model/rentalUser.php'); ?>
    <title>Borrow My Charger</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <style>

html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}

body::-webkit-scrollbar {
  height: 0.25rem;
  width: 0.25rem;
}

body::-webkit-scrollbar-track {
  background: #1e1e24;
}

body::-webkit-scrollbar-thumb {
  background: #0467e9;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="">Borrow My Charger<Small> Rental User</Small></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="select_charging_point.php?action2=list_charging_points">View | Reserver Charging Points</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="my_reservations_rental_user.php">My Reservations</a>
      </li>
      
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPuvy2-tcWQ0Wx6MrcjB6FBpH2tdagkvs&callback=initMap&v=weekly" async defer> </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/cardview.css">

            <?php
            session_start();
            $RUid = $_SESSION['RUid'];
            ?>
      
      <div class="container">
      
      <div class="my-4 pt-5" style="color: black; text-align: center; font-size: 50px;">My Reservations</div>

    
    </div>

    <div class="container-fluid">
     <div class="row">

    <?php 
     
     $reservations = list_reservations($RUid);
    if($reservations) { ?>
      <?php foreach ($reservations as $reservation) : ?>

        <div class="col-3 my-3">
     		    <div class="card h-100 ">
     			
     			    <div class="row">
                    <div class="card_text pl-5 p-2">
                      <h5 class="cardTitle">Rental ID : <?= $reservation['id'] ?></h5>
     		
                      <div class="cardtextBold">
                      Date : <div class="d-inline cardtextNormal">
                          <?= $reservation['reserved_date'] ?>
                      </div></div>
              	 

                      <div class="cardtextBold">
                      Time : <div class="d-inline cardtextNormal">
                          <?= $reservation['reserved_time'] ?>
                      </div></div>

                      <div class="cardtextBold">
                      Number of kWh : <div class="d-inline cardtextNormal">
                        <?= $reservation['number_of_kwh'] ?> kWh
                      </div></div>

                      <div class="cardtextBold">
                      Total Amount: <div class="d-inline cardtextNormal">
                        <?= $reservation['total'] ?>
                      </div></div>
     			 
     			        </div>
     		      </div>
            </div>
        </a>
     </div>

        <?php endforeach; ?>
    </section>
    <?php } else { ?>
    <p>No Reservations exist yet.</p>
    <?php } ?>



</div>


  </body>
</html>


