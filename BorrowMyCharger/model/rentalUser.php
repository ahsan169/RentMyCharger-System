<?php

    function add_rental_user($RUUserName, $RUFullName, $RUPassword){
        global $db;

        $query = 'INSERT INTO rental_user (RUUserName, RUFullName, RUPassword) VALUES ( :RUUserName, :RUFullName, :RUPassword)';

        $statement = $db -> prepare($query);
        $statement -> bindValue(':RUUserName',$RUUserName);
        $statement -> bindValue(':RUFullName',$RUFullName);
        $statement -> bindValue(':RUPassword',$RUPassword);
        $statement->execute();
        $statement->closeCursor();

    }


    function list_reservations($RUid) {
        $conn = mysqli_connect('localhost','root','1234','borrowmycharger');

        
        $query1 = "SELECT * FROM bookings b, rental_user r WHERE b.rental_user_id = r.RUid AND r.RUid = '$RUid'";
        
        $ShowResult = mysqli_query($conn, $query1);

        if($ShowResult){
          return $ShowResult;
        }

    }


    function list_home_owner_bookings($HOid) {
        $conn = mysqli_connect('localhost','root','1234','borrowmycharger');

        
        $query1 = "SELECT * FROM bookings b inner join charging_point c on b.charging_point_id = c.id  inner join home_owner h on c.home_owner_id = h.HOid WHERE h.HOid ='$HOid' ";
        
        $ShowResult = mysqli_query($conn, $query1);

        if($ShowResult){
          return $ShowResult;
        }

    }




?>