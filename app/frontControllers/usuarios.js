appModule.controller('UserCtrl',function($scope,$http){
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

  $scope.localizar = function(id){
    var posicion = $(".mapa").position();
    $('html,body').animate({
        scrollTop: posicion.top,
    }, 700);

    $http({
      method:'GET',
      url:'http://localhost/TuChance/api/user/position/'+id
    }).then(function successCallback(response){
          //$scope.getUsers();
          //llamar a setPosition
          setPosition(response.data.latitud,response.data.longitud);
    }, function errorCallback(response){
      if(angular.fromJson(response.data).status ==="ERROR"){
        alert(angular.fromJson(response.data).messages[0]);
      }
    });
  }

  $scope.deleteUser = function(id){
    $http({
      method:'DELETE',
      url:'http://localhost/TuChance/api/users/'+id
    }).then(function successCallback(response){
          $scope.getUsers();
    }, function errorCallback(response){
      if(angular.fromJson(response.data).status ==="ERROR"){
        alert(angular.fromJson(response.data).messages[0]);
      }
    });
  };

  $scope.updateUser = function(id){
    $http({
      method:'PUT',
      url:'http://localhost/TuChance/api/users/'+id,
    }).then(function successCallback(response){
      console.log(angular.fromJson(response.data).status);
      if(angular.fromJson(response.data).status === "OK"){
          $scope.getUsers();
      }
    }, function errorCallback(response){
      if(angular.fromJson(response.data).status ==="ERROR"){
        alert(angular.fromJson(response.data).messages[0]);
      }
    });
  };

  $scope.addUser = function(){
    $http({
      method:'POST',
      url:'http://localhost/TuChance/api/users/',
      data: angular.toJson($scope.user,true)
    }).then(function successCallback(response){
      if(angular.fromJson(response.data).status === "OK"){
        $scope.getUsers();
      }
    }, function errorCallback(response){
      if(angular.fromJson(response.data).status ==="ERROR"){
        alert(angular.fromJson(response.data).messages[0]);
      }
    });
  };

  $scope.getUsers = function(){
    $http({
      method:'GET',
      url:'http://localhost/TuChance/api/users/clientes'
    }).then(function successCallback(response){
        $scope.users =angular.fromJson(response.data);
    }, function errorCallback(response){
      console.log(response.data);
    });
  };

  $scope.getUser = function(id){
    $http({
      method:'GET',
      url:'http://localhost/my-rest-api/api/user/'+id
    }).then(function successCallback(response){
        $scope.users =response.data;
    }, function errorCallback(response){
      console.log(response.data);
    });
  };

  function initMap() {
    var mapCanvas = document.getElementById("map");

    var position=new google.maps.LatLng(4.555625562620416,-75.6598808005158);
    var mapOptions = {
        center: position,
        zoom: 7
    }
    var map = new google.maps.Map(mapCanvas, mapOptions);
  }

  function setPosition(latitud,longitud){
    var mapCanvas = document.getElementById("map");

    var position=new google.maps.LatLng(latitud,longitud);
    var mapOptions = {
        center: position,
        zoom: 15
    }
    var map = new google.maps.Map(mapCanvas, mapOptions);

    var marker=new google.maps.Marker({
      position:position,
      map: map,
      title: 'Empleado: Javier'
    });
  }

  initMap();
  $scope.getUsers();

});
