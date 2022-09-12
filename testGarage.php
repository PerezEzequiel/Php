<?php

require_once "./ejercicio_18.php";
require_once "./manejador_archivos.php";


//Creo garage

$miGarage = new Garage("Juan",500);

//Muestro garage inicial


//Autos
$autoUno = new Auto("rojo","bmw",5000);
$autoDos = new Auto("blanco","ford",4000);
$autoTres = new Auto("amarillo","fiat",3000);
$autoCuatro = new Auto("gris","vb",2000);


//echo Agrego autos

echo "****Agrego autos****<br>";

$miGarage->Add($autoUno);
$miGarage->Add($autoDos);
$miGarage->Add($autoTres);
$miGarage->Add($autoCuatro);


$miGarage->MostrarGarage();

// //echo Intento agregar autos que ya se encuentran en la lista

// echo "****Agrego autos ya existentes****<br>";

// $miGarage->Add($autoUno);
// $miGarage->Add($autoDos);
// $miGarage->Add($autoTres);
// $miGarage->Add($autoCuatro);

// // Remuevo dos autos de la lista


// echo "<br>****Remuevo dos autos de la lista****<br>";

// $miGarage->Remove($autoUno);
// $miGarage->Remove($autoCuatro);

// //$miGarage->MostrarGarage();

// //Intento remover un auto que no existe en la lista.

// //$miGarage->Remove($autoUno);

ManejadorArchivos::Alta($miGarage,"prueba.csv");


//var_dump($miGarage->_autos);



?>