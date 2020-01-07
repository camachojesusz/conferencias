var app = new Vue({
   el: '#app',
   data: {
      scanner: null,
      activeCameraId: null,
      cameras: [],
      scans: []
   },
   mounted: function () {
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
      scanner.addListener('scan', function (content)
      {
         $.ajax({
            url:  $("#site_url").val()+'reception/registry',
            type: 'POST',
            data: {expectant:content, conference:$("#conference_id").val()} ,
            dataType: 'html',
            success: function(response)
            {
 					alert(response);
 					window.location = window.location;
            }
         });
      });

      Instascan.Camera.getCameras().then(function (cameras) {
         if (cameras.length > 0)
         {
          scanner.start(cameras[0]);
         } else {
          console.error('Camara no disponible.');
        }
      }).catch(function (e) {
        console.error(e);
      });
      return;
   },

   methods: {
    formatName: function (name) {
      return name || '(unknown)';
    },
    selectCamera: function (camera) {
      this.activeCameraId = camera.id;
      this.scanner.start(camera);
    }
  }
});
$(document).on('change', '#qr_input', function()
{
	$.ajax({
		url:  $("#site_url").val()+'reception/registry_by_account',
		type: 'POST',
		data: {expectant:$("#qr_input").val(), conference:$("#conference_id").val()} ,
		dataType: 'html',
		success: function(response)
		{
			alert(response);
			window.location = window.location;
		}
	});
})

$(document).on('click', '#btn_qr_input', function()
{
	if($("#qr_input").val() === '')
	{
		alert('ERROR: campo vacío, vuelve a intentarlo');
		return;
	}
	$.ajax({
		url:  $("#site_url").val()+'reception/registry_by_account',
		type: 'POST',
		data: {expectant:$("#qr_input").val(), conference:$("#conference_id").val()} ,
		dataType: 'html',
		success: function(response)
		{
			alert(response);
			window.location = window.location;
		}
	});
})
