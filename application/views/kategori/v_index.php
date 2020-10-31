<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Kategori</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Data Master</a></li>
      <li class="breadcrumb-item">Data Kategori</li>
    </ol>
  </div>

  <div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">List Kategori</h6>
          <button class="m-0 float-right btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-add">
            <i class="fa fa-plus-circle"></i> Tambah
          </button>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th width="10%">NO</th>
                <th width="40%">NAMA KATEGORI</th>
                <th width="50%">AKSI</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach($listdata as $value): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $value->nama_kategori ?></td>
                <td>
                  <div class="btn-group">
                    <button onclick="formubah('<?= $value->id_kategori ?>', '<?= $value->nama_kategori ?>')" class="btn btn-primary btn-sm"><span class="fas fa-edit"></span> Ubah</button>
                    <button onclick="delete_buku('<?= $value->id_kategori ?>', '<?= $value->nama_kategori ?>')" class="btn btn-danger btn-sm"><span class="fas fa-trash"></span> Hapus</button>
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
<?php $this->load->view('kategori/v_modal'); ?>

<script type="text/javascript">
  function formubah(idkategori, namakategori)
  {
    $('#id_kategori_ubah').val(idkategori);
    $('#nama_kategori_ubah').val(namakategori);
    $('#modal-edit').modal('show'); 
  }

  function delete_buku(id_buku, judul_buku){
    swal({
      title: "Konfirmasi",
      text: "Ingin menghapus kategori: " + judul_buku + "?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((submit) => {
      if (submit) {
        $.ajax({
          url:"<?= base_url('kategori/delete/') ?>" + id_buku,
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