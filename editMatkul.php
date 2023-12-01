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
	$idmatkul = dekripsiurl($_GET["id"]);
	$sql="select * from matkul where idmatkul='$idmatkul'";
	$qry=mysqli_query($koneksi,$sql);
	if(mysqli_num_rows($qry) == 0){
		echo "<script>
		alert('idmatkul tidak ditemukan');
		javascript:history.go(-1);</script>";
		exit();
	}

	$row=mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="mb-3 text-center">Edit Mata Kuliah</h2>	
		<div class="col-sm-9">
			<form enctype="multipart/form-data" method="post" action="sv_editMatkul.php">
				<div class="row">
					<div class="form-group mb-3 col-9">
							<label for="idmatkul">ID Matkul:</label>
							<input readonly class="form-control" type="text" name="idmatkul" id="idmatkul" value=<?php echo $row['idmatkul']; ?> required style="width: 100%`; background-color: #fff">
					</div>
				</div>
				<div class="row">
					<div class="form-group mb-3 col-9">
						<label for="namamatkul" class="form-label">Nama Mata Kuliah:</label>
						<input type="text" class="form-control" id="namamatkul" name="namamatkul" value="<?php echo $row['namamatkul'] ?>" required style="width: 100%;">
					</div>
				</div>
				<div class="row mb-3">
					<div class="form-group col-3">
						<label for="sks" class="form-label d-block">SKS:</label>
						<select class="form-select px-2 w-100" name="sks" style="height: 40px; width: 350px;border :1px solid #ced4da;border-radius: 0.25rem;">
							<option <?= $row['sks'] == "1" ? ' selected="selected"' : ''; ?> value="1">1</option>
							<option <?= $row['sks'] == "2" ? ' selected="selected"' : ''; ?> value="2">2</option>
							<option <?= $row['sks'] == "3" ? ' selected="selected"' : ''; ?> value="3">3</option>
							<option <?= $row['sks'] == "4" ? ' selected="selected"' : ''; ?> value="4">4</option>
							<option <?= $row['sks'] == "6" ? ' selected="selected"' : ''; ?> value="6">6</option>
						</select>
					</div>
					<div class="form-group col-3">
						<label for="jns" class="form-label d-block">Jenis:</label>
						<select class="form-select px-2 w-100" name="jns" style="height: 40px; width: 350px;border :1px solid #ced4da;border-radius: 0.25rem;">
							<option <?= $row['jns'] == "T" ? ' selected="selected"' : ''; ?> value="T">Teori</option>
							<option <?= $row['jns'] == "P" ? ' selected="selected"' : ''; ?> value="P">Praktek</option>
							<option <?= $row['jns'] == "T/P" ? ' selected="selected"' : ''; ?> value="T/P">Teori/Praktek</option>
						</select>
					</div>
					<div class="form-group col-3">
						<label for="smt" class="form-label d-block">Semester:</label>
						<select class="form-select px-2 w-100" name="smt" style="height: 40px; width: 350px;border :1px solid #ced4da;border-radius: 0.25rem;">
							<option <?= $row['smt'] == "1" ? ' selected="selected"' : ''; ?> value="1">1</option>
							<option <?= $row['smt'] == "2" ? ' selected="selected"' : ''; ?> value="2">2</option>
							<option <?= $row['smt'] == "3" ? ' selected="selected"' : ''; ?> value="3">3</option>
							<option <?= $row['smt'] == "4" ? ' selected="selected"' : ''; ?> value="4">4</option>
							<option <?= $row['smt'] == "5" ? ' selected="selected"' : ''; ?> value="5">5</option>
							<option <?= $row['smt'] == "6" ? ' selected="selected"' : ''; ?> value="6">6</option>
							<option <?= $row['smt'] == "7" ? ' selected="selected"' : ''; ?> value="7">7</option>
							<option <?= $row['smt'] == "8" ? ' selected="selected"' : ''; ?> value="8">8</option>
						</select>
					</div>
				</div>
				<div>		
					<button class="btn btn-primary" type="submit" id="submit">Simpan</button>
				</div>
			</form>
		</div>
		</div>
	</div>
	<!-- <script>
		$('#submit').on('click',function(){
			var idmatkul 		= $('#idmatkul').val();
			var namamatkul	= $('#namamatkul').val();
			var sks 	      = $('#sks').val();
			var jns 	      = $('#jns').val();
			var smt 	      = $('#smt').val();
			$.ajax({
				method	: "POST",
				url		: "sv_editMatkul.php",
				data	: {idmatkul:idmatkul, namamatkul:namamatkul, sks:sks, jns:jns, smt:smt}
			});
		});
	</script> -->
</body>
</html>