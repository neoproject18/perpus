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
          <h6 class="m-0 font-weight-bold text-primary">Peminjaman Baru</h6>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Member</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="id_member" disabled="">
            </div>
            <div class="col-sm-4">
              <input type="text" class="form-control" id="nama_member" disabled="">
            </div>
            <div class="col-sm-2">
              <button class="btn btn-primary" data-toggle="modal" data-target="#modal-member"><i class="fa fa-search"></i> Pilih</button>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Buku</label>
            <div class="col-sm-7">
              <input type="hidden" id="id_buku">
              <input type="text" class="form-control" id="judul_buku" disabled="">
            </div>
            <div class="col-sm-2">
              <button class="btn btn-primary" data-toggle="modal" data-target="#modal-buku"><i class="fa fa-search"></i> Pilih</button>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Penulis</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="penulis" disabled="">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Penerbit / Tahun</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="penerbit_tahun" disabled="">
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
    var idmember = $('#id_member').val();
    var idbuku = $('#id_buku').val();

    swal({
      title: "Konfirmasi",
      text: "Ingin menambahkan peminjaman buku?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((submit) => {
      if (submit) {
        if(idmember.length > 0 && idbuku.length > 0) 
        {
          $.ajax({
            url : "<?= base_url('peminjaman/simpan_peminjaman') ?>",
            type : "POST",
            data:{
              id_member: idmember,
              id_buku: idbuku,
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