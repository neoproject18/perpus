<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Laporan</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Data Laporan</a></li>
      <li class="breadcrumb-item">List</li>
    </ol>
  </div>

  <div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Laporan Bulanan</h6>
        </div>
        <div class="table-responsive p-3">
          <!-- Isi Body -->
          <div class="form-group row">
            <label class="col-sm-1 col-form-label">Tahun</label>
            <div class="col-sm-2">
              <input type="number" class="form-control form-control-sm" id="tahun" value="<?= date('Y') ?>" title="Tahun">
            </div>
          </div>
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th>NO</th>
                <th>BULAN</th>
                <th>MEMBER BARU</th>
                <th>PEMINJAMAN</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($list_laporan as $value): ?>
                <tr>
                  <td><?= $value->id_bulan ?></td>
                  <td><?= $value->bulan ?></td>
                  <td><?= $value->jml_member ?></td>
                  <td><?= $value->jml_peminjaman ?></td>
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
  $('#tahun').change(function(e) {
    var tahun = document.getElementById("tahun").value;
    window.location.href = "<?= base_url('laporan/filter/') ?>" + tahun;
  });

  $(document).ready(function(){
    var filter = "<?= $this->uri->segment(3) ?>";
    if(filter != "")
    {
      document.getElementById("tahun").value = "<?= $this->uri->segment(3) ?>";
    }
  });
</script>