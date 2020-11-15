<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Member</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Data Master</a></li>
      <li class="breadcrumb-item">Data Member</li>
    </ol>
  </div>

  <div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">List Member</h6>
          <button class="m-0 float-right btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-add">
            <i class="fa fa-plus-circle"></i> Tambah
          </button>
        </div>
        <div class="table-responsive p-3">
          <table class="table align-items-center table-flush" id="dataTable">
            <thead class="thead-light">
              <tr>
                <th>NO</th>
                <th>NO. MEMBER</th>
                <th>NAMA</th>
                <th>ALAMAT</th>
                <th>EMAIL</th>
                <th>TELP</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach($listdata as $value): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $value->id_member ?></td>
                <td><?= $value->nama_member ?></td>
                <td><?= $value->alamat ?></td>
                <td><?= $value->email ?></td>
                <td><?= $value->no_telp ?></td>
                <td>
                  <div class="btn-group">
                    <!-- <a type="button" href="<?= base_url('member/detail/' . $value->id_member) ?>" class="dropdown-item"><span class="fas fa-info-circle"></span> Detail</a> -->
                    <button onclick="formubah('<?= $value->id_member ?>', '<?= $value->nama_member ?>', '<?= $value->alamat ?>', '<?= $value->email ?>', '<?= $value->no_telp ?>')" class="btn btn-success btn-sm" title="Edit"><span class="fas fa-edit"></span></button>
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
<?php $this->load->view('member/v_modal'); ?>

<script type="text/javascript">
  function formubah(idmember, namamember, alamat, email, notelp)
  {
    $('#id_member_ubah').val(idmember);
    $('#nama_member_ubah').val(namamember);
    $('#alamat_ubah').val(alamat);
    $('#email_ubah').val(email);
    $('#no_telp_ubah').val(notelp);
    $('#modal-edit').modal('show'); 
  }
</script>