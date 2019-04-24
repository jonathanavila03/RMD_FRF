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

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RMD-FRF | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="./../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="./../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="./../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="./../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="./../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="./../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="./../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="./../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <!-- Manipulador de eventos kanban -->
  
  <link rel="stylesheet" href="./../bower_components/kanban/jkanban.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style>
    body {
        font-family: "Lato";
        margin: 0;
        padding: 0;
    }
    #myKanban {
        overflow-x: auto;
        padding: 10px 0;
    }
    .success {
        background: #00B961;
    }
    .infos {
        background: #2a92bf;
    }
    .warning {
        background: #F4CE46;
    }
    .error {
        background: #FB7D44;
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
          <p><?php echo $user?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU DE NAVEGACIÓN</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Escritorio</span>
          </a>
        </li>
        <li class="treeview">
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

        <li class="treeview">
          <a href="#">
            <i class="fa fa-handshake-o"></i>
            <span>Clientes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="crea-clientes.php"><i class="fa fa-circle-o"></i> Crear Clientes</a></li>
            <li><a href="misclientes.php"><i class="fa fa-circle-o"></i> Mis Clientes</a></li>
          </ul>
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
        Escritorio
        <small>Visualización</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Escritorio</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row center">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>Estado A</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>53<sup style="font-size: 20px">%</sup></h3>

              <p>Estado B</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>

              <p>Estado C</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
         <!-- ./col -->
      </div>
      <!-- /.row -->

          <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                    
                  <div class="container-fluid">
                    <div class="row">
                       <div class="col-md-12">  
                          <h1>Proyectos</h1>
                          <p>Modifica el estado de los proyectos.</p>
                          <hr>
                          <div id="myKanban"></div>
                          <hr>
                          <!-- Tell the browser to be responsive to screen width 
                          <button class="btn btn-success" id="addDefault">Add "Default" board</button>
                          <button class="btn btn-success" id="addToDo">Add element in "To Do" Board</button>
                          <button class="btn btn-danger" id="removeBoard">Remove "Done" Board</button>-->
                       </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
        </section>


    <!-- /.content -->
      <!-- /.row (main row) -->

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
<!-- jQuery UI 1.11.4 -->
<script src="./../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="./../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="./../bower_components/raphael/raphael.min.js"></script>
<script src="./../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="./../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="./../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="./../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="./../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="./../bower_components/moment/min/moment.min.js"></script>
<script src="./../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="./../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="./../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="./../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="./../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="./../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="./../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./../dist/js/demo.js"></script>
<!-- Manejador de eventos Kanban -->
<script src="./../bower_components/kanban/jkanban.min.js"></script>
<script src="./../bower_components/kanban/jkanban.min.js"></script>
<script>
    var KanbanTest = new jKanban({
        element: '#myKanban',
        gutter: '10px',
        widthBoard: '250px',
        click: function (el) {
            console.log("Trigger on all items click!");
        },
        buttonClick: function (el, boardId) {
            console.log(el);
            console.log(boardId);
            // create a form to enter element 
            var formItem = document.createElement('form');
            formItem.setAttribute("class", "itemform");
            formItem.innerHTML = '<div class="form-group"><textarea class="form-control" rows="2" autofocus></textarea></div><div class="form-group"><button type="submit" class="btn btn-primary btn-xs pull-right">Submit</button><button type="button" id="CancelBtn" class="btn btn-default btn-xs pull-right">Cancel</button></div>'

            KanbanTest.addForm(boardId, formItem);
            formItem.addEventListener("submit", function (e) {
                e.preventDefault();
                var text = e.target[0].value
                KanbanTest.addElement(boardId, {
                    "title": text,
                })
                formItem.parentNode.removeChild(formItem);
            });
            document.getElementById('CancelBtn').onclick = function () {
                formItem.parentNode.removeChild(formItem)
            }
        },
        addItemButton: true,
        boards: [
            {
                "id": "_todo",
                "title": "Estado A",
                "class": "infos,good",
                "dragTo": ['_working'],
                "item": [
                    {
                        "id": "_test_delete",
                        "title": "Try drag this (Look the console)",
                        "drag": function (el, source) {
                            console.log("START DRAG: " + el.dataset.eid);
                        },
                        "dragend": function (el) {
                            console.log("END DRAG: " + el.dataset.eid);
                        },
                        "drop": function(el){
                            console.log('DROPPED: ' + el.dataset.eid )
                        }
                    },
                    {
                        "title": "Try Click This!",
                        "click": function (el) {
                            alert("click");
                        },
                    }
                ]
            },
            {
                "id": "_todo",
                "title": "Estado B",
                "class": "infos,good",
                "dragTo": ['_working'],
                "item": [
                    {
                        "id": "_test_delete",
                        "title": "Try drag this (Look the console)",
                        "drag": function (el, source) {
                            console.log("START DRAG: " + el.dataset.eid);
                        },
                        "dragend": function (el) {
                            console.log("END DRAG: " + el.dataset.eid);
                        },
                        "drop": function(el){
                            console.log('DROPPED: ' + el.dataset.eid )
                        }
                    },
                    {
                        "title": "Try Click This!",
                        "click": function (el) {
                            alert("click");
                        },
                    }
                ]
            },
            {
                "id": "_todo",
                "title": "Estado C",
                "class": "infos,good",
                "dragTo": ['_working'],
                "item": [
                    {
                        "id": "_test_delete",
                        "title": "Try drag this (Look the console)",
                        "drag": function (el, source) {
                            console.log("START DRAG: " + el.dataset.eid);
                        },
                        "dragend": function (el) {
                            console.log("END DRAG: " + el.dataset.eid);
                        },
                        "drop": function(el){
                            console.log('DROPPED: ' + el.dataset.eid )
                        }
                    },
                    {
                        "title": "Try Click This!",
                        "click": function (el) {
                            alert("click");
                        },
                    }
                ]
            },
            {
                "id": "_todo",
                "title": "Estado D",
                "class": "infos,good",
                "dragTo": ['_working'],
                "item": [
                    {
                        "id": "_test_delete",
                        "title": "Try drag this (Look the console)",
                        "drag": function (el, source) {
                            console.log("START DRAG: " + el.dataset.eid);
                        },
                        "dragend": function (el) {
                            console.log("END DRAG: " + el.dataset.eid);
                        },
                        "drop": function(el){
                            console.log('DROPPED: ' + el.dataset.eid )
                        }
                    },
                    {
                        "title": "Try Click This!",
                        "click": function (el) {
                            alert("click");
                        },
                    }
                ]
            },
            {
                "id": "_todo",
                "title": "Estado E",
                "class": "infos,good",
                "dragTo": ['_working'],
                "item": [
                    {
                        "id": "_test_delete",
                        "title": "Try drag this (Look the console)",
                        "drag": function (el, source) {
                            console.log("START DRAG: " + el.dataset.eid);
                        },
                        "dragend": function (el) {
                            console.log("END DRAG: " + el.dataset.eid);
                        },
                        "drop": function(el){
                            console.log('DROPPED: ' + el.dataset.eid )
                        }
                    },
                    {
                        "title": "Try Click This!",
                        "click": function (el) {
                            alert("click");
                        },
                    }
                ]
            },
            {
                "id": "_todo",
                "title": "Estado F",
                "class": "infos,good",
                "dragTo": ['_working'],
                "item": [
                    {
                        "id": "_test_delete",
                        "title": "Try drag this (Look the console)",
                        "drag": function (el, source) {
                            console.log("START DRAG: " + el.dataset.eid);
                        },
                        "dragend": function (el) {
                            console.log("END DRAG: " + el.dataset.eid);
                        },
                        "drop": function(el){
                            console.log('DROPPED: ' + el.dataset.eid )
                        }
                    },
                    {
                        "title": "Try Click This!",
                        "click": function (el) {
                            alert("click");
                        },
                    }
                ]
            },
            {
                "id": "_todo",
                "title": "PERDIDO",
                "class": "infos,good",
                "dragTo": ['_working'],
                "item": [
                    {
                        "id": "_test_delete",
                        "title": "Try drag this (Look the console)",
                        "drag": function (el, source) {
                            console.log("START DRAG: " + el.dataset.eid);
                        },
                        "dragend": function (el) {
                            console.log("END DRAG: " + el.dataset.eid);
                        },
                        "drop": function(el){
                            console.log('DROPPED: ' + el.dataset.eid )
                        }
                    },
                    {
                        "title": "Try Click This!",
                        "click": function (el) {
                            alert("click");
                        },
                    }
                ]
            }
        ]
    });

    var toDoButton = document.getElementById('addToDo');
    toDoButton.addEventListener('click', function () {
        KanbanTest.addElement(
            "_todo",
            {
                "title": "Test Add",
            }
        );
    });

    var addBoardDefault = document.getElementById('addDefault');
    addBoardDefault.addEventListener('click', function () {
        KanbanTest.addBoards(
            [{
                "id": "_default",
                "title": "Kanban Default",
                "item": [
                    {
                        "title": "Default Item",
                    },
                    {
                        "title": "Default Item 2",
                    },
                    {
                        "title": "Default Item 3",
                    }
                ]
            }]
        )
    });

    var removeBoard = document.getElementById('removeBoard');
    removeBoard.addEventListener('click', function () {
        KanbanTest.removeBoard('_done');
    });

    var removeElement = document.getElementById('removeElement');
    removeElement.addEventListener('click', function () {
        KanbanTest.removeElement('_test_delete');
    });

    var allEle = KanbanTest.getBoardElements('_todo');
    allEle.forEach(function (item, index) {
        //console.log(item);
    })
</script>

</body>
</html>
