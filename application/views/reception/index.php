
<?php $this->load->view('header2'); ?>
   <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/styles3.css">

   <div class="container-fluid" style="padding-top: 55px; background: #F8F9F9;">
      <div class="col-xs-12 col-md-1"></div>

      <?php if (isset($allconference)): ?>

         <div class="col-xs-12 col-md-10">
            <h1>Recepción</h1>
            <div class="panel panel-warning">
               <div class="panel-heading">Recepción de asistentes</div>
               <div class="panel-body">

                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap">
                     <div class="row">
                        <div class="col-xs-12 table-responsive">
                           <table id="example1" class="table table-striped table-hover table-condensed dataTable" role="grid" aria-describedby="example1_info">

                              <thead>
                                 <tr role="row">
                                    <th style="width: 30%;" >Conferencia</th>
                                    <th style="width: 30%;" >Conferencista</th>
                                    <th style="width: 10%;" >Sala</th>
                                    <th style="width: 20%;" >Dia / Hora</th>
                                    <th style="width: 10%;" >Opciones</th>
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
                                             echo $allconferences->day_conference." de ";
                                             echo $allconferences->month_conference." ".$allconferences->year_conference." <br> ";
                                             echo $allconferences->hour_conference." hr";
                                          ?>
                                       </td>
                                       <td class="text-center">
                                          <a style="background-color: #28B463; color: #FFFFFF;" href="<?php echo base_url()."reception/scan/".$allconferences->id_conference; ?>" type="button" class="btn btn-primary btn-block">
                                             Registrar asistentes <i class="fa fa-ticket"></i>&nbsp;<sup><i class="fa fa-plus"></i></sup>
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
            <h1>Recepción</h1>
            <div class="panel panel-warning">
               <div class="panel-heading">Recepción de asistentes</div>
               <div class="panel-body">
                  No hay conferencias programadas.
                  <a href="<?php echo base_url()."conference"; ?>" type="button" class="btn btn-primary">
                     Nueva Conferencia <i class="fa fa-plus"></i>
                  </a>
               </div>
            </div>
         </div>
      <?php endif; ?>
      <div class="col-xs-12 col-md-1"></div>
   </div>

<?php $this->load->view('footer2'); ?>
