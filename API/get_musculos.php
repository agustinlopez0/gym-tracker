<?php
include 'headers.php';

$mysqli = new mysqli($host, $user, $pass, $base);
$res = $mysqli->query("select * from musculos");


$rows = [];
while($row = $res->fetch_array(MYSQLI_ASSOC))
{
    $rows[]=$row;
}
echo json_encode($rows);
?>