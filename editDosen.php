<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik:Edit Data Mahasiswa</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
</head>
<body>
	<?php
	require "head.html";
	require "fungsi.php";
	$npp = dekripsiurl($_GET["id"]);
	$sql="select * from dosen where npp='$npp'";
	$qry=mysqli_query($koneksi,$sql);
	if(mysqli_num_rows($qry) == 0){
		echo "<script>
		alert('npp tidak ditemukan');
		javascript:history.go(-1);</script>";
		exit();
	}

	$row=mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="mb-3 text-center">EDIT DATA DOSEN</h2>	
		<div class="col-sm-9">
			<form enctype="multipart/form-data" method="post" action="sv_editDosen.php">
				<div class="form-group">
					<label for="nim">NPP:</label>
					<input class="form-control" style="width: 350px" type="text" name="npp" id="npp" value="<?php echo $row['npp']?>" readonly>
				</div>
				<div class="form-group">
					<label for="nama">Nama Dosen:</label>
					<input class="form-control" style="width: 350px" type="text" name="namadosen" id="namadosen" value="<?php echo $row['namadosen']?>">
				</div>
				<div class="form-group">
					<label for="homebase">Homebase:</label>
					<select name="homebase" id="homebase" style="height: 40px; width: 350px;border :1px solid #ced4da;border-radius: 0.25rem; display: block;">
						<option value="A11" <?= $row['homebase'] == "A11"? ' selected="selected"' : ''; ?>>(A11) Teknik Informatika - S1</option>
						<option value="A12" <?= $row['homebase'] == "A12"? ' selected="selected"' : ''; ?>>(A12) Sistem Informasi - S1</option>
						<option value="A13" <?= $row['homebase'] == "A13"? ' selected="selected"' : ''; ?>>(A13) Desain Komunikasi Visual - S1</option>
						<option value="A14" <?= $row['homebase'] == "A14"? ' selected="selected"' : ''; ?>>(A14) Ilmu Komunikasi - S1</option>
						<option value="A16" <?= $row['homebase'] == "A16"? ' selected="selected"' : ''; ?>>(A16) Film dan Televisi - S1</option>
						<option value="A17" <?= $row['homebase'] == "A17"? ' selected="selected"' : ''; ?>>(A17) Animasi - S1</option>
						<option value="A22" <?= $row['homebase'] == "A22"? ' selected="selected"' : ''; ?>>(A22) Teknik Informatika - D3</option>
					</select>
				</div>				
				<div>		
					<button class="btn btn-primary" type="submit" id="submit">Simpan</button>
				</div>
			</form>
		</div>
		</div>
	</div>
	<script>
		$('#submit').on('click',function(){
			var npp 		= $('#npp').val();
			var namadosen	= $('#namadosen').val();
			var homebase 	= $('#homebase').val();
			$.ajax({
				method	: "POST",
				url		: "sv_editDosen.php",
				data	: {npp:npp, namadosen:namadosen, homebase:homebase}
			});
		});
	</script>
</body>
</html>