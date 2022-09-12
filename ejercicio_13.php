<?php

//Ezequiel Perez Ejercicio 13
// Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
// función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
// deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
// “Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
// 1 si la palabra pertenece a algún elemento del listado.
// 0 en caso contrario.

function invertirPalabra(string $palabra, int $maximo)
{
    $retorno = 0;
    $listado = array("Recuperatorio","Parcial","Programacion");

    if(strlen($palabra)<$maximo)
    {
        foreach($listado as $palabraListado)
        {
            if($palabraListado == $palabra)
            {
                echo "Coincide con $palabraListado<br>";
                $retorno = 1;
                break;
            }
        }
    }
    return $retorno;
}

echo "Retorno: " . invertirPalabra("Recuperatorio",20);

?>