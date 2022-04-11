<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Yasir Islamic School &dash; <?= $title ?></title>

</head>

<body>
  <div id="pre-header">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center">
        <img src="<?= base_url('assets/images/cropped-logo.png') ?>" id="logo" alt="Logo Yasir">
      </div>
    </div>
  </div>


  <nav class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="mx-auto">
        <ul class="navbar-nav">
          <li class="nav-item <?= $title == "Home" ? 'active' : '' ?>">
            <a class="nav-link mx-4" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item <?= $title == "Profile" ? 'active' : '' ?>">
            <a class="nav-link mx-4" href="<?= base_url('profile') ?>">Profil</a>
          </li>
          <li class="nav-item <?= $title == "About" ? 'active' : '' ?>">
            <a class="nav-link mx-4" href="<?= base_url('about') ?>">Tentang</a>
          </li>
          <li class="nav-item <?= $title == "Registration" ? 'active' : '' ?>">
            <a class="nav-link mx-4" href="<?= base_url('registration') ?>">Registrasi</a>
          </li>
          <li class="nav-item <?= $title == "Login" ? 'active' : '' ?>">
            <a class="nav-link mx-4" href="<?= base_url('login') ?>">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- <hr> -->

  <?= view('landing/content') ?>

  <footer>
    <p>&copy; 2021 &dash; Yasir Islamic School</p>
  </footer>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".message-alert").fadeTo(4000, 500).slideUp(500, function() {
        $(".message-alert").slideUp(500);
      });
    });
  </script>

</body>

</html>