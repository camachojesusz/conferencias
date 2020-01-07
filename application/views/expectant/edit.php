
<?php $this->load->view('header2'); ?>
   <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/styles3.css">

   <div class="container-fluid" style="padding-top: 55px; background: #F8F9F9;">

      <div class="col-xs-12 col-md-1"></div>
      <?php if (isset($allexpetant) && !empty($allexpetant)): ?>
         <div class="col-xs-12 col-md-10">
            <h1>Editar Asistente</h1>
            <div class="panel panel-warning">
               <div class="panel-heading">Editar Asistente</div>
               <div class="panel-body">

                  <?php if (validation_errors()) : ?>
                     <div class="alert alert-danger text-justify">
                        <h4>¡Error!</h4>
                        <?php echo validation_errors(); ?>
                     </div>
                  <?php endif; ?>

                  <?php echo form_open('expectant/set_info'); ?>
                  <?php foreach ($allexpetant as $allexpetants): ?>
                     <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                           <label for="">Numero de control / Clave</label>
                           <input hidden type="text" name="txtregisterkey" placeholder="2019121100" value="<?= $allexpetants->registerkey_expectant ?>">
                           <input hidden type="text" name="key" placeholder="2019121100" value="<?= $allexpetants->key_e_expectant ?>">
                           <input disabled class="disabled form-control" type="text" name="" placeholder="2019121100" value="<?= $allexpetants->registerkey_expectant ?>">
                        </div>
                     </div>
                     <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                           <label for="">Nombre(s)</label>
                           <input class="form-control" type="text" name="txtname" placeholder="Ej. Francisco" value="<?= $allexpetants->name_expectant ?>">
                        </div>
                     </div>
                     <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                           <label for="">Apellido(s)</label>
                           <input class="form-control" type="text" name="txtsecondname" placeholder="Ej. Mendoza López" value="<?= $allexpetants->secondname_expectant ?>">
                        </div>
                     </div>
                     <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                           <label for="">Correo electrónico</label>
                           <input class="form-control" type="text" name="txtemail" placeholder="ejemplo@gmail.com" value="<?= $allexpetants->email_expectant ?>">
                        </div>
                     </div>
                     <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                           <label for="txtcarrier">Carrera</label>
                           <select class="form-control" id="txtcarrier" name="txtcarrier" >
                             <option value="">Elige una opción</option>
                             <option <?php if (!strcmp("LA Escolarizado", $allexpetants->carrier_expectant)) { echo "selected"; } ?> value="LA Escolarizado">L.A. Escolarizado</option>
                             <option <?php if (!strcmp("LA Dual", $allexpetants->carrier_expectant)) { echo "selected"; } ?> value="LA Dual">L.A. Dual</option>
                             <option <?php if (!strcmp("Otro", $allexpetants->carrier_expectant)) { echo "selected"; } ?> value="Otro">Otro</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                           <label for="txtgroup">Grupo</label>
                           <select class="form-control" id="txtgroup" name="txtgroup"  >
                              <option value="">Elige una opción</option>
                              <option <?php if (!strcmp("1101", $allexpetants->group_expectant)) { echo "selected"; } ?> value="1101">1101</option>
                              <option <?php if (!strcmp("1102", $allexpetants->group_expectant)) { echo "selected"; } ?> value="1102">1102</option>
                              <option <?php if (!strcmp("1111", $allexpetants->group_expectant)) { echo "selected"; } ?> value="1111">1111</option>
                              <option <?php if (!strcmp("1104", $allexpetants->group_expectant)) { echo "selected"; } ?> value="1104">1104</option>
                              <option <?php if (!strcmp("1301", $allexpetants->group_expectant)) { echo "selected"; } ?> value="1301">1301</option>
                              <option <?php if (!strcmp("1302", $allexpetants->group_expectant)) { echo "selected"; } ?> value="1302">1302</option>
                              <option <?php if (!strcmp("1311", $allexpetants->group_expectant)) { echo "selected"; } ?> value="1311">1311</option>
                              <option <?php if (!strcmp("1501", $allexpetants->group_expectant)) { echo "selected"; } ?> value="1501">1501</option>
                              <option <?php if (!strcmp("1502", $allexpetants->group_expectant)) { echo "selected"; } ?> value="1502">1502</option>
                              <option <?php if (!strcmp("1511", $allexpetants->group_expectant)) { echo "selected"; } ?> value="1511">1511</option>
                              <option <?php if (!strcmp("1701", $allexpetants->group_expectant)) { echo "selected"; } ?> value="1701">1701</option>
                              <option <?php if (!strcmp("1702", $allexpetants->group_expectant)) { echo "selected"; } ?> value="1702">1702</option>
                              <option <?php if (!strcmp("1711", $allexpetants->group_expectant)) { echo "selected"; } ?> value="1711">1711</option>
                              <option <?php if (!strcmp("Otro", $allexpetants->group_expectant)) { echo "selected"; } ?> value="Otro">Otro</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-xs-12 col-md-4 pull-right">
                        <button type="button submit" class="btn btn-primary" name="btnsend">Guardar <samp class="glyphicon glyphicon-floppy-disk"></samp></button>
                     </div>
                  <?php endforeach;?>
                  <?php echo form_close(); ?>
               </div>
            </div>
         </div>
      <?php else: ?>
         <div class="col-xs-12 col-md-10">
            <h1>Editar Asistente</h1>
            <div class="panel panel-warning">
               <div class="panel-heading">Editar Asistente</div>
               <div class="panel-body">
                  No hay información dispinible
               </div>
            </div>
         </div>
      <?php endif; ?>
      <div class="col-xs-12 col-md-1"></div>

   </div>

</div>

<?php $this->load->view('footer2'); ?>
