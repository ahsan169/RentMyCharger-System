<html>
  <head>
    <?php require('../model/chargingPoint.php'); ?>
    <title>Borrow My Charger</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <style>

html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}
#map {
    height: 100%;
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

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->

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

<style>
  #map {
    height: 50%;
    margin:2em ;

  }
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }
</style>  
  
<!-- <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPuvy2-tcWQ0Wx6MrcjB6FBpH2tdagkvs&callback=initMap"> -->
</script>
      

<div class="container-fluid">
      <div id="map"></div>
</div>
  
  <script>

        <?php  
          
         $search =  filter_input(INPUT_POST,'searchText', FILTER_SANITIZE_STRING);
          
       ?>

      var map;
      var red_icon = 'img/icon_.png';

      <?php 
       $mapCenter = list_locations($search);
       $locationA = $mapCenter->fetch_all(MYSQLI_ASSOC);
      // echo "<script>console.log('PHP: ".$locationA['lat']."');</script>";
      $lat1 = 55.378052;
      $lng1 = -3.435973;

      if($locationA){
        $locationAB = $locationA[0];
        $lat1 = $locationAB['lat'];
        $lng1 = $locationAB['lng'];
      }
        //echo "<script>console.log('PHP: ".$lat."');</script>";
       ?>

      function initMap(){
        map = new google.maps.Map(document.getElementById("map"), {
          center: {
            lat: <?php echo $lat1; ?>,
            lng: <?php echo $lng1; ?>
          },
            zoom: 7,
        });
     
       <?php 
       
        $locations = list_locations($search);
        
        if($locations) { 
        foreach ($locations as $location) :
        ?>

          addMaker({lat:<?= $location['lat']; ?> , lng:<?= $location['lng']; ?>  });
          
        <?php endforeach; }

        ?>
       
        }

        function addMaker(position_){
            var maker = new google.maps.Marker({
            position: position_,
            map: map,
            icon: red_icon,
        });
  
      }
     



    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPuvy2-tcWQ0Wx6MrcjB6FBpH2tdagkvs&callback=initMap&v=weekly" async defer> </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/cardview.css">

  
      
      <div class="container">
      
      <div class="my-4 pt-5" style="color: black; text-align: center; font-size: 50px;">Available Charging Points</div>
      <form action="search_charging_point.php" method = "post"  >
      <div class="input-group">
        		<input type="text" name="searchText" class="form-control d-inline" id="searchText"  placeholder="Enter Search">
            <button class="btn d-inline btn-primary text-uppercase fw-bold " type="submit">Search</button>
     
      </div>
    </form>

    
    </div>

    <div class="container-fluid">
     <div class="row">

    <?php 
     
     $charging_points = list_locations($search);
    if($charging_points) { ?>
      <?php foreach ($charging_points as $charging_point) : ?>


        <div class="col-3 my-3">
     	    <a href="book_charging_point.php?cid=<?= $charging_point['id'] ?>&amount=<?= $charging_point['price'] ?>" style="text-decoration: none; color: black;">
     		    <div class="card h-100 ">
     			
     			    <div class="row">
                    <div class="card_text pl-5 p-2">
                      <h5 class="cardTitle"><?= $charging_point['city'] ?></h5>
     		
                      <div class="cardtextBold">
                      Owner : <div class="d-inline cardtextNormal">
                          <?= $charging_point['HOFullName'] ?>
                      </div></div>
              	 

                      <div class="cardtextBold">
                      Address : <div class="d-inline cardtextNormal">
                          <?= $charging_point['address'] ?>
                      </div></div>

                      <div class="cardtextBold">
                      Price : <div class="d-inline cardtextNormal">
                        <?= $charging_point['price'] ?> kWh
                      </div></div>
     			 
     			        </div>
     		      </div>
            </div>
        </a>
     </div>

        <?php endforeach; ?>
    </section>
    <?php } else { ?>
    <p>No Charging Points exist yet.</p>
    <?php } ?>



</div>


  </body>
</html>


