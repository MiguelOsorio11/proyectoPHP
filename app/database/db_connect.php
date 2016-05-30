<?php
use Phalcon\Mvc\Model\Manager;
use Phalcon\Di\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;

$di = new FactoryDefault();
$di->set('db',function(){
  return new PdoMysql(
    array(
      "host"=>"localhost",
      "username"=>"root",
      "password"=>"",
      "dbname"=>"tuchance"
    )
  );
});

?>
