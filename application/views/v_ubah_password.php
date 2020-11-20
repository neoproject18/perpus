<div class="container-fluid" id="container-wrapper">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Profil</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="">Profilr</a></li>
			<li class="breadcrumb-item">Ubah Password</li>
		</ol>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="card mb-4">
				<div class="card-body">
					<form onsubmit="ubahpassword(); return false;">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Password Lama</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" placeholder="Masukkan Password Lama" id="password_lama">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Password Baru</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" placeholder="Masukkan Password Baru" id="password_baru">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" placeholder="Masukkan Konfirmasi Password Baru" id="konfirmasi_password">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i> Ubah</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function ubahpassword(){
		var oldpass = $('#password_lama').val();
		var newpass = $('#password_baru').val();
		var confirmpass = $('#konfirmasi_password').val();

		if(oldpass.length > 0 && newpass.length > 0 && confirmpass.length > 0) 
		{
			$.ajax({
				url : "<?= base_url('profil/simpan_password') ?>",
				type : "POST",
				data:{
					password_lama: oldpass,
					password_baru: newpass,
					konfirmasi_password: confirmpass,
				},
				success:function(result)
				{
					var hasil = JSON.parse(result);
					swal_show(hasil);
					setTimeout("window.open(self.location, '_self');", 1500);
				},
			});
		}
		else swal_alert("Peringatan", "Silahkan lengkapi data!", "warning");
	}
</script>