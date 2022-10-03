<?php

require_once "./accesoDatos.php";

class Producto{

    private $id;
    private $codigo_de_barra;
    private $nombre;
    private $tipo;
    private $stock;
    private $precio;
    private $fecha_de_creacion;
    private $fecha_de_modificacion;


    public function __construct($codigo_de_barra,$nombre,$tipo,$stock,$precio,$fecha_de_creacion,$fecha_de_modificacion = "")
    {
        $this->id = 0;
        $this->codigo_de_barra = $codigo_de_barra;
        $this->nombre= $nombre;
        $this->tipo= $tipo;
        $this->stock = $stock;
        $this->precio= $precio;
        $this->fecha_de_creacion= $fecha_de_creacion;
        $this->fecha_de_creacion= $fecha_de_modificacion;
    }

    public static function insertarEntidad(PDO $pdo, $tabla,$producto){
    
        $sentencia = "";
        
        
        if($pdo != null){
            $sentencia = $pdo->prepare("INSERT INTO ".$tabla."(`codigo_de_barra`, `nombre`, `tipo`, `stock`, `precio`, `fecha_de_creacion`,``fecha_de_modificacion`) VALUES"."('$producto->codigo_de_barra','$producto->nombre','$producto->tipo','$producto->stock','$producto->precio','$producto->fecha_de_creacion','$producto->fecha_de_modificacion)");
        }
    
        return $sentencia->execute();
    }

    public static function leerProductos(PDO $pdo, $tabla){
        $i=0;
        $lista = "";
        if($pdo!=null)
        {
            $sentencia = $pdo->prepare("SELECT * FROM ".$tabla);
            if($sentencia->execute()){
                $resultado = $sentencia->fetchAll();

                $lista = "<ul>";
                foreach($resultado as $producto)
                {
                    $lista .= "<h2>producto $i</h2>";
                    $lista .= "<li>".$producto["ID"]."</li<br><li>".$producto["codigo_de_barra"]."</li<br><li>".$producto["nombre"]."</li<br><li>".$producto["tipo"]."</li<br><li>".$producto["stock"]."</li<br><li>".$producto["precio"]."</li<br><li>".$producto["fecha_de_creacion"]."</li<br><li>".$producto["fecha_de_modificacion"]."</li<br>";
                    $i++;
                }
                $lista .= "</ul>";
            }
        }
        return $lista;
    }
    

}
