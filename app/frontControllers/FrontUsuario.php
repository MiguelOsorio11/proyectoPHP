<?php

  include '../controllers/Usuario.php';

  $action = $_GET["action"];

  if($action == "login"){
    $username = $_GET["username"];
    $password = $_GET["password"];

    $usuario = new Usuario();
    $response = $usuario->getLogin($username,$password);

    $nombre = "";
    $tipo = "";

    foreach ($response as $user) {
      $nombre = $user["nombre"];
      $tipo = $user["tipo"];
    }

    $datos =  array('nombre' => $nombre,'tipo' => $tipo );
    echo json_encode($datos);
  }

  if($action == "register"){
    
    $usuario = new Usuario();
  }

?>
