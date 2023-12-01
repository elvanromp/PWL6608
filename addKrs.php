<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi Akademik::Tambah Mata Kuliah</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styleku.css">
    <script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
    <script src="bootstrap4/js/bootstrap.js"></script>

</head>

<body>
    <?php
    require "head.html";
    require "fungsi.php";

    ?>
    <div class="utama">
        <br><br><br>
        <h3>Tambah KRS</h3>
        <br>
        <form method="post" action="sv_addKrs.php" autocomplete="off">
            <div class="container p-0">
                <div class="row">
                    <div class="form-group mb-3 col-6">
                        <label for="mhs">Mahasiswa</label>
                        <select name="nim" id="mhs" class="form-select" style="height: 40px;width: 100% ; border :1px solid #ced4da;border-radius: 0.25rem;" required>
                            <option value='' disabled selected>Pilih Mahasiswa</option>
                            <?php
                            $hasil = search("mhs", "");
                            while ($row = mysqli_fetch_assoc($hasil)) {
                            ?>
                                <option value=<?= $row["nim"]; ?>><?= $row["nama"] ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                    <div class="form-group mb-3 col-6">
                        <label for="matkul">Mata Kuliah</label>
                        <select name="idMatkul" id="matkul" class="form-select" style="height: 40px;width: 100% ; border :1px solid #ced4da;border-radius: 0.25rem;" required>
                            <option value='' disabled selected>Pilih Mata Kuliah</option>
                        </select>
                    </div>
                    <div class="form-group mb-3 col-6">
                        <label for="npp">Dosen</label>
                        <select name="nppDos" id="dosen" class="form-select" style="height: 40px;width: 100% ; border :1px solid #ced4da;border-radius: 0.25rem;" required>
                            <option value='' disabled selected>Pilih Dosen</option>
                        </select>
                    </div>
                    <div class="form-group mb-3 col-6">
                        <label for="sks">SKS</label>
                        <select class="form-select px-2 w-100" name="sks" style="height: 40px; width: 50%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
                            <option value='' disabled selected>Pilih SKS</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="form-group mb-3 col-6">
                        <label for="hari">Hari</label>
                        <select class="form-select px-2 w-100" name="hari" style="height: 40px; width: 50%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
                            <option value='' disabled selected>Pilih Hari</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                    </div>
                    <div class="form-group mb-3 col-6">
                        <label for="id_jadwal">Jadwal</label>
                        <select class="form-select px-2 w-100" name="id_jadwal" style="height: 40px; width: 100%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
                            <option value='' disabled selected>Pilih Jadwal</option>
                            <option value="1">07.00-08.40</option>
                            <option value="2">08.40-10.20</option>
                            <option value="3">10.20-12.00</option>
                            <option value="4">12.30-14.10</option>
                            <option value="5">14.10-16.20</option>
                            <option value="6">16.20-18.00</option>
                            <option value="7">18.30-20.10</option>
                            <option value="8">07.00-09.30</option>
                            <option value="9">09.30-12.00</option>
                            <option value="10">12.30-15.00</option>
                            <option value="11">15.30-18.00</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
            </div>
    </div>
    </form>
    </div>
    <script>
        $(document).ready(function() {
            $("#mhs").change(function() {
                var mk = $(this).val()
                $.post('ajaxKrsDosen.php', {
                        id: mk
                    },
                    function(data) {
                        if (data != "") {
                            $("#dosen").html(data)
                        }
                    })
                $.post('ajaxKrsMatkul.php', {
                        id: mk
                    },
                    function(data) {
                        if (data != "") {
                            $("#matkul").html(data)
                        }
                    })
            })
        })
    </script>
</body>

</html>