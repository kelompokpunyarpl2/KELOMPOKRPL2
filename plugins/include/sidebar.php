<ul class="sidebar-menu">
            <li>
              <a href="dashboard.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview <?PHP if($title=='asrama')echo"active";?>">
              <a href="#">
                <i class="fa fa-laptop"></i> <span>Asrama</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				<li><a href="kelola_asrama.php">Kelola Jumlah Asrama</a></li>
				<li><a href="last_stat.php">Laporan Inventaris Asrama</a></li>
				<li><a href="kerusakan.php">Laporan Kerusakan</a></li>
				<li><a href="perbaikan.php">Laporan Perbaikan</a></li>
              </ul>
            </li>
			<li class="treeview" <?PHP if($title=='gudang')echo"active";?>>
              <a href="#">
                <i class="fa fa-laptop"></i> <span>Gudang</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				<li><a href="gudang.php">Inventaris Gudang</a></li>
				<li><a href="input_gudang.php">Input</a></li>
				<li><a href="laporan_masuk.php">Laporan Masuk</a></li>
				<li><a href="laporan_distribusi.php">Laporan Distribusi</a></li>
              </ul>
            </li>
            <li class="treeview" <?PHP if($title=='peminjaman')echo"active";?>>
              <a href="#">
                <i class="fa fa-book"></i> <span>Peminjaman</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="penjualan.php">Data Peminjaman Aktif</a></li>
                <li><a href="laporan_barang.php">Input Peminjaman</a></li>
                <li><a href="laporan_barang.php">Pengembalian</a></li>
                <li><a href="laporan_barang.php">Laporan Peminjaman</a></li>
              </ul>
            </li>
			
          </ul>
