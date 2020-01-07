
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <p> © 2019. Derechos Reservados | Design by  <a target="_blank" href="https://grupoinntec.com.mx/"> Grupo InnTec</a></p>
      </div>
    </div>
  </footer>

</div>

<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/dist/js/adminlte.min.js"></script>
<script>
$(function () {
   $('#example1').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'language': {
         "lengthMenu": "Mostrar _MENU_ registros por página",
         "zeroRecords": "Sin coincidencias - revisa la escritura",
         "info": "Mostrando de <b>_START_</b> hasta <b>_END_</b>, de <b>_TOTAL_</b> registros",
         "infoEmpty": "No hay registros disponibles",
         "infoFiltered": "(<b>_MAX_</b> registros filtrados)",
         "search": 'Buscar <li class = "fa fa-search color-search-table"></li>',
         "pagingType": "simple_numbers",
      }
   })
   $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true,
      'language': {
         "lengthMenu": "Mostrar _MENU_ registros por página",
         "zeroRecords": "Sin coincidencias - revisa la escritura",
         "info": "Mostrando de <b>_START_</b> hasta <b>_END_</b>, de <b>_TOTAL_</b> registros",
         "infoEmpty": "No hay registros disponibles",
         "infoFiltered": "(<b>_MAX_</b> registros filtrados)",
         "search": 'Buscar <li class = "fa fa-search color-search-table"></li>',
         "pagingType": "simple_numbers",
      }
   })
   $('.select2').select2()
  })
</script>

</body>
</html>
