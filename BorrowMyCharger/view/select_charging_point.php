  <html>

  <head>
    <?php require('../model/chargingPoint.php'); ?>
    <title>Borrow My Charger</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <style>
      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #F5F5F5;
      }

      #map {
        height: 100%;
      }

      body::-webkit-scrollbar {
        height: 0.25rem;
        width: 0.25rem;
      }

      /* body::-webkit-scrollbar-track {
        background: #1e1e24;
      }

      body::-webkit-scrollbar-thumb {
        background: #0467e9;
      } */

      .load-more-btn {
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        padding: 10px 40px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
        align-self: center;
      }

      .load-more-btn:hover {
        background-color: #0056b3;
      }
    </style>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->

  <body>
    <?php
    function get_IP_address()
    {

      foreach (array(
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'HTTP_X_FORWARDED',
        'HTTP_X_CLUSTER_CLIENT_IP',
        'HTTP_FORWARDED_FOR',
        'REMOTE_ADDR'
      ) as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
          foreach (explode(',', $_SERVER[$key]) as $IPaddress) {
            $IPaddress = trim($IPaddress);

            if (
              filter_var(
                $IPaddress,
                FILTER_VALIDATE_IP,
                FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
              )
              !== false
            ) {

              return $IPaddress;
            }
          }
        }
      }
    }
    $ip = get_IP_address();
    $loc = file_get_contents("http://ip-api.com/json/$ip");
    $data = json_decode($loc);
    $lat = $data->lat;
    $lng = $data->lon;


    ?>
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
        margin: 2em;
      }

      html,
      body {
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

      $search = 0;

      ?>

      var map;
      var red_icon = 'img/icon_.png';


      function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
          center: {
            lat: <?php echo $lat; ?>,
            lng: <?php echo $lng; ?>
          },
          zoom: 14,
        });

        <?php

        $locations = list_locations($search);

        if ($locations) {
          foreach ($locations as $location) :
        ?>

            addMaker({
              lat: <?= $location['lat']; ?>,
              lng: <?= $location['lng']; ?>
            });

        <?php endforeach;
        }

        ?>

      }

      function addMaker(position_) {
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
      <form action="search_charging_point.php" method="post">
        <div class="input-group">
          <input type="text" name="searchText" class="form-control d-inline" id="searchText" placeholder="Enter Search">
          <button class="btn d-inline btn-primary text-uppercase fw-bold " type="submit">Search</button>

        </div>
      </form>


    </div>

    <?php
    $charging_points_result = list_locations($search);
    $charging_points = $charging_points_result->fetch_all(MYSQLI_ASSOC);
    $items_per_page = 100;
    $total_items = count($charging_points);
    $total_pages = ceil($total_items / $items_per_page);

    function display_charging_points($charging_points, $page, $items_per_page)
    {
      $start = ($page - 1) * $items_per_page;
      $end = min($start + $items_per_page, count($charging_points));
      for ($i = $start; $i < $end; $i++) {
        $charging_point = $charging_points[$i];
    ?>
        <div class="col-3 my-3">
          <a href="book_charging_point.php?cid=<?= $charging_point['id'] ?>&amount=<?= $charging_point['price'] ?>" style="text-decoration: none; color: black;">
            <div class="card h-100 ">

              <div class="row">
                <div class="card_text pl-5 p-2">
                  <h5 class="cardTitle"><?= $charging_point['city'] ?></h5>

                  <div class="cardtextBold">
                    Owner : <div class="d-inline cardtextNormal">
                      <?= $charging_point['HOFullName'] ?>
                    </div>
                  </div>

                  <div class="cardtextBold">
                    Address : <div class="d-inline cardtextNormal">
                      <?= $charging_point['address'] ?>
                    </div>
                  </div>

                  <div class="cardtextBold">
                    Price : <div class="d-inline cardtextNormal">
                      <?= $charging_point['price'] ?> kWh
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </a>
        </div>
    <?php
      }
    }
    ?>

    <div class="row" id="charging_points_container">
      <?php display_charging_points($charging_points, 1, $items_per_page); ?>
    </div>

    <div class="text-center">
      <button id="load_more_button" class="load-more-btn" data-page="1" data-total-pages="<?= $total_pages ?>">Load more</button>
    </div>


    <script>
      document.getElementById('load_more_button').addEventListener('click', function() {
        var button = this;
        var page = parseInt(button.getAttribute('data-page')) + 1;
        var totalPages = parseInt(button.getAttribute('data-total-pages'));

        if (page > totalPages) {
          button.style.display = 'none';
          return;
        }

        fetch('load_more_charging_points.php?page=' + page)
          .then(response => response.text())
          .then(html => {
            var chargingPointsContainer = document.getElementById('charging_points_container');
            chargingPointsContainer.innerHTML += html;
            button.setAttribute('data-page', page);

            if (page >= totalPages) {
              button.style.display = 'none';
            }
          });
      });
    </script>


  </body>

  </html>