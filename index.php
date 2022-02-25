<html>
<head>
	<title>Table Aplikasi Qurban</title>
</head>
<body>
	<h4>Table Aplikasi Qurban<br><br>Nama = Muhammad Rafli<br><br>Nim : -<br><br>Kelas : - (-)</h4>
	<table width="530" border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>No Transaksi</th>
				<th>Nama</th>
				<th>Jenis Kurban</th>
				<th>Tipe Kurban</th>
				<th>Tanggal</th>
				<th>Periode</th>
				<th>Berat</th>
				<th>stok</th>
			</tr>
		</thead>
		<tbody>
			<?php
			include "koneksi.php";
			$no=0;
			$query	=mysqli_query($conn, "SELECT * FROM tb_barang ORDER BY id DESC");
			while($data	=mysqli_fetch_array($query)){
			$no++;
			?>
			<tr>
				<td><?php echo $no?></td>
				<td><?php echo $data['No_Transaksi']?></td>
				<td><?php echo $data['Nama']?></td>
				<td><?php echo $data['Jenis_kurban']?></td>
				<td><?php echo $data['Tipe_kurban']?></td>
				<td><?php echo $data['Tanggal']?></td>
				<td><?php echo $data['Priode']?></td>
				<td><?php echo $data['berat']?></td>
				<td><?php echo $data['stok']?></td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>
	<p>Form Mengurangi Data Table</p>
	<form action="transaksi.php" method="POST">
		<table width="530" border="0">
			<tr>
				<td>Pilih Barang</td>
				<td>
					<?php
					$selBar	=mysqli_query($conn, "SELECT * FROM tb_barang ORDER BY nama");        
					echo '<select name="id_brg" required>';    
					echo '<option value="">...</option>';    
					while ($rowbar = mysqli_fetch_array($selBar)) {    
					echo '<option value="'.$rowbar['id'].'">'.$rowbar['Nama'].'_'.$rowbar['berat'].'</option>';    
					}    
					echo '</select>';
					?>
				</td>
			</tr>
			<tr>
				<td>Nomor Transaksi</td>
				<td><input type="text" name="nomor" maxlength="32" required /></td>
			</tr>
			<tr>
				<td>Jumlah Stok</td>
				<td><input type="text" name="jumlah" maxlength="11" required /></td>
			</tr>
			<tr height="36">
				<td></td>
				<td><input type="submit" name="Submit" value="Submit"/> <input type="reset" value="Reset"/></td>
			</tr>
		</table>
	</form>
</body>
</html>