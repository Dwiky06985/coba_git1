<!DOCTYPE html>
<html>

<head>
	<title>SELAMAT DATANG</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap lokal -->
	<link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap-5.3.3-dist/jquery/jquery-3.7.1.min.js"></script>
	<script src="bootstrap-5.3.3-dist/js/bootstrap.js"></script>

	<!-- Tambahkan program validasi dan simpan data dengan ajax disini -->
	<style> 
        .error { 
            color: red; 
            font-size: 0.9em; 
            display: none; 
        } 
 
        #username { 
            width: 150px; 
        } 
 
        #ajaxResponse { 
            margin-top: 15px; 
        } 
    </style> 
 
    <script> 
        $(document).ready(function() { 
            // membuat fungsi  untuk mengecek USERNAME pada tabel mhs di database akademik12345 
            function checkUSERNAMEExists(username) { 
                $.ajax({ 
                     // memanggil file cek_data_kembar.php 
                    url: 'cekDataKembarUuser.php', 
                    type: 'POST', 
                    data: { 
                        username: username 
                    }, 
                    success: function(response) { 
                        if (response === 'exists') { 
                            showError("* Data sudah ada, silahkan isikan yang lain"); 
                            $("#username").val("").focus(); 
                            return false; 
                        } else { 
                            hideError(); 
                            $("#password").focus(); 
                        } 
                    } 
                }); 
            } 
 
 
            function validateUSERNAME() { 
                var username = $("#username").val(); 
                var errorMsg = ""; 
 
                // Cek apakah USERNAME kosong 
                if (username.trim() === "") { 
                    errorMsg = "* USERNAME tidak boleh kosong!"; 
                    showError(errorMsg); 
                    return false; 
                } 
                // Cek panjang USERNAME 
                else if (username.length < 1 || username.length > 50) { 
                    errorMsg = "* USERNAME harus memiliki panjang antara 1 hingga 50 karakter"; 
                    showError(errorMsg); 
                    return false; 
                } 
                // Cek format USERNAME 
                else if (!/^[A-Za-z0-9]{1,50}$/.test(username)) {
                    errorMsg = "* Format USERNAME tidak sesuai. Gunakan kombinasi huruf dan angka dengan maksimal 50 karakter";
                    showError(errorMsg);
                    return false;
                }
                return true; 
            } 
 
            function showError(message) { 
                $("#usernameError").text(message).show(); 
            } 
 
            function hideError() { 
                $("#usernameError").hide(); 
            } 
 
            function formatUsername(input) {
                // Remove special characters, keeping only letters and numbers
                var value = input.value.replace(/[^A-Za-z0-9]/g, '');
  
                // Limit to maximum 50 characters
                if (value.length > 50) {
                    value = value.substr(0, 50);
                }
  
                // Update input field with cleaned username
                input.value = value;
            }
 
            // Event listeners 
            $("#username").on("blur", function() { 
                if (validateUSERNAME()) { 
                    checkUSERNAMEExists($(this).val()); 
                } 
            }).on("keypress", function(event) { 
                if (event.which === 13) { 
                    event.preventDefault(); 
                    if (validateUSERNAME()) { 
                        checkUSERNAMEExists($(this).val()); 
                    } 
                } 
            }).on("input", function() { 
                formatUSERNAME(this); 
                hideError(); 
            }); 
 
            // Form submission with AJAX 
            $("#usernameForm").on("submit", function(event) { 
                //Menghentikan perilaku submit form standar 
                //Memungkinkan proses submit data melalui JavaScript 
                event.preventDefault(); 
 
                //Memastikan NIM valid sebelum mengirim data ke server 
                if (!validateUSERNAME()) { 
                    return false; 
                } 
 
                //Membuat objek FormData untuk menangkap semua data form 
                var formData = new FormData(this); 
                $.ajax({ 
                 // memanggil file sv_addUser.php 
                    url: 'sv_addUser.php', 
                    type: 'POST', 
                    data: formData, 
                    //untuk mendukung upload file 
                    processData: false, 
                    contentType: false, 
                    success: function(response) { 
                        $("#ajaxResponse").html(response); 
                    }, 
                    error: function() { 
                        $("#ajaxResponse").html("Terjadi kesalahan saat mengirim data."); 
                    } 
                }); 
            }); 
        }); 
    </script>
	<!--                                                                     -->
	
</head>

<body>
<?php require "head.html"; ?>
	<div class="utama">
		<br><br><br>
		<h3>TAMBAH DATA USER</h3>
		<form id="usernameForm" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="username">Username:</label>
				<input class="form-control" type="text" name="username" id="username"
					placeholder="Septian, Anto7" required>
				<span id="usernameError" class="error"></span>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input class="form-control" type="password" name="password" id="password" required>
			</div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status" id="status" required>
                    <option value="" selected disabled>Pilih Status</option>
                    <option value="dosen">Dosen</option>
                    <option value="mhs">Mahasiswa</option>
                    <option value="admin">Admin</option>
                    <option value="tu">TU</option>
                </select>
            </div><br>
			<div>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
		</form>
		<div id="ajaxResponse"></div>
	</div>
</body>

</html>