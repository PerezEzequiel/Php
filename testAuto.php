<?php

require_once "./ejercicio_17.php"; 
require_once "./manejador_archivos.php";


$autoUno = new Auto("rojo","fiat");
$autoDos = new Auto("blanco","fiat");

$autoTres = new Auto("negro","vw",1000);
$autoCuatro = new Auto("negro","vw",1500);

$autoCinco = new Auto("amarillo","ford",1600,date('8/5/2019'));


/*
    //Creo un array y cargo los autos en autos.csv 

$arrayAutos = array();

array_push($arrayAutos,$autoUno);
array_push($arrayAutos,$autoDos);
array_push($arrayAutos,$autoTres);
array_push($arrayAutos,$autoCuatro);
array_push($arrayAutos,$autoCinco);
ManejadorArchivos::Alta($arrayAutos,"./autos.csv","Auto");
*/


    //Leo "./autos.csv" y lo cargo en un array

$arrayAutosLectura = ManejadorArchivos::Lectura("./autos.csv","Auto");

foreach($arrayAutosLectura as $auto)
{
    echo Auto::MostrarAuto($auto) . "<br>";
}




?>