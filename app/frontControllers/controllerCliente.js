var appModule = angular.module('app.Controllers',[]);

appModule.controller('indexController',function($scope,$http,$cookies,$cookieStore,$location){

  $scope.user = {};
  $scope.user.username = $cookies.get("username");

  $scope.logout = function(){
    $cookies.remove("username",{path:'/'});
    $cookies.remove("password",{path:'/'});
    $cookies.remove("tipo",{path:'/'});
    $cookies.remove("id",{path:'/'});
    window.location.assign("http://localhost/TuChance/resources/views/index.php");
  };

});



//CONTROLADOR DE LA VENTANA INICIO
appModule.controller('AppHome',function($scope,$http){

  $scope.ventasClientes= [];
  $scope.ventaCliente={};
  $scope.ventaCliente.nombre="";
  $scope.ventaCliente.numeroVenta="";

    $scope.getLoterias= function(){
     $http({
      method : 'GET',
      url: 'http://localhost/TuChance/api/apuestas/clientes'
    }).then(function successCallback(response) {      
      $scope.ventasClientes = angular.fromJson(response.data);    
       }, function errorCallback(response){
         console.log(response.data);
      });
  }

   $scope.getLoterias();
});

//CONTROLADOR DE LA VENTA HACER CHANCE
appModule.controller('AppHacerChance',function($scope,$http,$cookies){
 
  $scope.acumulado=0;
	$scope.premio="";
  $scope.numero=0;
  $scope.serie=0;
  $scope.zoodiaco="";

	$scope.listaSignosZoodiaco= ['Acuario','Piscis', 'Aries','Tauro','Geminis','Cancer',
                               'Leo','Virgo', 'Libra', 'Escorpion', 'Sagitario','Capricornio'];
	
  $scope.valorApostar="";

  /*Datos de la loteria*/
  $scope.loterias=[]; //se almacena los datos de todas las loterias de la DB
  //atributos de la loteria
  $scope.loteria={};
  $scope.loteria.id=0;
  $scope.loteria.nombre=""; //Loteria que se escoge en la ventana
  $scope.loteria.serie="";
 
  /*Datos de los modo de apuestas (tipos de chance)*/
  $scope.listaModosApuesta=[];
  $scope.modoApuesta={};
  $scope.modoApuesta.id="";
  $scope.modoApuesta.nombre=""; // 
  $scope.modoApuesta.tarifa="";
  $scope.modoApuesta.habilitacion="";
  $scope.modoApuesta.signo="";

  /*Datos de las apuestas*/
  $scope.apuestas=[];
  $scope.apuesta={};
  $scope.apuesta.valor="";
  $scope.apuesta.idModo_apuesta="";
  $scope.apuesta.idTransaccion="";
  $scope.apuesta.idLoteria="";
  $scope.apuesta.idUsuario="";
  $scope.apuesta.numeroApostado=0;
  $scope.apuesta.serieApostada=0;
  $scope.apuesta.signoZoodiaco="";

  /*Datos transaccion*/ 
  $scope.transaccion={};
  $scope.transaccion.idTransaccion="";
  $scope.transaccion.acumulado=0;

  /*datos para mostrar en la tabla de ventas*/
  $scope.ventas=[];
  $scope.venta={};
  $scope.venta.tipoChance="";
  $scope.venta.loteria="";
  $scope.venta.valor="";

  $scope.oculto=true;
  $scope.esSerie=true;
  $scope.ocultar = function(){
      if($scope.modoApuesta.nombre=="Zoodiaco"){
        $scope.oculto=false;
      }else  $scope.oculto=true;

      if($scope.modoApuesta.nombre=="4 cifras con serie"){
        $scope.esSerie=false;
      }else  $scope.esSerie=true;
  }

  $scope.getLoterias= function(){
     $http({
      method : 'GET',
      url: 'http://localhost/TuChance/api/loterias'
    }).then(function successCallback(response) {
      
      $scope.loterias = angular.fromJson(response.data);
       }, function errorCallback(response){
         console.log(response.data);
      });
  }

  $scope.getModoApuestas= function(id){
    console.log(id);
     $http({
      method : 'GET',
      url: 'http://localhost/TuChance/api/modos/search/'+id
    }).then(function successCallback(response) {
      
      $scope.listaModosApuesta = angular.fromJson(response.data);
       }, function errorCallback(response){
         console.log(response.data);
      });
  }

  $scope.addApuesta = function(){
    $http({
      method: 'POST',
      url: 'http://localhost/TuChance/api/apuestas/',
      data: angular.toJson($scope.apuesta, true)
    }).then(function successCallback(response) {
      if(angular.fromJson(response).status==200){
        console.log("apuesta agregada");
      }
      }, function errorCallback(response){
        if(angular.fromJson(response).status === "ERROR"){
          alert(angular.fromJson(response).messages[0]);
        }
     });
  };

  $scope.addTransaccion = function(){
    $http({
      method: 'POST',
      url: 'http://localhost/TuChance/api/transacciones',
      data: angular.toJson($scope.transaccion, true)
    }).then(function successCallback(response) {
      if(angular.fromJson(response).status==200){
            console.log("trasacion agregada");
            $scope.getTransaccion();//extraemos la transacción de la base de datos
      }
      }, function errorCallback(response){
        if(angular.fromJson(response).status === "ERROR"){
          alert(angular.fromJson(response).messages[0]);
        }
     });
  };

  $scope.getTransaccion= function(){
     $http({
      method : 'GET',
      url: 'http://localhost/TuChance/api/transaccion/'
    }).then(function successCallback(response) {
      
      $scope.transaccion = angular.fromJson(response.data);
      console.log("id"+$scope.transaccion.idTransaccion)
       $scope.apuesta.idTransaccion=$scope.transaccion.idTransaccion;
         $scope.addApuesta();

       }, function errorCallback(response){
         console.log(response.data);
      });
  }

  $scope.realizarChance = function(){

    $scope.apuesta.valor          = $scope.valorApostar;
    $scope.apuesta.idModo_apuesta = $scope.modoApuesta.id;
    $scope.apuesta.idLoteria      = $scope.loteria.id; 
    $scope.apuesta.numeroApostado = $scope.numero;
    $scope.apuesta.serieApostada  = $scope.serie;
    $scope.apuesta.signoZoodiaco  = $scope.zoodiaco;
    console.log("apuesta numero "+  $scope.apuesta.numeroApostado+"  numero_apostado "+$scope.numero);
    $scope.apuesta.idUsuario=$cookies.get("id");

    actualizarTablaVenta();   
    
    $scope.apuestas.push($scope.apuesta);
    
  }


   function actualizarTablaVenta(){

       $scope.venta.tipoChance=$scope.modoApuesta.nombre;
       $scope.venta.loteria=$scope.loteria.nombre;
       $scope.venta.valor=$scope.valorApostar;
       $scope.ventas.push($scope.venta);
      

    $scope.transaccion.acumulado +=$scope.acumulado;
 
     console.log("serie"+$scope.apuesta.serieApostada);
     console.log("zoodiaco "+$scope.apuesta.signoZoodiaco);
   }


  $scope.realizarVenta= function(){    

    $scope.addTransaccion();//agregamos la transacción a la base de datos    
  }

   
  $scope.getLoterias();
  //$scope.getModoApuestas();

  //Funcion que permite actualizar los campos automaticamente en la ventana ($watch)
  $scope.$watch(function(){
    
     $scope.premio=$scope.modoApuesta.tarifa*Number($scope.valorApostar); 
     $scope.acumulado = $scope.valorApostar;
    // $rootScopeProvider.digestTtl(15);
    
     console.log($scope.acumulado);

  });  
});


