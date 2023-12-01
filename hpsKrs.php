<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$idKrs=dekripsiurl($_GET["kode"]);

$q = "SELECT * FROM krs WHERE idKrs='".$idKrs."'";

$rs = mysqli_query($koneksi,$q);
$nim = mysqli_fetch_assoc($rs)['nim'];
if(mysqli_num_rows($rs) == 1){
    //membuat query hapus data
    $sql = "delete from krs where idKrs='$idKrs'";
    mysqli_query($koneksi,$sql);
    header("location:inputKrs.php?nim=".$nim);
}else{
    echo "<script>
    alert('Hapus krs gagal: idKrs " .$idKrs. " tidak ditemukan')
    javascript:history.go(-1)
    </script>";
}
?>