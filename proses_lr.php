<?php 
	require("config.php");
	session_start();
	
	if(isset($_GET['register'])) {
		if (isset($_POST['nim'])) {
	        $nim = $_POST['nim'];
	        $nama = addslashes($_POST['nama']);
	        $username = $_POST['username'];
	        $password = $_POST['password'];
	        $confirm_password = $_POST['confirm_password'];

	        if ($password == $confirm_password) {
	            $check_mahasiswa = $pdo -> prepare("SELECT nim FROM tb_profile WHERE nim = '$nim'");
	            $check_mahasiswa -> execute();
	            $row_mahasiswa = $check_mahasiswa -> rowcount();

	            $check_akun = $pdo -> prepare("SELECT username FROM tb_account WHERE username = '$username'");
	            $check_akun -> execute();
	            $row_akun = $check_akun -> rowcount();

	            if ($row_akun == 0 && $row_mahasiswa == 0){
	                $query = $pdo -> prepare("INSERT INTO tb_account(username, password) VALUES ('$username','$password')");
	                $query -> execute();

	                $query_id = $pdo -> prepare("SELECT id_user FROM tb_account WHERE username = '$username' AND password = '$password'");
	                $query_id -> execute();
	                $data = $query_id -> fetch(PDO::FETCH_ASSOC);
	                $id_user = $data['id_user'];

	                $query_mahasiswa = $pdo -> prepare("INSERT INTO tb_profile(nim, nama, id_user) VALUES ('$nim','$nama','$id_user')");
	                $query_mahasiswa -> execute();

	                if ($query && $query_mahasiswa) {
	                    ?>
	                    <script type="text/javascript">
	                        alert("Akun telah terbuat..");
	                        location = "index.php";
	                    </script>
	                    <?php
	                }
	                else {
	                    die("Gagal Register..");
	                }
	            } elseif($row_akun != 0) {
	                ?>
	                <script type="text/javascript">
	                    alert("Username sudah terpakai..!!");
						location = "register.php";
	                </script>
	                <?php
	            } else {
	                ?>
	                <script type="text/javascript">
	                    alert("NIM sudah terpakai..!!");
						location = "register.php";
	                </script>
	                <?php
	            }
	        } else {
	            ?>
	            <script type="text/javascript">
	                alert("Confirm Password tidak sama..!!");
					location = "register.php";
	            </script>
	            <?php
	        }
	    }
	}

	if (isset($_GET['login'])) {
		if (isset($_POST['username'])) {
	        $username = $_POST['username'];
	        $password = $_POST['password'];

	        $query = $pdo -> prepare("SELECT * FROM tb_account WHERE username = '$username' AND password = '$password'");
	        $query -> execute();
	        
	        $row = $query -> rowcount();
	        $data = $query -> fetch(PDO::FETCH_ASSOC);

	        if ($row != 0) {
	        	$query_profile = $pdo -> prepare("SELECT * FROM tb_profile WHERE id_user = '$data[id_user]'");
		        $query_profile -> execute();
		        $data_profile = $query_profile -> fetch(PDO::FETCH_ASSOC);

	            $_SESSION['nim'] = $data_profile['nim'];
	            $_SESSION['sukses'] = "Sukses";
	            header("Location: halaman.php");
	        } else {
	            ?>
	            <script type="text/javascript">
	                alert("Username atau Password salah..!!");
	                location = "index.php";
	            </script>
	            <?php
	        }
	    }
	}
?>