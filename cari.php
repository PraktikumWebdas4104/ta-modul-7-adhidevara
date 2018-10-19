			<form method="POST">
				<h1>CARI DATA</h1>
					<table>
						<tr>
							<td>CARI</td>
							<td>:</td>
							<td><input type="text" name="cariNim" placeholder="Cari NIM"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td><input type="submit" name="cari" value="CARI"> <a href="index.php">Input Data</a></td>
						</tr>
					</table>
			</form>

				<?php
					error_reporting(0);
					$koneksi = mysqli_connect("localhost", "root", "", "mhs");

					if (isset($_POST['cari'])) {
						$cariNim = $_POST['cariNim'];

						$query = mysqli_query($koneksi, "SELECT * FROM data WHERE nim = '".$cariNim."'");

						echo "Hasil Pencarian '<b>".$cariNim."</b>' :";

						echo "<table border=1>
								<tr>
									<th>NIM</th>
									<th>NAMA</th>
									<th>AKSI</th>
								</tr>";

						foreach ($query as $qry) {
							echo "<tr>
									<td>".$qry['nim']."</td>
									<td>".$qry['nama']."</td>
									<td><a href='hapus.php?nim=".$qry['nim']."'>HAPUS</a> |
										<a href='detail.php?nim=".$qry['nim']."'>DETAIL</a></td>
								  </tr>";
						}
					}

					else{
						echo "<h2>SEMUA DATA</h2>";
						$qryTampil = mysqli_query($koneksi, "SELECT * FROM data");

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

						foreach ($qryTampil as $qt) {
							echo "<tr>
									<td>".$qt['nim']."</td>
									<td>".$qt['nama']."</td>
									<td>".$qt['jk']."</td>
									<td>".$qt['prodi']."</td>
									<td>".$qt['fakultas']."</td>
									<td>".$qt['asal']."</td>
									<td>".$qt['motto']."</td>
								  </tr>";
						}
					$pesan = $_GET['pesan'];
					echo $pesan;
					}
				?>