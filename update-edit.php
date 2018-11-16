<?php
include "conn.php";
if(isset($_POST['update'])){
				$id	       		= $_POST['id'];
				$nama		   = $_POST['nama'];
				
				$email 			= $_POST['email'];
				$alamat        = $_POST['alamat'];
                $notelp        = $_POST['notelp'];
				
				$update = mysqli_query($koneksi, "UPDATE data SET nama='$nama', email='$email', alamat='$alamat', notelp='$notelp' WHERE id='$id'") or die(mysqli_error());
				if($update){
					echo "<script>alert('Data Berhasil di Update!'); window.location = 'index.php'</script>";
				}else{
					echo "<script>alert('Data Gagal di Update!'); window.location = 'index.php'</script>";
				}
			}
            ?>