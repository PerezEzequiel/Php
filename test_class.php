<?php

class Test
{
    private string $cadena; //privado
    public int $entero; //public
    var float $flotante; //publico
    public readonly string $solo_lectura;

    //Constructor

    public function __construct()
    {
        $this->cadena = $this->formatearCadena("valor inicial");
        $this->entero = 1;
        $this->flotante = 0.0;
        $this->solo_lectura = "Solo para leer";
    }

    //Metodo publico de instancia
    public function mostrar()
    {
        return $this->cadena . "-" . $this->entero . "-" . $this->flotante . "-";
    }

    //Metodo privado de instancia
    private function formatearCadena($cadena)
    {
        return ucwords($cadena);
    }
    
    //Metodo de clase 
    public static function mostrarTest($obj)
    {
        return $obj->mostrar();
    }

}





?>