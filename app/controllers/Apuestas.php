<?php
  error_reporting(E_ALL);
  use Phalcon\Loader;
  use Phalcon\Mvc\Micro;
  use Phalcon\Mvc\Model\Manager;
  use Phalcon\Di\FactoryDefault;
  use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;
  use Phalcon\Http\Response;


//agrega un usuario via POST con JSON
$app->post('/api/apuestas', function() use ($app){

    //obtiene los datos enviados en formato JSON
  $apuesta = $app->request->getJsonRawBody();

  $phql = "INSERT INTO apuestas (valor, numeroApostado, idTransaccion, idLoteria, idUsuario, idModo_apuesta, serieApostada, signoZoodiaco) VALUES (:valor:, :numeroApostado:, :idTransaccion:, :idLoteria:, :idUsuario:, :idModo_apuesta:, :serieApostada:, :signoZoodiaco: )";

  $status = $app->modelsManager->executeQuery($phql,array(
    
    'valor'           =>$apuesta->valor,
    'numeroApostado'  =>$apuesta->numeroApostado,
    'idTransaccion'   =>$apuesta->idTransaccion,
    'idLoteria'       =>$apuesta->idLoteria,
    'idUsuario'       =>$apuesta->idUsuario,
    'idModo_apuesta'  =>$apuesta->idModo_apuesta,
    'serieApostada'    =>$apuesta->serieApostada,
    'signoZoodiaco'   =>$apuesta->signoZoodiaco
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


//Optiene la lista de apuestas realizadas por los clientes
$app->get('/api/apuestas/clientes', function() use ($app){
  //obtener los usuarios
  $phql = "select user.nombre, count(*) as numeroVenta from usuarios as user inner join apuestas as ap on ap.idUsuario = user.idUsuario group by user.nombre order by numeroVenta desc";  
  $ventasClientes = $app->modelsManager->executeQuery($phql);

  $data = array();
  foreach ($ventasClientes as $ventaCliente) {
    $data[] = array(
      'nombre'=>$ventaCliente->nombre,
      'numeroVenta'=>$ventaCliente->numeroVenta      
    );
  }
  echo json_encode($data);
});

?>