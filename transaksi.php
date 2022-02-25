<?php
if ($_POST['Submit'] == "Submit") {
	$id_brg		=$_POST['id_brg'];
	$nomor		=$_POST['nomor'];
	$jumlah		=$_POST['jumlah'];
	
	include "koneksi.php";	
	$selSto =mysqli_query($conn, "SELECT * FROM tb_barang WHERE id='$id_brg'");
	$sto    =mysqli_fetch_array($selSto);
	$stok	=$sto['stok'];
	//menghitung sisa stok
	$sisa	=$stok-$jumlah;
	
	if ($stok < $jumlah) {
		?>
		<script language="JavaScript">
			alert('Oops! Jumlah pengeluaran lebih besar dari stok ...');
			document.location='./';
		</script>
		<?php
	}
	//proses	
	else{
		$insert =mysqli_query($conn, "INSERT INTO tb_out (id_brg, nomor, jumlah) VALUES ('$id_brg', '$nomor', '$jumlah')");
			if($insert){
				//update stok
				$upstok= mysqli_query($conn, "UPDATE tb_barang SET stok='$sisa' WHERE id='$id_brg'");
				?>
				<script language="JavaScript">
					alert('Good! Input transaksi pengeluaran barang berhasil ...');
					document.location='./';
				</script>
				<?php
			}
			else {
				echo "<div><b>Oops!</b> 404 Error Server.</div>";
			}
	}
	}
?>