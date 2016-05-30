appModule.controller('ChatCtrl',function($scope,$http){
  //scope user
  $scope.user = {};
  $scope.user.idUsuario = "";
  $scope.user.nombre = "";
  $scope.user.username = "";
  $scope.user.password = "";
  $scope.user.tipo = "cliente";
  $scope.user.cedula = "";
  $scope.user.email = "";
  $scope.user.estado = "";
  $scope.user.sesion="";

  $scope.users=[];

  //scope mensaje
  $scope.mensaje = {};
  $scope.mensaje.idMensaje = "";
  $scope.mensaje.mensaje = "";
  $scope.mensaje.idUsuarioDestino="";

  //asign
  $scope.asign = {};
  $scope.asign.nombre = "Todos Los Usuarios";

  $scope.getUsers = function(){
    $http({
      method:'GET',
      url:'http://localhost/TuChance/api/users/clientes'
    }).then(function successCallback(response){
        $scope.users = angular.fromJson(response.data);
    }, function errorCallback(response){
      console.log(response.data);
    });
  };

  $scope.setUser = function(id,nombre){
    var posicion = $("#message").position();
    $('html,body').animate({
        scrollTop: posicion.top,
    }, 700);
    $scope.mensaje.idUsuarioDestino=id;
    $scope.asign.nombre = nombre;
  };

  $scope.sendMessage = function(){
    if($scope.asign.nombre == "Todos Los Usuarios"){

        //mensaje a todos los clientes
        $http({
          method:'POST',
          url:'http://localhost/TuChance/api/mensaje/usuarios/',
          data: angular.toJson($scope.mensaje,true)
        }).then(function successCallback(response){
          if(angular.fromJson(response.data).status === "OK"){
            $('.content-message').val("");
            $('.content-message').attr("placeholder","El mensaje ha sido enviado");
          }
        }, function errorCallback(response){
          if(angular.fromJson(response.data).status ==="ERROR"){
            alert(angular.fromJson(response.data).messages[0]);
          }
        });

    }else{
      $http({
        method:'POST',
        url:'http://localhost/TuChance/api/mensaje/usuario/',
        data: angular.toJson($scope.mensaje,true)
      }).then(function successCallback(response){
        if(angular.fromJson(response.data).status === "OK"){
          $('.content-message').val("");
          $('.content-message').attr("placeholder","El mensaje ha sido enviado");
        }
      }, function errorCallback(response){
        if(angular.fromJson(response.data).status ==="ERROR"){
          alert(angular.fromJson(response.data).messages[0]);
        }
      });
    }
  };

  $scope.getUsers();

});
