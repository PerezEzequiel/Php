<?php

require_once "./accesoDatos.php";

class Usuario{

    private $id;
    private $nombre;
    private $apellido;
    private $clave;
    private $mail;
    private $localidad;
    private $fecha_de_registro;

    public function __construct($nombre,$apellido,$clave,$mail,$localidad,$fecha_de_registro = "")
    {
        $this->id = 0;
        $this->nombre = $nombre;
        $this->apellido= $apellido;
        $this->clave= $clave;
        $this->mail = $mail;
        $this->localidad= $localidad;
        $this->fecha_de_registro= date('Y-m-d');
    }

    public static function insertarEntidad(PDO $pdo, $tabla,$usuario){
    
        $sentencia = "";

        echo $usuario->nombre;
        
        //
        
        if($pdo != null){
            $sentencia = $pdo->prepare("INSERT INTO ".$tabla."(`nombre`, `apellido`, `clave`, `mail`, `localidad`, `fecha_de_registro`) VALUES"."('$usuario->nombre','$usuario->apellido','$usuario->clave','$usuario->mail','$usuario->localidad','$usuario->fecha_de_registro')");
        }
    
        return $sentencia->execute();
    }
    public static function leerUsuarios(PDO $pdo, $tabla){
        $i=0;
        $lista = "";
        if($pdo!=null)
        {
            $sentencia = $pdo->prepare("SELECT * FROM ".$tabla);
            if($sentencia->execute()){
                $resultado = $sentencia->fetchAll();

                $lista = "<ul>";
                foreach($resultado as $usuario)
                {
                    $lista .= "<h2>usuario $i</h2>";
                    $lista .= "<li>".$usuario["ID"]."</li<br><li>".$usuario["nombre"]."</li<br><li>".$usuario["apellido"]."</li<br><li>".$usuario["clave"]."</li<br><li>".$usuario["mail"]."</li<br><li>".$usuario["localidad"]."</li<br><li>".$usuario["fecha_de_registro"]."</li<br>";
                    $i++;
                }
                $lista .= "</ul>";
                echo $lista;
            }
        }
    }

    private function compararUsuarioEmail($objeto){
        return strcmp($this->email,$objeto->email);
    }
    private function compararUsuarioClave($objeto){
        return strcmp($this->email,$objeto->email);
    }
    public function buscarUsuario(PDO $pdo,$tabla,$objeto){
        $bandera = "Usuario no registrado";
        
        if($pdo != null){
            $sentencia  = $pdo->prepare("SELECT * FROM".$tabla."WHERE email = $objeto->email");
            if($sentencia->execute() && $sentencia->rowCount()>0)
            {
                $bandera = "Clave erronea";
                $sentencia  = $pdo->prepare("SELECT * FROM".$tabla."WHERE email = $objeto->email");
                if()
            }
        }


        return $bandera;

    }
    

}





?>