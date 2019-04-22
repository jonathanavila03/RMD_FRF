<?php
error_reporting(0);

  session_start();

  require 'database.php';

  $valida_id = $_SESSION['user_id'];


  if(isset($valida_id)) {
 
    $query = "SELECT usuario_nombre FROM rmd_usuario WHERE usuario_rut = '$valida_id' LIMIT 1";
    $results = mysqli_query($conn, $query);

     $user = "";

    if (count($results) > 0) {
      $row=mysqli_fetch_row($results);
      $user = $row[0];
      

    }

  }else{
    session_start();
    session_unset();
    session_destroy();

  }

  $query_id_proyecto = "SELECT case when max(proyecto_id) is NULL then 1 else max(proyecto_id) + 1 end proyecto_id  FROM rmd_proyecto";
  $id_proyecto_results = mysqli_query($conn, $query_id_proyecto);
  $proyecto = ""; 
  $row_proyecto = mysqli_fetch_row($id_proyecto_results);
  $proyecto = $row_proyecto[0];

  $query_clientes = "SELECT cliente_nombre FROM rmd_cliente";
  $clientes = mysqli_query($conn, $query_clientes);

  $query_obras = "SELECT obra_descripcion FROM rmd_obra";
  $obras = mysqli_query($conn, $query_obras);

  $query_estado = "SELECT estado_descripcion FROM rmd_estado";
  $estado = mysqli_query($conn, $query_estado);

  $query_tipo = "SELECT negocio_descripcion FROM rmd_negocio";
  $tipo = mysqli_query($conn, $query_tipo);



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RMD-FRF | Crea Proyecto</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="./../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./../bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="./../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="./../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="./../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <style>
  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:100%;
   padding:10px;
   background-color:#fff;
   border:1px solid #ccc;
   border-radius:0px;
   margin-top:25px;
   box-sizing:border-box;
  }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php require 'header.php'; ?>

  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <br>
        </div>
        <div class="pull-left info">
          <p><?php  echo $user ?> </p>
          <a href="#"><i class="fa fa-circle text-success"></i> En línea</a>
        </div>
      </div>
      <!-- search form -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU DE NAVEGACIÓN</li>
        <li>
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Escritorio</span>

          </a>
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Proyectos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="crea-obra.php"><i class="fa fa-circle-o"></i> Crear Obra</a></li>
            <li><a href="crea-proyecto.php"><i class="fa fa-circle-o"></i> Crear Proyecto</a></li>
          </ul>
        </li>
        <li>
          <a href="crea-clientes.php">
            <i class="fa fa-handshake-o"></i> <span>Crear Clientes</span>

          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crea tu proyecto
        <small>Visualiza</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Proyectos</a></li>
        <li class="active">Crear Proyecto</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">


              <div class="box-header with-border">
                  <div class="box-header with-border">
                    <h3 class="box-title">Creación de proyectos</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form class="form-horizontal">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">N° Proyecto</label>
      
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="inputEmail3" readonly="readonly" value= "<?php echo $proyecto ?>">
                        </div>
                      </div>                    
                      <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Obra a la que pertenece</label>
        
                          <div class="col-sm-10">
                          <select class="form-control" autocomplete="honorifix-prefix">
                          <?php 
                            while ($rows_obra = mysqli_fetch_row($obras))
                            {
                              ?><option><?php echo $rows_obra[0]?></option>
                          <?php }
                          
                          ?>

                          </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">Cliente</label>
        
                          <div class="col-sm-10">
                          <select class="form-control" autocomplete="honorifix-prefix">
                          <?php 
                            while ($rows = mysqli_fetch_row($clientes))
                            {
                              ?><option><?php echo $rows[0]?></option>
                          <?php }
                          
                          ?>

                          </select>
                          </div>
                        </div> 
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Estado</label>
          
                            <div class="col-sm-10">
                            <select class="form-control" autocomplete="honorifix-prefix">
                              <?php 
                                while ($rows_estado = mysqli_fetch_row($estado))
                                {
                                  ?><option><?php echo $rows_estado[0]?></option>
                              <?php }
                              
                              ?>

                            </select>
                            </div>
                          </div> 
                          <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2 control-label">Fecha entrega</label>
            
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="datepicker" placeholder="Elegir Fecha" readonly="readonly">
                              </div>
                            </div> 
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Fecha ingreso</label>
              
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" id="datepicker2" placeholder="Elegir Fecha" readonly="readonly">
                                </div>
                              </div> 
                              <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">Fecha Entr. 1° Despacho</label>
                
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="datepicker3" placeholder="Elegir Fecha" readonly="readonly">
                                  </div>
                                </div> 
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Duración</label>
                  
                                    <div class="col-sm-10">
                                      <input type="number" class="form-control" id="inputEmail3" placeholder="Cantidad de Meses">
                                    </div>
                                  </div> 
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Tipo</label>
                      
                                        <div class="col-sm-10">
                                        <select class="form-control" autocomplete="honorifix-prefix">
                                        <?php 
                                          while ($rows_tipo = mysqli_fetch_row($tipo))
                                          {
                                            ?><option><?php echo $rows_tipo[0]?></option>
                                        <?php }
                                        
                                        ?>

                                        </select>
                                        </div>
                                      </div> 
  
                    </div>
                    <!-- /.box-body -->
                      <div class="container box">
                      <div>
                      <br />
                        <div align="right">
                        <button type="button" name="add" id="add" class="btn btn-info">Agregar</button>
                        </div>
                        <br />
                        <div id="alert_message"></div>
                        <table id="proyecto_data" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                          <th>Producto</th>
                                                <th>M.2</th>
                                                <th>Costo</th>
                                                <th>Tiempo</th>
                                                <th>Fecha Entrega</th>
                                                <th>Fecha Devolucion</th>
                                                <th>Total</th>
                                                <th></th>
                                                <th></th>
                          </tr>
                        </thead>
                        </table>
                      </div>
                      </div>
                    <div class="box-footer">
                        
                      <button type="submit" class="btn btn-default">Cancelar</button>

                      <button type="submit" class="btn btn-info pull-right">Grabar</button>
                    </div>
                    <!-- /.box-footer -->
                  </form>
                </div>
          </div>
        </div>
      </div>
      
    </section>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2019 <a href="http://avarti.cl" target=”_blank”>Avarti Software</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="./../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="./../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="./../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="./../dist/js/adminlte.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./../dist/js/demo.js"></script>
