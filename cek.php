<?php
	require_once('plugins/include/konek.php');
	if(isset($_GET['model']))
	{
		if($_GET['model']=='namaasrama')
		{
			$name=ganti($_GET['nama']);
			$rows=pg_query("select * from gedung where UPPER(nama_gedung) = UPPER('$name')");
			echo pg_num_rows($rows);
		}
		if($_GET['model']=='namauser')
		{
			$name=ganti($_GET['nama']);
			$rows=pg_query("select * from login where UPPER(username) = UPPER('$name')");
			echo pg_num_rows($rows);
		}
	}
?>