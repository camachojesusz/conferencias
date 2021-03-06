<?php $this->load->view('header'); ?>

  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/style.css">

  <h1>
    Semana del Administrador
    TESVG 2019
  </h1>

  <div class="agile-its">
    <h2 class="visible-sm visible-md visible-lg">Ingresa tus Datos</h2>
    <label class="visible-xs text-center">Ingresa tus Datos</label>
    <div class="w3layouts">
      <div class="photos-upload-view">

        <?php echo form_open('registry/is_post', array('method' => 'POST', 'autocomplete' => 'off', 'name' => 'f_registry')); ?>

          <div class="agileinfo">
          </div>

          <div class="agileinfo-row">

            <input type="hidden" id="alerta" name="" value="">

            <?php if (validation_errors()) : ?>
               <div class="alert alert-danger text-justify">
                  <h4>¡Error!</h4>
                  <ul>
                     <?php echo validation_errors(); ?>
                  </ul>
                  <br>
                  <h5>Verifíca los datos e inténtalo de nuevo</h5>
               </div>
            <?php endif; ?>

            <?php if (isset($fail_registerkey)): ?>
               <div class="alert alert-danger text-justify">
                  <h4>¡Error!</h4>
                  El <b>Número de cotrol</b> o <b>Clave ISSEMyM</b> ingresado ya existe en los registros, verifica los datos e inténtalo de nuevo.
               </div>
            <?php endif; ?>

            <?php if (isset($fail_equals_registerkey)): ?>
               <div class="alert alert-danger text-justify">
                  <h4>¡Error!</h4>
                  La información del campo <b>Número de cotrol</b> / <b>Clave ISSEMyM</b> no coincide con el campo <b>Verífica tu Número de cotrol o clave</b>, revisa los datos e inténtalo de nuevo.
               </div>
            <?php endif; ?>

            <?php if (isset($fail_equals_email)): ?>
               <div class="alert alert-danger text-justify">
                  <h4>¡Error!</h4>
                  El <b>Correo Electrónico</b> ingresado no coincide con el campoo de verificación, revisa los datos e inténtalo de nuevo.
               </div>
            <?php endif; ?>

            <?php if (isset($fail_email)): ?>
               <div class="alert alert-danger text-justify">
                  <h4>¡Error!</h4>
                  El <b>Correo Electrónico</b> ingresado ya existe en los registros, inténtalo con un correo electrónico diferente.
               </div>
            <?php endif; ?>


            <div class="ferry ferry-from form-group">
               <input hidden type="text" name="txtsender" value="0">
               <label for="txtregisterkey1">Número de Control (alumno) / Clave ISSEMyM (docente)</label>
              <input class="form-control" value="<?php if (isset($auto_complete) && !empty($auto_complete)){echo $auto_complete['registerkey_expectant'];} ?>" type="text" maxlength="10" id="txtregisterkey1" name="txtregisterkey1" placeholder="Ej. 201912100" >
            </div>

            <div class="ferry ferry-from form-group">
              <label for="txtregisterkey2">Verífica tu número de control o clave</label>
              <input class="form-control" value="" type="text" maxlength="10" id="txtregisterkey2" name="txtregisterkey2" placeholder="escribe una vez más tu número de control o clave" >
            </div>

            <div class="ferry ferry-from form-group">
              <label for="txtname">Nombre(s)</label>
              <input class="form-control" value="<?php if (isset($auto_complete) && !empty($auto_complete)){echo $auto_complete['name_expectant'];} ?>" type="text" id="txtname" name="txtname" placeholder="Ej. Juan de la Barrera" >
            </div>

            <div class="ferry ferry-from form-group">
              <label for="txtsecondname">Apellido(s)</label>
              <input class="form-control" value="<?php if (isset($auto_complete) && !empty($auto_complete)){echo $auto_complete['secondname_expectant'];} ?>" type="text" id="txtsecondname" name="txtsecondname" placeholder="Ej. Flores Montes de Oca" >
            </div>

            <div class="ferry ferry-from form-group">
              <label for="txtemail">Correo Electrónico</label>
              <input class="form-control" value="<?php if (isset($auto_complete) && !empty($auto_complete)){echo $auto_complete['email_expectant'];} ?>" type="email" id="txtemail" name="txtemail" placeholder="ejemplo@ejemplo.com" >
            </div>

            <div class="ferry ferry-from form-group">
              <label for="txtemail2">Verifíca tu Correo Electrónico</label>
              <input class="form-control" value="" type="email" id="txtemail2" name="txtemail2" placeholder="escribe una vez más tu correo electrónico" >
            </div>

            <div class="ferry ferry-from form-group">
              <label for="txtcarrier">Carrera</label>
              <select class="form-control" id="txtcarrier" name="txtcarrier" >
                <option value="">Elige una opción</option>
                <option <?php if (isset($auto_complete) && !empty($auto_complete)){ if (!$comp_carrier = strcmp("LA Escolarizado", $a = $auto_complete['carrier_expectant'])) { echo "selected"; } } ?> value="LA Escolarizado">L.A. Escolarizado</option>
                <option <?php if (isset($auto_complete) && !empty($auto_complete)){ if (!$comp_carrier = strcmp("LA Dual", $a = $auto_complete['carrier_expectant'])) { echo "selected"; } } ?> value="LA Dual">L.A. Dual</option>
                <option <?php if (isset($auto_complete) && !empty($auto_complete)){ if (!$comp_carrier = strcmp("Otro", $a = $auto_complete['carrier_expectant'])) { echo "selected"; } } ?> value="Otro">Otro</option>
              </select>
            </div>

            <div class="ferry ferry-from form-group">
              <label for="txtgroup">Grupo</label>
              <select class="form-control" id="txtgroup" name="txtgroup"  >
                <option value="">Elige una opción</option>
                <option <?php if (isset($auto_complete) && !empty($auto_complete)){ if (!$comp_carrier = strcmp("1101", $a = $auto_complete['group_expectant'])) { echo "selected"; } } ?> value="1101">1101</option>
                <option <?php if (isset($auto_complete) && !empty($auto_complete)){ if (!$comp_carrier = strcmp("1102", $a = $auto_complete['group_expectant'])) { echo "selected"; } } ?> value="1102">1102</option>
                <option <?php if (isset($auto_complete) && !empty($auto_complete)){ if (!$comp_carrier = strcmp("1111", $a = $auto_complete['group_expectant'])) { echo "selected"; } } ?> value="1111">1111</option>
                <option <?php if (isset($auto_complete) && !empty($auto_complete)){ if (!$comp_carrier = strcmp("1104", $a = $auto_complete['group_expectant'])) { echo "selected"; } } ?> value="1104">1104</option>
                <option <?php if (isset($auto_complete) && !empty($auto_complete)){ if (!$comp_carrier = strcmp("1301", $a = $auto_complete['group_expectant'])) { echo "selected"; } } ?> value="1301">1301</option>
                <option <?php if (isset($auto_complete) && !empty($auto_complete)){ if (!$comp_carrier = strcmp("1302", $a = $auto_complete['group_expectant'])) { echo "selected"; } } ?> value="1302">1302</option>
                <option <?php if (isset($auto_complete) && !empty($auto_complete)){ if (!$comp_carrier = strcmp("1311", $a = $auto_complete['group_expectant'])) { echo "selected"; } } ?> value="1311">1311</option>
                <option <?php if (isset($auto_complete) && !empty($auto_complete)){ if (!$comp_carrier = strcmp("1501", $a = $auto_complete['group_expectant'])) { echo "selected"; } } ?> value="1501">1501</option>
                <option <?php if (isset($auto_complete) && !empty($auto_complete)){ if (!$comp_carrier = strcmp("1502", $a = $auto_complete['group_expectant'])) { echo "selected"; } } ?> value="1502">1502</option>
                <option <?php if (isset($auto_complete) && !empty($auto_complete)){ if (!$comp_carrier = strcmp("1511", $a = $auto_complete['group_expectant'])) { echo "selected"; } } ?> value="1511">1511</option>
                <option <?php if (isset($auto_complete) && !empty($auto_complete)){ if (!$comp_carrier = strcmp("1701", $a = $auto_complete['group_expectant'])) { echo "selected"; } } ?> value="1701">1701</option>
                <option <?php if (isset($auto_complete) && !empty($auto_complete)){ if (!$comp_carrier = strcmp("1702", $a = $auto_complete['group_expectant'])) { echo "selected"; } } ?> value="1702">1702</option>
                <option <?php if (isset($auto_complete) && !empty($auto_complete)){ if (!$comp_carrier = strcmp("1711", $a = $auto_complete['group_expectant'])) { echo "selected"; } } ?> value="1711">1711</option>
                <option <?php if (isset($auto_complete) && !empty($auto_complete)){ if (!$comp_carrier = strcmp("Otro", $a = $auto_complete['group_expectant'])) { echo "selected"; } } ?> value="Otro">Otro</option>
              </select>
            </div>

            <div class="ferry ferry-from form-group text-center">
              <label for="txtprivate" class="">
                <input value="1" id="txtprivate" name="txtprivate" type="checkbox" onclick="javascript: validate_submit(this);">
                He verificado que mis datos son correctos y acepto términos de <big for=""><a target="_blank" href="<?php echo base_url()."registry/privacy"; ?>">Politica de Privacidad</a></big>
              </label>
            </div>
          </div>

          <div class="wthree-text">
            <div class="wthreesubmitaits">
              <input type="submit" name="f_submit" value="Guardar" disabled>
            </div>
          </div>

        <?php echo form_close(); ?>

      </div>
      <div class="clear"></div>
    </div>
  </div>

<?php $this->load->view('footer'); ?>
