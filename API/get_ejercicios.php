<?php
include 'headers.php';

$mysqli = new mysqli($host, $user, $pass, $base);
// $mysqli->query("drop table if exists entrenamiento");
$res = $mysqli->query("SELECT * 
FROM ejercicios E
JOIN musculos M
ON E.id_musculo = M.id");

// print_r (json_encode($res));

$rows = [];
while($row = $res->fetch_array(MYSQLI_ASSOC))
{
    $rows[]=$row;
}


echo json_encode($rows);
?>