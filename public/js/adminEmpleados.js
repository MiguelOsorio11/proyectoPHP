$(document).on("ready",function(){

  initMap();

  $(".posicionescritorio").on("click",function(){
    var posicion = $(".mapa").position();
    $('html,body').animate({
        scrollTop: posicion.top,
    }, 700);

    //sacar informacion del usuario
  });

});

function openOption(evt, opcion) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tabcontent.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the link that opened the tab
  document.getElementById(opcion).style.display = "block";
  evt.currentTarget.className += " active";
}

function initMap() {
  var mapCanvas = document.getElementById("map");

  var position=new google.maps.LatLng(4.565473550710278,-74.02587890625);
  var mapOptions = {
      center: position,
      zoom: 10
  }
  var map = new google.maps.Map(mapCanvas, mapOptions);

  var marker=new google.maps.Marker({
    position:position,
    map: map,
    title: 'Empleado: Miguel'
  });
}
