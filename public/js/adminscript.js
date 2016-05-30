$(document).on("ready",function(){

  $(".change").on("click",function(){

    if($(".enlace a").attr("class") == "oculto"){
      var percent = 0.20;
      var add_width = (percent*$('.navbar-left').parent().width())+'px';

      $(".navbar-left").animate({'width':add_width},100,function(){
        var textos = $(".oculto");
        $(textos).removeClass("oculto");
        for (var i = 0; i < textos.length; i++) {
            $(textos[i]).attr("class","element");
        }
      });

      var contenidoAdmin = $("#admin-content");
      $(contenidoAdmin).attr("class","admin-content");
      return;
    }

    if($(".enlace a").attr("class") == "element"){
      var textos = $(".element");
      $(textos).removeClass("element");
      for (var i = 0; i < textos.length; i++) {
          $(textos[i]).attr("class","oculto");
      }

      //navbar-right
      var percent = 0.04;
      var add_width = (percent*$('.navbar-left').parent().width())+'px';
      $(".navbar-left").animate({'width':add_width},100);

      var contenidoAdmin = $("#admin-content");
      $(contenidoAdmin).attr("class","ajustar");
      return;
    }

  });

  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  $(".fa-bars").on("click",function(){
    myFunction();
  });

  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {

      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

});
