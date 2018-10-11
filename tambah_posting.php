<div class="form">
    <div id="title">
        <h3>Tambah Posting</h3>
    </div>
    <div id="data">
        <form action="proses.php?tambah_posting=<?php echo $_SESSION['nim'];?>" method="POST" enctype="multipart/form-data">
            <b>Judul</b><br><input type="text" name="judul" required><br><br>

            <b>Content</b><br><textarea name="content" id="content" rows="20" cols="80" required></textarea><br><br>

            <b>Foto : </b><input type="file" name="foto" required><br><br>
                    
            <input type="submit" value="Simpan"> <input type="reset" value="Reset">
        </form>
    </div>
</div>
<!-- =============================================================================== -->
</body></html>