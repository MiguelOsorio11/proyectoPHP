<?php
  error_reporting(E_ALL);
  use Phalcon\Loader;
  use Phalcon\Mvc\Micro;
  use Phalcon\Mvc\Model\Manager;
  use Phalcon\Di\FactoryDefault;
  use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;
  use Phalcon\Http\Response;

  $app = new Micro();
  $loader = new Loader();
  $loader->registerDirs(
    array(
      __DIR__."/app/models/"
    )
  )->register();
  include "app/database/db_connect.php";
  $app->setDI($di);

  include "app/controllers/Usuario.php";
  include "app/controllers/Loteria.php";
  include "app/controllers/Modo.php";
  include "app/controllers/Numero.php";
  include "app/controllers/Mensaje.php";
  include "app/controllers/Apuestas.php";
  include "app/controllers/Transacciones.php";

  $app->handle();
?>
