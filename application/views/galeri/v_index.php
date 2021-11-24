<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Galeri</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Data Master</a></li>
      <li class="breadcrumb-item">Data Galeri</li>
    </ol>
  </div>

  <div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">List Galeri</h6>
          <div class="btn-group">
            <button class="m-0 float-right btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-upload"><i class="fa fa-plus-circle"></i> Tambah</button>
          </div>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>NO</th>
                <th>GAMBAR</th>
                <th>NAMA FILE</th>
                <th>TIPE FILE</th>
                <th>SIZE</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach($listdata as $value): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td>
                  <?php if($value->path != null): ?>
                    <img src="<?= base_url($value->path) ?>" width="100">
                  <?php endif ?>
                </td>
                <td><?= $value->filename ?></td>
                <td><?= $value->type ?></td>
                <td><?= $value->size ?> byte</td>
                <td>
                  <button onclick="delete_buku('<?= $value->id_galeri ?>', '<?= $value->filename ?>')" class="btn btn-danger btn-sm"><span class="fas fa-trash"></span> Hapus</button>
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

<div class="modal fade" id="modal-upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Upload Galeri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formUpload" data-parsley-validate class="form-horizontal form-label-left">
        <div class="modal-body">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">File Galeri</label>
            <div class="col-sm-9">
              <input type="file" class="form-control" name="galeri[]" multiple="true" accept="image/*">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-sm"><span class="fa fa-upload"></span> Upload</button>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('#formUpload').submit(function(e){
    e.preventDefault(); 
    $.ajax({
      url:'<?= base_url('galeri/savedata') ?>',
      type:"post",
      data:new FormData(this),
      processData:false,
      contentType:false,
      cache:false,
      async:false,
      success:function(result)
      {
        var hasil = JSON.parse(result);
        swal_show(hasil);

        if(hasil['status_code'] == 200)
          setTimeout("window.open(self.location, '_self');", 1500);
      },
    });
  });

  function delete_buku(id, nama){
    swal({
      title: "Konfirmasi",
      text: "Ingin menghapus galeri: " + nama + "?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((submit) => {
      if (submit) {
        $.ajax({
          url:"<?= base_url('galeri/deletedata/') ?>" + id,
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
</script>