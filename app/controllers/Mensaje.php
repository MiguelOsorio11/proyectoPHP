<?php
  error_reporting(E_ALL);
  use Phalcon\Loader;
  use Phalcon\Mvc\Micro;
  use Phalcon\Mvc\Model\Manager;
  use Phalcon\Di\FactoryDefault;
  use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;
  use Phalcon\Http\Response;

$app->post('/api/mensaje/usuario', function() use ($app){
  //agregar mensaje para un usuario especifico
  $mensaje = $app->request->getJsonRawBody();
  $phql= "insert into mensajes (mensaje,idUsuarioDestino) values (:mensaje:,:idUsuario:)";
  $status = $app->modelsManager->executeQuery($phql,array(
    'mensaje'=>$mensaje->mensaje,
    'idUsuario'=>$mensaje->idUsuarioDestino
  ));

  $response = new Response();

  if($status->success()==true){
    $response->setJsonContent(array('status'=>'OK'));
  }else{
    $response->setStatusCode(409,'Conflict');
    $errors = array();
    foreach ($status->getMessages() as $message) {
      $errors[] = $message->getMessage();
    }
    $response->setJsonContent(
      array(
        'status'=>'ERROR',
        'messages'=>$errors
      )
    );
  }
  return $response;
});

$app->post('/api/mensaje/usuarios', function() use ($app){
  $phql1 = "select * from usuarios where tipo = 'cliente'";
  $users = $app->modelsManager->executeQuery($phql1);
  $data = array();
  foreach ($users as $user) {
    $data[] = array(
      'id'=>$user->idUsuario,
      'nombre'=>$user->nombre,
      'cedula'=>$user->cedula,
      'email'=>$user->email,
      'username'=>$user->username,
      'tipo'=>$user->tipo,
      'estado'=>$user->bloquear,
      'sesion'=>$user->sesion
    );
  }

  //Registrar mensaje para cada uno de los usuarios
  $mensaje = $app->request->getJsonRawBody();
  foreach ($data as $cliente) {
    $phql= "insert into mensajes (mensaje,idUsuarioDestino) values (:mensaje:,:idUsuario:)";
    $status = $app->modelsManager->executeQuery($phql,array(
      'mensaje'=>$mensaje->mensaje,
      'idUsuario'=>$cliente['id']
    ));
  }

  $response = new Response();

  if($status->success()==true){
    $response->setJsonContent(array('status'=>'OK'));
  }else{
    $response->setStatusCode(409,'Conflict');
    $errors = array();
    foreach ($status->getMessages() as $message) {
      $errors[] = $message->getMessage();
    }
    $response->setJsonContent(
      array(
        'status'=>'ERROR',
        'messages'=>$errors
      )
    );
  }
  return $response;
});

  
//Mensajes que tiene un cliente
$app->get('/api/mensajes/search/{id:[0-9]+}', function($idUsuarioDestino) use ($app){
  //obtener los usuarios
  $phql = "select mensaje from mensajes where idUsuarioDestino = :idUsuarioDestino:";
  $mensajes = $app->modelsManager->executeQuery($phql,    
    array(
      'idUsuarioDestino'=>$idUsuarioDestino
    )
  );  
  $data = array();
  foreach ($mensajes as $mensaje) {
    $data[] = array(
      'mensaje'=>$mensaje->mensaje     
    );
  }
  echo json_encode($data);
});

?>
