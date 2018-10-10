<?php   
    $nim_user = $_SESSION['nim'];
    $query = $pdo -> prepare("SELECT * FROM tb_profile WHERE nim = '$nim_user'");
    $query -> execute();
    $data = $query -> fetch(PDO::FETCH_ASSOC);
    $hobi_terpilih = explode(", ", $data['hobi']);
?>
<!-- =============================================================================== -->
<div class="form">
    <div id="title">
        <h3>Edit Profile</h3>
    </div>
    <div id="data">
        <form method="POST">
            <b>NIM</b><br><input type="text" name="nim" pattern="\d*" maxlength="10" value="<?php echo $data['nim']; ?>" required disabled><br><br>
            <b>Nama</b><br><input type="text" name="nama" maxlength="35" value="<?php echo $data['nama']; ?>" required><br><br>

            <b>Kelas</b> <br>
            <input type="radio" name="kelas" value="D3MI-41-01" <?php if($data['kelas'] == "D3MI-41-01") { ?> checked <?php } ?> required> D3MI-41-01
            <input type="radio" name="kelas" value="D3MI-41-02" <?php if($data['kelas'] == "D3MI-41-02") { ?> checked <?php } ?> required> D3MI-41-02
            <input type="radio" name="kelas" value="D3MI-41-03" <?php if($data['kelas'] == "D3MI-41-03") { ?> checked <?php } ?> required> D3MI-41-03
            <input type="radio" name="kelas" value="D3MI-41-04" <?php if($data['kelas'] == "D3MI-41-04") { ?> checked <?php } ?> required> D3MI-41-04 <br><br>
                    
            <b>Jenis Kelamin : </b>
            <input type="radio" name="jk" value="Laki-laki" <?php if($data['jk'] == "Laki-laki") { ?> checked <?php } ?> required> Laki-Laki
            <input type="radio" name="jk" value="Perempuan" <?php if($data['jk'] == "Perempuan") { ?> checked <?php } ?> required> Perempuan <br><br>

            <b>Hobi</b> <br>
            <input type="checkbox" name="hobi[]" <?php if (array_search("Makan", $hobi_terpilih) > -1 ) { ?> checked <?php } ?> value="Makan"> Makan
            <input type="checkbox" name="hobi[]" <?php if (array_search("Minum", $hobi_terpilih) > -1 ) { ?> checked <?php } ?> value="Minum"> Minum
            <input type="checkbox" name="hobi[]" <?php if (array_search("Main", $hobi_terpilih)  > -1 ) { ?> checked <?php } ?> value="Main"> Main
            <input type="checkbox" name="hobi[]" <?php if (array_search("Tidur", $hobi_terpilih) > -1 ) { ?> checked <?php } ?> value="Tidur"> Tidur <br><br>
                    
            <b>Fakultas</b><br>
            <select name="fakultas" id="dropdown" required>
                <option value="FTE" <?php if($data['fakultas'] == "FTE") { ?> selected <?php } ?>>FTE</option>
                <option value="FRI" <?php if($data['fakultas'] == "FRI") { ?> selected <?php } ?>>FRI</option>
                <option value="FIF" <?php if($data['fakultas'] == "FIF") { ?> selected <?php } ?>>FIF</option>
                <option value="FEB" <?php if($data['fakultas'] == "FEB") { ?> selected <?php } ?>>FEB</option>
                <option value="FKB" <?php if($data['fakultas'] == "FKB") { ?> selected <?php } ?>>FKB</option>
                <option value="FIK" <?php if($data['fakultas'] == "FIK") { ?> selected <?php } ?>>FIK</option>
                <option value="FIT" <?php if($data['fakultas'] == "FIT") { ?> selected <?php } ?>>FIT</option>
            </select>
            <br><br>

            <b>Alamat</b><br><textarea name="alamat" required><?php echo $data['alamat']; ?></textarea><br><br>
                    
            <input type="submit" value="Simpan"> <input type="reset" value="Reset">
        </form>
    </div>
</div>
<!-- =============================================================================== -->
</body></html>
<?php
    if (isset($_POST['nama'])) {
        $nama = addslashes($_POST['nama']);
        $kelas = $_POST['kelas'];
        $fakultas = $_POST['fakultas'];
        $jk = $_POST['jk'];
        $hobi = $_POST['hobi'];
        $alamat = $_POST['alamat'];

        $list_hobi = implode(", ", $hobi);
        
        $query = $pdo -> prepare("UPDATE tb_profile SET nama = '$nama', kelas = '$kelas', fakultas = '$fakultas', jk = '$jk', hobi = '$list_hobi', alamat = '$alamat' WHERE nim = '$nim_user'");
        $query -> execute();

        if ($query) {
            ?>
            <script type="text/javascript">
                alert("Data telah terubah..!");
                location = "halaman.php";
            </script>
            <?php
        }else {
            ?>
            <script type="text/javascript">
                alert("Data gagal terubah..!");
            </script>
            <?php
        }
    }
?>
