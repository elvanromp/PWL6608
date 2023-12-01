<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$idkultawar=dekripsiurl($_GET["kode"]);

$q = "SELECT * FROM kultawar WHERE idkultawar='".$idkultawar."'";

$rs = mysqli_query($koneksi,$q);
if(mysqli_num_rows($rs) == 1){
    //membuat query hapus data
    $sql = "delete from kultawar where idkultawar='$idkultawar'";
    mysqli_query($koneksi,$sql);
    header("location:updateTawar.php");
}else{
    echo "<script>
    alert('Hapus kultawar gagal: idkultawar " .$idkultawar. " tidak ditemukan')
    javascript:history.go(-1)
    </script>";
}
?>