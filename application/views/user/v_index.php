<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data User</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Data Master</a></li>
      <li class="breadcrumb-item">Data User</li>
    </ol>
  </div>

  <div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">List User</h6>
          <button class="m-0 float-right btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-add">
            <i class="fa fa-plus-circle"></i> Tambah
          </button>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>NO</th>
                <th>NAMA USER</th>
                <th>USERNAME</th>
                <th>ROLE</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach($listdata as $value): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $value->nama_user ?></td>
                <td><?= $value->username ?></td>
                <td><?= $value->nama_role ?></td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-cogs"></span>
                    </button>
                    <div class="dropdown-menu">
                      <button onclick="formubah('<?= $value->id_user ?>', '<?= $value->nama_user ?>', '<?= $value->username ?>', '<?= $value->id_role ?>')" class="dropdown-item"><span class="fas fa-edit"></span> Edit</button>
                      <button type="button" onclick="delete_user('<?= $value->id_user ?>','<?= $value->nama_user ?>')" class="dropdown-item"><span class="fas fa-trash"></span> Hapus</button>
                      <button type="button" onclick="resetpassword('<?= $value->id_user ?>','<?= $value->nama_user ?>')" class="dropdown-item"><span class="fas fa-lock"></span> Reset Password</button>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
<?php $this->load->view('user/v_modal'); ?>

<script type="text/javascript">
  function formubah(iduser, namauser, username, idrole)
  {
    $('#id_user_ubah').val(iduser);
    $('#nama_user_ubah').val(namauser);
    $('#username_ubah').val(username);
    $('#id_role_ubah').val(idrole);
    $('#modal-edit').modal('show'); 
  }

  function delete_user(iduser, namauser){
    swal({
      title: "Konfirmasi",
      text: "Ingin menghapus user: " + namauser + "?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((submit) => {
      if (submit) {
        $.ajax({
          url:"<?= base_url('user/delete/') ?>" + iduser,
          type:"DELETE",
          success:function(result){
            var hasil = JSON.parse(result);
            swal_show(hasil);

            if(hasil['status_code'] == 200)
              setTimeout("window.open(self.location, '_self');", 1500);
          },
        });
      }
      else info.revert();
    });
  }

  function resetpassword(iduser, namauser){
    swal({
      title: "Konfirmasi",
      text: "Ingin reset password user: " + namauser + "?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((submit) => {
      if (submit) {
        $.ajax({
          url:"<?= base_url('user/resetpassword/') ?>" + iduser,
          type:"POST",
          success:function(result){
            var hasil = JSON.parse(result);
            swal_confirm_ok(hasil);
          },
        });
      }
      else info.revert();
    });
  }
</script>