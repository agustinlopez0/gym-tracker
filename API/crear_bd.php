<?php 
include "variables.inc";

$mysqli = new mysqli($host, $user, $pass, $base);
// $mysqli->query("drop table if exists entrenamiento");
$mysqli->query("drop table if exists ejercicios");
$mysqli->query("drop table if exists pesos");
$mysqli->query("drop table if exists musculos");




$mysqli->query("create table if not exists musculos (
	id		            int not null primary key auto_increment,
	nombre_musculo	    varchar(60)
)");

$mysqli->query("create table if not exists ejercicios (
	id		            int not null primary key auto_increment,
	nombre_ejercicio	varchar(60),
    id_musculo          int,
    FOREIGN KEY (id_musculo) REFERENCES musculos(id)
)");

$mysqli->query("create table if not exists pesos (
	id		int not null primary key auto_increment,
	peso	int not null
)");

$mysqli->query("create table if not exists entrenamiento (
	id		        int not null primary key auto_increment,
	id_ejercicio	int,
	id_peso	        int,
    fecha           varchar(60),
    fecha_sql       date,
    FOREIGN KEY (id_ejercicio) REFERENCES ejercicios(id),
    FOREIGN KEY (id_peso) REFERENCES pesos(id)
)");

for($i = 4; $i <= 100; $i++){
    if($i <= 10){
        $mysqli->query("insert into pesos(peso) value (".$i.")");       
    } else {
        if($i % 5 == 0){
            $mysqli->query("insert into pesos(peso) value (".$i.")");       
        }
    }
}



$mysqli->query("insert into musculos(nombre_musculo) 
    values  ('Cuádriceps'),
            ('Isquitibiales'),
            ('Glúteos'),
            ('Pantorrillas'),
            ('Aductor'),
            ('Abductor'),
            ('Pecho'),
            ('Dorsal'),
            ('Trapecio'),
            ('Hombros'),
            ('Bíceps'),
            ('Tríceps'),
            ('Abdominales')
");

$mysqli->query("insert into ejercicios(nombre_ejercicio, id_musculo)
    values  ('Sentadilla', 1),
            ('Prensa', 1),
            ('Subida al cajón', 1),
            ('Cuadricera', 1),
            ('Peso muerto', 2),
            ('Camilla atrás', 2),
            ('Buenos días barra', 2),
            ('Elevación de cadera', 3),
            ('Estocada atrás', 3),
            ('Pecho plano barra', 6),
            ('Polea adelante', 7),
            ('Remo con barra', 7),
            ('Serrucho', 7),
            ('Trapecio con barra', 8),
            ('Vuelo adelante', 9),
            ('Vuelo lateral', 9),
            ('Press con barra', 9),
            ('Bíceps + press', 9),
            ('Mancuernas alternado', 10),
            ('Polea', 11),
            ('Patada de burro', 11)


")

//  $mysqli->query("insert into ejercicios(nombre_ejercicio) 
//     value (".$i.")");       




?>
