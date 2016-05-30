appModule.controller('indexController',function($scope,$http,$cookies,$cookieStore,$location){

  $scope.admin = {};
  $scope.admin.username = $cookies.get("username");

  $scope.logout = function(){
    $cookies.remove("username",{path:'/'});
    $cookies.remove("password",{path:'/'});
    $cookies.remove("tipo",{path:'/'});
    $cookies.remove("id",{path:'/'});
    window.location.assign("http://localhost/TuChance/resources/views/index.php");
  };

});
