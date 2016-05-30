<?php
  error_reporting(E_ALL);
  use Phalcon\Loader;
  use Phalcon\Mvc\Micro;
  use Phalcon\Mvc\Model\Manager;
  use Phalcon\Di\FactoryDefault;
  use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;
  use Phalcon\Http\Response;

$app->get('/api/bloqueos', function() use ($app){
  //obtener los usuarios
  $phql = "select * from bloqueados order by numero";
  $numeros = $app->modelsManager->executeQuery($phql);
  $data = array();
  foreach ($numeros as $numero) {
    $data[] = array(
      'id'=>$numero->idNumero,
      'numero'=>$numero->numero
    );
  }
  echo json_encode($data);
});

$app->post('/api/bloqueos', function() use ($app){
  //agregar un modo
  $bloqueo = $app->request->getJsonRawBody();
  $phql= "insert into bloqueados (numero) values (:numero:)";
  $status = $app->modelsManager->executeQuery($phql,array(
    'numero'=>$bloqueo->numero
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

$app->put('/api/bloqueos/{id:[0-9]+}', function($id) use ($app){
  //actualizar el estado de bloqueo de un numero
  $phql1 = "select * from bloqueados where idNumero=:id:";
  $numeros = $app->modelsManager->executeQuery($phql1,array(
    'id'=>$id
  ));
  $data = array();
  foreach ($numeros as $numero) {
    $data[] = array(
      'id'=>$numero->idNumero,
      'numero'=>$numero->numero
    );
  }
  $data = $data[0];

  $phql = "delete from bloqueados where idNumero = :id:";
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

?>
