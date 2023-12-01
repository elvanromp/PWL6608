
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$idKrs = $_POST['idKrs'];
$nim = $_POST["nim"];
$idMatkul = $_POST['idMatkul'];
$sks = $_POST["sks"];
$nppDos = $_POST["nppDos"];
$hari = $_POST["hari"];
$id_jadwal = $_POST["id_jadwal"];
if (ctype_digit(strval($_POST["sks"])) == 0) {
    echo "<script>
                alert('Tahun Akademik Hanya Boleh Mengandung angka')
                javascript:history.go(-1)
            </script>";
}
// kondisi ketika data yang diinput benar
else {
    $sql = "update krs set sks='$sks',
					    nim='$nim',
						idMatkul='$idMatkul',
                        nppDos='$nppDos',
                        hari='$hari',
                        id_jadwal='$id_jadwal'
					    where idKrs='$idKrs'";
    mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
    header("location:updateKrs.php");
}


?>