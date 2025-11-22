<?php

    function add_home_user($HOUserName, $HOFullName, $HOPassword){
        global $db;

        $query = 'INSERT INTO home_owner (HOUserName, HOFullName, HOPassword) VALUES ( :HOUserName, :HOFullName, :HOPassword)';

        $statement = $db -> prepare($query);
        $statement -> bindValue(':HOUserName',$HOUserName);
        $statement -> bindValue(':HOFullName',$HOFullName);
        $statement -> bindValue(':HOPassword',$HOPassword);
        $statement->execute();
        $statement->closeCursor();

    }

?>