<?php

$query = ("SELECT * FROM books");
    $statement = $conn->prepare($query);
    $statement->execute();
    $books = $statement->fetchAll(PDO::FETCH_ASSOC);