<script>
    $(function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker2" ).datepicker();
    $( "#datepicker3" ).datepicker();
    });
    </script>

<script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#proyecto_data').DataTable({
   });
  }

  
  $('#add').click(function(){
   var html = '<tr>';
   html += '<td class="select" id="data1" readonly="readonly">';
   html += '<select class="form-control" autocomplete="honorifix-prefix">';      
   html += '<option value="Minima">Minima</option>';
   html += '<option value="Maxima">Maxima</option>';
   html += '<option value="Rapid-Steel">Rapid Steel</option>';
   html += '<option value="AS-150">AS-150</option>';
   html += '<option value="Alshor">Alshor</option>';
   html += '<option value="Airodeck">Airodeck</option>';
   html += '<option value="Prop">Prop</option>';
   html += '<option value="Rapid-Shor">Rapid Shor</option>';
   html += '<option value="Super-Slim">Super Slim</option>';
   html += '<option value="Mega-Shor">Mega Shor</option>';
   html += '<option value="Ultraguard">Ultraguard</option>';
   html += '<option value="Ascent">Ascent</option>';
   html += '</select>';
   html += '</td>';
   html += '<td contenteditable id="data2"></td>';
   html += '<td contenteditable id="data3"></td>';
   html += '<td contenteditable id="data4"></td>';
   html += '<td contenteditable id="date5"></td>';
   html += '<td id="data6"></td>';
   html += '<td id="data7"></td>';
   html += '<td><button type="button" name="calculo" id="calculo" class="btn btn-success btn-xs">Calcular</button></td>';
   html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Agregar</button></td>';

   html += '</tr>';
   $('#proyecto_data tbody').prepend(html);
  }); 
  
  $(document).on('click', '#insert', function(){
   var producto = $('#data1').text();
   var m2 = $('#data2').text();
   var costo = $('#data3').text();
   var tiempo = $('#data4').text();
   var fecha_entrega = $('#data5').text();
   var fecha_devolucion = $('#data6').text();
   var total = $('#data7').text();
   if(producto != '' && costo != '')
   {
    $.ajax({
     url:"insert.php",
     method:"POST",
     data:{first_name:first_name, last_name:last_name},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#proyecto_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   else
   {
    alert("Favor Ingresar Todos los Campos");
   }
  });
  
 });
</script>
</body>
</html>
