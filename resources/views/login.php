<!DOCTYPE html>
<html ng-app="principal">
  <head>
    <meta charset="utf-8">
    <title>Log-In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript" src="../../public/js/jquery.min.js"></script>

    <script type="text/javascript" src="../../public/js/jquery.bxslider.js"></script>
    <link rel="stylesheet" href="../../public/css/jquery.bxslider.css" media="screen" title="no title" charset="utf-8">

    <link rel="stylesheet" href="../../public/css/main.css" media="screen" title="no title" charset="utf-8">

    <link rel="stylesheet" href="../../public/css/font-awesome.min.css">

    <script type="text/javascript" src="../../public/js/login.js"></script>
    <link rel="stylesheet" href="../../public/css/login.css">

    <script src="../../public/js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../public/css/sweetalert.css">

    <script type="text/javascript" src="../../public/js/angular.js"></script>
    <script type="text/javascript" src="../../public/js/cookies.js"></script>
    <script type="text/javascript" src="../../public/js/mainModule.js"></script>
    <script type="text/javascript" src="https://code.angularjs.org/1.3.4/angular-route.js"></script>

  </head>
  <body ng-controller="loginController">

    <header>
      <div class="contenedor-barra">
        <div class="logo-navbar">
          <a href="index.php"><i class="fa fa-home"></i></a>
          <a href="index.php" class="text-logo">Tu Chance</a>
        </div>
        <nav class="nav-options">
          <a  class="logo-iniciar-sesion" title="Iniciar Sesion"><i style="cursor:pointer" class="fa fa-sign-in fa-3x"></i></a>
    		</nav>
      </div>
    </header>

    <section class="main-content">
      <div class="slider">
        <ul class="bxslider">
          <li><img src="../../public/images/1.jpg" title="Apuestas seguras" /></li>
          <li><img src="../../public/images/2.jpg" title="Pagos rapidos" /></li>
          <li><img src="../../public/images/3.jpg" title="Diferentes tipos de chances" /></li>
        </ul>
      </div>

      <div class="info-content">
        <div class="formulario-inicio">
          <form class="login">
            <h2>Iniciar sesion</h2>
            <input type="hidden" name="action" value="login">
            <div class="group">
              <i class="fa fa-user fa-2x"></i>
              <input name="username" ng-model="user.username" class="inputs-sign" pattern="[A-Za-z]*[0-9]*" type="text" maxlength="30" required>
              <label for="">Usuario</label>
              <span class="bar"></span>
            </div>
            <div class="group">
              <i class="fa fa-unlock-alt fa-2x"></i>
              <input name="password" ng-model="user.password" class="inputs-sign" type="password" maxlength="30" required>
              <label for="">Contraseña</label>
              <span class="bar"></span>
            </div>
            <div class="group">
              <button ng-click="login()" class="iniciar-sesion" class="btn-rp" name="button">Iniciar</button>
            </div>
          </form>
        </div>
      </div>
    </section>

    <!--Contetn hide-->
    <a href="#" id="back-to-top" title="Back to top">&uarr;</a>

    <footer class="footer-distributed">
			<div class="footer-left">
				<h3>Tu<span>Chance</span></h3>
				<p class="footer-links">
          <a href="#">Home</a>
					·
					<a href="javascript:void(0)" class="about">About</a>
					·
					<a href="javascript:void(0)" class="contacto">Contacto</a>
					·
					<a href="javascript:void(0)" class="cuenta">Cuenta</a>
					·
					<a href="javascript:void(0)" class="requisitos">Requisitos</a>
				</p>
				<p class="footer-company-name">Tu Chance &copy; 2016</p>
			</div>

			<div class="footer-center">
				<div>
					<i class="fa fa-map-marker"></i>
					<p><span>21 Street Aqui</span> Armenia, Colombia</p>
				</div>
				<div>
					<i class="fa fa-phone"></i>
					<p>321 520 5524</p>
				</div>
				<div>
					<i class="fa fa-envelope"></i>
					<p><a href="mailto:sincorreo@nada.com">sincorreo@nada.com</a></p>
				</div>
			</div>

			<div class="footer-right">
				<p class="footer-company-about">
					<span>Mas sobre nosotros</span>
					Lorem ipsum dolor sit amet, consectateur adispicing elit.
          Fusce euismod convallis velit, eu auctor lacus vehicula sit amet.
				</p>
				<div class="footer-icons">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>
				</div>
			</div>
		</footer>

    <script type="text/javascript" src="../../public/js/mainscript.js"></script>
  </body>
</html>
