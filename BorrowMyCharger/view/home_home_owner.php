<?php include('headerH.php');  ?>

<link rel="stylesheet" href="css/cardview.css">

<div style='width: 100vw; height: 100%; min-height: 100vh;'>
<?php
session_start();
require('../model/rentalUser.php'); 
if(isset($_GET['error'])) {
        error();
}
if(isset($_GET['success'])) {
    success();
}

if(isset($_GET['booking'])) {
    booking();
}



function error(){
    echo "<div class='container p-3'><div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Sorry!</strong> You alredy have a charging point associated with your account.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button></div></div>";
}

function success(){
    echo "<div class='container p-3'><div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Congratulation!</strong> Your Charging Point is now available.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button></div></div>";
}

function booking(){
    echo "<div class='container p-3'><div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Congratulation!</strong> Your Reservation is Confirmed.
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button></div></div>";
}


?>
  
      <div class="container">
      
      <div class=" pt-5" style="color: white; text-align: center; font-size: 50px;">My Reservations</div>

    </div>

    <div class="container-fluid">
     <div class="row">

    <?php 
     

          
        $HOid = $_SESSION['HOid'];

     $reservations = list_home_owner_bookings($HOid);
    if($reservations) { ?>
      <?php foreach ($reservations as $reservation) : ?>

        <div class="col-3 my-3">
     		    <div class="card h-100 ">
     			
     			    <div class="row">
                    <div class="card_text pl-5 p-2">
                      <h5 class="cardTitle">Customer : <?= $reservation['HOFullName'] ?></h5>
     		

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



<?php include('footer.php'); ?> 