<?PHP
	require_once('plugins/include/konek.php');
	$title='asrama';
	$id_gedung=ganti($_GET['asrama']);
	if(!isset($_GET['asrama'])||$_GET['asrama']=='')
	$id_gedung=0;
	$nama_q=pg_query("select * from gedung where id_gedung='$id_gedung'");
	$exe_nama=pg_fetch_assoc($nama_q);
	$itung_kondisi=0;
	$itung_item_dev=0;
	$itung_q=pg_query("select kondisi as kondisi from kondisi,kamar,lantai where kondisi.id_kamar=kamar.id_kamar and kamar.id_lantai=lantai.id_lantai and kamar.no_kamar!='fasilitasasrama' and lantai.id_gedung=$id_gedung");
	while($exe_itung=pg_fetch_assoc($itung_q))
		$itung_kondisi=$itung_kondisi+$exe_itung['kondisi'];
	$itung2_q=pg_query("select * from item_kategori,kategori_inv where item_kategori.id_kategori=kategori_inv.id_kategori and kategori_inv.jenis='kamar' and id_gedung=$id_gedung");
	while($exe_itung2=pg_fetch_assoc($itung2_q))
		$itung_item_dev=$itung_item_dev+$exe_itung2['jumlah_dev'];
	$itung_kamar_q=pg_query("select * from kamar,lantai where kamar.id_lantai = lantai.id_lantai and kamar.no_kamar != 'fasilitasasrama' and lantai.id_gedung='$id_gedung'");
	$itung_kamar_rows=pg_num_rows($itung_kamar_q);
		//echo ;
	$gauge=(($itung_item_dev*$itung_kamar_rows)/$itung_kondisi)*100;
	if($gauge==0)
		$gauge='';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Asrama <?PHP if(isset($_GET['asrama']))echo $exe_nama['nama_gedung']?>|Sistem Informasi Asrama</title>
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
            Asrama
            <small><?PHP echo $exe_nama['nama_gedung']?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li>Kelola Asrama</li>
            <li class="active">Asrama <?PHP echo $exe_nama['nama_gedung']?></li>
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
			<div class='panel-body'>
				<section class="panel">
						<div class="panel-body">
							<div class="top-stats-panel">
								<center>
								<div class="gauge-canvas">
									<h4 class="widget-h">Asrama <?PHP echo $exe_nama['nama_gedung']?></h4>
									<canvas width=160 height=100 id="gauge"></canvas>
								</div>
								</center>
								<ul class="gauge-meta clearfix">
									<span id="gauge-textfield" class="pull-left gauge-value" style='color:#fa8564;font-weight:bold;'></span><span style='color:#fa8564;font-weight:bold;padding-top:3%'> %</span>
									<span class="pull-right gauge-title" style='color:#fa8564;font-weight:bold'>Safe</span>
								</ul>
							</div>
						</div>
					</section>
				<div class="col-md-12">
					<a class='btn btn-danger' data-toggle="modal" href="#myModal"><i class='fa fa-plus-circle'></i> Hapus Asrama</a>
					<a class='btn btn-primary' href="lapor_kerusakan.html"><i class='fa fa-plus-circle'></i> Lapor Kerusakan</a>
					<a class='btn btn-primary' href="perbaikan2.html"><i class='fa fa-plus-circle'></i> Lapor Perbaikan</a>
					<span style='margin-left:3px' class="label label-danger pull-right inbox-notification">Jumlah Kerusakan</span>
					<span style='margin-left:3px' class="label label-success pull-right inbox-notification">Jumlah Kamar</span>
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Hapus Asrama <?PHP echo $exe_nama['nama_gedung']?></h4>
								</div>
								<div class="modal-body">
									Kamu yakin menghapus asrama dengan 6 Lantai 456 Kamar?
								</div>
								<div class="modal-footer">
									<button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
									<button class="btn btn-danger" onclick="sessionStorage.setItem('input','true');">Yakin</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<br></br></br>
				<ul class="nav nav-pills nav-stacked mail-nav">
				<?PHP 
				$lantai_q=pg_query("select * from lantai where id_gedung='$id_gedung'");
				while($exe_lantai=pg_fetch_assoc($lantai_q))
				{
					$kamar_q=pg_query("select * from kamar where id_lantai='$exe_lantai[id_lantai]' and kamar.no_kamar!='fasilitasasrama'");
					$kamar_rows=pg_num_rows($kamar_q);
					$kerusakan_lantai_q=pg_query("select sum(banyak_kerusakan) as id from kerusakan,kamar,lantai where kerusakan.id_kamar=kamar.id_kamar and kamar.id_lantai=lantai.id_lantai and lantai.id_lantai = $exe_lantai[id_lantai]");
					$exe_kerusakan_lantai=pg_fetch_assoc($kerusakan_lantai_q);
				?>
					<li>
						<a href='lantai.php?id_lantai=<?PHP echo $exe_lantai['id_lantai'] ?>'>Lantai <?PHP echo $exe_lantai['nama_lantai'] ?>
							<span style='margin-left:3px' class="label label-danger pull-right inbox-notification"><?PHP echo $exe_kerusakan_lantai['id'] ?></span>
							<span style='margin-left:3px' class="label label-success pull-right inbox-notification"><?PHP echo $kamar_rows ?></span>
						</a>
					</li>
				<?PHP
				}
				?>
				</ul>
				<div class='col-md-12'>
				<hr style='border-top: 1px solid #A8A8A8;'>
					<H3>Inventaris Kamar
						<a class='btn btn-primary btn-sm' href="inventaris.php?asrama=<?PHP echo $id_gedung; ?>">Kelola Inventaris</a>
					</H3>
					<div class='row'>
							<?PHP
							$inventaris_q=pg_query("select * from kategori_inv where id_gedung=$id_gedung and jenis='kamar'");
							while($exe_inventaris=pg_fetch_assoc($inventaris_q))
							{
							?>
						<div class='col-md-3'>
							<table>
								<tr>
									<td>
										<h4><?PHP echo $exe_inventaris['nama_kategori'] ?></h4>
									</td>
								</tr>
								<?PHP
								$item_kategori_q=pg_query("select * from item_kategori where id_kategori='$exe_inventaris[id_kategori]'");
								while($exe_item_kategori=pg_fetch_assoc($item_kategori_q))
								{
									$kerusakan_q=pg_query("select sum(kondisi) as id from kondisi where id_item=$exe_item_kategori[id_item]");
									$exe_kerusakan=pg_fetch_assoc($kerusakan_q);
									$itung_kamar_rows2=pg_query("select * from kondisi where id_item=$exe_item_kategori[id_item]");
									$row_itung_kamar=pg_num_rows($itung_kamar_rows2);
									$kerusakan=($row_itung_kamar*$exe_item_kategori['jumlah_dev'])-$exe_kerusakan['id'];
									if($kerusakan==0)
										$kerusakan="Aman";
									else	
										$kerusakan="Rusak ".$kerusakan;
								?>
								<tr>
									<td> </td>
									<td>
										<?PHP
											echo $exe_item_kategori['nama_item']
										?>
									</td>
									<td>
										&nbsp;:&nbsp;
									</td>
									<td>
										&nbsp;<?PHP echo $kerusakan?>
									</td>
								</tr>
								<?PHP
								}				  
								?>
							</table>
						</div>
							<?PHP
							}
							?>
					</div>
				</div>
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
	<script src="plugins/gauge/gauge.js"></script>
    <script src="dist/js/pages/dashboard2.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
	<!--common script init for all pages-->
	
	
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
		if (Gauge) {
		/*Knob*/
		var opts = {
			lines: 12, // The number of lines to draw
			angle: 0, // The length of each line
			lineWidth: 0.48, // The line thickness
			pointer: {
				length: 0.6, // The radius of the inner circle
				strokeWidth: 0.03, // The rotation offset
				color: '#464646' // Fill color
			},
			limitMax: 'true', // If true, the pointer will not go past the end of the gauge
			colorStart: '#fa8564', // Colors
			colorStop: '#F1F1F1', // just experiment with them
			strokeColor: '#F1F1F1', // to see which ones work best for you
			generateGradient: false
		};


		var target = document.getElementById('gauge'); // your canvas element
		var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
		gauge.maxValue = 100; // set max gauge value
		gauge.animationSpeed = 70; // set animation speed (32 is default value)
		gauge.set(<?PHP echo $gauge ?>); // set actual value
		gauge.setTextField(document.getElementById("gauge-textfield"));}
		
</script>
  </body>
</html>