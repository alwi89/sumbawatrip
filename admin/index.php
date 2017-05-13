<?php
session_start();
require_once("../koneksi.php");
if(!isset($_SESSION['adm'])){
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>admin sumbawa trip</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../templates/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../templates/font-awesome-4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <!--link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"-->
    <!-- Theme style -->
    <link rel="stylesheet" href="../templates/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../templates/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../templates/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../templates/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../templates/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
     <link rel="stylesheet" href="../templates/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../templates/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../templates/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../templates/plugins/datatables/dataTables.bootstrap.css">
    <!-- jQuery 2.1.4 -->
    <script src="../templates/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <link rel="stylesheet" href="../templates/plugins/validator/dist/css/bootstrapValidator.css"/>
    <script type="text/javascript" src="../templates/plugins/validator/dist/js/bootstrapValidator.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
	td{
	padding:5px;
}
.main-sidebar{
	margin-top:100px;
}
#banner{
	background:#FFFFFF;
	width:100%;
	height:100px;
}
#judul{
 font-size:24px;
 padding-top:15px;
 color:#605ca8;
}
#lokasi{
 font-size:27px;
 color:#605ca8;
}
#isi{
 background:#e6e4fc;
 padding:15px;
}
#konten{
 background:#FFFFFF;
 padding:10px;
}
/*
#data th{
	background:#0099CC;
}
#data tr:nth-child(even){
	background: #CCC
}
#data tr:nth-child(odd){
	background: #FFF
}
*/
	</style>  
  </head>
  <body class="hold-transition skin-purple-light sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
      	<div id="banner">
        	<img src="../templates/images/logo-amikom-jogja.png" width="150" height="100" align="left" >
        	<div id="judul">WEBSITE ADMIN</div>
            <div id="lokasi">SUMBAWA TRIP</div>        
        </div>
      	<!--img src="../templates/images/banner.png" width="100%" height="100px" /-->
        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="../templates/images/logo.png" width="50" height="50" /></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b style="color:#FFFFFF;">admin</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../templates/images/account.png" class="user-image" alt="User Image">
                  <span class="hidden-xs"><nama_login><?php echo $_SESSION['nm_adm']; ?></nama_login></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../templates/images/account.png" class="img-circle" alt="User Image">
                    <p>
                      <nama_login><?php echo $_SESSION['nm_adm']; ?></nama_login>
                      <small><level_login>admin</level_login></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="?h=akun" class="btn btn-default btn-flat">Edit Akun</a>
                    </div>
                    <div class="pull-right">
                      <a href="keluar.php" class="btn btn-default btn-flat">Log Out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../templates/images/account.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><nama_login><?php echo $_SESSION['nm_adm']; ?></nama_login></p>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU UTAMA</li>
            <li class="treeview">
              <a href="?h=wilayah">
                <i class="fa fa-dashboard"></i> <span>Wilayah</span></i>
              </a>
            </li>
            <li class="treeview">
              <a href="?h=kategori">
                <i class="fa fa-dashboard"></i> <span>Kategori</span></i>
              </a>
            </li>
            <li class="treeview">
              <a href="?h=wisata">
                <i class="fa fa-dashboard"></i> <span>Wisata</span></i>
              </a>
            </li>
            <li class="treeview">
              <a href="?h=hotel">
                <i class="fa fa-dashboard"></i> <span>Hotel</span></i>
              </a>
            </li>
            <li class="treeview">
              <a href="?h=restoran">
                <i class="fa fa-dashboard"></i> <span>Restoran</span></i>
              </a>
            </li>
            <li class="treeview">
              <a href="?h=spbu">
                <i class="fa fa-dashboard"></i> <span>SPBU</span></i>
              </a>
            </li>
            <li class="treeview">
              <a href="?h=berita">
                <i class="fa fa-dashboard"></i> <span>Berita Wisata</span></i>
              </a>
            </li>
            <li class="treeview">
              <a href="keluar.php">
                <i class="fa fa-dashboard"></i> <span>Log Out</span></i>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
          <div class="row" id="konten">
            <?php
            if(!isset($_GET['h'])){
              require_once("home.php");
            }else{
              if (file_exists("$_GET[h].php")) {
                  require "$_GET[h].php";
              }else {
                require_once("tidak_ketemu.php");
              }
            }
            ?>
          </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Free Template By Admin LTE</strong><br />
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
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-user bg-yellow"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    <p>New phone +1(800)555-1234</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    <p>nora@example.com</p>
                  </div>
                </a>
              </li>
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    <p>Execution time 5 seconds</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
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
                <a href="javascript::;">
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
                <a href="javascript::;">
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
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Back End Framework
                    <span class="label label-primary pull-right">68%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
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
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Allow mail redirect
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Other sets of options are available
                </p>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Expose author name in posts
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Allow the user to show his name in blog posts
                </p>
              </div><!-- /.form-group -->

              <h3 class="control-sidebar-heading">Chat Settings</h3>

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Show me as online
                  <input type="checkbox" class="pull-right" checked>
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Turn off notifications
                  <input type="checkbox" class="pull-right">
                </label>
              </div><!-- /.form-group -->

              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Delete chat history
                  <a href="javascript::;" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                </label>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <!-- jQuery UI 1.11.4 -->
    <script src="../templates/plugins/jQueryUI/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      //$.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../templates/bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <!--script src="../templates/https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script-->
    <script src="../templates/plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../templates/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../templates/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../templates/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../templates/plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <!--script src="../templates/https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script-->
    <script src="../templates/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../templates/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../templates/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../templates/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../templates/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../templates/dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../templates/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../templates/dist/js/demo.js"></script>
    <script type="text/javascript" src="../templates/plugins/jQuery/ui.tabs.closable.min.js"></script>
    <!-- DataTables -->
    <script src="../templates/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../templates/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="../templates/plugins/autoNumeric.js"></script>
    <script src="../templates/plugins/bootstrap-typeahead.js"></script>
    
    
	<link rel="stylesheet" type="text/css" href="../templates/plugins/datatables/buttons.bootstrap.min.css">
	<script type="text/javascript" language="javascript" src="../templates/plugins/datatables/dataTables.buttons.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="../templates/plugins/datatables/buttons.bootstrap.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="../templates/plugins/datatables/jszip.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="../templates/plugins/datatables/pdfmake.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="../templates/plugins/datatables/vfs_fonts.js">
	</script>
	<script type="text/javascript" language="javascript" src="../templates/plugins/datatables/buttons.html5.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="../templates/plugins/datatables/buttons.print.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="../templates/plugins/datatables/buttons.colVis.min.js">
	</script>
    <script type="text/javascript" language="javascript" src="../templates/plugins/jquery-csv-master/src/jquery.csv.min.js">
	</script>

  </body>
</html>