<?php
require "fungsi.php";
$npp = $_GET['npp'];
$sql = "select * from kultawar a join matkul b on (a.idmatkul=b.id) where a.npp = '".$npp."'";
$rs = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
$mhs = search("dosen", "npp='".$npp."'",$npp);
$sks = 0;
$rsmhs = mysqli_fetch_assoc($mhs);
$html = "<div style= 'width:100%; text-align:center'><h3>KRM Dosen</h3></div>";
$html .= "<p>NIM : " . $rsmhs["npp"] . "</p>";
$html .= "<p>Nama : " . $rsmhs["namadosen"] . "</p>";
$html .= "<table style='border:1px solid black; border-collapse: collapse'>
    <thead class='thead-light'>
    <tr style='border:1px solid black;'>
        <th style='border:1px solid black;'>No</th>
        <th style='border:1px solid black;'>Kode Mata Kuliah</th>
        <th style='border:1px solid black;'>Kelompok</th>
        <th style='border:1px solid black;'>Nama Mata Kuliah</th>
        <th style='text-align: center; border:1px solid black;'>SKS</th>
        <th style='text-align: center; border:1px solid black;'>Jadwal</th>
        <th style='text-align: center; border:1px solid black;'>Ruang</th>
    </tr>
</thead>";
$i = 1;
while ($row = mysqli_fetch_assoc($rs)) {
    $sks += $row['sks'];
    $html .= "
    <tr style='border:1px solid black;'>
        <td style='border:1px solid black;'>" . $i . "</td>
        <td style='border:1px solid black;'>" . $row['idmatkul'] . "</td>
        <td style='border:1px solid black;'>" . $row['klp'] . "</td>
        <td style='border:1px solid black;'>" . $row['namamatkul'] . "</td>
        <td style='border:1px solid black;'>" . $row['sks'] . "</td>
        <td style='text-align: center; border:1px solid black;'>" . $row['hari'] . " - " . $row['jamkul'] . "</td>
        <td style='border:1px solid black;'>" . $row['ruang'] . "</td>
    </tr>";
    $i++;
}
$html .= "
<tr style='border:1px solid black;'>
    <td colspan=4>Total SKS</td>
    <td style='border:1px solid black;'>" . $sks . "</td>
    <td colspan=2></td>
</tr>";
$html .= "</table>";
generatepdf("A4", "Portrait", $html, "krs_" . $npp);