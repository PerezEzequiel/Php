<?php

//require_once "./ejercicio_17.php"; 

class ManejadorArchivos
{
    public static function Alta($garageRecibido,$path)
    {
        $archivo = fopen($path, "a");

        if ($archivo != null && $garageRecibido != null)
        {
            fwrite($archivo,$garageRecibido->MostrarGarage());
        }
        fclose($archivo);
    }

    public static function Lectura($path,$tipoDeClase)
    {
        $archivo = fopen($path, "r");
        $linea = "";
        $arrayAux = null;
        $arrayAutos = array();

        if ($archivo != null) {
            while (!feof($archivo)) {
                $linea = fgets($archivo);
                if ($linea != "") {
                    $arrayAux = explode(",", $linea);
                    array_push($arrayAutos, new $tipoDeClase($arrayAux[0], $arrayAux[1], $arrayAux[2], $arrayAux[3]));
                }
            }
        }
        fclose($archivo);

        return $arrayAutos;
    }
}

?>