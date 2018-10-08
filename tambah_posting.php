<div class="form">
    <div id="title">
        <h3>Tambah Posting</h3>
    </div>
    <div id="data">
        <form method="POST" enctype="multipart/form-data">
            <b>Judul</b><br><input type="text" name="judul" required><br><br>

            <b>Content</b><br><textarea name="content" id="content" required></textarea><br><br>

            <b>Foto : </b><input type="file" name="foto" required><br><br>
                    
            <input type="submit" value="Simpan"> <input type="reset" value="Reset">
        </form>
    </div>
</div>
<!-- =============================================================================== -->
</body></html>
<?php
    if (isset($_POST['judul'])) {
        $judul = $_POST['judul'];
        $content = $_POST['content'];
        $nim = $_SESSION['nim'];

        $nama_foto = $_FILES['foto']['name'];
        $tmp_foto = $_FILES['foto']['tmp_name'];
        $dir_foto = "photos/";
        $target_foto = $dir_foto . $nama_foto;

        $kata = explode(" ", $content);
        
        if (count($kata) >= 30) {

            if (!move_uploaded_file($tmp_foto, $target_foto))
                die("Foto gagal di upload..!!");

            $query = $pdo -> prepare("INSERT INTO tb_posting(judul, content, foto, nim) VALUES('$judul','$content','$target_foto','$nim')");
            $query -> execute();

            if ($query) {
                ?>
                <script>
                    alert("Postingan telah ditambah..!");
                    location = "halaman.php";
                </script>
                <?php
            }else {
                ?>
                <script>
                    alert("Postingan gagal ditambah..!");
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("Content harus minimal 30 kata..!");
            </script>
            <?php
        }
    }
?>