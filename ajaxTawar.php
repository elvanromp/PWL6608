<?php
    require "fungsi.php";
    $id = $_POST['id'];
    $matkul = "select idmatkul from matkul where id=".$id;
    $hasilMatkul = mysqli_query($koneksi, $matkul);
    $dataMatkul = mysqli_fetch_assoc($hasilMatkul)["idmatkul"];
    $homebase = explode(".", $dataMatkul)[0];
    $rs = search("dosen", "homebase='$homebase'", 0, "$homebase");
    ?>
    <option value='' disabled selected>Pilih Dosen</option>
    <?php 
    while($row = mysqli_fetch_assoc($rs)) {
    ?>
        <option value=<?= $row["npp"]; ?>><?= $row["namadosen"] ?></option>
    <?php } ?>
