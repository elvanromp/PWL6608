<?php
require "fungsi.php";
$id = $_POST["mk"];
$sql = "select * from matkul a JOIN kultawar b ON (a.id = b.idmatkul) JOIN dosen c ON (c.npp=b.npp) where a.id='".$id."'";
$hasil = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
if (mysqli_num_rows($hasil) == 0) {
    echo "Mata kuliah tidak ditawarkan";
} else {
?>
    <table class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Nama Mata Kuliah</th>
                <th style="text-align: center">Nama Dosen</th>
                <th style="text-align: center">SKS</th>
                <th style="text-align: center">Jadwal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($hasil)){
            ?>
                <tr>
                    <td><?php echo $row["idmatkul"] ?></td>
                    <td><?php echo $row["namamatkul"] ?></td>
                    <td style="text-align: center"><?php echo $row["namadosen"] ?></td>
                    <td style="text-align: center"><?php echo $row["sks"] ?></td>
                    <td style="text-align: center"><?php echo $row["hari"] ?>-<?php echo $row["jamkul"] ?></td>
                    <td>
                        <input type="radio" name="pilih" value="<?php echo $row['idkultawar']?>-<?php echo $row['sks']?>"/>
                    </td>
                </tr>
            <?php
            };
            ?>
        </tbody>
    </table>
    <input type="submit" value="Simpan" class="btn btn-primary"> 
<?php
};
?>