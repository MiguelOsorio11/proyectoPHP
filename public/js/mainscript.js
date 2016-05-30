$(document).on("ready",function(){
  //Slider
  $('.bxslider').bxSlider({
      mode: 'fade',
      auto:true
  });
  //Back to top
  if ($('#back-to-top').length) {
    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').attr("class","back").fadeIn();
            } else {
                $('#back-to-top').attr("class","hide");
            }
        };
    backToTop();
    $(window).on('scroll', function () {
        backToTop();
    });
    $('#back-to-top').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
  }

  //Enlaces
  $(".about").on("click",function(){
    swal("Tu Chance", "Somos una organización reconocida a nivel nacional.", "success");
  });
  $(".contacto").on("click",function(){
    swal("Telefono","Para información de premios y tipos de chances llame a la linea gratuita 01800555555.");
  });
  $(".cuenta").on("click",function(){
    swal("","Si desea ser parte de nuestra organización dirijase al punto de atención mas cercano.");
  });
  $(".requisitos").on("click",function(){
    swal("","Al acceder a esta pagina usted acepta todas las condiciones estipuladas en nuestro acuerdo.");
  });

  //imagenes
  $(".change").on("click",function(){
    swal("","Cambia tu forma de vivir ganando el premio mayor.");
  });
  $(".formula").on("click",function(){
    swal("","Selecciona tu forma de apostar entre un gran numero de opciones. Sin duda ganaras.");
  });
  $(".zodiaco").on("click",function(){
    swal("","Al acceder a esta pagina usted acepta todas las condiciones estipuladas en nuestro acuerdo.");
  });

});
