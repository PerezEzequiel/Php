<?php

require_once "./ejercicio_17.php";

/*Crear la clase Garage que posea como atributos privados:

_razonSocial (String)
_precioPorHora (Double)
_autos (Autos[], reutilizar la clase Auto del ejercicio anterior)

Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:

i. La razón social.
ii. La razón social, y el precio por hora.

Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
que mostrará todos los atributos del objeto.
Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
(sólo si el auto no está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Add($autoUno);
Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
“Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).
Ejemplo: $miGarage->Remove($autoUno);
En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los
métodos*/

class Garage{

    private $_razonSocial;
    private $_precioPorHora;
    public $_autos;

    public function __construct($razonSocial, $precioPorHora = 0, $array = array())
    {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioPorHora;
        $this->_autos = $array;
    }
    public function MostrarGarage()
    {
        $retorno = "$this->_razonSocial,$this->_precioPorHora;";
        $objeto = end($this->_autos);
         
        if(count($this->_autos) > 0)
        {
            foreach($this->_autos as $auto)
            {
                $retorno.=Auto::MostrarAuto($auto);
                if($auto != $objeto)
                {
                    $retorno .= ";";
                }
                
            }
        }
        return $retorno;
    }
    public function Equals($autoRecibido)
    {
        $retorno = false;
        foreach($this->_autos as $auto)
        {
            if($auto->Equals($autoRecibido))
            {
                $retorno = true;
                break;
            }
        }
        return $retorno;
    }
    public function Add($autoRecibido)
    {
        if(!$this->Equals($autoRecibido))
        {
            array_push($this->_autos,$autoRecibido);
        }
        else
        {
            echo "El auto no se pudo agregar, ya se encuentra en la lista<br>";
        }
    }
    public function Remove($autoRecibido)
    {
        $index = -1;
        if($this->Equals($autoRecibido))
        {
            $index = array_search($autoRecibido,$this->_autos);
            if($index >= 0)
            {
                array_splice($this->_autos,$index,1);
            }
        }
        else
        {
            echo "El auto no se pudo remover, no se encuentra en la lista";
        }      
    }
}
