appModule.controller('NumeroCtrl',function($scope,$http){
  $scope.bloqueo = {};
  $scope.bloqueo.idNumero = "";
  $scope.bloqueo.numero = "";

  $scope.bloqueos=[];

  $scope.updateBloqueo = function(id){
    $http({
      method:'PUT',
      url:'http://localhost/TuChance/api/bloqueos/'+id,
    }).then(function successCallback(response){
      console.log(angular.fromJson(response.data).status);
      if(angular.fromJson(response.data).status === "OK"){
          $scope.getBloqueos();
      }
    }, function errorCallback(response){
      if(angular.fromJson(response.data).status ==="ERROR"){
        alert(angular.fromJson(response.data).messages[0]);
      }
    });
  };

  $scope.addBloqueo = function(){
    $http({
      method:'POST',
      url:'http://localhost/TuChance/api/bloqueos/',
      data: angular.toJson($scope.bloqueo,true)
    }).then(function successCallback(response){
      if(angular.fromJson(response.data).status === "OK"){
        $scope.getBloqueos();
      }
    }, function errorCallback(response){
      if(angular.fromJson(response.data).status ==="ERROR"){
        alert(angular.fromJson(response.data).messages[0]);
      }
    });
  };

  $scope.getBloqueos = function(){
    $http({
      method:'GET',
      url:'http://localhost/TuChance/api/bloqueos/'
    }).then(function successCallback(response){
        $scope.bloqueos =angular.fromJson(response.data);
    }, function errorCallback(response){
      console.log(response.data);
    });
  };

  $scope.getBloqueos();

});
