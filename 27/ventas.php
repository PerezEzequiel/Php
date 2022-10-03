<?php


class Venta{
    private $id;
    private $id_producto;
    private $id_usuario;
    private $cantidad;
    private $fecha_de_venta;

    public function __construct($id_producto,$id_usuario,$cantidad,$fecha_de_venta)
    {
        $this->id = 0;
        $this->id_producto = $id_producto;
        $this->id_usuario= $id_usuario;
        $this->cantidad= $cantidad;
        $this->fecha_de_venta = $fecha_de_venta;
    }

    public static function leerVentas(PDO $pdo, $tabla){
        $i=0;
        $lista = "";
        if($pdo!=null)
        {
            $sentencia = $pdo->prepare("SELECT * FROM ".$tabla);
            if($sentencia->execute()){
                $resultado = $sentencia->fetchAll();

                $lista = "<ul>";
                foreach($resultado as $venta)
                {
                    $lista .= "<h2>venta $i</h2>";
                    $lista .= "<li>".$venta["ID"]."</li<br><li>".$venta["id_producto"]."</li<br><li>".$venta["id_usuario"]."</li<br><li>".$venta["cantidad"]."</li<br><li>".$venta["fecha_de_venta"]."</li<br>";
                    $i++;
                }
                $lista .= "</ul>";
                echo $lista;
            }
        }
    }

}




?>