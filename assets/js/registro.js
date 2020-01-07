/*=============================================>>>>>
= FORMATEAR EL CAMPO =
===============================================>>>>>*/
$("input").focus(function(){
  $(".alert").remove();
})

/*=============================================>>>>>
= Validar NUMERO DE CONTROL =
===============================================>>>>>*/
var validarNumeroControl = false;

var rutaOculta = $("#rutaOculta").val();

$(document).on("change", "#numeroControl", function(){
  var numeroControl = $("#numeroControl").val();

  var datos = new FormData();
  datos.append("numero_control", numeroControl);
  $.ajax({
    url: rutaOculta + "ajax/ajax.buscar.usuario.php",
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta){
      if (respuesta == "false") {
        $(".alert").remove();
        validarNumeroControl = false;
      } else {
          $("#numeroControl").parent().before('<div class="alert alert-warning"><strong>!Error!</strong> Tu número de control ya ha sido registrado en las conferencias</div>');
          validarNumeroControl = true;
      }
    }
  });
})

/*=============================================>>>>>
= Validar Registro Usuarios =
===============================================>>>>>*/
function validateForm() {
    var nombre = $("#nombre").val();
    var email = $("#email").val();
    var numeroControl = $("#numeroControl").val();

    /*=============================================>>>>>
    = Validar Numero de Control =
    ===============================================>>>>>*/
    if (numeroControl != "") {
      var exprecion = /^[0-9]+$/;
      if (!exprecion.test(numeroControl)){
        $("#numeroControl").parent().before('<div class="alert alert-warning"><strong>!Error!</strong> No se permiten letras o Caracteres Especiales</div>');
        return false;
      }
    } else {
      $("#numeroControl").parent().before('<div class="alert alert-warning"><strong>!Atención!</strong> Este campo es obligatorio</div>');
      return false;
    }

    /*=============================================>>>>>
    = Validar Nombre =
    ===============================================>>>>>*/
    if (nombre != "") {
      var exprecion = /^[a-zA-ZñÑáéíóúÁÉíÓÚ ]*$/;
      if (!exprecion.test(nombre)){
        $("#nombre").parent().before('<div class="alert alert-warning"><strong>!Error!</strong> No se permiten Números o Caracteres Especiales</div>');
        return false;
      }
    } else {
      $("#nombre").parent().before('<div class="alert alert-warning"><strong>!Atención!</strong> Este campo es obligatorio</div>');
      return false;
    }
    /*=============================================>>>>>
    = Validar Email =
    ===============================================>>>>>*/
    if (email != "") {
      var exprecion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
      if (exprecion.test(email)){
      } else{
        $("#email").parent().before('<div class="alert alert-warning"><strong>!Error!</strong> Error escriba correctamente el Correo Electrónico</div>');
        return false;
      }
    } else {
      $("#registroEmail").parent().before('<div class="alert alert-warning"><strong>!Atención!</strong> Este campo es obligatorio</div>');
      return false;
    }

    if (validarNumeroControl) {
       $("#numeroControl").parent().before('<div class="alert alert-danger"><strong>!Error!</strong> Tu número de control ya ha sido registrado en las conferencias</div>');
       return false;
     }

  return true;
}


/* INGRESAR DATOS */
$(document).on('submit', "#registro-alumno", function(e){

  e.preventDefault()

  var respuesta = validateForm();

  if (respuesta) {
    var datos = new FormData(this);
      $.ajax(
      {
        type: 'POST',
        data: datos,
        url: rutaOculta + "ajax/ajax.ingreso.usuario.php",
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function(respuesta)
          {
            if (respuesta == 'ok') {
    							window.location = rutaOculta + "confirmacion";
    				}
            if (respuesta == 'caracteres-especiales'){
              $("#alerta").before('<div class="alert alert-danger"><strong>!Error!</strong>Por favor verifica que los campos esten correctamente llenados</div>');
            }
          }
      });
    }
});
