<?php
    @$nim = $_SESSION['nim'];
    $query = $pdo -> prepare("SELECT * FROM tb_profile WHERE nim = '$nim'");
    $query -> execute();
    $data = $query -> fetch(PDO::FETCH_ASSOC);

    $query_posting = $pdo -> prepare("SELECT * FROM tb_posting WHERE nim = '$nim'");
    $query_posting -> execute();
    $row = $query_posting -> rowcount();
    $data_posting = $query_posting -> fetch(PDO::FETCH_ASSOC);
?>
<div class="content">
    <h3>Welcome, <?php echo $data['nama'];?></h3>
    <?php if($row == 0) { ?>
        <h3>Buatlah Postingan anda untuk pertama kalinya.. 
            <br> pada <a href="?hal=tambah_posting">Klik disini..</a>
        </h3>
    <?php } ?>
</div>
<!-- =============================================================================== -->
</body></html>