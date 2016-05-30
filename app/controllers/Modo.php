<?php
  error_reporting(E_ALL);
  use Phalcon\Loader;
  use Phalcon\Mvc\Micro;
  use Phalcon\Mvc\Model\Manager;
  use Phalcon\Di\FactoryDefault;
  use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;
  use Phalcon\Http\Response;

$app->get('/api/modos', function() use ($app){
  //obtener los usuarios
  $phql = "select * from modos order by nombre";
  $modos = $app->modelsManager->executeQuery($phql);
  $data = array();
  foreach ($modos as $modo) {
    $data[] = array(
      'id'=>$modo->idModo,
      'nombre'=>$modo->nombre,
      'tarifa'=>$modo->tarifa,
      'habilitacion'=>$modo->habilitacion,
      'signo'=>$modo->signo
    );
  }
  echo json_encode($data);
});

$app->post('/api/modos', function() use ($app){
  $modo = $app->request->getJsonRawBody();
  $phql = "update modos set tarifa = :tarifa: where idModo = :id:";
  $status = $app->modelsManager->executeQuery($phql,array(
    'id'=>$modo->idModo,
    'tarifa'=>$modo->tarifa
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

$app->put('/api/modos/{id:[0-9]+}', function($id) use ($app){
  //actualizar un usuario respecto a su id
  $phql1 = "select * from modos where idModo=:id:";
  $modos = $app->modelsManager->executeQuery($phql1,array(
    'id'=>$id
  ));
  $data = array();
  foreach ($modos as $modo) {
    $data[] = array(
      'id'=>$modo->idModo,
      'nombre'=>$modo->nombre,
      'tarifa'=>$modo->tarifa,
      'habilitacion'=>$modo->habilitacion,
    );
  }
  $data = $data[0];

  $phql = "update modos set habilitacion = :habilitacion: where idModo = :id:";
  if($data['habilitacion'] == 0){
    $status = $app->modelsManager->executeQuery($phql,array(
      'id'=>$id,
      'habilitacion'=>1
    ));
  }elseif($data['habilitacion'] == 1){
    $status = $app->modelsManager->executeQuery($phql,array(
      'id'=>$id,
      'habilitacion'=>0
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

//Modos de apuesta de una loteria
$app->get('/api/modos/search/{id:[0-9]+}', function($id) use ($app){
  //obtener los usuarios
  $phql = "select mo.idModo, mo.nombre, mo.tarifa, mo.habilitacion, mo.signo  from modosloterias as ml inner join modos as mo on ml.idModo = mo.idModo inner join loterias as lo on ml.idLoteria = lo.idLoteria where ml.idLoteria = :id: and mo.habilitacion = 1";
  $rows = $app->modelsManager->executeQuery($phql,    
    array(
      'id'=>$id
    )
  );  

  $data = array();
  foreach ($rows as $modo_apuesta) {
    $data[] = array(
      'id'=>$modo_apuesta->idModo,
      'nombre'=>$modo_apuesta->nombre,
      'tarifa' =>$modo_apuesta->tarifa,
      'habilitacion' =>$modo_apuesta->habilitacion,
      'signo' => $modo_apuesta->signo
    );
  }
  echo json_encode($data);
});

?>
