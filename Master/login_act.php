<?php
session_start();
					include("admin/cek.php");
					include("config.php");
					$username	= $_POST['username'];
					$password	= $_POST['password'];
					$level		= $_POST['level'];
					$query = mysqli_query($koneksi,"SELECT * from admin where username = '$username'and password='$password'");
					if(mysqli_num_rows($query) == 0){
						echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
					}else{
						$row = mysqli_fetch_assoc($query);
						if($row['level'] == 1 && $level == 1){
							
							$_SESSION['username']=$username;
							$_SESSION['level']='admin';
							header("Location: Master/admin/index.php");

						}else if($row['level'] == 2 && $level == 2){
							$_SESSION['username']=$username;
							$_SESSION['level']='dosen';
							header("Location: Master/sdmk/index.php");

						}else if($row['level'] == 3 && $level == 3){
							$_SESSION['username']=$username;
							$_SESSION['level']='mahasiswa';
							header("Location: Master/sarana/index.php");

						}else if($row['level'] == 4 && $level == 4){
							$_SESSION['username']=$username;
							$_SESSION['level']='sarana';
							header("Location: Master/farmasi/index.php");

						}else if($row['level'] == 5 && $level == 5){
							$_SESSION['username']=$username;
							$_SESSION['level']='kepsek';
							header("Location: Master/sarana_kepsek/index.php");

						}else{
							echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
						}
						
					}
				
				?>