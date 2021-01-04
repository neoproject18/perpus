<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Buku</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Data Master</a></li>
      <li class="breadcrumb-item">Data Buku</li>
    </ol>
  </div>

  <div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">List Buku</h6>
          <div class="btn-group">
            <a href="<?= base_url('buku/tambah') ?>" class="m-0 float-right btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i> Tambah</a>
            <button class="m-0 float-right btn btn-success btn-sm" data-toggle="modal" data-target="#modal-import"><i class="fa fa-upload"></i> Import</button>
          </div>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>NO</th>
                <th>JUDUL</th>
                <th>TAHUN TERBIT</th>
                <th>PENERBIT</th>
                <th>PENULIS</th>
                <th>KATEGORI</th>
                <th>JUMLAH</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach($listdata as $value): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $value->judul_buku ?></td>
                <td><?= $value->tahun_terbit ?></td>
                <td><?= $value->penerbit ?></td>
                <td><?= $value->penulis ?></td>
                <td><?= $value->nama_kategori ?></td>
                <td><?= $value->jumlah ?></td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-cogs"></span>
                    </button>
                    <div class="dropdown-menu">
                      <a type="button" href="<?= base_url('buku/edit/' . $value->id_buku) ?>" class="dropdown-item"><span class="fas fa-edit"></span> Edit</a>
                      <button type="button" onclick="delete_buku('<?= $value->id_buku ?>','<?= $value->judul_buku ?>')" class="dropdown-item"><span class="fas fa-trash"></span> Hapus</button>
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
<?php $this->load->view('buku/v_modal'); ?>

<script type="text/javascript">
  function delete_buku(id_buku, judul_buku){
    swal({
      title: "Konfirmasi",
      text: "Ingin menghapus buku: " + judul_buku + "?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((submit) => {
      if (submit) {
        $.ajax({
          url:"<?= base_url('buku/delete/') ?>" + id_buku,
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