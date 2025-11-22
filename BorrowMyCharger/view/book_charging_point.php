

<?php include('headerR.php');  ?>




<div style='

width: 100vw; height: 100%; min-height: 100vh;'>

<?php
session_start();
$RUid = $_SESSION['RUid'];
$Cid = $_GET['cid'];
$amount = $_GET['amount'];


?>

<script type="text/javascript">

  function getAmount(){
      var numberofkwh = document.getElementById('number_of_kwh').value;;
      var amount = <?php echo $amount; ?>;

      var subtotal = amount * numberofkwh;

      document.getElementById('total1').value = "$ " + subtotal;
      document.getElementById('total').value = "$ " + subtotal;
  }
  </script>


<div class="container-fluid pt-5">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h3 class="card-title text-center mb-5 fw-light fs-5">Make a Reservation</h3>
 
            <form action="../chargingPointController.php" method = "post"  >
            
              <input type="hidden" name="action2" value= "save_booking">
 
              <input type="hidden" name="charging_point_id" class="form-control" id="charging_point_id"  value="<?php echo $Cid; ?>" required>
              <input type="hidden" name="rental_user_id" class="form-control" id="rental_user_id"  value="<?php echo $RUid; ?>" required>



              <div class="form-floating mb-3">
        		<label for="reserved_date">Reservation Date</label>
        		<input type="date" name="reserved_date" class="form-control" id="reserved_date"  placeholder="Enter Reservation Date" required>
                
              </div>

              <div class="form-floating mb-3">
        		<label for="reserved_time">Reservation Time</label>
        		<input type="time" name="reserved_time" class="form-control" id="reserved_time"  placeholder="Enter Reservation Time" required>
                
              </div>
              
              <div class="form-floating mb-3">
        		<label for="number_of_kwh">Number of kWh Need</label>
        		<input type="number" name="number_of_kwh" class="form-control" id="number_of_kwh"  placeholder="Number of kWh Need" required onchange="getAmount()">
                
              </div>

              <hr>
              
              <div class="form-floating mb-3">
              <label for="total">Total Amount</label>
        	  <input type="text" name="total1" class="form-control" id="total1"  disabled >
              <input type="hidden" name="total" class="form-control" id="total" >

              </div>

            
		      <hr>
     
              <div class="d-grid">
                <button class="btn btn-primary text-uppercase fw-bold" id="register" type="submit">Make a Reservation</button>
                        
            
            </form>
                
             
              </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>



</div>

<?php include('footer.php'); ?> 