<!DOCTYPE html>
<html ng-app="app">
  <head>
    <meta charset="utf-8">
    <title>Panel de administracion | Inicio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript" src="../../../public/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../../public/js/Chart.min.js"></script>

    <link rel="stylesheet" href="../../../public/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../public/css/main.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="../../../public/css/adminIndex.css">
    <link rel="stylesheet" href="../../../public/css/adminInicio.css">
    <link rel="stylesheet" href="../../../public/css/adminChat.css">
    <link rel="stylesheet" href="../../../public/css/adminEmpleados.css">
    <link rel="stylesheet" href="../../../public/css/adminChances.css">
    <link rel="stylesheet" href="../../../public/css/adminEstadisticas.css">

    <script type="text/javascript" src="../../../public/js/adminscript.js"></script>
    <script type="text/javascript" src="../../../public/js/adminChat.js"></script>
    <script type="text/javascript" src="../../../public/js/adminChances.js"></script>

    <script type="text/javascript" src="../../../public/js/angular.js"></script>
    <script type="text/javascript" src="../../../public/js/cookies.js"></script>
    <script type="text/javascript" src="../../../public/js/controller.js"></script>

    <script type="text/javascript" src="../../../app/frontControllers/chat.js"></script>
    <script type="text/javascript" src="../../../app/frontControllers/loterias.js"></script>
    <script type="text/javascript" src="../../../app/frontControllers/modos.js"></script>
    <script type="text/javascript" src="../../../app/frontControllers/numeros.js"></script>
    <script type="text/javascript" src="../../../app/frontControllers/usuarios.js"></script>
    <script type="text/javascript" src="../../../app/frontControllers/indexAdmin.js"></script>

    <script type="text/javascript" src="../../../public/js/angular-ui-router.js"></script>
    <script type="text/javascript" src="https://code.angularjs.org/1.3.4/angular-route.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js"></script>

  </head>
  <body>

    <header>
      <div class="contenedor-barra">
        <div class="logo-navbar">

          <div class="dropdown">
            <i class="fa fa-bars dropbtn" aria-hidden="true"></i>
            <div id="myDropdown" class="dropdown-content">
              <a href="#/" class="inicio">Inicio</a>
              <a href="#/chat" class="chat">Chat Empleados</a>
              <a href="#/empleados" class="empleados">Administrar Empleados</a>
              <a href="#/chances" class="chances">Administrar Chances</a>
              <a href="#/estadisticas" class="estadisticas">Estadisticas</a>
            </div>
          </div>

          <a href="http://localhost/TuChance/resources/views/index.php"><i class="fa fa-home"></i></a>
          <a href="http://localhost/TuChance/resources/views/index.php" class="text-logo">Tu Chance</a>
        </div>
        <nav class="nav-options" ng-controller="indexController">
          <span class="name-admin">{{admin.username}}</span>
          <a class="logo-iniciar-sesion" title="Cerrar sesion">
            <i style="cursor:pointer" ng-click="logout()" class="fa fa-sign-out fa-3x"></i>
          </a>
    		</nav>
      </div>
    </header>

    <br><br>
    <section class="main-content">
      <div class="navbar-left">
        <nav class="admin-options">
          <ul>
            <li class="enlace inicio"><br> <i class="fa fa-home fa-2x"></i><a href="#/" class="element">Inicio</a></li>
            <li class="enlace chat"><br> <i class="fa fa-comment fa-2x"></i><a href="#/chat" class="element">Chat Empleados</a></li>
            <li class="enlace empleados"><br> <i class="fa fa-users fa-2x"></i><a href="#/empleados" class="element">Administrar Empleados</a></li>
            <li class="enlace chances"><br> <i class="fa fa-file-text fa-2x"></i><a href="#/chances" class="element">Administrar Chances</a></li>
            <li class="enlace estadisticas"><br> <i class="fa fa-bar-chart fa-2x"></i><a href="#/estadisticas" class="element">Estadisticas</a></li>
          </ul>
        </nav>
        <div class="change">
          &harr;
        </div>
      </div>

      <div ng-view id="admin-content" class="admin-content">

      </div>
    </section>

  </body>
</html>
