<div class="row">
  <div class="col-xs-12">
    <form class="form-horizontal" action="<?= base_url('user/store') ?>" method="POST" role="form">
      <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Nama Pengguna </label>

        <div class="col-sm-9">
          <input type="text" name="name" placeholder="Nama Pengguna" class="form-control" value="<?= old('name') ?>">
          <?php if ($validation->hasError('name')) : ?>
            <small class="text-danger"><?= $validation->getError('name') ?></small>
          <?php endif; ?>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Username </label>

        <div class="col-sm-9">
          <input type="text" name="username" placeholder="Username" class="form-control" value="<?= old('username') ?>">
          <?php if ($validation->hasError('username')) : ?>
            <small class="text-danger"><?= $validation->getError('username') ?></small>
          <?php endif; ?>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Password </label>

        <div class="col-sm-9">
          <input type="password" name="password" placeholder="Password" class="form-control" >
          <?php if ($validation->hasError('password')) : ?>
            <small class="text-danger"><?= $validation->getError('password') ?></small>
          <?php endif; ?>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Konfirmasi Password </label>

        <div class="col-sm-9">
          <input type="password" name="confirm_password" placeholder="Konfirmasi Password" class="form-control">
          <?php if ($validation->hasError('confirm_password')) : ?>
            <small class="text-danger"><?= $validation->getError('confirm_password') ?></small>
          <?php endif; ?>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Email </label>

        <div class="col-sm-9">
          <input type="text" name="email" placeholder="Email" class="form-control" value="<?= old('email') ?>">
          <?php if ($validation->hasError('email')) : ?>
            <small class="text-danger"><?= $validation->getError('email') ?></small>
          <?php endif; ?>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Telepon </label>

        <div class="col-sm-9">
          <input type="text" name="phone_number" placeholder="Telepon" class="form-control" value="<?= old('phone_number') ?>">
          <?php if ($validation->hasError('phone_number')) : ?>
            <small class="text-danger"><?= $validation->getError('phone_number') ?></small>
          <?php endif; ?>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Level </label>

        <div class="col-sm-9">
          <div class="radio">
            <label>
              <input name="level" type="radio" value="Administrator" class="ace" checked>
              <span class="lbl">Administrator</span>
            </label>
            <label>
              <input name="level" type="radio" value="Petugas PSB" class="ace">
              <span class="lbl">Petugas PSB</span>
            </label>
          </div>
          <?php if ($validation->hasError('level')) : ?>
            <small class="text-danger"><?= $validation->getError('level') ?></small>
          <?php endif; ?>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Status </label>

        <div class="col-sm-9">
          <div class="radio">
            <label>
              <input name="status" type="radio" value="Aktif" class="ace" checked>
              <span class="lbl">Aktif</span>
            </label>
            <label>
              <input name="status" type="radio" value="Tidak Aktif" class="ace">
              <span class="lbl">Tidak Aktif</span>
            </label>
          </div>
          <?php if ($validation->hasError('status')) : ?>
            <small class="text-danger"><?= $validation->getError('status') ?></small>
          <?php endif; ?>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Keterangan </label>

        <div class="col-sm-9">
          <input type="text" name="description" placeholder="Keterangan" class="form-control" value="<?= old('description') ?>">

        </div>
      </div>
      <div class="clearfix form-actions">
        <div class="col-sm-offset-2 col-sm-9">
          <button class="btn btn-info" type="submit">
            <i class="ace-icon fa fa-check bigger-110"></i>
            Submit
          </button>

          &nbsp; &nbsp; &nbsp;
          <button class="btn" type="reset">
            <i class="ace-icon fa fa-undo bigger-110"></i>
            Reset
          </button>
        </div>
      </div>
    </form>
  </div>
</div>