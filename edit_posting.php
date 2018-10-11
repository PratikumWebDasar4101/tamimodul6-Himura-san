<?php
    @$id = $_GET['posting'];
    $query_view = $pdo -> prepare("SELECT * FROM tb_posting WHERE id_posting = '$id'");
    $query_view -> execute();
    $data = $query_view -> fetch(PDO::FETCH_ASSOC);
?>
<!-- =============================================================================== -->
<div class="form">
    <div id="title">
        <h3>Tambah Posting</h3>
    </div>
    <div id="data">
        <form action="proses.php?edit_posting=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
            <b>Judul</b><br><input type="text" name="judul" value="<?php echo $data['judul'];?>" required><br><br>

            <b>Content</b><br><textarea name="content" id="content" required><?php echo $data['content'];?></textarea><br><br>

            <b>Foto : </b><input type="file" name="foto"><br><br>
                    
            <input type="submit" value="Simpan"> <input type="reset" value="Reset">
        </form>
    </div>
</div>
<!-- =============================================================================== -->
</body></html>