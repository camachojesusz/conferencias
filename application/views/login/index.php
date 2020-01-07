
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <title>Semana del Aministrador 2019</title>

  <link rel="stylesheet" href="<?php echo base_url()."assets/adminlte/";?>bower_components/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/adminlte/";?>bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/adminlte/";?>bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/adminlte/";?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/adminlte/";?>bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/adminlte/";?>dist/css/AdminLTE.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/adminlte/";?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo base_url()."assets/adminlte/";?>dist/css/styles.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="icon" href="<?php echo base_url()."assets/"; ?>img/icon.ico">

</head>

<body class="hold-transition skin-purple-light login-page">

   <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/styles3.css">

   <div class="login-box">

      <div class="login-logo">
         <b>Semana del</b> Administrador 2019
      </div>

      <div class="login-box-body">
         <h4 class="display-4 text-center">Iniciar Sesión</h4>

         <?php if (isset($fail_user)): ?>
            <div class="alert alert-danger">
               <strong>¡Error!</strong> Usuario o contraseña incorrectos
            </div>
         <?php endif; ?>

         <?php echo form_open('login/is_post', array('autocomplete' => 'off')); ?>
            <div class="form-group has-feedback">
               <label for="txtuser">Usuario</label>
               <input type="text" id="txtuser" name="txtuser" class="form-control" placeholder="usuario" required="">
               <i class="fa fa-user form-control-feedback"></i>
            </div>

            <div class="form-group has-feedback">
               <label for="txtpass">Contraseña</label>
               <input type="password" id="txtpass" name="txtpass" class="form-control" placeholder="contraseña" required="">
               <i class="fa fa-lock form-control-feedback"></i>
            </div>

            <div class="row">
               <div class="col-xs-12">
                  <button type="submit" class="btn btn-primary btn-block btn-flat"><b>Ingresar</b> <span class="glyphicon glyphicon-log-in"></span></button>
               </div>
            </div>

         <?php echo form_close(); ?>
      </div>
   </div>


<script src="<?php echo base_url()."assets/adminlte/";?>bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url()."assets/adminlte/";?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url()."assets/adminlte/";?>bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url()."assets/adminlte/";?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url()."assets/adminlte/";?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()."assets/adminlte/";?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url()."assets/adminlte/";?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url()."assets/adminlte/";?>bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url()."assets/adminlte/";?>dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url()."assets/adminlte/";?>dist/js/demo.js"></script>

</body>
</html>
