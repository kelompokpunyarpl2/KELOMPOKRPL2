<?PHP
	require_once('plugins/include/konek.php');
	$title='asrama';
	$id_gedung=ganti($_GET['asrama']);
	if(isset($_GET['asrama']))
	{
		$nama_q=pg_query("select * from gedung where id_gedung='$id_gedung'");
		$exe_nama=pg_fetch_assoc($nama_q);
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Inventaris Asrama <?PHP if(isset($_GET['asrama']))echo $exe_nama['nama_gedung']?>|Sistem Informasi Asrama</title>
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
          </a>
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
            Inventaris
            <small>Asrama <?PHP if(isset($_GET['asrama']))echo $exe_nama['nama_gedung']?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Kelola Asrama</a></li>
            <li>Asrama <?PHP if(isset($_GET['asrama']))echo $exe_nama['nama_gedung']?></li>
            <li class="active">Inventaris</li>
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
				<div class="col-md-12">
					<a class='btn btn-primary' data-toggle="modal" href="#TambahKategori"><i class='fa fa-plus-circle'></i> Tambah Kategori</a>
					<div class="modal fade" id="TambahKategori" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						 <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Tambah Kategori</h4>
										<form action='input.php?model=kategori_inventaris' method='POST'>
                                        </div>
                                        <div class="modal-body">
												<input class="form-control" name="nama" placeholder='Nama Kategori Baru' style='color:#555'required>
												<input class="form-control" name="asrama" value='<?PHP if(isset($_GET['asrama']))echo $id_gedung ?>' type='hidden'style='color:#555'required>
                                        </div>
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                            <button class="btn btn-primary">Save changes</button>
                                        </div>
										</form>
                                    </div>
                                </div>
					</div>
					
					<div class="modal fade" id="tambahitem" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						 <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Tambah Item Kategori <span id='kategori_name'>lalala</span></h4>
                                        </div>
										<form action='input.php?model=new_item_kategori' method='POST'>
                                        <div class="modal-body">
												<input class="form-control" name="nama" placeholder='Nama Item Baru' style='color:#555'required><br>
												<input class="form-control" name="jumlah" placeholder='Jumlah Per Kamar' type='number' style='color:#555'required>
												<input name="kategori" type='hidden' id='kategori' required>
                                        </div>
                                        <div class="modal-footer">
                                            <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                            <button class="btn btn-primary">Save changes</button>
                                        </div>
										</form>
                                    </div>
                                </div>
					</div>
				</div>
				<br></br></br>
						<div class="panel-group m-bot20" id="accordion">
                            <?PHP
							$kategori_q=pg_query("select * from kategori_inv where id_gedung = $id_gedung and jenis='kamar'");
							while($exe_kategori=pg_fetch_assoc($kategori_q))
							{ ?>
							<div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" id="input[<?PHP echo $exe_kategori['id_kategori'] ?>]" data-parent="#accordion" href="#kat<?PHP echo $exe_kategori['id_kategori'] ?>"><?PHP echo $exe_kategori['nama_kategori'] ?></a>
										<a href='' onclick="return confirm('Kamu yakin ingin menghapusnya?')" style='margin-top:-8px;margin-left:5px;color:#fff' name='hapus'class="btn btn-danger btn-sm pull-right">Hapus</a>
										<a style='margin-top:-8px;margin-left:5px; color:#fff' data-toggle="modal" href="#tambahitem" onclick="item(<?PHP echo $exe_kategori['id_kategori'] ?>)" class="btn btn-success btn-sm pull-right" name='tambahitem'>Tambah Item</a>
										<button style='margin-top:-8px;margin-left:5px' name='edit' onclick="edit(<?PHP echo $exe_kategori['id_kategori'] ?>)" class="btn btn-primary btn-sm pull-right">Edit</button>
                                    </h4>
                                </div>
                                <div id="kat<?PHP echo $exe_kategori['id_kategori'] ?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                      <ul class="nav nav-pills nav-stacked mail-nav">
										<?PHP
										$item_q=pg_query("select * from item_kategori where id_kategori='$exe_kategori[id_kategori]'");
										while($exe_item=pg_fetch_assoc($item_q))
										{
										?>
										<li>
											<a href='' onclick='return false' id="anak[<?PHP echo $exe_item['id_item'] ?>]"><span id="namaanak[<?PHP echo $exe_item['id_item'] ?>]"><?PHP echo $exe_item['nama_item'] ?></span> (<span id="jumlah[<?PHP echo $exe_item['id_item'] ?>]"><?PHP echo $exe_item['jumlah_dev'] ?></span> unit)
												<form action="">
												<button style='margin-top:-24px;margin-left:5px' onclick="return confirm('Kamu yakin ingin menghapusnya?')" class="btn btn-danger btn-sm pull-right" name='hapusanak'>Hapus</button>
											</form>
												<button style='margin-top:-24px;margin-left:5px' name='editanak' onclick="editanak(<?PHP echo $exe_item['id_item'] ?>)" class="btn btn-primary btn-sm pull-right">Edit</button>
											</a>
										</li>
										<?PHP	
										}
										?>
									  </ul>
                                    </div>
                                </div>
                            </div>
							<?php
							}
							?>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" id="input[2]">
                                            Collapsible Group Item #2
                                        </a>
										<a href='' onclick="return confirm('Kamu yakin ingin menghapusnya?')" style='margin-top:-8px;margin-left:5px;color:#fff' name='hapus'class="btn btn-danger btn-sm pull-right">Hapus</a>
										<a style='margin-top:-8px;margin-left:5px; color:#fff' data-toggle="modal" href="#tambahitem" onclick="item(2)" class="btn btn-success btn-sm pull-right" name='tambahitem'>Tambah Item</a>
										<button style='margin-top:-8px;margin-left:5px' name='edit' onclick="edit(1)" class="btn btn-primary btn-sm pull-right">Edit</button>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" id='input[3]'>
                                            Collapsible Group Item #3
                                        </a>
										<a href='' onclick="return confirm('Kamu yakin ingin menghapusnya?')" style='margin-top:-8px;margin-left:5px;color:#fff' name='hapus'class="btn btn-danger btn-sm pull-right">Hapus</a>
										<a style='margin-top:-8px;margin-left:5px; color:#fff' data-toggle="modal" href="#tambahitem" onclick="item(3)" class="btn btn-success btn-sm pull-right" name='tambahitem'>Tambah Item</a>
										<button style='margin-top:-8px;margin-left:5px' name='edit' onclick="edit(1)" class="btn btn-primary btn-sm pull-right">Edit</button>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
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
		function edit(a)
		{
			b=document.getElementById('input['+a+']').innerHTML;
			sessionStorage.setItem('data_last',b);
			document.getElementById('input['+a+']').innerHTML="<form action='input.php?model=update_kategori&id_kategori="+a+"' id='myForm["+a+"]'method='post' class='form-inline' role='form'><div class='form-group'><input style='color:#555;width:400px' class='form-control input-sm' name='new_name' value='"+b+"'>&nbsp;<button style='margin-left:4px' onclick='submit("+a+");' class='btn btn-success btn-sm'>Edit</button><button style='margin-left:7px' onclick='cancel("+a+")' type='button' class='btn btn-danger btn-sm'>Cancel</button></div></form>";
			var edit = document.getElementsByName("edit");
			var hapus = document.getElementsByName('hapus');
			var hapus2 = document.getElementsByName('tambahitem');
			for (var i = 0, max = edit.length; i < max; i++) {
				edit[i].style.display = "none";
				hapus[i].style.display = "none";
				hapus2[i].style.display = "none";
			}
			var hapusanak= document.getElementsByName('hapusanak');
			var editanak= document.getElementsByName('editanak');
			for (var i = 0, max = hapusanak.length; i < max; i++) {
				hapusanak[i].style.display = "none";
				editanak[i].style.display = "none";
			}
		}
		function editanak(a)
		{
			b=document.getElementById('namaanak['+a+']').innerHTML;
			c=document.getElementById('jumlah['+a+']').innerHTML;
			sessionStorage.setItem('data_last',b);
			sessionStorage.setItem('data_last_2',c);
			document.getElementById('anak['+a+']').innerHTML="<form action='lala.php' id='myForm1["+a+"]'method='get' class='form-inline' role='form'><div class='form-group'><input style='color:#555;width:400px' class='form-control input-sm' name='itu' value='"+b+"'> <input style='color:#555;width:200px' class='form-control input-sm' name='itus' value='' type='number' placeholder='Item tambahan'>&nbsp;<button style='margin-left:4px' onclick='submits("+a+");' class='btn btn-success btn-sm'>Edit</button><button style='margin-left:7px' onclick='cancels("+a+")' type='button' class='btn btn-danger btn-sm'>Cancel</button></div></form>";
			var edit = document.getElementsByName("edit");
			var hapus = document.getElementsByName('hapus');
			var hapus2 = document.getElementsByName('tambahitem');
			for (var i = 0, max = edit.length; i < max; i++) {
				edit[i].style.display = "none";
				hapus[i].style.display = "none";
				hapus2[i].style.display = "none";
			}
			var hapusanak= document.getElementsByName('hapusanak');
			var editanak= document.getElementsByName('editanak');
			for (var i = 0, max = hapusanak.length; i < max; i++) {
				hapusanak[i].style.display = "none";
				editanak[i].style.display = "none";
			}
		}
		function submit(a)
		{
			document.getElementById("myForm["+a+"]").submit();
		}
		function submits(a)
		{
			document.getElementById("myForm1["+a+"]").submit();
		}
		function cancel(a)
		{
			document.getElementById('input['+a+']').innerHTML=sessionStorage.getItem('data_last');
			var edit = document.getElementsByName("edit");
			var hapus = document.getElementsByName('hapus');
			var hapus2 = document.getElementsByName('tambahitem');
			for (var i = 0, max = edit.length; i < max; i++) {
				edit[i].style.display = "block";
				hapus[i].style.display = "block";
				hapus2[i].style.display = "block";
			}
			var hapusanak= document.getElementsByName('hapusanak');
			var editanak= document.getElementsByName('editanak');
			for (var i = 0, max = hapusanak.length; i < max; i++) {
				hapusanak[i].style.display = "block";
				editanak[i].style.display = "block";
			}
		}
		function cancels(a)
		{
			document.getElementById('anak['+a+']').innerHTML="<button style='margin-top:-8px;margin-left:5px' name='hapusanak'class='btn btn-danger btn-sm pull-right'>Hapus</button><button style='margin-top:-8px;margin-left:5px' name='editanak' onclick='editanak("+a+")' class='btn btn-primary btn-sm pull-right'>Edit</button><span id='namaanak["+a+"]'>"+sessionStorage.getItem('data_last')+"</span> (<span id='jumlah["+a+"]'>"+sessionStorage.getItem('data_last_2')+"</span> unit)";
			var edit = document.getElementsByName("edit");
			var hapus = document.getElementsByName('hapus');
			var hapus2 = document.getElementsByName('tambahitem');
			for (var i = 0, max = edit.length; i < max; i++) {
				edit[i].style.display = "block";
				hapus[i].style.display = "block";
				hapus2[i].style.display = "block";
			}
			var hapusanak= document.getElementsByName('hapusanak');
			var editanak= document.getElementsByName('editanak');
			for (var i = 0, max = hapusanak.length; i < max; i++) {
				hapusanak[i].style.display = "block";
				editanak[i].style.display = "block";
			}
		}
		function item(i)
		{
			document.getElementById("kategori_name").innerHTML = document.getElementById("input["+i+"]").innerHTML;
			document.getElementById("kategori").value = i;
		}
</script>
  </body>
</html>