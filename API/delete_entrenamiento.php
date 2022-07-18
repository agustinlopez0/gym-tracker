<?php
include 'headers.php';

$mysqli = new mysqli($host, $user, $pass, $base);
$res = $mysqli->query("SELECT N.id, N.id_ejercicio, N.peso, N.dia, N.fecha, N.mes, N.anio, N.id_ejercicio, J.nombre_ejercicio, J.id_musculo, M.nombre_musculo
FROM entrenamiento N
JOIN ejercicios J ON J.id = N.id_ejercicio
JOIN musculos M ON M.id = J.id_musculo");


$rows = [];
while($row = $res->fetch_array(MYSQLI_ASSOC))
{
    $rows[]=$row;
}
echo json_encode($rows);
?>