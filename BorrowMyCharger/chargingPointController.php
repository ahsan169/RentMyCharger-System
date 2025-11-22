
<?php
        require('model/databaseCon.php');
        require('model/chargingPoint.php');

        $lat = filter_input(INPUT_POST,'lat', FILTER_SANITIZE_STRING);
        $lng = filter_input(INPUT_POST,'lng', FILTER_SANITIZE_STRING);
        $address = filter_input(INPUT_POST,'address', FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST,'price', FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_POST,'city', FILTER_SANITIZE_STRING);
        $home_owner_id = filter_input(INPUT_POST,'home_owner_id', FILTER_SANITIZE_STRING);


        $charging_point_id = filter_input(INPUT_POST,'charging_point_id', FILTER_SANITIZE_STRING);
        $rental_user_id = filter_input(INPUT_POST,'rental_user_id', FILTER_SANITIZE_STRING);
        $reserved_date = filter_input(INPUT_POST,'reserved_date', FILTER_SANITIZE_STRING);
        $reserved_time = filter_input(INPUT_POST,'reserved_time', FILTER_SANITIZE_STRING);
        $number_of_kwh = filter_input(INPUT_POST,'number_of_kwh', FILTER_SANITIZE_STRING);
        $total = filter_input(INPUT_POST,'total', FILTER_SANITIZE_STRING);


        $action2 = filter_input(INPUT_POST,'action2', FILTER_SANITIZE_STRING);

        switch($action2){
            case "add_charging_point":
                add_charging_point($lat, $lng, $address, $price, $city, $home_owner_id);
                break;

            case "list_charging_points" :
                $charging_points = list_locations();
                include('view/select_charging_point.php');
                break;

            case "save_booking":
                save_booking($charging_point_id, $rental_user_id, $reserved_date, $reserved_time, $number_of_kwh, $total);
                break;
            
            default:
                
        }



?>
