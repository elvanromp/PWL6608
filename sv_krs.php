<?php
    require "fungsi.php";
    $nim = $_POST['nim'];
    $pilih = explode("-",$_POST['pilih']);

    //"A-123" explode("-","A-123-111") --> array(0 => "A", 1 =>, 2 =>111)
    $idkultawar = $pilih[0];
    $sks = $pilih[1];
    
    $sql = "INSERT INTO krs (nim,id_jadwal,sks) VALUES ('".$nim."',".$idkultawar.",".$sks.")";
    mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
    header('Location: inputKrs.php?nim='.$nim);
?>