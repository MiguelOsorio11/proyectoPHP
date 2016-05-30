<?php
  error_reporting(E_ALL);
  use Phalcon\Loader;
  use Phalcon\Mvc\Micro;
  use Phalcon\Mvc\Model\Manager;
  use Phalcon\Di\FactoryDefault;
  use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;
  use Phalcon\Http\Response;

$app->get('/api/loterias', function() use ($app){
  //obtener los usuarios
  $phql = "select * from loterias order by nombre";
  $loterias = $app->modelsManager->executeQuery($phql);
  $data = array();
  foreach ($loterias as $loteria) {
    $data[] = array(
      'id'=>$loteria->idLoteria,
      'nombre'=>$loteria->nombre,
      'serie'=>$loteria->serie
    );
  }
  echo json_encode($data);
});

$app->post('/api/loterias', function() use ($app){
  $loteria = $app->request->getJsonRawBody();
  $phql= "insert into loterias (nombre,serie) values (:nombre:,:serie:)";
  $status = $app->modelsManager->executeQuery($phql,array(
    'nombre'=>$loteria->nombre,
    'serie'=>$loteria->serie
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

$app->delete('/api/loterias/{id:[0-9]+}',function($id) use ($app){
  //borrar un usuario de acuerdo a su id
  $phql = "delete from loterias where idLoteria = :id:";
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
});

?>
