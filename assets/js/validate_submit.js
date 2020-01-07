
/*=============================================>>>>>
= HABILITAR EL BOTON DE ENVÍO AL LEER LOS TERMINOS DE LICENCIA =
===============================================>>>>>*/
function validate_submit(obj){
  var d = document.f_registry;
  if (obj.checked==true)
  {
    d.f_submit.disabled = false;
  }
  else
  {
    d.f_submit.disabled = true;
  }
}

/*=============================================>>>>>
= INHABILITAR COPIADO Y PEGADO =
===============================================>>>>>*/

$(document).ready(function(){

   $("#txtregisterkey1").on('paste', function(e){
      e.preventDefault();
      alert('Esta acción está prohibida');
   })

   $("#txtregisterkey1").on('copy', function(e){
      e.preventDefault();
      alert('Esta acción está prohibida');
   })

   $("#txtregisterkey2").on('paste', function(e){
      e.preventDefault();
      alert('Esta acción está prohibida');
   })

   $("#txtregisterkey2").on('copy', function(e){
      e.preventDefault();
      alert('Esta acción está prohibida');
   })

   $("#txtemail").on('paste', function(e){
      e.preventDefault();
      alert('Esta acción está prohibida');
   })

   $("#txtemail").on('copy', function(e){
      e.preventDefault();
      alert('Esta acción está prohibida');
   })

   $("#txtemail2").on('paste', function(e){
      e.preventDefault();
      alert('Esta acción está prohibida');
   })

   $("#txtemail2").on('copy', function(e){
      e.preventDefault();
      alert('Esta acción está prohibida');
   })
})
