<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Member</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Nama Member" id="nama_member">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-9">
            <textarea type="text" class="form-control" placeholder="Alamat" id="alamat"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" placeholder="Email" id="email">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">No. Telp</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="No. Telp" id="no_telp">
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
        <input type="hidden" id="id_member_ubah">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Member</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Nama Member" id="nama_member_ubah">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-9">
            <textarea type="text" class="form-control" placeholder="Alamat" id="alamat_ubah"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Email</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" placeholder="Email" id="email_ubah">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">No. Telp</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="No. Telp" id="no_telp_ubah">
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
    var nama = $('#nama_member').val();
    var alamat = $('#alamat').val();
    var email = $('#email').val();
    var notelp = $('#no_telp').val();

    if(nama.length > 0 && alamat.length > 0 && email.length > 0 && notelp.length > 0)
    {
      $.ajax({
        url : "<?= base_url('member/save') ?>",
        type : "POST",
        data:{
          nama_member: nama,
          alamat: alamat,
          email: email,
          no_telp: notelp,
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
    var idmember = $('#id_member_ubah').val();
    var nama = $('#nama_member_ubah').val();
    var alamat = $('#alamat_ubah').val();
    var email = $('#email_ubah').val();
    var notelp = $('#no_telp_ubah').val();

    if(nama.length > 0 && alamat.length > 0 && email.length > 0 && notelp.length > 0)
    {
      $.ajax({
        url : "<?= base_url('member/update') ?>",
        type : "POST",
        data:{
          id_member: idmember,
          nama_member: nama,
          alamat: alamat,
          email: email,
          no_telp: notelp,
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