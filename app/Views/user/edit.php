<div class="row">
  <div class="col-xs-12">
    <form class="form-horizontal" action="<?= base_url('user/update') ?>" method="POST" role="form">
      <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Nama Pengguna </label>

        <div class="col-sm-9">
          <input type="hidden" name="id" value="<?= $user->id ?>">
          <input type="hidden" name="key" value="<?= md5($user->id) ?>">
          <input type="text" name="name" placeholder="Nama Pengguna" class="form-control" value="<?= $user->name ?>">
          <?php if ($validation->hasError('name')) : ?>
            <small class="text-danger"><?= $validation->getError('name') ?></small>
          <?php endif; ?>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Username </label>

        <div class="col-sm-9">
          <input type="text" name="username" placeholder="Username" class="form-control" value="<?= $user->username ?>" readonly>
          <?php if ($validation->hasError('username')) : ?>
            <small class="text-danger"><?= $validation->getError('username') ?></small>
          <?php endif; ?>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Email </label>

        <div class="col-sm-9">
          <input type="text" name="email" placeholder="Email" class="form-control" value="<?= $user->email ?>">
          <?php if ($validation->hasError('email')) : ?>
            <small class="text-danger"><?= $validation->getError('email') ?></small>
          <?php endif; ?>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Telepon </label>

        <div class="col-sm-9">
          <input type="text" name="phone_number" placeholder="Telepon" class="form-control" value="<?= $user->phone_number ?>">
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
              <input name="level" type="radio" value="Administrator" class="ace" <?= $user->level == "Administrator" ? "checked" : "" ?>>
              <span class="lbl">Administrator</span>
            </label>
            <label>
              <input name="level" type="radio" value="Petugas PSB" class="ace" <?= $user->level == "Petugas PSB" ? "checked" : "" ?>>
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
              <input name="status" type="radio" value="Aktif" class="ace" <?= $user->status == "Aktif" ? "checked" : "" ?>>
              <span class="lbl">Aktif</span>
            </label>
            <label>
              <input name="status" type="radio" value="Tidak Aktif" class="ace" <?= $user->status == "Tidak Aktif" ? "checked" : "" ?>>
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
          <input type="text" name="description" placeholder="Keterangan" class="form-control" value="<?= $user->description ?>">

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