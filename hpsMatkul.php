<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$idmatkul=dekripsiurl($_GET["kode"]);

$q = "SELECT * FROM matkul WHERE idmatkul='".$idmatkul."'";

$rs = mysqli_query($koneksi,$q);
if(mysqli_num_rows($rs) == 1){
    //membuat query hapus data
    $sql = "delete from matkul where idmatkul='$idmatkul'";
    mysqli_query($koneksi,$sql);
    header("location:updateMatkul.php");
}else{
    echo "<script>
    alert('Hapus matkul gagal: idmatkul " .$idmatkul. " tidak ditemukan')
    javascript:history.go(-1)
    </script>";
}
?>