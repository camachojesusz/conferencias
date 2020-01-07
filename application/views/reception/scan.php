
<?php $this->load->view('header2'); ?>

   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles3.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/components_qr_lector/style.css">

   <div class="container-fluid" style="padding-top: 55px; background: #F8F9F9;">
      <div class="col-xs-12 col-md-1"></div>
      <div class="col-xs-12 col-md-10">
         <h1>Recepción</h1>
         <div class="panel panel-warning">
            <div class="panel-heading">Recepción de asistentes a: <b><?php if (isset($info_conference) && !empty($info_conference)): foreach ($info_conference->result() as $conference) { echo $conference->tittle_conference; } endif; ?></b></div>
            <div class="panel-body text-center">

               <div id="app">
                  <div class="hidden">
                     <input class="hidden" type="hidden" id="conference_id" value="<?php echo $conference_id; ?>">
                     <input class="hidden" type="hidden" id="ctrl_url" value="<?php echo base_url(); ?>">
							<input class="hidden" type="hidden" id="site_url" value="<?php echo site_url(); ?>">
                  </div>

                  <div class="sidebar co-xs-12 col-sm-4 col-md-6">
                     <section class="scans">
                        <p>Coloca el <b>Código QR</b> frente a la camara</p>
                        <ul class="list-group" v-if="scans.length === 0">
                           <li class="empty list-group-item">Escaneando...</li>
                        </ul>
                        <transition-group name="scans" tag="ul">
                           <li class="list-group-item" v-for="scan in scans" :key="scan.date" :title="scan.content"><b>Correcto</b>, siguiente...</li>
                        </transition-group>
                     </section>
							<div class="form-group pull-right">
								<label for="qr_input">Escribe el número de control o clave (opcional)</label>
								<div class="input-group">
									<input type="text" name="qr_input" autofocus id="qr_input" maxlength="10" class="form-control" pattern="[0-9]%">
									<div class="input-group-btn">
										<button type="button" class="btn btn-success btn_qr_input" id="btn_qr_input" name="button">Registrar <i class="fa fa-send"></i></button>
									</div>
								</div>
							</div>
                  </div>
                  <div class="preview-container co-xs-12 col-sm-8 col-md-6 text-center">
                     <video id="preview"></video>
							<br>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-xs-12 col-md-1"></div>
   </div>
<?php $this->load->view('footer2'); ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/instacam/adapter.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/instacam/vue.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/instacam/instacam.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/components_qr_lector/app.js"></script>
