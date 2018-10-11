<?php
    require("config.php");
    session_start();

    if (isset($_GET['edit_profile'])) {
        if (isset($_POST['nama'])) {
            $nim_user = $_GET['edit_profile'];

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
                    location = "halaman.php";
                </script>
                <?php
            }
        }
    }

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];

        $query = $pdo -> prepare("DELETE FROM tb_posting WHERE id_posting = '$id'");
        $query -> execute();

        if ($query) {
            ?>
            <script>
                alert("Postingan berhasil dihapus..!");
                location = "halaman.php?hal=view_posting";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Postingan gagal dihapus..!");
                location = "halaman.php?hal=view_posting";
            </script>
            <?php
        }
    }

    if (isset($_GET['edit_posting'])) {
        if (isset($_POST['judul'])) {
            $id = $_GET['edit_posting'];

            $judul = addslashes($_POST['judul']);
            $content = addslashes($_POST['content']);
            $nim = $_SESSION['nim'];

            $nama_foto = $_FILES['foto']['name'];
            $tmp_foto = $_FILES['foto']['tmp_name'];
            $dir_foto = "photos/";
            $target_foto = $dir_foto . $nama_foto;

            $kata = explode(" ", $content);
            
            if (count($kata) >= 30) {
                if ($nama_foto != "") {
                    if (!move_uploaded_file($tmp_foto, $target_foto))
                        die("Foto gagal di upload..!!");

                    $query = $pdo -> prepare("UPDATE tb_posting SET judul = '$judul', content = '$content', foto = '$target_foto' WHERE id_posting = '$id'");
                    $query -> execute();

                    if ($query) {
                        ?>
                        <script>
                            alert("Postingan telah diubah..!");
                            location = "halaman.php";
                        </script>
                        <?php
                    }else {
                        ?>
                        <script>
                            alert("Postingan gagal diubah..!");
                            location = "halaman.php?hal=view_posting";
                        </script>
                        <?php
                    }
                } else {
                    $query = $pdo -> prepare("UPDATE tb_posting SET judul = '$judul', content = '$content' WHERE id_posting = '$id'");
                    $query -> execute();

                    if ($query) {
                        ?>
                        <script>
                            alert("Postingan telah diubah..!");
                            location = "halaman.php";
                        </script>
                        <?php
                    }else {
                        ?>
                        <script>
                            alert("Postingan gagal diubah..!");
                            location = "halaman.php?hal=view_posting";
                        </script>
                        <?php
                    }
                }
            }
        } else {
            ?>
            <script>
                alert("Content harus minimal 30 kata..!");
                location = "halaman.php?hal=view_posting";
            </script>
            <?php
        }
    }

    if (isset($_GET['tambah_posting'])) {
        if (isset($_POST['judul'])) {
            $judul = addslashes($_POST['judul']);
            $content = addslashes($_POST['content']);
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
                        location = "halaman.php?hal=tambah_posting";
                    </script>
                    <?php
                }
            } else {
                ?>
                <script>
                    alert("Content harus minimal 30 kata..!");
                    location = "halaman.php?hal=tambah_posting";
                </script>
                <?php
            }
        }
    }
?>