
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$idmatkul=$_POST["idselect"] . "." . $_POST["idmatkul"];
$namamatkul=$_POST["namamatkul"];
$sks=$_POST["sks"];
$jns=$_POST["jns"];
$smt=$_POST["smt"];
$uploadOk=1;

		$sql="insert into matkul values('$idmatkul','$namamatkul','$sks','$jns','$smt')";
		mysqli_query($koneksi,$sql) or die(mysqli_error($koneksi));
		header("location:updateMatkul.php");

?>