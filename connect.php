<?php
$host = 'localhost';
$dbname = 'library';
$username = 'root';
$password = '';

function _connect($host, $dbname, $username, $password) {
    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage() . "<br>";
        die();
    }
}

$conn = _connect($host, $dbname, $username, $password);
?>
