<?PHP
	$title='asrama';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Tambah Asrama|Sistem Informasi Asrama</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- /////////////////////////////////////////-->
     <link href="plugins/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/ionicons-2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
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
	<script type="text/javascript"> 
	function stopRKey(evt) { 
	  var evt = (evt) ? evt : ((event) ? event : null); 
	  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
	  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
	} 

	document.onkeypress = stopRKey; 
</script>
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
            Tambah 
            <small>Asrama</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Asrama</li>
            <li class="active">Tambah Asrama</li>
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
			<form action='input.php?model=input_asrama' enctype='multipart/form-data' method='post'>
				<div id='form1'>
					<table>
						<tr>
							<td class='col-xs-2'>Nama Asrama Baru</td>
							<td class='col-xs-10'>
								<div class='form-group' id='namaasramaa'><br>
									<label id='namaasramaaa'style="display:none">Nama Asrama Sudah Digunakan</label>
									<input type='text' name='namaasrama'  onkeyup="cekf1(1);ceknama()" id='namaasrama' class='form-control'placeholder='Nama Asrama Baru'></input>
								</div>
							</td>
						</tr>
						<tr>
							<td style='padding-top:10px'class='col-xs-2'>Foto Gedung</td>
							<td class='col-xs-10' style='padding-top:10px'class='col-xs-2'>
								<div class="input-group">
										<span class="btn btn-primary btn-file" style='border-radius:4;'>
											<span id='hehehe'>Browse&hellip; </span><input onchange="cekf1(this);" type="file" id='file' name='file' style='border-radius:4;'required>
										</span> 
									<label id='label' style='padding-top:12px;margin-left:12px;font-weight:normal'></label>
								</div>
							</td>
						</tr>
						<tr>
						<td></td>
						<td class='col-xs-10' style='padding-top:10px'><img id="preview" src="#" alt="your image" style='width:300px;border-radius:8px;display:none' /></td>
						</tr>
					</table>
					<nav>
					  <ul class="pager">
						<li class="next disabled" id="btnn1" onclick='cek1();cekf2()'><a href="#">Next <span aria-hidden="true">&rarr;</span></a></li>
					  </ul>
					</nav>
				</div>
				<div id='form2' style='display:none'>
					<h4>Tambah Lantai</h4>
					<button class='btn btn-sm btn-primary' type='button' onclick='tambah();cekf2()'>Tambah Baris</button>
					<button class='btn btn-sm btn-danger' type='button' onclick='hapus();cekf2()'>Remove</button>
					<br></br>
					<div id='bodinya'>
							<div class='form-inline' id='row1'>
								<input type='text' class='form-control' name='namalantai[1]' onkeyup="cekf2()" placeholder='Nama Lantai' style='width:40%'></input>&nbsp;
								<input type='number' class='form-control' name='jkamar[1]' onkeyup="cekf2()" placeholder='Jumlah Kamar' style='width:15%'></input>
								<input type='number' class='form-control' name='no[1]' onkeyup="cekf2()" placeholder='No'style='width:7%'></input>
								<input type='number' class='form-control' name='kamarmulai[1]' onkeyup="cekf2()" placeholder='Nomor Kamar'style='width:15%'></input>
								<input type='text' class='form-control' name='blok[1]' onkeyup="cekf2()" placeholder='Blok'style='width:18%'></input>
							<br></br>
							</div>
					</div>
					<nav>
					  <ul class="pager">
						<li class="previous" onclick='cekf1(1);cek_b1()'><a href="#"><span aria-hidden="true">&larr;</span> Pref</a></li>
						<li class="next disabled" id="btnn2" onclick='cek2();cekf3()'><a href="#">Next <span aria-hidden="true">&rarr;</span></a></li>
					  </ul>
					</nav>
				</div>
				<div id='form3' style='display:none'>
					<h4>Username</h4>
					<br>
					<table>
						<tr>
							<td class='col-xs-2' style='padding-top:10px'>Username</td>
							<td class='col-xs-8' style='padding-top:10px'>
								<div class='form-group' id='usernamee'><br>
								<input type='text' name='username' id='username' class='form-control' onkeyup='cekf3();cekuser()'>
								</div>
							</td>
							<td class='col-xs-2'><span id='cekuser' style='color:red;display:none'>Username sudah digunakan</span></td>
						</tr>
						<tr>
							<td class='col-xs-2' style='padding-top:10px'>Password</td>
							<td class='col-xs-8' style='padding-top:10px'><input type='password' name='pass'id='pass1' class='form-control' pattern=".{5,}" onkeyup='cekf3()'></td>
							<td class='col-xs-2'><span>&nbsp;</span></td>
						</tr>
						<tr>
							<td class='col-xs-2' style='padding-top:10px'>Re-Type Password</td>
							<td class='col-xs-8' style='padding-top:10px'><input type='password' name='pass2' id='pass2' class='form-control' onkeyup='cekf3()'></td>
							<td class='col-xs-2'><span id='labelnya' style='color:red;display:none'>Password Didn't Match</span></td>
						</tr>
					</table>
					<br>
					<div class='col-md-10'>
						<button class='btn btn-primary disabled' id='submit'>Submit Form</button>
					</div>
					<br>
					<br>
					<nav>
					  <ul class="pager">
						<li class="previous" onclick='cekf2();cek_b2();'><a href="#"><span aria-hidden="true">&larr;</span> Pref</a></li>
					  </ul>
					</nav>
				</div>
			</form>
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
<script type='text/javascript'>



