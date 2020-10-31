<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Buku</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="">Data Master</a></li>
      <li class="breadcrumb-item">Data Buku</li>
    </ol>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Buku</h6>
        </div>
        <div class="card-body">
          <form action="<?= base_url('buku/simpan') ?>" method="post">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Judu Buku</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Judul Buku" name="judul">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Penulis</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Penulis" name="penulis">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Penerbit</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" placeholder="Penerbit" name="penerbit">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tahun Terbit</label>
              <div class="col-sm-2">
                <input type="number" class="form-control" placeholder="Tahun Terbit" value="<?= date('Y') ?>"name="tahun">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kategori</label>
              <div class="col-sm-9">
                <select type="text" class="form-control" placeholder="Kategori" name="id_kategori">
                  <option value="">Pilih Kategori</option>
                  <?php foreach($list_kategori as $value): ?>
                    <option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
                  <?php endforeach; ?>
                </select>
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