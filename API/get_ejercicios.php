<?php
include 'headers.php';

$mysqli = new mysqli($host, $user, $pass, $base);
$res = $mysqli->query("SELECT E.id, E.nombre_ejercicio, E.id_musculo, M.nombre_musculo
FROM ejercicios E
JOIN musculos M
ON E.id_musculo = M.id");


$rows = [];
while($row = $res->fetch_array(MYSQLI_ASSOC))
{
    $rows[]=$row;
}


echo json_encode($rows);
?>