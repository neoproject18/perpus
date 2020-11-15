<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">User</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Nama User" id="nama_user">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Username</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Username" id="username">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Role</label>
          <div class="col-sm-9">
            <select type="text" class="form-control" placeholder="Role" id="id_role">
              <option value="">Pilih Role</option>
              <?php foreach($list_role as $value): ?>
                <option value="<?= $value->id_role ?>"><?= $value->nama_role ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button onclick="submit_add();" class="btn btn-primary btn-sm"><span class="fa fa-check-circle"></span> Simpan</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Ubah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id_user_ubah">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">User</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Nama User" id="nama_user_ubah">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Username</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Username" id="username_ubah">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Role</label>
          <div class="col-sm-9">
            <select type="text" class="form-control" placeholder="Role" id="id_role_ubah">
              <option value="">Pilih Role</option>
              <?php foreach($list_role as $value): ?>
                <option value="<?= $value->id_role ?>"><?= $value->nama_role ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button onclick="submit_update();" class="btn btn-primary btn-sm"><span class="fa fa-check-circle"></span> Simpan</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  function submit_add(){
    var nama = $('#nama_user').val();
    var user_name = $('#username').val();
    var idrole = $('#id_role').val();

    if(nama.length > 0 || user_name.length > 0 || idrole.length > 0)
    {
      $.ajax({
        url : "<?= base_url('user/save') ?>",
        type : "POST",
        data:{
          nama_user: nama,
          username: user_name,
          id_role: idrole,
        },
        success:function(result)
        {
          var hasil = JSON.parse(result);
          swal_show(hasil);

          if(hasil['status_code'] == 200)
            setTimeout("window.open(self.location, '_self');", 1500);
        },
      });
    }
    else swal_alert("Peringatan", "Silahkan lengkapi data!", "warning");
  }

  function submit_update(){
    var iduser = $('#id_user_ubah').val();
    var nama = $('#nama_user_ubah').val();
    var user_name = $('#username_ubah').val();
    var idrole = $('#id_role_ubah').val();

    if(nama.length > 0 || user_name.length > 0 || idrole.length > 0)
    {
      $.ajax({
        url : "<?= base_url('user/update') ?>",
        type : "POST",
        data:{
          id_user: iduser,
          nama_user: nama,
          username: user_name,
          id_role: idrole,
        },
        success:function(result)
        {
          var hasil = JSON.parse(result);
          swal_show(hasil);

          if(hasil['status_code'] == 200)
            setTimeout("window.open(self.location, '_self');", 1500);
        },
      });
    }
    else swal_alert("Peringatan", "Silahkan lengkapi data!", "warning");
  }
</script>