$(document).on('change', '.btn-file :file', function() {
  var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
	  input.trigger('fileselect', [numFiles, label]);
	  cek=label.split(".");
	  
	  if(cek[cek.length-1]!="jpeg"&cek[cek.length-1]!="jpg"&cek[cek.length-1]!="JPG"&cek[cek.length-1]!="bmp"&cek[cek.length-1]!="png"){
		input.val('');
		$('#label').html('');
		$('#hehehe').html('Browse...');
		if(label!='')
		alert('file tidak sesuai!');
		$("#preview").fadeOut(800);
		cekf1('a');
		}
	  else{
	  $('#label').html(label);
	  $('#hehehe').html('Change...');
		$("#preview").fadeIn(800);
	  }
});

$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        
        var input = $(this).parents('.input-group').find(':text'),
            log = numFiles > 1 ? numFiles + ' files selected' : label;
        
        if( input.length ) {
            input.val(log);
        } 
        
    });
});
</script>
 <script>
//---------------------------------first---------------------------------- 
 function cek1()
	{
		if($("#btnn1").hasClass("disabled"))
			return false;
		else
			$("#form1").fadeOut(300,function()
			{$("#form2").fadeIn(300);
			});
	}
 function cek2()
	{
		if($("#btnn2").hasClass("disabled"))
			return false;
		else
			$("#form2").fadeOut(300,function()
			{$("#form3").fadeIn(300);
			});
	}
 function cek_b1()
	{
			$("#form2").fadeOut(300,function()
			{$("#form1").fadeIn(300);
			});
	}
 function cek_b2()
	{
			$("#form3").fadeOut(300,function()
			{$("#form2").fadeIn(300);
			});
	}
  
 
 
 
 
//---------------------------------endfirst------------------------------
	var oh=1
	function tambah()
	{
		oh++;
		var hoho=$('#bodinya');
		$("<div class='form-inline' id='row"+oh+"'><input type='text' onkeyup='cekf2()' name='namalantai["+oh+"]'class='form-control' placeholder='Nama Lantai' style='width:40%'></input>&nbsp; <input type='number' onkeyup='cekf2()' name='jkamar["+oh+"]'class='form-control' placeholder='Jumlah Kamar'style='width:15%'></input> <input type='number' name='no["+oh+"]' style='width:7%'placeholder='No' onkeyup='cekf2()' class='form-control'> <input name='kamarmulai["+oh+"]' onkeyup='cekf2()' type='number' style='width:15%'placeholder='Nomor Kamar' class='form-control'> <input onkeyup='cekf2()' 	name='blok["+oh+"]' style='width:18%'type='teks' class='form-control' placeholder='Blok'><br></br></div>").appendTo(hoho);
	}
	function hapus()
	{
		if(oh>1)
		{
			$("#row"+oh).remove();
			oh--;
		}
	}
