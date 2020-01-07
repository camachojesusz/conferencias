<?php $this->load->view('header2'); ?>
   <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/styles3.css">

   <div class="container-fluid" style="padding-top: 55px; background: #F8F9F9;">

      <div class="modal fade" id="modal_new_user">
         <div class="modal-dialog">
            <div class="modal-content">
               <?php echo form_open('users/is_post'); ?>
               <div class="modal-header" style="background: #F05F40;">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-tittle" style="color: #FFFFFF;">Nuevo usuario</h3>
               </div>

               <div class="modal-body">
                  <div class="row">
                     <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                           <input hidden type="text" name="txtsender" value="0">
                           <input hidden type="text" name="txtstatus" value="1">
                           <label for="">Nombre(s)</label>
                           <input required class="form-control" type="text" name="txtname" placeholder="nombre(s)" value="">
                        </div>
                     </div>

                     <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                           <label for="">Apellidos</label>
                           <input class="form-control" type="text" name="txtsecondname" placeholder="apellido(s)" value="">
                        </div>
                     </div>

                     <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                           <label for="">Usuario</label>
                           <input required class="form-control" type="text" name="txtusername" placeholder="usuario" value="">
                        </div>
                     </div>

                     <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                           <label for="">Perfil</label>
                           <select required class="form-control" name="txtprofile">
                              <option value="">Elige un perfil</option>

                              <?php if (isset($allprofile)): ?>
                                 <?php foreach ($allprofile as $allprofiles): ?>

                                    <option value="<?php echo $allprofiles->id_profile; ?>"><?php echo $allprofiles->describe_profile; ?></option>

                                 <?php endforeach; ?>
                              <?php else: ?>

                              <option value="">No disponible</option>

                              <?php endif; ?>

                           </select>
                        </div>
                     </div>

                     <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                           <label for="">Contraseña</label>
                           <input required class="form-control" type="password" name="txtpass1" placeholder="contraseña" value="">
                        </div>
                     </div>

                     <div class="col-xs-12 col-md-6">
                        <div class="form-group">
                           <label for="">Escribe una vez más la contraseña</label>
                           <input required class="form-control" type="password" name="txtpass2" placeholder="contraseña" value="">
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
      <?php if (isset($alluser) && !empty($alluser)): ?>
         <div class="col-xs-12 col-md-10">
            <h1>Usuarios</h1>
            <div class="panel panel-warning">
               <div class="panel-heading">Listado de Usuarios</div>
               <div class="panel-body">

                  <?php if (isset($fail_pass_save)): ?>
                     <br>
                     <div class="alert alert-danger text-justify">
                        <h4>¡Error!</h4>
                        Las contraseñas no coinciden, verifica los datos e intenta guardar de nuevo al usuario
                     </div>
                  <?php endif; ?>

                  <?php if (isset($fail_user)): ?>
                     <br>
                     <div class="alert alert-danger text-justify">
                        <h4>¡Error!</h4>
                        El Usuario ya existe en los registros, verifica los datos e intenta guardar de nuevo al usuario
                     </div>
                  <?php endif; ?>

                  <?php if (isset($success_user)): ?>
                     <br>
                     <div class="alert alert-success text-justify">
                        <h4>¡Correcto!</h4>
                        Se ha guardado un usuario
                     </div>
                  <?php endif; ?>

                  <?php if (isset($success_update_user)): ?>
                     <br>
                     <div class="alert alert-info text-justify">
                        <h4>¡Aviso!</h4>
                        La información de un usuario ha sido modificada
                     </div>
                  <?php endif; ?>

                  <div class="col-xs-12 col-md-3 pull-right" style="padding-bottom: 1%; padding-right: 1%;">
                     <a href="#modal_new_user" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_new_user">
                        Nuevo Usuario <i class="fa fa-plus"></i>
                     </a>
                  </div>

                  <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap">
                     <div class="row">
                        <div class="col-xs-12 table-responsive">
                           <table id="example1" class="table table-striped table-hover table-condensed dataTable" role="grid" aria-describedby="example1_info">
                              <thead>

                                 <tr role="row">
                                    <th style="width: 20%;" >Nombre</th>
                                    <th style="width: 20%;" >Usuario</th>
                                    <th style="width: 20%;" >Perfil</th>
                                    <th style="width: 20%;" >Estatus</th>
                                    <th style="width: 20%;" >Opciones</th>
                                 </tr>

                              </thead>
                              <tbody>

                                 <?php foreach ($alluser as $allusers): ?>
                                    <tr>
                                       <td>
                                          <?php
                                             echo $allusers->name_users." ".$allusers->secondname_users;
                                          ?>
                                       </td>
                                       <td><?php echo $allusers->username_users; ?></td>
                                       <td><?php echo $allusers->describe_profile; ?></td>
                                       <td>
                                          <?php

                                             switch ($allusers->status_users)
                                             {
                                                case '1':
                                                   echo "Activo";
                                                   break;

                                                case '0':
                                                   echo "Inactivo";
                                                   break;

                                                default:
                                                   echo "No encontrado";
                                                   break;
                                             }
                                          ?>
                                       </td>
                                       <td>
                                          <a style="background-color: #2E86C1; color: #FFFFFF;" href="#modal_edit<?php echo $allusers->id_users; ?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_edit<?php echo $allusers->id_users; ?>">
                                             Editar Ususario <i class="fa fa-edit"></i>
                                          </a>
                                       </td>
                                    </tr>

                                    <div class="modal fade" id="modal_edit<?php echo $allusers->id_users; ?>">
                                       <div class="modal-dialog">
                                          <div class="modal-content">
                                             <?php echo form_open('users/is_post'); ?>
                                             <div class="modal-header" style="background: #F05F40;">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                                <h3 class="modal-tittle" style="color: #FFFFFF;">Editar usuario</h3>
                                             </div>

                                             <div class="modal-body">
                                                <div class="row">
                                                   <div class="col-xs-12 col-md-6">
                                                      <div class="form-group">
                                                         <input hidden type="text" name="txtsender" value="1">
                                                         <input hidden type="text" name="txtuser" value="<?php echo $allusers->id_users; ?>">
                                                         <label for="">Nombre(s)</label>
                                                         <input required class="form-control" type="text" name="txtname" placeholder="nombre(s)" value="<?php echo $allusers->name_users; ?>">
                                                      </div>
                                                   </div>

                                                   <div class="col-xs-12 col-md-6">
                                                      <div class="form-group">
                                                         <label for="">Apellidos</label>
                                                         <input class="form-control" type="text" name="txtsecondname" placeholder="apellido(s)" value="<?php echo $allusers->secondname_users; ?>">
                                                      </div>
                                                   </div>

                                                   <div class="col-xs-12 col-md-4">
                                                      <div class="form-group">
                                                         <label for="">Usuario</label>
                                                         <input required class="form-control" type="text" name="txtusername" placeholder="usuario" value="<?php echo $allusers->username_users; ?>">
                                                      </div>
                                                   </div>

                                                   <div class="col-xs-12 col-md-4">
                                                      <div class="form-group">
                                                         <label for="">Perfil</label>
                                                         <select class="form-control" name="txtprofile" required>
                                                            <option value="">Elige un perfil</option>

                                                            <?php if (isset($allprofile)): ?>
                                                               <?php foreach ($allprofile as $allprofiles): ?>

                                                                  <option value="<?php echo $allprofiles->id_profile; ?>"><?php echo $allprofiles->describe_profile; ?></option>

                                                               <?php endforeach; ?>
                                                            <?php else: ?>

                                                            <option value="">No disponible</option>

                                                            <?php endif; ?>

                                                         </select>
                                                      </div>
                                                   </div>

                                                   <div class="col-xs-12 col-md-4">
                                                      <div class="form-group">
                                                         <label for="">Estatus</label>
                                                         <select required class="form-control" name="txtstatus">
                                                            <option <?php if(!strcmp('1', $allusers->status_users)) { echo "selected"; } ?> value="1">Activo</option>
                                                            <option <?php if(!strcmp('0', $allusers->status_users)) { echo "selected"; } ?> value="0">Inactivo</option>
                                                         </select>
                                                      </div>
                                                   </div>

                                                   <div class="col-xs-12 col-md-6">
                                                      <div class="form-group">
                                                         <label for="">Contraseña</label>
                                                         <input required class="form-control" type="password" name="txtpass1" placeholder="contraseña" value="">
                                                      </div>
                                                   </div>

                                                   <div class="col-xs-12 col-md-6">
                                                      <div class="form-group">
                                                         <label for="">Escribe una vez más la contraseña</label>
                                                         <input required class="form-control" type="password" name="txtpass2" placeholder="contraseña" value="">
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
            <h1>Usuarios</h1>
            <div class="panel panel-warning">
               <div class="panel-heading">Listado de Usuarios</div>
               <div class="panel-body">
                  No hay usuarios disponibles.
                  <a href="#modal_new_user" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_new_user">
                     Nuevo Usuario <i class="fa fa-plus"></i>
                  </a>
               </div>
            </div>
         </div>
      <?php endif; ?>
      <div class="col-xs-12 col-md-1"></div>

   </div>

</div>

<?php $this->load->view('footer2'); ?>
