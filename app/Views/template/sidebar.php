<?php if (session()->get('status') == "Siswa") : ?>
  <li class="<?= $secTitle == 'Dashboard' ? 'active' : '' ?>">
    <a href="<?= base_url('student') ?>">
      <i class="menu-icon fa fa-tachometer"></i>
      <span class="menu-text"> Dashboard </span>
    </a>

    <b class="arrow"></b>
  </li>
  <li class="<?= $secTitle == 'Profil' ? 'active' : '' ?>">
    <a href="<?= base_url('student/profile') ?>">
      <i class="menu-icon fa fa-user"></i>
      <span class="menu-text"> Profil </span>
    </a>
    <b class="arrow"></b>
  </li>
  <li class="<?= $secTitle == 'Pendaftaran' ? 'active' : '' ?>">
    <a href="<?= base_url('student/registration') ?>">
      <i class="menu-icon fa fa-file"></i>
      <span class="menu-text"> Registrasi PSB </span>
    </a>
    <b class="arrow"></b>
  </li>
  <li class="<?= $secTitle == 'Pembayaran' ? 'active' : '' ?>">
    <a href="<?= base_url('student/payment') ?>">
      <i class="menu-icon fa fa-bookmark"></i>
      <span class="menu-text"> Pembayaran </span>
    </a>
    <b class="arrow"></b>
  </li>
  <li class="<?= $secTitle == 'Berkas' ? 'active' : '' ?>">
    <a href="<?= base_url('student/berkas') ?>">
      <i class="menu-icon fa fa-archive"></i>
      <span class="menu-text"> Berkas </span>
    </a>
    <b class="arrow"></b>
  </li>
<?php elseif (session()->get('status') == "Administrator" || session()->get('status') == "Petugas PSB") : ?>
  <li class="<?= $mainTitle == 'Home' ? 'active' : '' ?>">
    <a href="<?= base_url('dashboard') ?>">
      <i class="menu-icon fa fa-tachometer"></i>
      <span class="menu-text"> Dashboard </span>
    </a>

    <b class="arrow"></b>
  </li>
  <li class="<?= $mainTitle == 'User' ? 'active' : '' ?>">
    <a href="<?= base_url('user') ?>">
      <i class="menu-icon fa fa-users"></i>
      <span class="menu-text"> Pengguna </span>
    </a>

    <b class="arrow"></b>
  </li>

  <li class="<?= $mainTitle == 'Pembayaran' ? 'active' : '' ?>">
    <a href="<?= base_url('payment') ?>">
      <i class="menu-icon fa fa-bookmark"></i>
      <span class="menu-text"> Pembayaran </span>
    </a>
    <b class="arrow"></b>
  </li>

  <li class="<?= $mainTitle == 'Calon Siswa' ? 'active' : '' ?>">
    <a href="<?= base_url('calon-siswa') ?>">
      <i class="menu-icon fa fa-graduation-cap"></i>
      <span class="menu-text"> List Calon Siswa </span>
    </a>
    <b class="arrow"></b>
  </li>

  <li class="<?= $mainTitle == 'Pengumuman' ? 'active' : '' ?>">
    <a href="<?= base_url('pengumuman') ?>">
      <i class="menu-icon fa fa-bullhorn"></i>
      <span class="menu-text"> Info Kelulusan </span>
    </a>
    <b class="arrow"></b>
  </li>
<?php endif; ?>

<li class="">
  <a href="<?= base_url('logout') ?>">
    <i class="menu-icon fa fa-sign-out"></i>
    <span class="menu-text"> Logout</span>
  </a>
</li>