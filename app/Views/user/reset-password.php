<div class="row">
  <div class="col-xs-12">
    <form class="form-horizontal" action="<?= base_url('user/reset-password') ?>" method="POST" role="form">
      <div class="form-group">
        <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Nama Pengguna </label>

        <div class="col-sm-9">
          <input type="hidden" name="id" value="<?= $user->id ?>">
          <input type="hidden" name="key" value="<?= md5($user->id) ?>">
          <input type="text" name="name" placeholder="Nama Pengguna" class="form-control" value="<?= $user->name ?>" readonly>
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