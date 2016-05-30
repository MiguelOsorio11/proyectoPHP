<?php
  error_reporting(E_ALL);
  use Phalcon\Loader;
  use Phalcon\Mvc\Micro;
  use Phalcon\Mvc\Model\Manager;
  use Phalcon\Di\FactoryDefault;
  use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;
  use Phalcon\Http\Response;

$app->get('/api/users', function() use ($app){
  //obtener los usuarios
  $phql = "select * from usuarios order by nombre";
  $users = $app->modelsManager->executeQuery($phql);
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
  echo json_encode($data);
});

$app->get('/api/users/clientes', function() use ($app){
  //obtener los usuarios
  $phql = "select * from usuarios where tipo = 'cliente' order by nombre";
  $users = $app->modelsManager->executeQuery($phql);
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
  echo json_encode($data);
});

$app->get('/api/user/position/{id:[0-9]+}', function($id) use ($app){
  //obtener la posicion de un usuario
  $phql = "select * from usuarios where idUsuario = :id:";
  $users = $app->modelsManager->executeQuery($phql,array(
    'id'=>$id
  ));
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
      'latitud'=>$user->latitud,
      'longitud'=>$user->longitud
    );
  }
  $data = $data[0];
  echo json_encode($data);
});

$app->post('/api/users', function() use ($app){
  //agregar un usuario
  $user = $app->request->getJsonRawBody();
  $phql= "insert into usuarios (nombre,username,password,tipo,cedula,email,bloquear) values (:nombre:,:username:,:password:,:tipo:,:cedula:,:email:,:bloquear:)";
  $status = $app->modelsManager->executeQuery($phql,array(
    'nombre'=>$user->nombre,
    'username'=>$user->username,
    'password'=>$user->password,
    'tipo'=>$user->tipo,
    'cedula'=>$user->cedula,
    'email'=>$user->email,
    'bloquear'=>true
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

$app->put('/api/users/{id:[0-9]+}', function($id) use ($app){
  //actualizar un estado de un usuario respecto a su id
  $phql1 = "select * from usuarios where idUsuario=:id:";
  $users = $app->modelsManager->executeQuery($phql1,array(
    'id'=>$id
  ));
  $data = array();
  foreach ($users as $user) {
    $data[] = array(
      'id'=>$user->idUsuario,
      'nombre'=>$user->nombre,
      'cedula'=>$user->cedula,
      'email'=>$user->email,
      'username'=>$user->username,
      'tipo'=>$user->tipo,
      'estado'=>$user->bloquear
    );
  }
  $data = $data[0];

  $phql = "update usuarios set bloquear = :bloquear: where idUsuario = :id:";
  if($data['estado'] == 0){
    $status = $app->modelsManager->executeQuery($phql,array(
      'id'=>$id,
      'bloquear'=>true
    ));
  }elseif($data['estado'] == 1){
    $status = $app->modelsManager->executeQuery($phql,array(
      'id'=>$id,
      'bloquear'=>false
    ));
  }

  $response = new Response();

  if($status->success()==true){
    $response->setJsonContent(array('status'=>'OK'));
  }else{
    $response->setStatusCode(409,'conflict');
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

$app->put('/api/users/position/{id:[0-9]+}', function($id) use ($app){
  //actualizar la posicion de un usuario respecto a su id
  $userPosicion = $app->request->getJsonRawBody();
  $phql = "update usuarios set latitud = :latitud:, longitud = :longitud: where idUsuario = :id:";
  $status = $app->modelsManager->executeQuery($phql,array(
    'id'=>$id,
    'latitud'=>$userPosicion->latitud,
    'longitud'=>$userPosicion->longitud
  ));

  $response = new Response();

  if($status->success()==true){
    $response->setJsonContent(array('status'=>'OK'));
  }else{
    $response->setStatusCode(409,'conflict');
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

$app->delete('/api/users/{id:[0-9]+}',function($id) use ($app){
  //borrar un usuario de acuerdo a su id
  $phql = "delete from usuarios where idUsuario = :id:";
  $status = $app->modelsManager->executeQuery($phql,array(
    'id'=>$id
  ));
  $response = new Response();

  if($status->success()==true){
    $response->setJsonContent(array('status'=>'OK'));
  }else{
    $response->setStatusCode(409,'conflict');
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

$app->post('/api/user/login', function() use ($app){
  //obtener el login de un usuario
  $user = $app->request->getJsonRawBody();
  $phql = "select * from usuarios where username = :username: and password = :password: limit 1";
  $users = $app->modelsManager->executeQuery($phql,array(
    'username'=>$user->username,
    'password'=>$user->password
  ));

  $data = array();
  foreach ($users as $user) {
    $data[] = array(
      'id'=>$user->idUsuario,
      'nombre'=>$user->nombre,
      'cedula'=>$user->cedula,
      'email'=>$user->email,
      'username'=>$user->username,
      'password'=>$user->password,
      'tipo'=>$user->tipo,
      'estado'=>$user->bloquear,
      'sesion'=>$user->sesion
    );
  }
  if(sizeof($data) > 0){
    echo json_encode($data[0]);
  }else{
    $response = new Response();
    $response->setJsonContent(array('status'=>'FAIL'));
    return $response;
  }
});

$app->put('/api/users/upsesion/{id:[0-9]+}', function($id) use ($app){
  //actualizar la posicion de un usuario respecto a su id
  $phql = "update usuarios set sesion = :sesion: where idUsuario = :id:";
  $status = $app->modelsManager->executeQuery($phql,array(
    'id'=>$id,
    'sesion'=>"online"
  ));

  $response = new Response();

  if($status->success()==true){
    $response->setJsonContent(array('status'=>'OK'));
  }else{
    $response->setStatusCode(409,'conflict');
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


?>
