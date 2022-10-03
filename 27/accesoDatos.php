<?php


class AccesoDatos{
    
    public static function realizarConexion(string $dbName,string $user,string $password){

    $pdo = null;
    $ruta = "mysql:host=localhost;dbname=" . $dbName;

        try{
            $pdo = new PDO($ruta,$user,$password);

        }catch(PDOException $e){
            echo "Error conexion a bsd: " . $e->getMessage();
        }

    return $pdo;

}

public static function cerrarConexion(PDO $pdo){

    if($pdo != null){
        $pdo = null;
    }
}




}



?>