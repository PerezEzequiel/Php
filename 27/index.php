<?php

require_once "./usuario.php";
require_once "./producto.php";
require_once "./accesoDatos.php";

// $nombre  =  isset($_POST["nombre"]) ? $_POST["nombre"] : "sinnombre";
// $apellido = isset($_POST["apellido"]) ? $_POST["apellido"] : "sinapellido";
// $clave = isset($_POST["clave"]) ? $_POST["clave"] : "sinclave";
// $mail = isset($_POST["mail"]) ? $_POST["mail"] : "sinmail";
// $localidad = isset($_POST["localidad"]) ? $_POST["localidad"] : "sinlocalidad";

// $usuario = new Usuario($nombre,$apellido,$clave,$mail,$localidad);


$bsd = AccesoDatos::realizarConexion("tp", "root", "");


$opcion = isset($_GET["opcion"]) ? $_GET["opcion"] : "opcionInvalida";

switch ($opcion) {
    case "usuarios":
        echo Usuario::leerUsuarios($bsd, "usuarios");
        break;
    case "productos":
        echo Producto::leerProductos($bsd, "productos");
        break;
    case "ventas":
        echo Venta::leerVentas($bsd, "ventas");
        break;
}
