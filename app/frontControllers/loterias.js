appModule.controller('LoteriaCtrl',function($scope,$http){
  $scope.loteria = {};
  $scope.loteria.idLoteria = "";
  $scope.loteria.nombre = "";
  $scope.loteria.serie = "";

  $scope.loterias=[];

  $scope.deleteLoteria = function(id){
    $http({
      method:'DELETE',
      url:'http://localhost/TuChance/api/loterias/'+id
    }).then(function successCallback(response){
          $scope.getLoterias();
    }, function errorCallback(response){
      if(angular.fromJson(response.data).status ==="ERROR"){
        alert(angular.fromJson(response.data).messages[0]);
      }
    });
  };

  $scope.addLoteria = function(){
    $http({
      method:'POST',
      url:'http://localhost/TuChance/api/loterias/',
      data: angular.toJson($scope.loteria,true)
    }).then(function successCallback(response){
      if(angular.fromJson(response.data).status === "OK"){
        $scope.getLoterias();
      }
    }, function errorCallback(response){
      if(angular.fromJson(response.data).status === "ERROR"){
        alert(angular.fromJson(response.data).messages[0]);
      }
    });
  };

  $scope.getLoterias = function(){
    $http({
      method:'GET',
      url:'http://localhost/TuChance/api/loterias/'
    }).then(function successCallback(response){
        $scope.loterias =angular.fromJson(response.data);
    }, function errorCallback(response){
      console.log(response.data);
    });
  };

  $scope.getLoterias();

});
