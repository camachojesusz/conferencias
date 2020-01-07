
<?php $this->load->view('header') ?>

   <div class="col-xs-12" style="background:#eee; position: relative; font-family: sans-serif; padding-bottom: 20px; text-align: auto;">

      <div class="col-xs-12">
         <br>
      </div>
      <div class="col-xs-12 col-md-3"></div>
      <div class="ccol-xs-12 col-md-6" style="position:relative; margin:auto; background:white; padding:20px;">
         <center>

            <div style=" background-color: #F05F40; padding: 1%; color: #FFFFFF;" >
               <h2>¡Hola, <?php echo $name;  ?>!</h2>
               <h4>Tenemos algo para ti...</h4>
            </div>

            <h3 hidden style="font-weight:100; color:#999">Tu Código QR</h3>

            <hr style="border:1px solid #ccc; width:100%">

            <p>
               Éste es tu código QR de acceso a las <strong>Conferencias de la Semana del Administrador 2019</strong>, sólo podrás ingresar a ellas con él.
            </p>

            <h5 style="font-weight:100; color:#999;">
               <span>NOTA: </span>Este código es personal e intransferible.
            </h5>

            <hr style="border:1px solid #ccc; width:100%">

            <h5 style="font-weight:100; color:#999;">
               <span>Te mostramos tu información personal:</span>
               <br>
               <br><label for=""><i class="fa fa-user"></i></label> <?php echo $registerkey; ?>
               <br><label for=""><i class="fa fa-user"></i></label> <?php echo $name." ".$secondname; ?>
               <br><label for=""><i class="fa fa-envelope"></i></label> <?php echo $email; ?>
               <br><label for="">Grupo:</label> <?php echo $group." ";?><label for="">Carrera:</label> <?php echo $carrier; ?>
               <br>
               <br>Puedes corregir tus datos dando clic <a href="<?php echo base_url()."registry/edit/".$key_e; ?>">aquí</a>.
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
