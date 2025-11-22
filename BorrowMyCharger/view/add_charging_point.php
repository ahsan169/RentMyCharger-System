<?php include('headerH.php');  ?>




<div style='

width: 100vw; height: 100%; min-height: 100vh;'>

<?php
session_start();
?>

<script type="text/javascript">

  function getCorordinates(){
      var address = document.getElementById('address').value;
      var url = "http://api.positionstack.com/v1/forward?access_key=7c3f0ae8f37d7f71e7e6b9f9d81a3958&query="+ address ;
      var xmlHttp = new XMLHttpRequest();
      xmlHttp.open('GET', url, false);
      xmlHttp.send(null);

      var json = JSON.parse(xmlHttp.responseText);
      console.log(json.data[0].latitude);

      document.getElementById('lat').value = json.data[0].latitude;
      document.getElementById('lat1').value = json.data[0].latitude;

      document.getElementById('lng').value = json.data[0].longitude;
      document.getElementById('lng1').value = json.data[0].longitude;

  }
  </script>

<div class="container-fluid pt-5">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0 shadow rounded-3 my-5">
          <div class="card-body p-4 p-sm-5">
            <h3 class="card-title text-center mb-5 fw-light fs-5">Add Charging Point</h3>
 
            <form action="../chargingPointController.php" method = "post"  >
            <input type="hidden" name="action2" value= "add_charging_point">
 
              <div class="form-floating mb-3">
        		<label for="address">Address</label>
        		<input type="text" name="address" class="form-control" id="address"  placeholder="Enter Address" required onchange="getCorordinates()">
                
              </div>

              <div class="form-floating mb-3">
        		<label for="city">City</label>
        		<input type="text" name="city" class="form-control" id="city"  placeholder="Enter City" required>
                
              </div>
              
              <div class="form-floating mb-3">
        		<label for="price">Price (kWh)</label>
        		<input type="number" name="price" class="form-control" id="price"  placeholder="Enter Price (kWh)" required>
                
              </div>

              <input type="hidden" name="home_owner_id" class="form-control" id="home_owner_id"  value="<?php echo $HOid; ?>" required>


              <hr>
              
              <div class="form-floating mb-3">
              <label for="lat">Latitude</label>
        	  <input type="text" name="lat" class="form-control" id="lat1"  disabled >
              <input type="hidden" name="lat" class="form-control" id="lat" >

              </div>
              
              
			<div class="form-floating mb-3">
			     <label for="lng">Longitude</label>
        		<input type="text"  name="lng" class="form-control" id="lng1"  disabled>
        		<input type="hidden"  name="lng" class="form-control" id="lng"  >

              </div>
            
		      <hr>
     
              <div class="d-grid">
                <button class="btn btn-primary text-uppercase fw-bold" id="register" type="submit">Add Charging Point</button>
                        
            
            </form>
                
             
              </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>



</div>

<?php include('footer.php'); ?> 