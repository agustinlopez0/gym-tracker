<?php 
include "variables.inc";

$mysqli = new mysqli($host, $user, $pass, $base);
$mysqli->query("drop table if exists entrenamiento");
$mysqli->query("drop table if exists ejercicios");
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

$mysqli->query("create table if not exists entrenamiento (
	id		        int not null primary key auto_increment,
	id_ejercicio	int,
	peso	        int,
    dia             varchar(10),
    fecha           int,
    mes             varchar(10),
    anio            varchar(5),
    FOREIGN KEY (id_ejercicio) REFERENCES ejercicios(id)
)");



$mysqli->query("insert into musculos(nombre_musculo) 
    values  ('Cuádriceps'),
            ('Isquiotibiales'),
            ('Glúteos'),
            ('Pantorrillas'),
            ('Aductor'),
            ('Abductor'),
            ('Pecho'),
            ('Dorsal'),
            ('Trapecio'),
            ('Hombros'),
            ('Bíceps'),
            ('Tríceps')
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
            ('Maquina pantorrillas', 4),
            ('Pecho plano barra', 7),
            ('Polea adelante', 8),
            ('Remo con barra', 8),
            ('Serrucho', 8),
            ('Trapecio con barra', 9),
            ('Vuelo adelante', 10),
            ('Vuelo lateral', 10),
            ('Press con barra', 10),
            ('Bíceps + press', 10),
            ('Mancuernas alternado', 11),
            ('Polea', 12),
            ('Patada de burro', 12)


")

//  $mysqli->query("insert into ejercicios(nombre_ejercicio) 
//     value (".$i.")");       




?>


insert into ejercicios(nombre_ejercicio, id_musculo)
    values  ('Búlgaras', 1),
            ('Despegues', 1),
            ('Pistols Cajón', 1),
            ('Polea', 2),
            ('Peso muerto sumo', 3),
            ('Elevación cadera máquina', 3),
            ('Estocadas cam', 3),
            ('Suelo 1p', 4),
            ('Apertura', 7),
            ('Pecho plano con mancuernas', 7),
            ('Toma neutra', 8),
            ('Remo T', 8),
            ('Remo polea baja', 8),
            ('Pullover', 8),
            ('Palomas', 10),
            ('Press Arnold', 10),
            ('Landmine', 10),
            ('Barra', 11),
            ('Transnuca con mancuernas', 12)
