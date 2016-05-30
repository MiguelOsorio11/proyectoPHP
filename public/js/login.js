$(document).on("ready",function(){

  $(".login").on("submit",function(e){
    e.preventDefault();
    $.getJSON($(this).attr("action"),$(this).serialize(),function(data){
      if(data.tipo==""){
        alert("Sus credenciales no son validas");
      }else if (data.tipo=="cliente") {
        location.href = "/TuChance/resources/views/cliente/index.php";
      }else if(data.tipo=="administrador"){
        location.href = "/TuChance/resources/views/admin/index.php";
      }
    });
  });


  $('.inputs-sign').on("focusout",function() {
    var inputs = document.getElementsByClassName("inputs-sign");
    var usuario = inputs[0];
    var password = inputs[1];
    if (usuario.value) {
      $(usuario).addClass("used");
    } else {
      $(usuario).removeClass("used");
    }
    if (password.value) {
      $(password).addClass("used");
    } else {
      $(password).removeClass("used");
    }
  });

});
