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
  <div class="col-xs-12">
    <div class="widget-box">
      <div class="widget-header widget-header-flat" style="background-color: #008e47;">
        <h5 class="widget-title bigger lighter" style="color: #fff;">
          <i class="ace-icon fa fa-table"></i>
          Data Pendaftaran
        </h5>
      </div>

      <div class="widget-body">
        <div class="widget-main">
          <table width="100%">
            <tbody>
              <tr>
                <th width="15%"><label>IDPendaftaran</label></th>
                <th width="1%">:</th>
                <td colspan="2"><b><?= $student->unique_id ?></b></td>
              </tr>
              <tr>
                <th width="15%"><label>Nama Calon Siswa</label></th>
                <th width="1%">:</th>
                <td colspan="2"><?= $student->nama ?></td>
              </tr>
              <tr>
                <th width="15%"><label>Asal Sekolah</label></th>
                <th width="1%">:</th>
                <td colspan="2"><?= $student->asal_sekolah ?></td>
              </tr>
              <tr>
                <th width="15%"><label>NEM</label></th>
                <th width="1%">:</th>
                <td colspan="2"><?= $student->nem ?></td>
              </tr>
              <tr>
                <th width="15%"><label>Prestasi</label></th>
                <th width="1%">:</th>
                <td colspan="2"><?= $student->prestasi ?></td>
              </tr>
              <tr>
                <th width="15%"><label>Info Pendidikan Sebelumnya</label></th>
                <th width="1%">:</th>
                <td colspan="2"><?= $student->catatan ?></td>
              </tr>
              <tr>
                <th width="15%"><label>Status Pendaftaran</label></th>
                <th width="1%">:</th>
                <td colspan="2">
                  <?php if ($student->status == "Sedang Diproses") : ?>
                    <span class="label label-lg label-warning arrowed-right"><?= $student->status ?></span>
                  <?php elseif ($student->status == "Lulus") : ?>
                    <span class="label label-lg label-success arrowed-right"><?= $student->status ?></span>
                  <?php else : ?>
                    <span class="label label-lg label-danger arrowed-right"><?= $student->status ?></span>
                  <?php endif; ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <hr>
    <form action="<?= base_url('student/berkas/reupload') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal" role="form">
      <div class="widget-box widget-color-green">
        <div class="widget-header">
          <h4 class="widget-title">Data Berkas</h4>

          <span class="widget-toolbar">
            <a href="#" data-action="collapse">
              <i class="ace-icon fa fa-chevron-up"></i>
            </a>
          </span>
        </div>

        <div class="widget-body widget-color-green">
          <div class="widget-main">
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Jenis Berkas  <span class="text-danger">*</span> </label>
              <div class="col-sm-8">
                <input type="hidden" name="id" value="<?= $berkas->id ?>">
                <input type="hidden" name="key" value="<?= md5($berkas->id) ?>">
                <input type="text" name="jenis_berkas" class="form-control" value="<?= $berkas->jenis_berkas ?>" readonly>
                <?php if ($validation->hasError('jenis_berkas')) : ?>
                  <small class="text-danger"><?= $validation->getError('jenis_berkas') ?></small>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Upload Berkas / Dokumen <span class="text-danger">*</span> </label>
              <div class="col-sm-8">
                <input type="file" name="dokumen" accept="image/*" class="form-control" required>
                <?php if ($validation->hasError('dokumen')) : ?>
                  <small class="text-danger"><?= $validation->getError('dokumen') ?></small>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Deskripsi Berkas </label>
              <div class="col-sm-8">
                <input type="text" name="deskripsi" class="form-control" value="<?= $berkas->deskripsi_berkas ?>">
                <?php if ($validation->hasError('deskripsi')) : ?>
                  <small class="text-danger"><?= $validation->getError('deskripsi') ?></small>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Catatan</label>
              <div class="col-sm-8">
                <input type="text" name="catatan" class="form-control" value="<?= $berkas->catatan ?>">
                <?php if ($validation->hasError('catatan')) : ?>
                  <small class="text-danger"><?= $validation->getError('catatan') ?></small>
                <?php endif; ?>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2"></div>
              <div class="col-sm-8">
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="<?= base_url('student/berkas') ?>" class="btn btn-danger">Batal</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>