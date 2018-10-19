<?php
	echo "<h1>EDIT DATA</h1>";
	$koneksi = mysqli_connect("localhost", "root", "", "mhs");
	$nim = $_GET['nim'];

	$query = mysqli_query($koneksi, "SELECT * FROM data WHERE nim = '".$nim."'");
	$row = mysqli_fetch_array($query);

		echo "<table border=1>
				<tr>
					<th>NIM</th>
					<th>NAMA</th>
					<th>JENIS KELAMIN</th>
					<th>PROGRAM STUDI</th>
					<th>FAKULTAS</th>
					<th>ASAL</th>
					<th>MOTTO HIDUP</th>
				</tr>";

	foreach ($query as $qry) {
		echo "	<tr>
					<td>".$qry['nim']."</td>
					<td>".$qry['nama']."</td>
					<td>".$qry['jk']."</td>
					<td>".$qry['prodi']."</td>
					<td>".$qry['fakultas']."</td>
					<td>".$qry['asal']."</td>
					<td>".$qry['motto']."</td>
				</tr>";
	}
		echo "</table>";
?>

<form method="POST">
	<br><br>
	<h1>EDIT DATA</h1>
	<table>
		<tr>
			<td>NIM</td>
			<td>:</td>
			<td><?php echo $row['nim']; ?></td>
		</tr>
		<tr>
			<td>NAMA</td>
			<td>:</td>
			<td><input type="text" name="nama" value="<?php echo $row['nama']; ?>"></td>
		</tr>
		<tr>
			<td>JENIS KELAMIN</td>
			<td>:</td>
			<td><input type="radio" name="jk" value="Pria"> Pria <input type="radio" name="jk" value="Wanita"> Wanita</td>
		</tr>
		<tr>
			<td>PROGRAM STUDI</td>
			<td>:</td>
			<td><select name="prodi">
					<option value="-1">Pilih Prodi</option>
					<option value="D3 Manajemen Informatika">D3 Manajemen Informatika</option>
					<option value="S1 Akuntansi">S1 Akuntansi</option>
					<option value="D4 Sistem Informasi">D4 Sistem Informasi</option>
				</select></td>
		</tr>
		<tr>
			<td>Fakultas</td>
			<td>:</td>
			<td><select name="fakultas">
					<option value="-1">Pilih Fakultas</option>
					<option value="Ilmu Terapan">Ilmu Terapan</option>
					<option value="Ekonomi Bisnis">Ekonomi Bisnis</option>
					<option value="Teknik Elektro">Teknik Elektro</option>
				</select></td>
		</tr>
		<tr>
			<td>ASAL</td>
			<td>:</td>
			<td><input type="text" name="asal" value="<?php echo $row['asal']; ?>"></td>
		</tr>
		<tr>
			<td>MOTTO HIDUP</td>
			<td>:</td>
			<td><textarea name="motto"><?php echo $row['motto']; ?></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><input type="submit" name="submit" value="UBAH"> <a href="cari.php">CARI DATA</a></td>
		</tr>
	</table>
</form>

<?php
	if (isset($_POST['submit'])) {
		$koneksi = mysqli_connect("localhost", "root", "", "mhs");

		$nim = $_GET['nim'];
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$prodi = $_POST['prodi'];
		$fakultas = $_POST['fakultas'];
		$asal = $_POST['asal'];
		$motto = $_POST['motto'];

		$qrySelect = mysqli_query($koneksi, "SELECT * FROM data WHERE nim = '".$nim."'");
		$rw = mysqli_fetch_array($qrySelect);

		if ($prodi !== -1) {
			if ($fakultas !== -1) {
				$sql = mysqli_query($koneksi, "UPDATE `data` SET `nama` = '".$nama."', `jk` = '".$jk."', `prodi` = '".$prodi."', `fakultas` = '".$fakultas."', `asal` = '".$asal."', `motto` = '".$motto."' WHERE nim = '".$nim."'");
				echo "DATA BERHASIL DI UBAH<br>";
			}
			else{
				echo "FAKULTAS Tidak Boleh Kosong";
			}
		}
		else{
			echo "PRODI Tidak Boleh Kosong";
		}
	}

?>