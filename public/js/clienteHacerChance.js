$(document).on("ready",function(){

  $(".login").on("submit",function(e){
    e.preventDefault();
    //todo lo necesario para el inicio de sesion


    location.href= "admin/index.php";

  });


  $('.inputs-sign').on("focusout",function() {
    var inputs = document.getElementsByClassName("inputs-sign");
    var numeroApostar = inputs[0];
    var valor = inputs[1];
    var codigo = inputs[2];
    var celular = inputs[3];
    var acumulado = inputs[4];

    if (numeroApostar.value) {
      $(numeroApostar).addClass("used");
    } else {
      $(numeroApostar).removeClass("used");
    }
    if (valor.value) {
      $(valor).addClass("used");
    } else {
      $(valor).removeClass("used");
    }
    if (codigo.value) {
      $(codigo).addClass("used");
    } else {
      $(codigo).removeClass("used");
    }
    if (celular.value) {
      $(celular).addClass("used");
    } else {
      $(celular).removeClass("used");
    }
    if (acumulado.value) {
      $(acumulado).addClass("used");
    } else {
      $(acumulado).removeClass("used");
    }

  });

});