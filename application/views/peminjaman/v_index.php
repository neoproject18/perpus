<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Peminjaman</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Data Peminjaman</a></li>
      <li class="breadcrumb-item">List</li>
    </ol>
  </div>

  <div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">List Peminjaman</h6>
          <a href="<?= base_url('peminjaman/tambah') ?>" class="m-0 float-right btn btn-primary btn-sm">
            <i class="fa fa-plus-circle"></i> Tambah
          </a>
        </div>
        <div class="table-responsive p-3">
          <div class="form-group row">
            <label class="col-sm-1 col-form-label">Filter</label>
            <div class="col-sm-3">
              <select type="text" class="form-control form-control-sm" id="status">
                <option value="semua">Semua</option>
                <option value="pinjam">Pinjam</option>
                <option value="kembali">Kembali</option>
              </select>
            </div>
          </div>
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>NO</th>
                <th>ID PINJAM</th>
                <th>MEMBER</th>
                <th>JUDUL BUKU</th>
                <th>TGL PINJAM</th>
                <th>TGL KEMBALI</th>
                <th>STATUS</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach($listdata as $value): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $value->id_peminjaman ?></td>
                <td><?= $value->nama_member ?></td>
                <td><?= $value->judul_buku ?></td>
                <td><?= $value->tgl_pinjam ?></td>
                <td><?= $value->tgl_kembali ?></td>
                <td><?= $value->status_pinjam ?></td>
                <td>
                  <div class="btn-group">
                    <a href="<?= base_url('peminjaman/ubah/' . $value->id_peminjaman) ?>" class="btn btn-success btn-sm" title="Edit"><span class="fas fa-edit"></span></a>
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

<script type="text/javascript">
  $('#status').change(function(e){
    var status = document.getElementById("status").value;
    window.location.href = "<?= base_url('peminjaman/filter/') ?>" + status;
  });

  $(document).ready(function(){
    var status = "<?= $this->uri->segment(3) ?>";
    if(status != "")
      document.getElementById("status").value = "<?= $this->uri->segment(3) ?>";
  });
</script>