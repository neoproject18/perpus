<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Peminjaman</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Data Peminjaman</a></li>
      <li class="breadcrumb-item">Tambah</li>
    </ol>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Ubah Peminjaman</h6>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Member</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="id_member" disabled="" value="<?= $data_pinjam->id_member ?>">
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="nama_member" disabled="" value="<?= $data_pinjam->nama_member ?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Buku</label>
            <div class="col-sm-7">
              <input type="hidden" id="id_buku" value="<?= $data_pinjam->id_buku ?>">
              <input type="text" class="form-control" id="judul_buku" disabled="" value="<?= $data_pinjam->judul_buku ?>">
            </div>
            <div class="col-sm-2">
              <button class="btn btn-primary" data-toggle="modal" data-target="#modal-buku"><i class="fa fa-search"></i> Pilih</button>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Penulis</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="penulis" disabled="" value="<?= $data_pinjam->penulis ?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Penerbit / Tahun</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="penerbit_tahun" disabled="" value="<?= $data_pinjam->penerbit . ' / ' . $data_pinjam->tahun_terbit ?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Status</label>
            <div class="col-sm-3">
              <select type="text" class="form-control" id="status">
                <option value="Pinjam" <?php if($data_pinjam->status_pinjam == "Pinjam") echo "seletcted"; ?>>Pinjam</option>
                <option value="Kembali" <?= $data_pinjam->status_pinjam == "Kembali" ? "selected" : "" ?>>Kembali</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button onclick="submit_pinjam();" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i> Simpan</button>
              <button onclick="window.history.back()" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('peminjaman/v_modal_tambah'); ?>

<script type="text/javascript">
  function submit_pinjam(){
    var idbuku = $('#id_buku').val();
    var status = $('#status').val();

    swal({
      title: "Konfirmasi",
      text: "Ingin mengubah peminjaman buku?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((submit) => {
      if (submit) {
        if(idbuku.length > 0) 
        {
          $.ajax({
            url : "<?= base_url('peminjaman/ubah_peminjaman/' . $data_pinjam->id_peminjaman) ?>",
            type : "POST",
            data:{
              id_buku: idbuku,
              status: status,
            },
            success:function(result)
            {
              var hasil = JSON.parse(result);
              swal_show(hasil);

              if(hasil['status_code'] == 200)
                setTimeout("window.history.back()", 1500);
            },
          });
        }
        else swal_alert("Peringatan", "Silahkan lengkapi data!", "warning");
      }
      else info.revert();
    });

  }
</script>