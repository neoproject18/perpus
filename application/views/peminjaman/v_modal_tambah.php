<div class="modal fade" id="modal-member" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Data Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table align-items-center table-flush" id="dataTable">
          <thead class="thead-light">
            <tr>
              <th>NO</th>
              <th>NO. MEMBER</th>
              <th>NAMA</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($list_member as $value): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $value->id_member ?></td>
              <td><?= $value->nama_member ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="modal-buku" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Data Buku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table align-items-center table-flush" id="dataTable2">
          <thead class="thead-light">
            <tr>
              <th>ID</th>
              <th>JUDUL</th>
              <th>PENULIS</th>
              <th>PENERBIT / TAHUN</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($list_buku as $value): ?>
            <tr>
              <td><?= $value->id_buku ?></td>
              <td><?= $value->judul_buku ?></td>
              <td><?= $value->penulis ?></td>
              <td><?= $value->penerbit . ' / ' . $value->tahun_terbit ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><span class="fa fa-times"></span> Close</button>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    var table_member = $('#dataTable').DataTable();
    var table_buku = $('#dataTable2').DataTable();

    $('#dataTable tbody').on('click', 'tr', function () {
      var data_member = table_member.row( this ).data();
      document.getElementById("id_member").value = data_member[1];
      document.getElementById("nama_member").value = data_member[2];
      $('#modal-member').modal('hide');
    });

    $('#dataTable2 tbody').on('click', 'tr', function () {
      var data_buku = table_buku.row( this ).data();
      document.getElementById("id_buku").value = data_buku[0];
      document.getElementById("judul_buku").value = data_buku[1];
      document.getElementById("penulis").value = data_buku[2];
      document.getElementById("penerbit_tahun").value = data_buku[3];
      $('#modal-buku').modal('hide');
    });
  });
</script>