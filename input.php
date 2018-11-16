<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>

<script type="text/javascript">
function validate(){
  pola_email=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  if (!pola_email.test(email.value)){
    alert ('Penulisan Email Tidak Benar!');
    email.focus();
    return false;
  }
  var maxcar = 50;
  if (nama.value.length > maxcar){
    alert("Panjang Nama Tidak Lebih Dari 50 Huruf!");
    nama.focus();
    return (false);
  }
  var mincar = 10;
  if (notelp.value.length < mincar){
    alert("Panjang No. Telepon Minimal 10 Digit!");
    notelp.focus();
    return (false);
  }
  numbers=/^[0-9]/;
  if (!numbers.test(notelp.value)){
    alert("No. Telepon Hanya Boleh Angka!");
    notelp.focus();
    return (false);
  }
   return (true);
  }
</script>


        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Example User</title>
        <!-- css table datatables/dataTables -->
	    <link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>
        
         <link type="text/css" href="css/bootstrap.css" rel="stylesheet">
        <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
        <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="css/theme.css" rel="stylesheet">
        <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
        
        <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" >Example User</a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        
                       
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div><br />

            <div class="container">
                <div class="row">
                    <div class="span12">
                        <div class="content">
                            <?php
			if(isset($_POST['input'])){
				$id	       = $_POST['id'];
				$nama		   = $_POST['nama'];
				
				$email = $_POST['email'];
				$alamat        = $_POST['alamat'];
                $notelp        = $_POST['notelp'];
				
				$cek = mysqli_query($koneksi, "SELECT * FROM data WHERE id='$id'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($koneksi, "INSERT INTO data(id, nama, email, alamat, notelp)
															VALUES('$id','$nama', '$email', '$alamat', '$notelp')") or die(mysqli_error());
						if($insert){
							echo "<script>alert('Data Berhasil di Tambahkan!'); window.location = 'index.php'</script>";
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
						}
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>ID Sudah Ada..!</div>';
				}
			}
			?>
            
            <blockquote>
            Input Data User
            </blockquote>
                         <form name="form1" id="form1" class="form-horizontal row-fluid" action="input.php" onsubmit="return validate();" method="POST" >
										<div class="control-group">
											<label class="control-label" for="basicinput">ID</label>
											<div class="controls">
												<input type="text" name="id" id="id" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Nama User</label>
											<div class="controls">
												<input type="text" name="nama" id="nama" placeholder="Nama User" class="form-control span8 tip" required>
											</div>
										</div>


										<div class="control-group">
											<label class="control-label" for="basicinput">E-Mail</label>
											<div class="controls">
												<input name="email" id="email" class="form-control span8 tip" type="text" placeholder="E-Mail"" required />
											</div>
										</div>

										<div class="control-group">
											<label class="control-label" for="basicinput">Alamat</label>
											<div class="controls">
												<input name="alamat" id="alamat" class=" form-control span8 tip" type="text" placeholder="Alamat" required /> <button type="button" class="glyphicon glyphicon-plus" id="btn-tambah-form"></button>
											</div>

										</div>
                                        
                                        <div class="control-group">
											<label class="control-label" for="basicinput">No Telepon</label>
											<div class="controls">
												<input name="notelp" id="notelp" class=" form-control span8 tip" type="text" placeholder="No Telepon" required />
											</div>
										</div>

										<div class="control-group">
											<div class="controls">
												<button type="submit" name="input" id="input" class="btn btn-sm btn-primary">Simpan</button>
                                               <a href="index.php" class="btn btn-sm btn-danger">Kembali</a>
											</div>
										</div>
                                        
									</form>
                        </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        
        <!--/.wrapper--><br />
        
        <script>
	//options method for call datepicker
	$(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
	
    </script>
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        
        <script src="datatables/jquery.dataTables.js"></script>
        <script src="datatables/dataTables.bootstrap.js"></script>
        <script>
        $(document).ready(function() {
				var dataTable = $('#lookup').DataTable( {
					"processing": true,
					"serverSide": true,
					"ajax":{
						url :"ajax-grid-data.php", // json datasource
						type: "post",  // method  , by default get
						error: function(){  // error handling
							$(".lookup-error").html("");
							$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#lookup_processing").css("display","none");
							
						}
					}
				} );
			} );
        </script>

    </body>
