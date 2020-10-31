<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Kategori</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Nama Kategori" id="nama_kategori">
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
        <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Kategori</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id_kategori_ubah">
        <div class="form-group row">
          <label class="col-sm-3 col-form-label">Kategori</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" placeholder="Nama Kategori" id="nama_kategori_ubah">
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
    var nama_kategori = $('#nama_kategori').val();

    if(nama_kategori.length > 0) 
    {
      $.ajax({
        url : "<?= base_url('kategori/save') ?>",
        type : "POST",
        data:{
          nama_kategori: nama_kategori,
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
  }

  function submit_update(){
    var id_kategori = $('#id_kategori_ubah').val();
    var nama_kategori = $('#nama_kategori_ubah').val();

    if(nama_kategori.length > 0) 
    {
      $.ajax({
        url : "<?= base_url('kategori/update') ?>",
        type : "POST",
        data:{
          id_kategori: id_kategori,
          nama_kategori: nama_kategori,
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
  }
</script>