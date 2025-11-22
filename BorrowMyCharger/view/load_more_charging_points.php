<?php
    require('../model/chargingPoint.php');
    require_once '../model/databaseCon.php';

    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $items_per_page = 100;
    $search = 0;
    $charging_points_result = list_locations($search);
    $charging_points = $charging_points_result->fetch_all(MYSQLI_ASSOC);
    display_charging_points($charging_points, $page, $items_per_page);

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
?>
