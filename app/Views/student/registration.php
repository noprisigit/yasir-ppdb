<?php if ($student->updated_at <> $student->created_at) : ?>
  <div class="row">
    <div class="col-xs-12">
      <table class="table table-striped table-bordered">
        <tbody>
          <tr>
            <td width="15%">Nama Calon Siswa</td>
            <td width="1%">:</td>
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
        </tbody>
      </table>
      <form action="<?= base_url('student/registration/process') ?>" method="POST" class="form-horizontal" role="form">
        <div class="widget-box widget-color-green">
          <div class="widget-header">
            <h4 class="widget-title">Data Pendaftaran</h4>

            <span class="widget-toolbar">
              <a href="#" data-action="collapse">
                <i class="ace-icon fa fa-chevron-up"></i>
              </a>
            </span>
          </div>

          <div class="widget-body">
            <div class="widget-main">
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> AKM Siswa <em><strong>(Nilai Seperti NEM)</strong></em> <span class="text-danger">*</span> </label>
                <div class="col-sm-8">
                  <input type="text" name="nem" class="form-control">
                  <?php if ($validation->hasError('nem')) : ?>
                    <small class="text-danger"><?= $validation->getError('nem') ?></small>
                  <?php endif; ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Asal Sekolah <span class="text-danger">*</span> </label>
                <div class="col-sm-8">
                  <input type="text" name="asal_sekolah" class="form-control">
                  <?php if ($validation->hasError('asal_sekolah')) : ?>
                    <small class="text-danger"><?= $validation->getError('asal_sekolah') ?></small>
                  <?php endif; ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Prestasi </label>
                <div class="col-sm-8">
                  <input type="text" name="prestasi" class="form-control">
                  <?php if ($validation->hasError('prestasi')) : ?>
                    <small class="text-danger"><?= $validation->getError('prestasi') ?></small>
                  <?php endif; ?>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Catatan Info Pendidikan Sebelumnya</label>
                <div class="col-sm-8">
                  <input type="text" name="catatan" class="form-control">
                  <?php if ($validation->hasError('catatan')) : ?>
                    <small class="text-danger"><?= $validation->getError('catatan') ?></small>
                  <?php endif; ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <button type="submit" class="btn btn-primary">Daftar</button>
                  <a href="<?= base_url('student/profile') ?>" class="btn btn-danger">Batal</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
<?php else : ?>
  <div class="alert alert-block alert-warning">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>

    <i class="ace-icon fa fa-info yellow"></i>
    Anda belum melakukan perubahan profil. Silahkan melakukan perubahan data anda terlebih dahulu pada menu Profil.
  </div>
<?php endif; ?>