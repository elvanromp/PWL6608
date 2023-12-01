<!DOCTYPE html>
<html lang="en">

<head>
    <title>Input KRS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styleku.css">
    <script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
    <script src="bootstrap4/js/bootstrap.js"></script>
    <!-- Use fontawesome 5-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>

<body>
    <?php
    require "fungsi.php";
    require "head.html";
    $progdi = substr($_GET['nim'], 0, 3);
    $hasil = search("matkul", "idmatkul like '" . $progdi . "%'", 0, $progdi);
    ?>
    <div class="utama">
        <h2 class="text-center">Input KRS <?= $_GET['nim'] ?></h2>
        <form action="sv_krs.php" method="post">
            <input type="hidden" name="nim" value="<?= $_GET['nim'] ?>">
            <select class="form-select px-2 mr-3" id="matkul" name="idMatkul" style="height: 40px;width: 100% ; border :1px solid #ced4da;border-radius: 0.25rem;" required>
                <option value='' disabled selected>Pilih Mata Kuliah</option>
                <?php
                while ($row = mysqli_fetch_assoc($hasil)) {
                ?>
                    <option value=<?= $row["id"]; ?>><?= $row["namamatkul"] ?></option>
                <?php } ?>
            </select>
            <div id="tabelmatkul"></div>
        </form>
        <h4 class="text-center mt-5">KRS Yang Diambil</h4>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Kode Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th style="text-align: center">Nama Dosen</th>
                    <th style="text-align: center">SKS</th>
                    <th style="text-align: center">Jadwal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <?php
            $sql2 = "select * from krs a JOIN kultawar b ON (a.id_jadwal=b.idkultawar) JOIN matkul c ON (c.id=b.idmatkul) JOIN dosen d ON (d.npp=b.npp) where a.nim='" . $_GET['nim'] . "'";
            $hasil2 = mysqli_query($koneksi, $sql2);
            while ($row = mysqli_fetch_assoc($hasil2)) {
            ?>
                <tr>
                    <td><?php echo $row["idmatkul"] ?></td>
                    <td><?php echo $row["namamatkul"] ?></td>
                    <td style="text-align: center"><?php echo $row["namadosen"] ?></td>
                    <td style="text-align: center"><?php echo $row["sks"] ?></td>
                    <td style="text-align: center"><?php echo $row["hari"] ?>-<?php echo $row["jamkul"] ?></td>
                    <td>
                        <a class="btn btn-outline-danger btn-sm" href="hpsKrs.php?kode=<?php echo enkripsiurl($row['idKrs']) ?>" id="linkHps" onclick="return confirm('Yakin dihapus nih?')">Hapus</a>
                    </td>
                </tr>
            <?php }
            ?>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#matkul").change(function() {
            var mk = $(this).val()
            $.post("ajaxKrs.php", {
                mk: mk
            }, function(data) {
                $("#tabelmatkul").html(data);
            })
        })
    })
</script>

</html>