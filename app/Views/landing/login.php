<hr>

<div class="container mt-3 mb-5">
  <?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-success alert-dismissible message-alert fade show mb-4 mt-4" role="alert">
      <strong>Congratulation!</strong> <?= session()->getFlashdata('message') ?>.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>
  <?php if (session()->getFlashdata('err_message')) : ?>
    <div class="alert alert-danger alert-dismissible message-alert fade show mb-4 mt-4" role="alert">
      <strong>Failed!</strong> <?= session()->getFlashdata('err_message') ?>.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>
  <div class="row">
    <div class="col-12 col-md-6 col-lg-6">
      <div class="line"></div>
      <h3 class="mb-5">Tut Wuri Handayani</h3>
      <div id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d787.0773336115469!2d106.67707041539924!3d-6.181434102347699!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f9aab3085e49%3A0x385a388b5ad01a27!2sSDIT%20YASIR%20%2F%20RA%2FTK%20YASIR!5e0!3m2!1sid!2sid!4v1628781484713!5m2!1sid!2sid" width="100%" height="570px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6" id="col-login">
      <div class="line"></div>
      <h3 class="mb-5">Validasi Otentikasi Akun</h3>
      <?php if (session()->getFlashdata('success_message')) : ?>
        <div class="alert alert-success alert-dismissible message-alert fade show mb-4 mt-4" role="alert">
          <strong>Great!</strong> <?= session()->getFlashdata('success_message') ?>.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php endif; ?>
      <form action="<?= base_url('login/process') ?>" method="POST" role="form">
        <div class="form-group">
          <label><strong>Username</strong><span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="username" placeholder="Username">
          <?php if ($validation->hasError('username')) : ?>
            <small class="text-danger"><?= $validation->getError('username') ?></small>
          <?php endif; ?>
        </div>
        <div class="form-group">
          <label><strong>Password</strong><span class="text-danger">*</span></label>
          <input type="password" class="form-control" name="password" placeholder="Password">
          <?php if ($validation->hasError('password')) : ?>
            <small class="text-danger"><?= $validation->getError('password') ?></small>
          <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-success btn-block">LOGIN</button>
      </form>
    </div>
  </div>
</div>