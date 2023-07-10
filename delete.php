<?php

require_once 'connect.php';

$get = filter_input_array(INPUT_GET);
if (isset($get) && !empty($get)) {
    $id = $get['id'];
}

function delete_book($id) {
    global $conn;
    $query = ("DELETE FROM books WHERE id = $id");
    $statement = $conn->prepare($query);
    $statement->execute();
    header('Location: index.php');
}

delete_book($id);