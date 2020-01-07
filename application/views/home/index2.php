
<?php $this->load->view('header2'); ?>
   <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/styles3.css">

   <div class="container-fluid" style="padding-top: 55px; background: #F8F9F9;">
      <div class="col-xs-12 col-md-1"></div>
      <div class="col-xs-12 col-md-10">
         <h1 class="hidden-xs hidden-sm">Semana del Administrador <span>2019</span></h1>
         <h2 class="hidden-md hidden-lg text-center">Semana del Administrador <span>2019</span></h2>

         <div class="col-xs-12 col-md-4">
            <div class="small-box bg-aqua">
               <div class="inner">
                  <?php if (isset($count_conference) && !empty($count_conference)): ?>
                     <h3><?php echo $count_conference->num_rows('key_e_conference'); ?></h3>
                  <?php else: ?>
                     <h3>0</h3>
                  <?php endif; ?>
                  <h4>Conferencias</h4>
               </div>
               <div class="icon">
                  <i class="fa fa-comments-o"></i>
               </div>
               <a href="<?php echo base_url()."conference"; ?>" class="small-box-footer">
                  Ver detalles <i class="fa fa-arrow-circle-right"></i>
               </a>
            </div>
         </div>

         <div class="col-xs-12 col-md-4">
            <div class="small-box bg-yellow">
               <div class="inner">
                  <?php if (isset($count_expectant) && !empty($count_expectant)): ?>
                     <h3><?php echo $count_expectant->num_rows('registerkey_expectant'); ?></h3>
                  <?php else: ?>
                     <h3>0</h3>
                  <?php endif; ?>
                  <h4>Asistentes</h4>
               </div>
               <div class="icon">
                  <i class="fa fa-ticket"></i>
               </div>
               <a href="<?php echo base_url()."expectant"; ?>" class="small-box-footer">
                  Ver detalles <i class="fa fa-arrow-circle-right"></i>
               </a>
            </div>
         </div>

         <div class="col-xs-12 col-md-4">
            <div class="small-box bg-red">
               <div class="inner">
                  <?php if (isset($count_users) && !empty($count_users)): ?>
                     <h3><?php echo $count_users->num_rows('username_users'); ?></h3>
                  <?php else: ?>
                     <h3>0</h3>
                  <?php endif; ?>
                  <h4>Usuarios</h4>
               </div>
               <div class="icon">
                  <i class="fa fa-users"></i>
               </div>
               <a href="<?php echo base_url()."users"; ?>" class="small-box-footer">
                  Ver detalles <i class="fa fa-arrow-circle-right"></i>
               </a>
            </div>
         </div>

      </div>
      <div class="col-xs-12 col-md-1"></div>
   </div>

<?php $this->load->view('footer2'); ?>
