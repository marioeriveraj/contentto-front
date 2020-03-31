import "../../node_modules/@fullcalendar/core/main.js";
import "../../node_modules/@fullcalendar/daygrid/main.js";
var urlhome = "http://localhost/conttento_front/";

// Registro
$("#registro-form").submit(function(e) {
  e.preventDefault();

  var form = $("#registro-form").serialize();
  var url = "registrando.php";

  $.ajax({
    type: "post",
    url: url,
    data: form,
    dataType: "json",
    success: function(data) {
      Swal.fire(data.titulo, data.msg, data.tipo).then(() => {
        window.location.href = urlhome + "login.php";
      });
    },
    error: function(data) {
      Swal.fire(data.titulo, data.msg, data.tipo);
    }
  });
  return false;
});
// Inicio de sesion
$("#login-form").submit(function(e) {
  e.preventDefault();

  var form = $("#login-form").serialize();
  var url = "validate.php";

  $.ajax({
    type: "post",
    url: url,
    data: form,
    dataType: "json",
    success: function(data) {
      if (data.bol == 1) {
        Swal.fire(data.titulo, data.msg, data.tipo).then(() => {
          window.location.href = urlhome;
        });
      } else {
        window.location.href = urlhome;
      }
    },
    error: function(data) {
      Swal.fire(data.titulo, data.msg, data.tipo);
    }
  });
  return false;
});

// RECOVERY FORM
$("#recovery-form").submit(function(e) {
  e.preventDefault();

  var form = $("#recovery-form").serialize();
  var url = "getrecovery.php";

  $.ajax({
    type: "post",
    url: url,
    data: form,
    dataType: "json",
    success: function(data) {
      if (data.bol == 1) {
        Swal.fire(data.titulo, data.msg, data.tipo).then(() => {
          window.location.href = urlhome;
        });
      } else {
        Swal.fire(data.titulo, data.msg, data.tipo);
      }
    },
    error: function(data) {
      Swal.fire(data.titulo, data.msg, data.tipo);
    }
  });
  return false;
});

// ACTUALIZAR CONTRASENA
$("#actualizarcontrasena-form").submit(function(e) {
  e.preventDefault();

  var form = $("#actualizarcontrasena-form").serialize();
  var url = "../setcontrasena.php";

  $.ajax({
    type: "post",
    url: url,
    data: form,
    dataType: "json",
    success: function(data) {
      if (data.bol == 1) {
        Swal.fire(data.titulo, data.msg, data.tipo).then(() => {
          window.location.href = urlhome;
        });
      } else {
        Swal.fire(data.titulo, data.msg, data.tipo);
      }
    },
    error: function(data) {
      Swal.fire(data.titulo, data.msg, data.tipo).then(() => {
        window.location.href = urlhome;
      });
    }
  });
  return false;
});

// Front index reservar
$("#reserva-rapida").submit(function(e) {
  

  var llegada = $("#fecha-llegada").val();
  var salida = $("#fecha-salida").val();
  var cantidad = $("#cant-huespedes").val();
  var hoy = new Date();
  var month = hoy.getMonth() + 1;
  var day = hoy.getDate();
  var year = hoy.getFullYear();
  var fec= month+'/'+day+'/'+year;
  if (llegada < salida && fec < llegada) {
        console.log('mamalan');
        sessionStorage.setItem("entrada", llegada);
        sessionStorage.setItem("salida", salida);
        sessionStorage.setItem("cantidad", cantidad); 
        return true;
  } else {
    Swal.fire("Oops...", "Verifica las fechas", "error");
    return false;
  }

  
});
// ACTUALIZAR CONTRASENA
$("#rsrv-data").on('change','#cantHuespedes',function(e) {
  e.preventDefault();

  var form = $("#cantHuespedes").val();
  var te = $("#prec").val();
  console.log(te);
  var url = "actualizartarifasingle.php";
  
  $.ajax({
    type: "post",
    url: url, 
    data: 'tar='+form,
    dataType: "json",
    success: function(data) {
      $(te).val(data); 
    },
    error: function(data) {
    }
  });
  return false;
});
 
$(".minhuesped").on('click', function(){
  var div =$(this).data("min");
  var num =$(div).val();
  if(num > 0){
    num--;
  }
  $(div).val(num);
});
$(".maxhuesped").on('click', function(){
  var div =$(this).data("max");
  var num =$(div).val();
  if(num < 6){
    num++;
  }
  $(div).val(num);
});

//////////////////////////////////////////


$(function() {
  $("input.fecha").daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format("YYYY"), 10)
  });
});
$(".slider-for").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  fade: true,
  asNavFor: ".slider-nav"
});
$(".slider-nav").slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  asNavFor: ".slider-for",
  dots: false,
  arrows: false,
  centerMode: true,
  focusOnSelect: true
});
$(".style-carousel").slick({
  lazyLoad: "ondemand",
  dots: true,
  nextArrow:
    '<div class="slick-arrow slick-next"><i class="fas fa-chevron-right"></i></div>',
  prevArrow:
    '<div class="slick-arrow slick-prev"><i class="fas fa-chevron-left"></i></div>',
  infinite: true,
  speed: 300,
  variableWidth: true
});

$("body").scrollspy({
  target: "#mainNav",
  offset: 100
});

// Collapse Navbar
var navbarCollapse = function() {
  if ($("#mainNav").offset().top > 100) {
    $("#mainNav").addClass("navbar-shrink");
  } else {
    $("#mainNav").removeClass("navbar-shrink");
  }
};
// Collapse now if page is not at top
navbarCollapse();
// Collapse the navbar when page is scrolled
$(window).scroll(navbarCollapse);

document.addEventListener("DOMContentLoaded", function() {
  var calendarEl = document.getElementById("calendar");

  var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: ["dayGrid"]
  });

  calendar.render();
});
