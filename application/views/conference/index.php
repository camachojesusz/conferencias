
<?php $this->load->view('header2'); ?>
<link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/styles3.css">

   <div class="container-fluid" style="padding-top: 55px; background: #F8F9F9;">

      <div class="modal fade" id="modal_new_conference">
         <div class="modal-dialog">
            <div class="modal-content">

               <?php echo form_open('conference/get_info'); ?>

               <div class="modal-header" style="background: #F05F40;">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-tittle" style="color: #FFFFFF;">Nueva conferencia</h3>
               </div>

               <div class="modal-body">
                  <div class="row">

                     <div class="col-xs-12">
                        <div class="form-group">
                           <input hidden type="text" name="txtsender" value="0">
                           <input hidden type="text" name="txtstatus" value="1">
                           <label for="">Título  de la conferencia</label>
                           <input class="form-control" type="text" name="txttittle" placeholder="Ej. Semana del Administrador 2019" value="">
                        </div>
                     </div>

                     <div class="col-xs-12">
                        <div class="form-group">
                           <label for="">Ponente / Conferencista</label>
                           <input class="form-control" type="text" name="txtspeaker" placeholder="Ej. Francisco López, Fundador Grupo López" value="">
                        </div>
                     </div>

                     <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                           <label for="">Sala</label>
                           <select class="form-control" name="txtauditorium">
                              <option value="">Elige una opción</option>
                              <option value="Auditorio A">Auditorio A</option>
                              <option value="Auditorio B">Auditorio B</option>
                              <option value="Sala de Capacitación">Sala de Capacitación</option>
                           </select>
                        </div>
                     </div>

                     <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                           <label for="">Hora</label>
                           <input class="form-control" type="time" name="txthour" placeholder="Ej. Francisco López, Fundador Grupo López" value="">
                        </div>
                     </div>
                     <div class="col-xs-12"></div>

                     <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                           <label for="">Dia</label>
                           <select class="form-control" name="txtday">
                              <option disabled value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                              <option disabled value="7">7</option>
                              <option disabled value="8">8</option>
                              <option disabled value="9">9</option>
                              <option disabled value="10">10</option>
                              <option disabled value="11">11</option>
                              <option disabled value="12">12</option>
                              <option disabled value="13">13</option>
                              <option disabled value="14">14</option>
                              <option disabled value="15">15</option>
                              <option disabled value="16">16</option>
                              <option disabled value="17">17</option>
                              <option disabled value="18">18</option>
                              <option disabled value="19">19</option>
                              <option disabled value="20">20</option>
                              <option disabled value="21">21</option>
                              <option disabled value="22">22</option>
                              <option disabled value="23">23</option>
                              <option disabled value="24">24</option>
                              <option disabled value="25">25</option>
                              <option disabled value="26">26</option>
                              <option disabled value="27">27</option>
                              <option disabled value="28">28</option>
                              <option disabled value="29">29</option>
                              <option disabled value="30">30</option>
                              <option disabled value="31">31</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                           <label for="">Mes</label>
                           <select class="form-control" name="txtmonth">
                              <option disabled value="Enero">Enero</option>
                              <option disabled value="Febrero">Febrero</option>
                              <option disabled value="Marzo">Marzo</option>
                              <option disabled value="Abril">Abril</option>
                              <option disabled value="Mayo">Mayo</option>
                              <option disabled value="Junio">Junio</option>
                              <option disabled value="Julio">Julio</option>
                              <option disabled value="Agosto">Agosto</option>
                              <option disabled value="Septiembre">Septiembre</option>
                              <option disabled value="Octubre">Octubre</option>
                              <option disabled value="Noviembre">Noviembre</option>
                              <option selected value="Diciembre">Diciembre</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                           <label for="">Año</label>
                           <select class="form-control" name="txtyear">
                              <option selected value="2019">2019</option>
                              <option disabled value="2020">2020</option>
                              <option disabled value="2021">2021</option>
                              <option disabled value="2022">2022</option>
                              <option disabled value="2023">2023</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="modal-footer">
                  <button type="button submit" class="btn btn-primary" name="btnsend">Guardar <samp class="glyphicon glyphicon-floppy-disk"></samp></button>
               </div>

               <?php echo form_close(); ?>
            </div>
         </div>
      </div>


      <div class="col-xs-12 col-md-1"></div>
      <?php if (isset($allconference) && !empty($allconference)): ?>

         <div class="modal fade" id="modal_send">
            <div class="modal-dialog">
               <div class="modal-content">
                  <?php echo form_open('conference/send_recognition'); ?>

                  <div class="modal-header" style="background: #F05F40;">
                     <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                     <h3 class="modal-tittle" style="color: #FFFFFF;">Enviar Reconocimientos</h3>
                  </div>

                  <div class="modal-body">
                     <div class="row">
                        <div class="col-xs-12">
                           <table class="table table-condensed table-striped ">
                              <tr>
                                 <th><i class="fa fa-info-circle" style="color: #3498DB;"></i></th>
                                 <th>Conferencia</th>
                                 <th>Reconocimientos</th>
                              </tr>
                              <?php foreach ($allconference->result() as $conferences): ?>
                                 <tr>
                                    <td style="width: 40px;" class="text-center">
                                       <label for="">
                                          <input <?php if($conferences->email_conference != '0'){ echo "disabled checked"; } ?> type="checkbox" class="" name="conferences[]" value="<?php echo $conferences->id_conference; ?>">
                                       </label>
                                    </td>
                                    <td style="width: auto;">
                                       <?php echo $conferences->tittle_conference; ?>
                                    </td>
                                    <td class="text-center">
                                       <?php
                                       switch ($conferences->email_conference) {
                                          case '0':
                                       ?>
                                          <small class="label label-danger"><i class="fa fa-times"></i> No enviados</small>
                                       <?php
                                          break;
                                          case '1':
                                       ?>
                                          <small class="label label-warning"><i class="fa fa-hourglass-half"></i> En progreso...</small>
                                       <?php
                                          break;
                                          case '2':
                                       ?>
                                          <small class="label label-success"><i class="fa fa-check"></i> Enviados</small>
                                       <?php
                                          break;
                                          default:
                                       ?>
                                          <small class="label label-info"><i class="fa fa-info-circle"></i> No disponible</small>
                                       <?php
                                          break;
                                       }
                                       ?>
                                       <br>
                                    </td>
                                 </tr>
                              <?php endforeach; ?>
                           </table>
                        </div>

                        <div class="col-xs-12">
                           <p class="help-block">
                              <i class="fa fa-info-circle" style="color: #3498DB;"></i> Selecciona una conferencia para enviar reconocimientos a los asistentes
                              <br>
                              <i class="fa fa-warning" style="color: #F1C40F;"></i> El tiempo de envío puede demorar algunas horas. Regresa más tarde y verifica el estatus de envío.
                           </p>
                        </div>
                     </div>
                  </div>

                  <div class="modal-footer">
                     <button type="button submit" class="btn btn-primary" id="btnsend">Enviar <samp class="glyphicon glyphicon-send"></samp></button>
                  </div>

                  <?php echo form_close(); ?>
               </div>
            </div>
         </div>

         <div class="col-xs-12 col-md-10">
            <h1>Conferencias</h1>
            <div class="panel panel-warning">
               <div class="panel-heading">Conferencias programadas</div>
               <div class="panel-body">

                  <?php if (isset($fail_time)): ?>
                     <br>
                     <div class="alert alert-warning text-justify">
                        <h4>¡Alerta!</h4>
                        Ya hay una conferencia programada con la fecha y hora asignada en el auditorio seleccionado, verifica los datos e inténtalo de nuevo
                     </div>
                  <?php endif; ?>

                  <?php if (isset($fail_conference)): ?>
                     <br>
                     <div class="alert alert-danger text-justify">
                        <h4>¡Error!</h4>
                        Hubo un problema al editar la conferencia, verifica los datos e inténtalo de nuevo
                     </div>
                  <?php endif; ?>

                  <?php if (isset($update_conference)): ?>
                     <br>
                     <div class="alert alert-info text-justify">
                        <h4>¡Aviso!</h4>
                        La información de una conferencia ha sido modificada
                     </div>
                  <?php endif; ?>

                  <?php if (isset($succes_conference)): ?>
                     <br>
                     <div class="alert alert-success text-justify">
                        <h4>¡Correcto!</h4>
                        Se ha programado una conferencia
                     </div>
                  <?php endif; ?>

                  <div class="col-xs-12 col-md-3"></div>
                  <div class="col-xs-12 col-md-3"></div>
                  <div class="col-xs-12 col-md-3" style="padding-bottom: 1%; padding-right: 1%;">
                     <a href="#modal_new_conference" type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal_new_conference">
                        Nueva Conferencia <i class="fa fa-plus"></i>
                     </a>
                  </div>

                  <div class="col-xs-12 col-md-3" style="padding-bottom: 1%; padding-right: 1%;">
                     <a href="#modal_send" type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal_send" style="background-color: #7D3C98; color: #FFFFFF;">
                        Enviar Reconocimientos <i class="fa fa-send"></i>
                     </a>
                  </div>

                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap">
                     <div class="row">
                        <div class="col-xs-12 table-responsive">
                           <table id="example1" class="table table-striped table-hover table-condensed dataTable" role="grid" aria-describedby="example1_info">

                              <thead>
                                 <tr role="row">
                                    <th>Conferencia</th>
                                    <th>Conferencista</th>
                                    <th>Sala</th>
                                    <th>Fecha/Hora</th>
                                    <th>Asistentes</th>
                                    <th>Reconocimientos</th>
                                    <th>Opciones</th>
                                 </tr>
                              </thead>

                              <tbody>
                                 <?php foreach ($allconference->result() as $allconferences): ?>

                                    <tr role="row">
                                       <td>
                                          <?php
                                             echo "<p hidden>".$allconferences->day_conference."-".$allconferences->month_conference."-".$allconferences->year_conference."-".$allconferences->hour_conference."</p>";
                                             echo $allconferences->tittle_conference;
                                          ?>
                                       </td>
                                       <td><?php echo $allconferences->speaker_conference; ?></td>
                                       <td><?php echo $allconferences->auditorium_conference; ?></td>
                                       <td>
                                          <?php
                                             echo $allconferences->day_conference." - ".$allconferences->month_conference." - ".$allconferences->year_conference." <br> ";
                                             echo $allconferences->hour_conference." hr";
                                          ?>
                                       </td>
                                       <td class="text-center">
                                          <?php
                                          $i = 0;
                                          foreach ($num_assistance->result() as $num_assistances):
                                             if ($num_assistances->id_conference === $allconferences->id_conference): $i++; endif;
                                          endforeach;
                                          ?>
                                          <small class="label label-info"><?= $i ?></small>
                                       </td>
                                       <td class="text-center">
                                          <?php
                                          switch ($allconferences->email_conference) {
                                             case '0':
                                          ?>
                                             <small class="label label-danger"><i class="fa fa-times"></i> No enviados</small>
                                          <?php
                                             break;
                                             case '1':
                                          ?>
                                             <small class="label label-warning"><i class="fa fa-hourglass-half"></i> En progreso...</small>
                                          <?php
                                             break;
                                             case '2':
                                          ?>
                                             <small class="label label-success"><i class="fa fa-check"></i> Enviados</small>
                                          <?php
                                             break;
                                             default:
                                          ?>
                                             <small class="label label-info"><i class="fa fa-info-circle"></i> No disponible</small>
                                          <?php
                                             break;
                                          }
                                          ?>
                                          <br>
                                       </td>
                                       <td class="text-center">
                                          <a style="background-color: #17A589; color: #FFFFFF;" href="<?php echo base_url()."conference/expectant/".$allconferences->id_conference; ?>" type="button" class="btn btn-primary btn-block">
                                             Ver Asistentes <i class="fa fa-eye"></i>
                                          </a>
                                          <a style="background-color: #2E86C1; color: #FFFFFF;" href="#modal_edit<?php echo $allconferences->id_conference; ?>" type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_edit<?php echo $allconferences->id_conference; ?>">
                                             Editar Conferencia <i class="fa fa-edit"></i>
                                          </a>
                                          <?php if (!strcmp('0', $allconferences->open_conference)): ?>
                                             <a style="" href="<?php echo base_url()."conference/open_conference/".$allconferences->key_e_conference."/".$allconferences->open_conference; ?>" type="button" class="btn btn-danger btn-block">
                                                Abrir Conferencia <i class="fa  fa-toggle-off"></i>
                                             </a>
                                          <?php else: ?>
                                             <a style="" href="<?php echo base_url()."conference/open_conference/".$allconferences->key_e_conference."/".$allconferences->open_conference; ?>" type="button" class="btn btn-success btn-block">
                                                Cerrar Conferencia <i class="fa  fa-toggle-on"></i>
                                             </a>
                                          <?php endif; ?>
                                       </td>
                                    </tr>

                                    <div class="modal fade" id="modal_edit<?php echo $allconferences->id_conference; ?>">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <?php echo form_open('conference/get_info'); ?>
                                             <div class="modal-header" style="background: #F05F40;">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                                <h3 class="modal-tittle" style="color: #FFFFFF;">Editar conferencia</h3>
                                             </div>

                                             <div class="modal-body">
                                                <div class="row">

                                                   <div class="col-xs-12">
                                                      <div class="form-group">
                                                         <input hidden type="text" name="txtsender" value="1">
                                                         <input hidden type="text" name="txtconference" value="<?php echo $allconferences->id_conference; ?>">
                                                         <label for="">Título  de la conferencia</label>
                                                         <input class="form-control" type="text" name="txttittle" placeholder="Ej. Semana del Administrador 2019" value="<?php echo $allconferences->tittle_conference; ?>">
                                                      </div>
                                                   </div>

                                                   <div class="col-xs-12">
                                                      <div class="form-group">
                                                         <label for="">Ponente / Conferencista</label>
                                                         <input class="form-control" type="text" name="txtspeaker" placeholder="Ej. Francisco López, Fundador Grupo López" value="<?php echo $allconferences->speaker_conference; ?>">
                                                      </div>
                                                   </div>

                                                   <div class="col-xs-12 col-md-4">
                                                      <div class="form-group">
                                                         <label for="">Sala</label>
                                                         <select class="form-control" name="txtauditorium">
                                                            <option value="">Elige una opción</option>
                                                            <option <?php if (!$comp_auditorium = strcmp("Auditorio A", $allconferences->auditorium_conference)) { echo "selected"; } ?> value="Auditorio A">Auditorio A</option>
                                                            <option <?php if (!$comp_auditorium = strcmp("Auditorio B", $allconferences->auditorium_conference)) { echo "selected"; } ?> value="Auditorio B">Auditorio B</option>
                                                            <option <?php if (!$comp_auditorium = strcmp("Sala de Capacitación", $allconferences->auditorium_conference)) { echo "selected"; } ?> value="Sala de Capacitación">Sala de Capacitación</option>
                                                         </select>
                                                      </div>
                                                   </div>

                                                   <div class="col-xs-12 col-md-4">
                                                      <div class="form-group">
                                                         <label for="">Estatus</label>
                                                         <select class="form-control" name="txtstatus">
                                                            <option <?php if (!$comp_auditorium = strcmp("1", $allconferences->status_conference)) { echo "selected"; } ?> value="1">Programada</option>
                                                            <option <?php if (!$comp_auditorium = strcmp("0", $allconferences->status_conference)) { echo "selected"; } ?> value="0">Cancelada</option>
                                                         </select>
                                                      </div>
                                                   </div>

                                                   <div class="col-xs-12 col-md-4">
                                                      <div class="form-group">
                                                         <label for="">Hora</label>
                                                         <input class="form-control" type="time" name="txthour" placeholder="Ej. Francisco López, Fundador Grupo López" value="<?php echo $allconferences->hour_conference; ?>">
                                                      </div>
                                                   </div>

                                                   <div class="col-xs-12 col-md-12"></div>

                                                   <div class="col-xs-12 col-md-4">
                                                      <div class="form-group">
                                                         <label for="">Dia</label>
                                                         <select class="form-control" name="txtday">
                                                            <option <?php if (!$comp_day = strcmp("1", $allconferences->day_conference)) { echo "selected"; } ?> value="1">1</option>
                                                            <option <?php if (!$comp_day = strcmp("2", $allconferences->day_conference)) { echo "selected"; } ?> value="2">2</option>
                                                            <option <?php if (!$comp_day = strcmp("3", $allconferences->day_conference)) { echo "selected"; } ?> value="3">3</option>
                                                            <option <?php if (!$comp_day = strcmp("4", $allconferences->day_conference)) { echo "selected"; } ?> value="4">4</option>
                                                            <option <?php if (!$comp_day = strcmp("5", $allconferences->day_conference)) { echo "selected"; } ?> value="5">5</option>
                                                            <option <?php if (!$comp_day = strcmp("6", $allconferences->day_conference)) { echo "selected"; } ?> value="6">6</option>
                                                            <option <?php if (!$comp_day = strcmp("7", $allconferences->day_conference)) { echo "selected"; } ?> value="7">7</option>
                                                            <option <?php if (!$comp_day = strcmp("8", $allconferences->day_conference)) { echo "selected"; } ?> value="8">8</option>
                                                            <option <?php if (!$comp_day = strcmp("9", $allconferences->day_conference)) { echo "selected"; } ?> value="9">9</option>
                                                            <option <?php if (!$comp_day = strcmp("10", $allconferences->day_conference)) { echo "selected"; } ?> value="10">10</option>
                                                            <option <?php if (!$comp_day = strcmp("11", $allconferences->day_conference)) { echo "selected"; } ?> value="11">11</option>
                                                            <option <?php if (!$comp_day = strcmp("12", $allconferences->day_conference)) { echo "selected"; } ?> value="12">12</option>
                                                            <option <?php if (!$comp_day = strcmp("13", $allconferences->day_conference)) { echo "selected"; } ?> value="13">13</option>
                                                            <option <?php if (!$comp_day = strcmp("14", $allconferences->day_conference)) { echo "selected"; } ?> value="14">14</option>
                                                            <option <?php if (!$comp_day = strcmp("15", $allconferences->day_conference)) { echo "selected"; } ?> value="15">15</option>
                                                            <option <?php if (!$comp_day = strcmp("16", $allconferences->day_conference)) { echo "selected"; } ?> value="16">16</option>
                                                            <option <?php if (!$comp_day = strcmp("17", $allconferences->day_conference)) { echo "selected"; } ?> value="17">17</option>
                                                            <option <?php if (!$comp_day = strcmp("18", $allconferences->day_conference)) { echo "selected"; } ?> value="18">18</option>
                                                            <option <?php if (!$comp_day = strcmp("19", $allconferences->day_conference)) { echo "selected"; } ?> value="19">19</option>
                                                            <option <?php if (!$comp_day = strcmp("20", $allconferences->day_conference)) { echo "selected"; } ?> value="20">20</option>
                                                            <option <?php if (!$comp_day = strcmp("21", $allconferences->day_conference)) { echo "selected"; } ?> value="21">21</option>
                                                            <option <?php if (!$comp_day = strcmp("22", $allconferences->day_conference)) { echo "selected"; } ?> value="22">22</option>
                                                            <option <?php if (!$comp_day = strcmp("23", $allconferences->day_conference)) { echo "selected"; } ?> value="23">23</option>
                                                            <option <?php if (!$comp_day = strcmp("24", $allconferences->day_conference)) { echo "selected"; } ?> value="24">24</option>
                                                            <option <?php if (!$comp_day = strcmp("25", $allconferences->day_conference)) { echo "selected"; } ?> value="25">25</option>
                                                            <option <?php if (!$comp_day = strcmp("26", $allconferences->day_conference)) { echo "selected"; } ?> value="26">26</option>
                                                            <option <?php if (!$comp_day = strcmp("27", $allconferences->day_conference)) { echo "selected"; } ?> value="27">27</option>
                                                            <option <?php if (!$comp_day = strcmp("28", $allconferences->day_conference)) { echo "selected"; } ?> value="28">28</option>
                                                            <option <?php if (!$comp_day = strcmp("29", $allconferences->day_conference)) { echo "selected"; } ?> value="29">29</option>
                                                            <option <?php if (!$comp_day = strcmp("30", $allconferences->day_conference)) { echo "selected"; } ?> value="30">30</option>
                                                            <option <?php if (!$comp_day = strcmp("31", $allconferences->day_conference)) { echo "selected"; } ?> value="31">31</option>
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="col-xs-12 col-md-4">
                                                      <div class="form-group">
                                                         <label for="">Mes</label>
                                                         <select class="form-control" name="txtmonth">
                                                            <option <?php if (!$comp_month = strcmp("Enero", $allconferences->month_conference)) { echo "selected"; } ?> value="Enero">Enero</option>
                                                            <option <?php if (!$comp_month = strcmp("Febrero", $allconferences->month_conference)) { echo "selected"; } ?> value="Febrero">Febrero</option>
                                                            <option <?php if (!$comp_month = strcmp("Marzo", $allconferences->month_conference)) { echo "selected"; } ?> value="Marzo">Marzo</option>
                                                            <option <?php if (!$comp_month = strcmp("Abril", $allconferences->month_conference)) { echo "selected"; } ?> value="Abril">Abril</option>
                                                            <option <?php if (!$comp_month = strcmp("Mayo", $allconferences->month_conference)) { echo "selected"; } ?> value="Mayo">Mayo</option>
                                                            <option <?php if (!$comp_month = strcmp("Junio", $allconferences->month_conference)) { echo "selected"; } ?> value="Junio">Junio</option>
                                                            <option <?php if (!$comp_month = strcmp("Julio", $allconferences->month_conference)) { echo "selected"; } ?> value="Julio">Julio</option>
                                                            <option <?php if (!$comp_month = strcmp("Agosto", $allconferences->month_conference)) { echo "selected"; } ?> value="Agosto">Agosto</option>
                                                            <option <?php if (!$comp_month = strcmp("Septiembre", $allconferences->month_conference)) { echo "selected"; } ?> value="Septiembre">Septiembre</option>
                                                            <option <?php if (!$comp_month = strcmp("Octubre", $allconferences->month_conference)) { echo "selected"; } ?> value="Octubre">Octubre</option>
                                                            <option <?php if (!$comp_month = strcmp("Noviembre", $allconferences->month_conference)) { echo "selected"; } ?> value="Noviembre">Noviembre</option>
                                                            <option <?php if (!$comp_month = strcmp("Diciembre", $allconferences->month_conference)) { echo "selected"; } ?> value="Diciembre">Diciembre</option>
                                                         </select>
                                                      </div>
                                                   </div>
                                                   <div class="col-xs-12 col-md-4">
                                                      <div class="form-group">
                                                         <label for="">Año</label>
                                                         <select class="form-control" name="txtyear">
                                                            <option <?php if (!$comp_year = strcmp("2019", $allconferences->year_conference)) { echo "selected"; } ?> value="2019">2019</option>
                                                            <option <?php if (!$comp_year = strcmp("2020", $allconferences->year_conference)) { echo "selected"; } ?> value="2020">2020</option>
                                                            <option <?php if (!$comp_year = strcmp("2021", $allconferences->year_conference)) { echo "selected"; } ?> value="2021">2021</option>
                                                            <option <?php if (!$comp_year = strcmp("2022", $allconferences->year_conference)) { echo "selected"; } ?> value="2022">2022</option>
                                                            <option <?php if (!$comp_year = strcmp("2023", $allconferences->year_conference)) { echo "selected"; } ?> value="2023">2023</option>
                                                         </select>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>

                                             <div class="modal-footer">
                                                <button type="button submit" class="btn btn-primary" name="btnsend">Guardar cambios <samp class="glyphicon glyphicon-floppy-disk"></samp></button>
                                             </div>

                                             <?php echo form_close(); ?>
                                          </div>
                                       </div>
                                    </div>
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
            <h1>Conferencias</h1>
            <div class="panel panel-warning">
               <div class="panel-heading">Conferencias programadas</div>
               <div class="panel-body">
                  No hay conferencias programadas. Añade una en el siguiente formulario
                  <a href="#modal_new_conference" type="button" class="btn btn-primary">
                     Nueva Conferencia <i class="fa fa-plus"></i>
                  </a>
               </div>
            </div>
         </div>
      <?php endif; ?>
      <div class="col-xs-12 col-md-1"></div>
   </div>

</div>

<?php $this->load->view('footer2'); ?>
