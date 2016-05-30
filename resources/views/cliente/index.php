<!DOCTYPE html>
<html ng-app="appCliente">
  <head>
    <meta charset="utf-8">
    <title>Inicio</title>  

    <script type="text/javascript" src="../../../public/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../../public/js/clientescript.js"></script>
 
    <script type="text/javascript" src="../../../public/js/Chart.min.js"></script> 
    <script type="text/javascript" src="../../../public/js/angular.js"></script>
    <script type="text/javascript" src="../../../public/js/cookies.js"></script>
    <script type="text/javascript" src="../../../public/js/angular-ui-router.js"></script>
    <script type="text/javascript" src="../../../public/js/angular-route.js"></script>
    <script type="text/javascript" src="../../../public/js/controller.js"></script>
    <script type="text/javascript" src="../../../app/frontControllers/controllerCliente.js"></script>
    <link rel="stylesheet" href="../../../public/css/clienteChat.css">
    <link rel="stylesheet" href="../../../public/css/clientehacerChance.css">
     <link rel="stylesheet" href="../../../public/css/clienteVerEstadisticas.css">

    <link rel="stylesheet" href="../../../public/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../public/css/clienteIndex.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>
  <body>


    <header>
      <div class="contenedor-barra">
        <div class="logo-navbar">

          <div class="dropdown">
            <i class="fa fa-bars dropbtn" aria-hidden="true"></i>
            <div id="myDropdown" class="dropdown-content">
              <a href="#/">Inicio</a>
              <a href="#/hacerChance">Hacer Chance</a>
              <a href="#/verEstadisticas">Ver Estadisticas</a>
              <a href="#/mensajes">Mensajes</a>
              
            </div>
          </div>

          <a href="http://localhost/TuChance/resources/views/"><i class="fa fa-home"></i></a>
          <a href="http://localhost/TuChance/resources/views/index.php" class="text-logo">Tu Chance</a>
        </div>

        <nav class="nav-options"  ng-controller="indexController">

         <ul class="responsive-nav">
            <li><a href="">Tu Chance</a></li>
            <li><a href="">{{user.username}}</a></li>
         </ul>
         <ul class="nav-ul">
          <li><a href="">{{user.username}}</a></li>
          <li><a href="#/">inicio</a></li>
          <li><a href="#/hacerChance">Hacer Chance</a></li>
          <li><a href="#/verEstadisticas">Ver Estadisticas</a></li>
          <li><a href="#/mensajes">Mensajes</a></li>
          </ul>
          <a class="logo-iniciar-sesion" title="Cerrar sesion">
            <i style="cursor:pointer" ng-click="logout()" class="fa fa-sign-out fa-3x"></i>
          </a>
        </nav>
      </div>
    </header>

    <br><br>
   

<div ng-view>
  
  </div>
      
 
  </body>
</html>






   
   