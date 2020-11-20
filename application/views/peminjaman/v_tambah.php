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
          <form onsubmit="submit_buku(); return false;">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Member</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="id_member" disabled="">
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="nama_member" disabled="">
              </div>
              <div class="col-sm-2">
                <button class="btn btn-primary"><i class="fa fa-search"></i> Pilih</button>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Buku</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" id="kode_buku" disabled="">
              </div>
              <div class="col-sm-4">
                <input type="text" class="form-control" id="judul_buku" disabled="">
              </div>
              <div class="col-sm-2">
                <button class="btn btn-primary"><i class="fa fa-search"></i> Pilih</button>
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
              <div class="col-sm-3">
                <input type="text" class="form-control" id="penulis" disabled="">
              </div>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="penulis" disabled="">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle"></i> Simpan</button>
                <button type="reset" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>