<?php $this->load->view('header2'); ?>
<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/styles3.css">

   <div class="container-fluid" style="padding-top: 55px; background: #F8F9F9;">


      <div class="col-xs-12 col-md-1"></div>
      <?php if (isset($all_conf_expectant) && !empty($all_conf_expectant)): ?>

         <div class="col-xs-12 col-md-10">
            <h1>Asistentes</h1>
            <div class="panel panel-warning">
               <div class="panel-heading">Asistentes a la conferencia: <b> <?php foreach ($info_conference->result() as $conference) { echo $conference->tittle_conference; } ?></b></div>
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
                                    <th>Correo Electrónico</th>
                                    <th>Reconocimiento</th>
                                    <th>Opciones</th>
                                 </tr>
                              </thead>

                              <tbody>
                                 <?php foreach ($all_conf_expectant as $all_conf_expectants): ?>
                                    <tr>
                                       <td><?php echo $all_conf_expectants->registerkey_expectant; ?></td>
                                       <td><?php echo $all_conf_expectants->name_expectant." ".$all_conf_expectants->secondname_expectant; ?></td>
                                       <td><?php echo $all_conf_expectants->carrier_expectant; ?></td>
                                       <td><?php echo $all_conf_expectants->group_expectant; ?></td>
                                       <td><?php echo $all_conf_expectants->email_expectant; ?></td>
                                       <td class="text-center">
                                          <?php
                                          if (strcmp('0', $all_conf_expectants->email_attendance)):
                                          ?>
                                          <small class="label label-success"><i class="fa fa-check"></i> Enviado</small>
                                          <?php
                                          else:
                                          ?>
                                          <small class="label label-danger"><i class="fa fa-times"></i> No enviado</small>
                                          <?php
                                          endif;
                                          ?>
                                       </td>
                                       <td>
                                          <a href="<?php echo base_url()."conference/send_recognition/".$all_conf_expectants->id_conference."/".$all_conf_expectants->key_e_expectant; ?>" type="button" class="btn btn-primary btn-block" style="background-color: #7D3C98; color: #FFFFFF;">
                                             Enviar Reconocimiento <i class="fa fa-send"></i>
                                          </a>
                                          <a style="background-color: #17A589; color: #FFFFFF;" href="<?php  echo base_url()."expectant/edit/".$all_conf_expectants->key_e_expectant; ?>" type="button" class="btn btn-primary btn-block">
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
            <h1>Asistentes por conferencia</h1>
            <div class="panel panel-warning">
               <div class="panel-heading">Asistentes a la conferencia</div>
               <div class="panel-body">
                  Aun no hay asistentes registrados a esta conferencia.
               </div>
            </div>
         </div>
      <?php endif; ?>
      <div class="col-xs-12 col-md-1"></div>
   </div>

</div>

<?php $this->load->view('footer2'); ?>
