
<?php $this->load->view('header2'); ?>
   <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/styles3.css">

   <div class="container-fluid" style="padding-top: 55px; background: #F8F9F9;">

      <div class="col-xs-12 col-md-1"></div>
      <?php if (isset($allexpetant) && !empty($allexpetant)): ?>
         <div class="col-xs-12 col-md-10">
            <h1>Asistentes</h1>
            <div class="panel panel-warning">
               <div class="panel-heading">Listado de reservaciones</div>
               <div class="panel-body">

                  <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap">
                     <div class="row">
                        <div class="col-xs-12 table-responsive">
                           <table id="example2" class="table table-striped table-hover table-condensed dataTable" role="grid" aria-describedby="example2_info">

                              <thead>
                                 <tr role="row">
                                    <th>Clave</th>
                                    <th>Nombre</th>
                                    <th>Carrera</th>
                                    <th>Grupo</th>
                                    <th>Correo electrónico</th>
                                    <th>Opciones</th>
                                 </tr>
                              </thead>

                              <tbody>
                                 <?php foreach ($allexpetant as $allexpetants): ?>

                                    <tr role="row">
                                       <td>
                                          <?php
                                             echo $allexpetants->registerkey_expectant;
                                          ?>
                                       </td>
                                       <td>
                                          <?php echo $allexpetants->name_expectant." ".$allexpetants->secondname_expectant; ?>
                                       </td>
                                       <td> <?php echo $allexpetants->carrier_expectant; ?> </td>
                                       <td> <?php echo $allexpetants->group_expectant; ?> </td>
                                       <td> <?php echo $allexpetants->email_expectant; ?> </td>
                                       <td>
                                          <a style="background-color: #17A589; color: #FFFFFF;" href="<?php echo base_url()."expectant/edit/".$allexpetants->key_e_expectant; ?>" type="button" class="btn btn-primary btn-block">
                                             Editar Asistente <i class="fa fa-edit"></i>
                                          </a>
                                       </td>
                                    </tr>

                                 <?php endforeach; ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>

               </div>
            </div>
         </div>
      <?php else: ?>
         <div class="col-xs-12 col-md-10">
            <h1>Asistentes</h1>
            <div class="panel panel-warning">
               <div class="panel-heading">Listado de reservaciones</div>
               <div class="panel-body">
                  No hay reservaciones disponibles.
               </div>
            </div>
         </div>
      <?php endif; ?>
      <div class="col-xs-12 col-md-1"></div>
   </div>

</div>

<?php $this->load->view('footer2'); ?>
