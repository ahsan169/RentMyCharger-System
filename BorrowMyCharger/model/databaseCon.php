<?php
	//connect to database
    $dsn = 'mysql:host=localhost; dbname=borrowmycharger';
    $username = 'root';
    $password = '1234';

    try {

        $db = new PDO($dsn,$username,$password) ;

    }catch (PDOEXception $e) {
        $error = "Database Error: ";
        exit();
    }
    

    // Opens a connection to a MySQL server.


        $connection=mysqli_connect ("localhost", 'root', '1234','borrowmycharger');
        //echo "Connecting to MySQL server...";
        if (!$connection) {
            die('Not connected : ' . mysqli_connect_error());
        }


?> 

