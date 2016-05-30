appModule.controller('ModoCtrl',function($scope,$http){
  $scope.modo = {};
  $scope.modo.idModo = "";
  $scope.modo.nombre = "";
  $scope.modo.tarifa = "";
  $scope.modo.habilitacion = "";
  $scope.modo.signo = "";

  $scope.modos=[];

  $scope.setTarifa = function(){
    $http({
      method:'POST',
      url:'http://localhost/TuChance/api/modos/',
      data: angular.toJson($scope.modo,true)
    }).then(function successCallback(response){
      console.log(angular.fromJson(response.data).status);
      if(angular.fromJson(response.data).status === "OK"){
          $scope.getModos();
      }
    }, function errorCallback(response){
      if(angular.fromJson(response.data).status ==="ERROR"){
        alert(angular.fromJson(response.data).messages[0]);
      }
    });
  };

  $scope.updateModo = function(id){
    $http({
      method:'PUT',
      url:'http://localhost/TuChance/api/modos/'+id,
    }).then(function successCallback(response){
      console.log(angular.fromJson(response.data).status);
      if(angular.fromJson(response.data).status === "OK"){
          $scope.getModos();
      }
    }, function errorCallback(response){
      if(angular.fromJson(response.data).status ==="ERROR"){
        alert(angular.fromJson(response.data).messages[0]);
      }
    });
  };

  $scope.getModos = function(){
    $http({
      method:'GET',
      url:'http://localhost/TuChance/api/modos/'
    }).then(function successCallback(response){
        $scope.modos =angular.fromJson(response.data);
    }, function errorCallback(response){
      console.log(response.data);
    });
  };

  $scope.getModos();

});
