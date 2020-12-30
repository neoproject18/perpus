<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
      <img src="<?= base_url('uploads/logo.png') ?>">
    </div>
    <div class="sidebar-brand-text mx-3">RuangAdmin</div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('') ?>">
      <i class="fas fa-fw fa-home"></i><span>Beranda</span>
    </a>
  </li>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">DATA MASTER</div>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('buku') ?>">
      <i class="fas fa-fw fa-book"></i>
      <span>Data Buku</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('kategori') ?>">
      <i class="fas fa-fw fa-bookmark"></i>
      <span>Data Kategori</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('member') ?>">
      <i class="fas fa-fw fa-users"></i>
      <span>Data Member</span>
    </a>
  </li>
  <?php if($userlogin[0]->id_role == 1): ?>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('user') ?>">
        <i class="fas fa-fw fa-user"></i>
        <span>Data User</span>
      </a>
    </li>
  <?php endif; ?>
  <hr class="sidebar-divider">
  <div class="sidebar-heading">PEMINJAMAN</div>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('peminjaman') ?>">
      <i class="fas fa-fw fa-folder-open"></i>
      <span>Peminjaman Buku</span>
    </a>
  </li>
  <?php if($userlogin[0]->id_role == 1): ?>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('laporan') ?>">
      <i class="fas fa-fw fa-file"></i>
      <span>Laporan</span>
    </a>
  </li>
  <?php endif; ?>
</ul>