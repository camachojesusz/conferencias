
   <nav class="navbar navbar-inverse navbar-fixed-top " role ="navigation">
      <div class="container">
         <div class="navbar-header <?php if ($_SESSION['profile'] != 1): echo ' hidden'; endif; ?>">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target = "#navigacion-ch">
               <span class="sr-only">Desplegar / Ocultar Menú</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a href="<?php echo base_url()."home_ad"; ?>" class="navbar-brand">Inicio <span class="glyphicon glyphicon-home"></span></a>
         </div>

         <div class="collapse navbar-collapse" id = "navigacion-ch">
          <ul class="nav navbar-nav">

            <li <?php if ($_SESSION['profile'] != 1): echo 'class="hidden"'; endif; ?>><a href="<?php echo base_url()."conference"; ?>">Conferencias</a></li>
            <li <?php if ($_SESSION['profile'] != 1): echo 'class="hidden"'; endif; ?>><a href="<?php echo base_url()."expectant"; ?>">Asistentes</a></li>
            <li <?php if ($_SESSION['profile'] != 1): echo 'class="hidden"'; endif; ?>><a href="<?php echo base_url()."users"; ?>">Usuarios</a></li>
            <li><a href="<?php echo base_url()."reception"; ?>">Recepción</a></li>

          </ul>

          <form class="navbar-form navbar-right">
            <a href="<?php echo base_url()."login/logout"; ?>" type="button" class="btn btn-sm btn-primary color1">Cerrar sesión <samp class="glyphicon glyphicon-off"></samp></a>
          </form>

         </div>
      </div>
   </nav>