//------------------------------------------CEK F1---------------
		function ceknama()
		{
			$.ajax
			({
				url:'cek.php?model=namaasrama&nama='+document.getElementById('namaasrama').value, 
				success:function (data)
				{
					if (data>=1)
					{
						if($("#namaasramaa").hasClass("has-error"))
							console.log('udah');
						else
							$('#namaasramaa').addClass("has-error");
						$("#namaasramaaa").fadeIn(400);
					}
					else
					{
						if($("#namaasramaa").hasClass("has-error"))
							$('#namaasramaa').removeClass("has-error");
						else
							console.log('udah');
						$("#namaasramaaa").fadeOut(400);
					}
					cekf1('1');
				}
			});
		}
		function cekuser()
		{
			$.ajax
			({
				url:'cek.php?model=namauser&nama='+document.getElementById('username').value, 
				success:function (data)
				{
					if (data>=1)
					{
						if($("#usernamee").hasClass("has-error"))
							console.log('udah');
						else
							$('#usernamee').addClass("has-error");
						$("#cekuser").fadeIn(400);
					}
					else
					{
						if($("#usernamee").hasClass("has-error"))
							$('#usernamee').removeClass("has-error");
						else
							console.log('udah');
						$("#cekuser").fadeOut(400);
					}
					cekf3();
				}
			});
		}
		function cekf1(a)
		{
			if(document.getElementsByName("namaasrama")[0].value=='' | document.getElementsByName("file")[0].value==''| $('#namaasramaa').hasClass('has-error'))
			{
				if($("#btnn1").hasClass("disabled"))
				{
					console.log('udah');
				}
				else
				{
					$('#btnn1').addClass("disabled");
				}
			}
			else
			{
				$('#btnn1').removeClass("disabled");
			}
			if(document.getElementsByName("file")[0].value!='')
			 readURL(a);
			else
			 readURL('1');
		}
//----------------------------------------END CEK F1-------------
//------------------------------------------CEK F2---------------
		function cekf2()
		{
			for(i=1;i<=oh;i++)
			{
				if((document.getElementsByName("namalantai["+i+"]")[0].value!='')&(document.getElementsByName("jkamar["+i+"]")[0].value!='')&(document.getElementsByName("no["+i+"]")[0].value!='')&(document.getElementsByName("kamarmulai["+i+"]")[0].value!='')&(document.getElementsByName("blok["+i+"]")[0].value!=''))
				{
					$('#btnn2').removeClass("disabled");
				}
				else
				{
					if($("#btnn2").hasClass("disabled"))
						console.log('udah');
					else
						$('#btnn2').addClass("disabled");
				}
			}
		}

//----------------------------------------END CEK F2-------------
//------------------------------------------CEK F3---------------
		function cekf3()
		{
			if(document.getElementById('username').value!=''&document.getElementById('pass1').value!=''&($('#usernamee').hasClass('has-error')==false))
			{
				if(document.getElementById('pass1').value!=document.getElementById('pass2').value)
				{
					if(document.getElementById('pass2').value!='')
					$("#labelnya").fadeIn(800);
					if($("#submit").hasClass("disabled"))
						console.log('udah');
					else
						$('#submit').addClass("disabled");
				}
				else
				{
					$("#labelnya").fadeOut(500);
					$('#submit').removeClass("disabled");
				}
			}
			else
			{
				if($("#submit").hasClass("disabled"))
					console.log('udah');
				else
					$('#submit').addClass("disabled");
			}
		}
//----------------------------------------END CEK F3-------------

		function readURL(input) {
					if (input.files && input.files[0]) {
					var reader = new FileReader();
					reader.onload = function (e) {
						document.getElementById('preview').src=e.target.result;
					}
					reader.readAsDataURL(input.files[0]);
				}
		}
		
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
            document.getElementById('jam_admin').innerHTML=h+":<span style='zoom:1%'>&nbsp;</span>"+m;
            else
			document.getElementById('jam_admin').innerHTML=h+" "+m;
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