var modulo = angular.module('principal',['ngCookies','ngRoute']);

modulo.factory("auth", function($cookies,$cookieStore,$location,$http)
{
    return{
        login : function(user)
        {
          $http({
            method:'POST',
            url:'http://localhost/TuChance/api/user/login/',
            data: angular.toJson(user,true)
          }).then(function successCallback(response){
            if(angular.fromJson(response.data).status === "FAIL"){
              alert("Sus credenciales son invalidas");
            }else{

              //verificar el tipo de usuario
              if(response.data.tipo == "cliente"){
                $cookies.put("username",response.data.username,{path:'/'});
                $cookies.put("password",response.data.password,{path:'/'});
                $cookies.put("tipo","cliente",{path:'/'});
                $cookies.put("id",response.data.id,{path:'/'});

                //registrar localizacion y actualizar estado a online
                if (navigator.geolocation) {
                    var geo_options = {
                      enableHighAccuracy: true
                    };
                    navigator.geolocation.getCurrentPosition(function(posicion){
                    //llamada al servicio para actulizar ubicacion
                    var posicion = {"latitud":posicion.coords.latitude,"longitud":posicion.coords.longitude};
                    $http({
                      method:'PUT',
                      url:'http://localhost/TuChance/api/users/position/'+$cookies.get("id"),
                      data: angular.toJson(posicion,true)
                    }).then(function successCallback(response){
                      if(angular.fromJson(response.data).status === "OK"){
                          //el usuario ha sido localizado

                          //actualizar el estado a online
                          $http({
                            method:'PUT',
                            url:'http://localhost/TuChance/api/users/upsesion/'+$cookies.get("id")
                          }).then(function successCallback(response){
                            //El estado ha sido actualizado a online

                              window.location.assign("cliente/index.php");

                          }, function errorCallback(response){
                            if(angular.fromJson(response.data).status ==="ERROR"){
                              alert(angular.fromJson(response.data).messages[0]);
                            }
                          });
                      }
                    }, function errorCallback(response){
                      if(angular.fromJson(response.data).status ==="ERROR"){
                        alert(angular.fromJson(response.data).messages[0]);
                      }
                    });
                  },function(){alert("Se produjo un error");},geo_options);
                }else{
                  alert("no se permite la localizacion");
                }         

              }else if(response.data.tipo == "administrador"){
                $cookies.put("username",response.data.username,{path:'/'});
                $cookies.put("password",response.data.password,{path:'/'});
                $cookies.put("tipo","administrador",{path:'/'});
                $cookies.put("id",response.data.id,{path:'/'});
                window.location.assign("admin/index.php");
              }
            }
          }, function errorCallback(response){
            alert("Se ha producido un error al iniciar sesion");
          });

        },
        checkStatus : function()
        {
            //en el caso de que intente acceder al login y ya haya iniciado sesión lo mandamos a la home
            if(typeof($cookies.get("tipo")) != "undefined" && typeof($cookies.get("username")) != "undefined" && typeof($cookies.get("password")) != "undefined" && typeof($cookies.get("id")) != "undefined"){
                if($cookies.get("tipo") == "cliente"){
                  window.location.assign("cliente/index.php");
                }else if($cookies.get("tipo") == "administrador"){
                  window.location.assign("admin/index.php");
                }
            }
        }
    }
});

modulo.controller('loginController', function($scope,$cookies,$cookieStore,auth)
{
    $scope.user = {};
    $scope.user.username = "";
    $scope.user.password = "";

    $scope.login = function()
    {
        auth.login($scope.user);
    }
});

modulo.run(function($rootScope, auth)
{
    auth.checkStatus();
});
