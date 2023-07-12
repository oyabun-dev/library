<?php

require_once 'connect.php';
    for ($i=1; $i <=14; $i++) { 
        $id = $i;
        $query = ('UPDATE books SET cover = " img/cover_'. $id . '.jpg" WHERE id =' . $id);
        // var_dump($query);
        // exit;
        try {
            $statement = $conn->prepare($query);
            $statement->execute();
            var_dump($statement->fetch(PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }