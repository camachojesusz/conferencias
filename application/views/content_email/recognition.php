
<?php $this->load->view('header') ?>

   <div class="col-xs-12" style="background:#eee; position: relative; font-family: sans-serif; padding-bottom: 20px; text-align: auto;">

      <div class="col-xs-12">
         <br>
      </div>
      <div class="col-xs-12 col-md-3"></div>
      <div class="ccol-xs-12 col-md-6" style="position:relative; margin:auto; background:white; padding:20px;">
         <center>

            <div style=" background-color: #F05F40; padding: 1%; color: #FFFFFF;" >
               <h2>¡Felicidades, <?php echo $info_atendance->name_expectant; ?>!</h2>
               <h4>Tenemos buenas noticias...</h4>
            </div>

            <hr style="border:1px solid #ccc; width:100%">

            <p class="text-center">
               Agradecemos tu participación en las <i>Conferencias</i> de la <strong>Semana del Administrador 2019</strong>.
               <br><br>
               Tu <i>Reconocimiento de Asistencia</i> a la conferencia: <b><?php echo $info_atendance->tittle_conference; ?></b>, ya está disponible para ti.
               <br><br>
               Da clic en <a target="_blank" href="<?php echo base_url()."home/recognition/".$info_atendance->id_conference."/".$info_atendance->key_e_expectant; ?>" >Abrir PDF</a> para ver tu reconocimento
            </p>

            <br>

            <h5 style="font-weight:100; color:#999;" align="justify">
               <span><b>NOTA: </b></span>Si encontraste este correo en la bandeja de spam o correo no deseado, guarda tu reconocimento para evitar que sea eliminado por el proveedor de servicio de correo.
            </h5>

            <hr style="border:1px solid #ccc; width:100%">

            <div>
               <p> © 2019. Derechos Reservados | Design by  <a target="_blank" href="https://grupoinntec.com.mx/"> Grupo InnTec</a></p>
            </div>

         </center>
      </div>

      <div class="col-xs-12 col-md-3"></div>

   </div>

</body>
</html>

<style media="screen">

</style>
