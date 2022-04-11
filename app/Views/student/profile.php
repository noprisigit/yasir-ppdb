<?php if ($student->created_at == $student->updated_at) : ?>
  <div class="alert alert-block alert-warning message-alert">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>

    <i class="ace-icon fa fa-info green"></i>
    Silahkan lengkapi data diri anda dengan data yang valid.
  </div>
<?php endif; ?>

<?php if (session()->getFlashdata('message')) : ?>
  <div class="alert alert-block alert-success message-alert">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>

    <i class="ace-icon fa fa-check green"></i>
    <?= session()->getFlashdata('message') ?>.
  </div>
<?php endif; ?>

<div class="row">
  <div class="col-xs-3">
    <span class="profile-picture">
      <img src="<?= base_url('assets/images/avatars/' . $student->image) ?>" width="100%" alt="avatar" class="img-responsive">
      <form action="<?= base_url('student/change-avatar') ?>" method="POST" enctype="multipart/form-data">
        <div style="margin-top: 20px;">
          <label for="form-field-8"><strong>Update Avatar</strong></label>

          <div class="input-group">
            <span class="input-group-addon">
              <i class="ace-icon fa fa-user"></i>
            </span>

            <input type="file" name="avatar" accept="image/*" class="form-control">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-purple btn-sm">
                Upload
              </button>
            </span>
          </div>
        </div>
      </form>
    </span>
  </div>
  <div class="col-xs-9">
    <table class="table table-striped table-bordered">
      <tbody>
        <tr>
          <td width="20%">ID</td>
          <td width="1%">:</td>
          <td><strong><?= $student->unique_id ?></strong></td>
        </tr>
        <tr>
          <td>Nama Calon Siswa</td>
          <td>:</td>
          <td><?= $student->nama ?></td>
        </tr>
        <tr>
          <td>Pendidikan Tingkat</td>
          <td>:</td>
          <td><?= $student->jenjang ?></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>:</td>
          <td><?= $student->jenis_kelamin ?></td>
        </tr>
        <tr>
          <td>NISN</td>
          <td>:</td>
          <td><?= $student->nisn ?></td>
        </tr>
        <tr>
          <td>Kewarganegaraan</td>
          <td>:</td>
          <td><?= $student->kewarganegaraan ?></td>
        </tr>
        <tr>
          <td>NIK</td>
          <td>:</td>
          <td><?= $student->nik ?></td>
        </tr>
        <tr>
          <td>Tempat Lahir</td>
          <td>:</td>
          <td><?= $student->tempat_lahir ?></td>
        </tr>
        <tr>
          <td>Tanggal Lahir</td>
          <td>:</td>
          <td><?= $student->tanggal_lahir ?></td>
        </tr>
        <tr>
          <td>No Registrasi Akta Lahir</td>
          <td>:</td>
          <td><?= $student->no_registrasi_akta_lahir  ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td><?= $student->alamat ?></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <a href="<?= base_url('student/profile/edit') ?>" class="btn btn-primary">Update Profil</a>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>