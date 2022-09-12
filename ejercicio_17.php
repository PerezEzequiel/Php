<?php

/*
Aplicación No 17 (Auto)
Realizar una clase llamada “Auto” que posea los siguientes atributos privados:

_color (String)
_precio (Double)
_marca (String).
_fecha (DateTime)

Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:

i. La marca y el color.
ii. La marca, color y el precio.
iii. La marca, color, precio y fecha.

Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por
parámetro y que se sumará al precio del objeto.
Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
por parámetro y que mostrará todos los atributos de dicho objeto.
Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
devolverá TRUE si ambos “Autos” son de la misma marca.
Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
la suma de los precios o cero si no se pudo realizar la operación.
Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);
*/

class Auto
{
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct($color, $marca, $precio = 10, $fecha = "")
    {
        $this->_color = $color;
        $this->_marca = $marca;
        $this->_precio = $precio;

        if ($fecha == "") {
            $fecha = date("d/m/y");
        }

        $this->_fecha = $fecha;
    }

    public function AgregarImpuestos($precioParametro)
    {
        $this->_precio += $precioParametro;
    }
    public static function MostrarAuto($autoRecibido)
    {
        $formato = "$autoRecibido->_color,$autoRecibido->_precio,$autoRecibido->_marca,$autoRecibido->_fecha";
        return $formato;
    }
    public function Equals($autoRecibido)
    {
        $retorno = false;

        if ($this->_marca == $autoRecibido->_marca) {
            $retorno = true;
        }
        return $retorno;
    }
    public static function Add($autoUno, $autoDos)
    {
        $retorno = 0;
        if ($autoUno->Equals($autoDos) && $autoUno->_color == $autoDos->_color) {
            $retorno = $autoUno->_precio + $autoDos->_precio;
        } else {
            echo "Los autos tienen diferente color y/o marca<br>";
        }

        return $retorno;
    }


    public static function AltaAutos($autosRecibidos)
    {
        $archivo = fopen("./autos.csv", "a");

        if ($archivo != null)
        {
            foreach ($autosRecibidos as $auto)
            {
                $parseo = "$auto->_color,$auto->_precio,$auto->_marca,$auto->_fecha\r\n";
    
                    if (fwrite($archivo, $parseo) > 0) 
                    {
                        echo "<h2>Se dio de alta</h2>";
                    }
                
            }
        }

        fclose($archivo);
    }

    public static function LeerAutos()
    {
        $archivo = fopen("./autos.csv", "r");
        $linea = "";
        $arrayAux = null;
        $arrayAutos = array();

        if ($archivo != null) {
            while (!feof($archivo)) {
                $linea = fgets($archivo);
                if ($linea != "") {
                    $arrayAux = explode(",", $linea);
                    array_push($arrayAutos, new Auto($arrayAux[0], $arrayAux[1], $arrayAux[2], $arrayAux[3]));
                }
            }
        }
        fclose($archivo);

        return $arrayAutos;
    }
}
