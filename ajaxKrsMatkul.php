<?php
    require "fungsi.php";
    $id = $_POST['id'];
    $homebase = explode(".",$id)[0];
    $rs = search("matkul", "idmatkul like'%$homebase%'", 0, "$homebase");
    ?>
    <option value='' disabled selected>Pilih Matkul</option>
    <?php 
    while($row = mysqli_fetch_assoc($rs)) {
    ?>
        <option value=<?= $row["idmatkul"]; ?>><?= $row["namamatkul"] ?></option>
    <?php } ?>
