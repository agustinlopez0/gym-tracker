<?php
include 'headers.php';

$mysqli = new mysqli($host, $user, $pass, $base);

$json = file_get_contents('php://input');
$json = json_decode($json);


$id = filter_var($json->id, FILTER_SANITIZE_NUMBER_INT);

if(!$mysqli->query("DELETE FROM entrenamiento WHERE id = $id;")){
    die("ERROR");
}

echo(":)");

?>