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
  <div class="row">
    <div class="col-12 col-md-6 col-lg-6">
      <div class="line"></div>
      <h3 class="mb-5">Hubungi Kami</h3>
      <div id="map">
        <!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d787.0773336115469!2d106.67707041539924!3d-6.181434102347699!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f9aab3085e49%3A0x385a388b5ad01a27!2sSDIT%20YASIR%20%2F%20RA%2FTK%20YASIR!5e0!3m2!1sid!2sid!4v1628781484713!5m2!1sid!2sid" width="100%" height="570px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6" id="col-registration">
      <div class="line"></div>
      <h3 class="mb-5">Pendaftaran Siswa Baru</h3>
      <form action="<?= base_url('registration/store') ?>" method="POST" role="form">
        <div class="form-group">
          <label><strong>Pendaftaran Tingkat</strong><span class="text-danger">*</span></label>
          <select name="jenjang" class="form-control">
            <option selected disabled>Pendaftaran Tingkat</option>
            <option value="Raudatul Athfal">Raudatul Athfal</option>
            <option value="SDIT">SDIT</option>
            <option value="SMPIT">SMPIT</option>
          </select>
          <?php if ($validation->hasError('jenjang')) : ?>
            <small class="text-danger"><?= $validation->getError('jenjang') ?></small>
          <?php endif; ?>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label><strong>Nama Lengkap</strong><span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="full_name" placeholder="Nama Lengkap" value="<?= old('full_name') ?>">
              <?php if ($validation->hasError('full_name')) : ?>
                <small class="text-danger"><?= $validation->getError('full_name') ?></small>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label><strong>Tanggal Lahir</strong><span class="text-danger">*</span></label>
              <input type="date" class="form-control" name="dob" placeholder="Tanggal Lahir" value="<?= old('dob') ?>">
              <?php if ($validation->hasError('dob')) : ?>
                <small class="text-danger"><?= $validation->getError('dob') ?></small>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label><strong>NIK</strong><span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="nik" placeholder="NIK" value="<?= old('nik') ?>">
          <?php if ($validation->hasError('nik')) : ?>
            <small class="text-danger"><?= $validation->getError('nik') ?></small>
          <?php endif; ?>
        </div>
        <div class="form-group">
          <label><strong>NISN</strong></label>
          <input type="text" class="form-control" name="nisn" placeholder="NISN" value="<?= old('nisn') ?>">
        </div>
        <div class="form-group">
          <label><strong>Username</strong><span class="text-danger">*</span></label>
          <input type="text" class="form-control" name="username" placeholder="Username" value="<?= old('username') ?>">
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
        <div class="form-group">
          <label><strong>Konfirmasi Password</strong><span class="text-danger">*</span></label>
          <input type="password" class="form-control" name="confirm_password" placeholder="Konfirmasi Password">
          <?php if ($validation->hasError('confirm_password')) : ?>
            <small class="text-danger"><?= $validation->getError('confirm_password') ?></small>
          <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-success">REGISTRASI</button>
      </form>
    </div>
  </div>
</div>