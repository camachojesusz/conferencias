<?php $this->load->view('header'); ?>

   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles2.css">
   <header>
      <div class="header-content">
         <div class="header-content-inner">
            <h1 id="homeHeading">¡Felicidades!</h1>
            <hr>
            <p>
               Has terminado tu registro con éxito, revisa la dirección de correo electrónico que nos proporcionaste en la bandeja de entrada o spam donde te enviamos algunos datos
            </p>
            <a href="<?php echo base_url()."registry"; ?>" class="btn btn-primary btn-xl page-scroll">Nuevo registro</a>
         </div>
      </div>
   </header>

   <script src="<?php echo base_url(); ?>assets/js/registro.js"></script>
</body>
</html>
