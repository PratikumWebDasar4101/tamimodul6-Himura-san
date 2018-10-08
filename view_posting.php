<div class="content">
    <table class="view-posting">
        <tr>
            <th width="10%">Judul</th>
            <th>Content</th>
            <th width="15%">Foto</th>
            <th width="6%">Option</th>
        </tr>
        <?php
            $nim = $_SESSION['nim'];
            $query = $pdo -> prepare("SELECT * FROM tb_posting WHERE nim = '$nim'");
            $query -> execute();
            $row = $query -> rowcount();

            if ($row != 0 ) {
                while($data = $query -> fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $data['judul']; ?></td>
                        <td><?php echo $data['content']; ?></td>
                        <td><img src="<?php echo $data['foto'];?>"></td>
                        <td><a href="?hal=edit_posting&posting=<?php echo $data['id_posting'];?>">Edit</a> | <a href="?hal=view_posting&delete=<?php echo $data['id_posting'];?>" onclick="return confirm('Apakah anda yakin ingin menghapusnya..?');">Hapus</a></td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="4"><h2>Data tidak ada..</h2></td>
                </tr>
                <?php
            }
        ?>
    </table>
</div>
<!-- =============================================================================== -->
</body></html>
<?php
    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $query = $pdo -> prepare("DELETE FROM tb_posting WHERE id_posting = '$id'");
        $query -> execute();

        if ($query) {
            ?>
            <script>
                alert("Postingan berhasil dihapus..!");
                location = "?hal=view_posting";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Postingan gagal dihapus..!");
            </script>
            <?php
        }
    }
?>