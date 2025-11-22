<?php

    function add_charging_point($lat, $lng, $address, $price, $city, $home_owner_id){
        

        $conn = mysqli_connect('localhost','root','1234','borrowmycharger');

        $query1 = "SELECT * FROM charging_point WHERE home_owner_id = '{$home_owner_id}' LIMIT 1";
        
        $ShowResult = mysqli_query($conn, $query1);

        if($ShowResult){

            if(mysqli_num_rows($ShowResult) == 1){
                //alredy have a charging point
                header("Location: view/home_home_owner.php?error");
            }
            else{
  
                global $db;

                $query = 'INSERT INTO charging_point ( lat, lng, address, price, city, home_owner_id)  VALUES ( :lat, :lng, :address, :price, :city, :home_owner_id)';
            
                $statement = $db -> prepare($query);
                $statement -> bindValue(':lat',$lat);
                $statement -> bindValue(':lng',$lng);
                $statement -> bindValue(':address',$address);
                $statement -> bindValue(':price',$price);
                $statement -> bindValue(':city',$city);
                $statement -> bindValue(':home_owner_id',$home_owner_id);
                $statement->execute();
                $statement->closeCursor();
            
                header("Location: view/home_home_owner.php?success ");
  
            }
  
        }
    }


    function save_booking($charging_point_id, $rental_user_id, $reserved_date, $reserved_time, $number_of_kwh, $total) {
        
        global $db;

        $query = 'INSERT INTO bookings ( charging_point_id, rental_user_id, reserved_date, reserved_time, number_of_kwh, total)  VALUES ( :charging_point_id, :rental_user_id, :reserved_date, :reserved_time, :number_of_kwh, :total)';
    
        $statement = $db -> prepare($query);
        $statement -> bindValue(':charging_point_id',$charging_point_id);
        $statement -> bindValue(':rental_user_id',$rental_user_id);
        $statement -> bindValue(':reserved_date',$reserved_date);
        $statement -> bindValue(':reserved_time',$reserved_time);
        $statement -> bindValue(':number_of_kwh',$number_of_kwh);
        $statement -> bindValue(':total',$total);
        $statement->execute();
        $statement->closeCursor();
    
        header("Location: view/my_reservations_rental_user.php?booking ");
  
    }



    function list_locations($search) {
        $conn = mysqli_connect('localhost','root','1234','borrowmycharger');

        if($search == 0){
            $query1 = "SELECT * FROM charging_point, home_owner WHERE charging_point.home_owner_id = home_owner.HOid ORDER BY id";
        }else{
            $query1 = "SELECT * FROM charging_point c, home_owner h WHERE c.home_owner_id = h.HOid AND c.address LIKE '%$search%' OR c.city LIKE '%$search%' GROUP BY id";
        }
        $ShowResult = mysqli_query($conn, $query1);

        if($ShowResult){
          return $ShowResult;
        }

    }



?>
