<?php
include 'headers.php';

$mysqli = new mysqli($host, $user, $pass, $base);

$json = file_get_contents('php://input');
$json = json_decode($json);


$day = filter_var($json->date->day, FILTER_SANITIZE_STRING);
$date = filter_var($json->date->date, FILTER_SANITIZE_NUMBER_INT);
$month = filter_var($json->date->month, FILTER_SANITIZE_STRING);
$year = filter_var($json->date->year, FILTER_SANITIZE_STRING);
$id_ejercicio = filter_var($json->id_ejercicio, FILTER_SANITIZE_NUMBER_INT);
$peso = filter_var($json->peso, FILTER_SANITIZE_NUMBER_INT);

$mysqli->query("insert into entrenamiento(id_ejercicio, peso, dia, fecha, mes, anio) 
    value ('$id_ejercicio', '$peso', '$day', '$date', '$month', '$year')  
");

?>