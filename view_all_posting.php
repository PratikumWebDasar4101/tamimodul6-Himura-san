<div class="content">
    <table class="view-posting">
        <tr>
            <th width="12%">Nama Penulis</th>
            <th width="10%">Judul</th>
            <th>Content</th>
            <th width="15%">Foto</th>
        </tr>
        <?php
            $nim = $_SESSION['nim'];

            $query = $pdo -> prepare("SELECT nama, judul, content, foto FROM tb_posting INNER JOIN tb_profile ON tb_profile.nim = tb_posting.nim ORDER BY nama");
            $query -> execute();
            $row = $query -> rowcount();

            if ($row != 0 ) {
                while($data = $query -> fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <tr>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['judul']; ?></td>
                        <td><?php echo $data['content']; ?></td>
                        <td><img src="<?php echo $data['foto'];?>"></td>
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