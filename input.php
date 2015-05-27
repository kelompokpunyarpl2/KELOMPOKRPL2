<?php
	require_once('plugins/include/konek.php');
	if(isset($_GET['model']))
	{
		if($_GET['model']=='input_asrama')
		{
			$namaasrama=ganti($_POST['namaasrama']);
			$filenya=explode(".",$_FILES['file']['name']);
			$file="fotoasrama/".$namaasrama.".".end($filenya);
			move_uploaded_file($_FILES['file']['tmp_name'], $file);
			$s_id_gedung=pg_query("select max(id_gedung) as id from gedung");
			$exe_id_gedung=pg_fetch_array($s_id_gedung);
			$id_gedung=$exe_id_gedung[0]+1;
			$gedung=pg_query("insert into gedung (id_gedung,nama_gedung,gambar) values ('$id_gedung',UPPER('$namaasrama'),'$file')");
			foreach($_POST['namalantai'] as $yoi=>$item)
			{
				$s_id_lantai=pg_query("select max(id_lantai) as id from lantai");
				$exe_id_lantai=pg_fetch_array($s_id_lantai);
				$id_lantai=$exe_id_lantai[0]+1;
				$namalantai=ganti($_POST['namalantai'][$yoi]);
				$jkamar=ganti($_POST['jkamar'][$yoi]);
				$no=ganti($_POST['no'][$yoi]);
				$kamarmulai=ganti($_POST['kamarmulai'][$yoi]);
				$blok=ganti($_POST['blok'][$yoi]);
				$lantai=pg_query("insert into lantai (id_lantai,id_gedung,nama_lantai,jumlah_kamar,no_kamar) values ('$id_lantai','$id_gedung','$namalantai','$jkamar','$no-$kamarmulai-$blok')");
				$x=$kamarmulai;
				$kamar=pg_query("insert into kamar (id_lantai,no_kamar) values('$id_lantai','fasilitasasrama')");
				for($i=1;$i<=$jkamar;$i++)
				{
					$kamar=pg_query("insert into kamar (id_lantai,no_kamar) values('$id_lantai','$no-$x-$blok')");
					$x++;
				}
			}
			$username=ganti($_POST['username']);
			$pass=ganti($_POST['pass']);
			$login=pg_query("insert into login (username,password,level) values ('$username','$pass','$id_gedung')");
			echo '<META http-equiv="refresh" content="0;URL=kelola_asrama.php?n=1">';
		}
		else if($_GET['model']=='kategori_inventaris')
		{
			$namakategori=ganti($_POST['nama']);
			$id_asrama=ganti($_POST['asrama']);
			$kategori=pg_query("insert into kategori_inv (id_gedung,nama_kategori,jenis) values ('$id_asrama','$namakategori','kamar')");
			echo '<META http-equiv="refresh" content="0;URL=inventaris.php?asrama='.$id_asrama.'">';
		}
		else if($_GET['model']=='new_item_kategori')
		{
			$namaitem=ganti($_POST['nama']);
			$jumlah=ganti($_POST['jumlah']);
			$id_kategori=ganti($_POST['kategori']);
			$s_id_item=pg_query("select max(id_item) as id from item_kategori");
			$exe_id_item=pg_fetch_array($s_id_item);
			$id_item=$exe_id_item[0]+1;
			$kategori=pg_query("insert into item_kategori (id_item,nama_item,id_kategori,jumlah_dev) values ('$id_item','$namaitem','$id_kategori','$jumlah')");
			$s_id_gedung=pg_query("select * from kategori_inv where id_kategori='$id_kategori'");
			$exe_id_gedung=pg_fetch_array($s_id_gedung);
			$id_gedung=$exe_id_gedung[1];
			$kamar_q=pg_query("select * from kamar,lantai where kamar.id_lantai=lantai.id_lantai and id_gedung='$id_gedung' and kamar.no_kamar !='fasilitasasrama'");
			while($exe_kamar=pg_fetch_assoc($kamar_q))
			{
				$kondisi=pg_query("insert into kondisi values ('$id_item','$exe_kamar[id_kamar]','$jumlah')");
			}
			echo '<META http-equiv="refresh" content="0;URL=inventaris.php?asrama='.$id_gedung.'">';
		}
		else if($_GET['model']=='update_kategori')
		{
			$id_kategori=ganti($_GET['id_kategori']);
			$new_name=ganti($_POST['new_name']);
			$update=pg_query("update kategori_inv set nama_kategori='$new_name' where id_kategori='$id_kategori'");
			$s_id_gedung=pg_query("select * from kategori_inv where id_kategori='$id_kategori'");
			$exe_id_gedung=pg_fetch_array($s_id_gedung);
			$id_gedung=$exe_id_gedung[1];
			echo '<META http-equiv="refresh" content="0;URL=inventaris.php?asrama='.$id_gedung.'">';
		}
	}
?>