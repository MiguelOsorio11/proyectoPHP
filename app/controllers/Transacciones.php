<?php
  error_reporting(E_ALL);
  use Phalcon\Loader;
  use Phalcon\Mvc\Micro;
  use Phalcon\Mvc\Model\Manager;
  use Phalcon\Di\FactoryDefault;
  use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;
  use Phalcon\Http\Response;

//Busca la ultima transaccion almacenada en la DB.
$app->get('/api/transaccion',function() use ($app) {
//SELECT * FROM usuarios ORDER BY id DESC LIMIT 1
  $phql= "SELECT * FROM transacciones ORDER BY idTransaccion DESC LIMIT 1";
  $transacciones = $app->modelsManager->executeQuery($phql);

  $data = array();
  foreach ($transacciones as $transaccion) {
    $data[] = array(
          'idTransaccion' =>$transaccion->idTransaccion,
          'acumulado'     =>$transaccion->acumulado
    );
  }
  echo json_encode($data[0]);
});

//agrega un usuario via POST con JSON
$app->post('/api/transacciones', function() use ($app){

    //obtiene los datos enviados en formato JSON
  $transaccion = $app->request->getJsonRawBody();

  $phql = "INSERT INTO transacciones (acumulado) 
        VALUES (:acumulado:)";

  $status = $app->modelsManager->executeQuery($phql,array(
    
    'acumulado' =>$transaccion->acumulado
  ));

  $response = new Response();

  //se chequea que la inserción fue exitosa
  if($status->success()==true){
    $response->setJsonContent(array('status' => 'OK'));
  }else{
    $response->setStatusCode(409, "Conflict");
    $errors=array();
    foreach ($status->getMessages() as $message) {
      $errors[] = $message->getMessage();
    }
    $response->setJsonContent(
      array(
        'status'   => 'ERROR',
        'messages' => $errors
      )
    );
  }
  return $response;

});


//Busca las transacciones realizadas en el dia.
$app->get('/api/transacciones/dia',function() use ($app) {
//SELECT * FROM usuarios ORDER BY id DESC LIMIT 1
  $phql= "SELECT * FROM transacciones WHERE fecha = CURDATE()";
  $transacciones = $app->modelsManager->executeQuery($phql);

  $data = array();
  foreach ($transacciones as $transaccion) {
    $data[] = array(
          'idTransaccion' =>$transaccion->idTransaccion,
          'acumulado'     =>$transaccion->acumulado,
          'fecha'         =>$transaccion->fecha
    );
  }
  echo json_encode($data);
});

//Busca las transacciones realizadas en la semana.
$app->get('/api/transacciones/semana',function() use ($app) {
//SELECT * FROM usuarios ORDER BY id DESC LIMIT 1
  $phql= "SELECT * FROM transacciones WHERE YEARWEEK(fecha) = YEARWEEK(CURDATE())";
  $transacciones = $app->modelsManager->executeQuery($phql);

  $data = array();
  foreach ($transacciones as $transaccion) {
    $data[] = array(
          'idTransaccion' =>$transaccion->idTransaccion,
          'acumulado'     =>$transaccion->acumulado,
          'fecha'         =>$transaccion->fecha
    );
  }
  echo json_encode($data);
});

//Busca las transacciones realizadas en el mes actual.
$app->get('/api/transacciones/mes',function() use ($app) {
//SELECT * FROM usuarios ORDER BY id DESC LIMIT 1
  $phql= "SELECT * FROM transacciones WHERE monthname(fecha) =  monthname(CURDATE())";
  $transacciones = $app->modelsManager->executeQuery($phql);

  $data = array();
  foreach ($transacciones as $transaccion) {
    $data[] = array(
          'idTransaccion' =>$transaccion->idTransaccion,
          'acumulado'     =>$transaccion->acumulado,
          'fecha'         =>$transaccion->fecha
    );
  }
  echo json_encode($data);
});

?>