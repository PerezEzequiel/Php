<?php

// Ezequiel Perez Ejercicio 12
// Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
// de las letras del Array.
// Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.

$variable = array('H','O','L','A');


function invertirPalaba($palabra)
{
    $palabraRetorno = "";
    $j=count($palabra)-1;

    for($i=0;$i<count($palabra);$i++)
    {
        $palabraRetorno[$i] = $palabra[$j];
        $j--;
    }
    return $palabraRetorno;
}

echo invertirPalaba($variable);

?>