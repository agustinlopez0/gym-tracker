<?php
include "variables.inc";

$mysqli = new mysqli($host, $user, $pass, $base);
// $mysqli->query("drop table if exists entrenamiento");
$res = $mysqli->query("select * from entrenamiento");

// print_r (json_encode($res));

$rows = [];
while($row = $res->fetch_array(MYSQLI_ASSOC))
{
    $rows[]=$row;
}
echo json_encode($rows);
?>