/*
  Controlador de la pagina del chat.
*/
appModule.controller('AppChat',function($scope,$http){

  $scope.mensajes=[];
  $scope.mensaje={};
  $scope.mensaje.mensaje="";

  $scope.getModoApuestas= function(id){
     $http({
      method : 'GET',
      url: 'http://localhost/TuChance/api/mensajes/search/'+id
    }).then(function successCallback(response) {
      
      $scope.mensajes = angular.fromJson(response.data);
       }, function errorCallback(response){
         console.log(response.data);
      });
  }

  $scope.getModoApuestas(4);

});

/*
  Controlador de la pagina de la estadistica.
*/
appModule.controller('VerEstadisticas',function($scope,$http){

  $scope.sortType   = 'idTransaccion'; // set the default sort type
  $scope.sortReverse  = false;  // set the default sort order
  $scope.searchAcumulado   = '';     // set the default search/filter term

  $scope.transaccionesDias=[];
  $scope.transaccionesSemanas=[];
  $scope.transaccionesMeses=[];

  $scope.transaccion={};
  $scope.transaccion.idTransaccion="";
  $scope.transaccion.acumulado=0;
  $scope.transaccion.fecha="";

  $scope.totalDia=0;
  $scope.totalSemana=0;
  $scope.totalMes=0;


  //Petición que obtiene las transacciones del dia actual.
  $scope.getTransaccionDia= function(){
     $http({
      method : 'GET',
      url: 'http://localhost/TuChance/api/transacciones/dia'
    }).then(function successCallback(response) {      
       $scope.transaccionesDias = angular.fromJson(response.data);
       $scope.calcularDia();
       }, function errorCallback(response){
         console.log(response.data);
      });
  }

  //Petición que obtiene las transacciones de la semana actual.
  $scope.getTransaccionSemana= function(){
     $http({
      method : 'GET',
      url: 'http://localhost/TuChance/api/transacciones/semana'
    }).then(function successCallback(response) {      
       $scope.transaccionesSemanas = angular.fromJson(response.data);
        $scope.calcularSemana();
       }, function errorCallback(response){
         console.log(response.data);
      });
  }
  //Petición que obtiene las transacciones del mes actual.
  $scope.getTransaccionMes= function(){
     $http({
      method : 'GET',
      url: 'http://localhost/TuChance/api/transacciones/mes'
    }).then(function successCallback(response) {      
       $scope.transaccionesMeses = angular.fromJson(response.data);
       $scope.calcularMes();
       }, function errorCallback(response){
         console.log(response.data);
      });
  }



  $scope.getTransaccionDia();
  $scope.getTransaccionSemana();
  $scope.getTransaccionMes();

  $scope.calcularDia = function(){
    $scope.i=0;
    if($scope.transaccionesDias!==null || !$scope.transaccionesDias!== 'undefined'){
      for ($scope.i in $scope.transaccionesDias) {          
        $scope.totalDia =  Number($scope.totalDia) + Number($scope.transaccionesDias[$scope.i].acumulado);
             console.log($scope.totalDia);
      }
    }
  }

  $scope.calcularSemana = function(){
    $scope.i=0;

    if($scope.transaccionesSemanas!==null || !$scope.transaccionesSemanas!== 'undefined'){
      for ($scope.i in $scope.transaccionesSemanas) {          
        $scope.totalSemana =  Number($scope.totalSemana) + Number($scope.transaccionesSemanas[$scope.i].acumulado);
             console.log($scope.totalSemana);
      }
    }
  } 

  $scope.calcularMes = function(){
    $scope.i=0;
    if($scope.transaccionesMeses!==null || !$scope.transaccionesMeses!== 'undefined'){
      for ($scope.i in $scope.transaccionesMeses) {          
        $scope.totalMes =  Number($scope.totalMes) + Number($scope.transaccionesMeses[$scope.i].acumulado);
             
      }
    }   
  } 

});

