<?PHP
	require_once('plugins/include/konek.php');
	$title='asrama';
	$id_lantai=ganti($_GET['id_lantai']);
	if(!isset($_GET['id_lantai'])||$_GET['id_lantai']=='')
	$id_lantai=0;
	$nama_q=pg_query("select * from lantai,gedung where lantai.id_gedung=gedung.id_gedung and lantai.id_lantai='$id_lantai'");
	$exe_nama=pg_fetch_assoc($nama_q);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Lantai <?PHP echo $exe_nama['nama_lantai']?>| Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- /////////////////////////////////////////-->
     <link href="plugins/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/ionicons-2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- ///////////////////////////////////////////-->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-green fixed" onload="startTime()">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo"><img src='dist/img/logo.png'></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a><span>&nbsp;</span>
		  <span id='jam_admin'style="font-size:18pt;padding-top:20px;position: absolute;">hehehes</span>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">Nama Yang Login</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <p>
                      Nama Yang Login
                      <small>Member since Nov. 2012</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Nama Yang Login</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <?PHP
			require_once('plugins/include/sidebar.php');
		  ?>
		  </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Lantai
            <small><?PHP echo $exe_nama['nama_lantai']?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li>Asrama <?PHP echo $exe_nama['nama_gedung']?></li>
            <li class="active">Lantai <?PHP echo $exe_nama['nama_lantai']?></li>
          </ol>
        </section>

        <!-- Main content -->
       <!--main content start-->
<section class="content">
<section class="wrapper">
<!--mini statistics start-->
<div class="row">
	
	<div class="col-md-12">
		<section class="panel">
		<br>
			<div class='panel-body'>
				<div class="col-md-12">
					<a class='btn btn-primary' href="#myModal"><i class='fa fa-plus-circle'></i> Tambah Fasilitas</a>
					<a class='btn btn-primary' href="lapor_kerusakan.html"><i class='fa fa-plus-circle'></i> Lapor Kerusakan</a>
					<a class='btn btn-primary' href="perbaikan.html"><i class='fa fa-plus-circle'></i> Lapor Perbaikan</a>
					<span style='margin-left:3px' class="label label-danger pull-right inbox-notification">Jumlah Kerusakan</span>
				</div>
				<br></br></br>
				<ul class="nav nav-pills nav-stacked mail-nav">
					<?PHP
					$kamar_q=pg_query("select * from kamar where id_lantai = $id_lantai");
					while($exe_kamar=pg_fetch_assoc($kamar_q))
					{
						$kerusakan_kamar_q=pg_query("select sum(banyak_kerusakan) as id from kerusakan where id_kamar=$exe_kamar[id_kamar]");
						$exe_kerusakan_kamar=pg_fetch_assoc($kerusakan_kamar_q);
					?>
					<li>
						<a href='kamar.php?kamar=<?PHP echo $exe_kamar['id_kamar']?>'><?PHP echo $exe_kamar['no_kamar']?>
							<span style='margin-left:3px' class="label label-danger pull-right inbox-notification"><?PHP echo $exe_kerusakan_kamar['id']?></span>
						</a>
					</li>
					<?PHP
					}
					?>
				</ul>
			</div>
		</section>
	</div>
</div>

</section>
</section>
<!--main content end-->      </div><!-- /.content-wrapper -->

     

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="plugins/chartjs/Chart.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script>
        function startTime()
        {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            // add a zero in front of numbers<10
            m=checkTime(m);
            s=checkTime(s);
			if(s%2==0)
            document.getElementById('jam_admin').innerHTML="&nbsp;"+h+":<span style='zoom:1%'>&nbsp;</span>"+m;
            else
			document.getElementById('jam_admin').innerHTML="&nbsp;"+h+" "+m;
            t=setTimeout(function(){startTime()},500);
        }

        function checkTime(i)
        {
            if (i<10)
            {
                i="0" + i;
            }
            return i;
        }
</script>
  </body>
</html>