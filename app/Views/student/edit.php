<div class="row">
  <div class="col-xs-12">
    <form action="<?= session()->get('status') == "Siswa" ? base_url('student/profile/update') : base_url('calon-siswa/update') ?>" method="POST" class="form-horizontal" role="form">
      <div class="widget-box widget-color-green">
        <div class="widget-header">
          <h4 class="widget-title">Data Pribadi</h4>

          <span class="widget-toolbar">
            <a href="#" data-action="collapse">
              <i class="ace-icon fa fa-chevron-up"></i>
            </a>
          </span>
        </div>

        <div class="widget-body">
          <div class="widget-main">
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Nama <span class="text-danger">*</span> </label>
              <div class="col-sm-8">
                <input type="hidden" name="id" value="<?= session()->get('id') ?>">
                <input type="hidden" name="key" value="<?= md5(session()->get('id')) ?>">
                <input type="text" name="nama" value="<?= $student->nama ?>" class="form-control">
                <?php if ($validation->hasError('nama')) : ?>
                  <small class="text-danger"><?= $validation->getError('nama') ?></small>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Pendaftaran Tingkat <span class="text-danger">*</span> </label>
              <div class="col-sm-8">
                <select name="jenjang" class="form-control">
                  <option selected disabled></option>
                  <option value="Raudatul Athfal">Raudatul Athfal</option>
                  <option value="SDIT">SDIT</option>
                  <option value="SMPIT">SMPIT</option>
                </select>
                <?php if ($validation->hasError('jenjang')) : ?>
                  <small class="text-danger"><?= $validation->getError('jenjang') ?></small>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Jenis Kelamin </label>
              <div class="col-sm-8">
                <div class="radio">
                  <label>
                    <input name="jenis_kelamin" value="Laki-Laki" <?= $student->jenis_kelamin == "Laki-Laki" ? 'checked' : '' ?> type="radio" class="ace">
                    <span class="lbl"> Laki-Laki</span>
                  </label>
                  <label>
                    <input name="jenis_kelamin" value="Perempuan" <?= $student->jenis_kelamin == "Perempuan" ? 'checked' : '' ?> type="radio" class="ace">
                    <span class="lbl"> Perempuan</span>
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> NISN </label>
              <div class="col-sm-8">
                <input type="text" name="nisn" value="<?= $student->nisn ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Kewarganegaraan <span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <input type="text" name="kewarganegaraan" value="<?= $student->kewarganegaraan ?>" class="form-control">
                <?php if ($validation->hasError('kewarganegaraan')) : ?>
                  <small class="text-danger"><?= $validation->getError('kewarganegaraan') ?></small>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> NIK </label>
              <div class="col-sm-8">
                <input type="text" name="nik" value="<?= $student->nik ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> No KK </label>
              <div class="col-sm-8">
                <input type="text" name="no_kk" value="<?= $student->no_kk ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Tempat Lahir </label>
              <div class="col-sm-8">
                <input type="text" name="tempat_lahir" value="<?= $student->tempat_lahir ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Tanggal Lahir <span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <input type="date" name="tanggal_lahir" value="<?= $student->tanggal_lahir ?>" class="form-control">
                <?php if ($validation->hasError('tangga_lahir')) : ?>
                  <small class="text-danger"><?= $validation->getError('tangga_lahir') ?></small>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> No Registrasi Akta Lahir </label>
              <div class="col-sm-8">
                <input type="text" name="no_registrasi_akta_lahir" value="<?= $student->no_registrasi_akta_lahir ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Berkebutuhan Khusus </label>
              <div class="col-sm-8">
                <input type="text" name="berkebutuhan_khusus" value="<?= $student->berkebutuhan_khusus ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Agama & Kepercayaan <span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <select name="agama" class="form-control">
                  <option selected disabled></option>
                  <option value="Islam">Islam</option>
                  <option value="Katolik">Katolik</option>
                  <option value="Protestan">Protestan</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Buddha">Buddha</option>
                  <option value="Konghucu">Konghucu</option>
                </select>
                <?php if ($validation->hasError('agama')) : ?>
                  <small class="text-danger"><?= $validation->getError('agama') ?></small>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Provinsi <span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <select name="provinsi" id="provinsi" class="form-control">
                  <option selected disabled></option>
                  <?php foreach ($provinsi as $item) : ?>
                    <option value="<?= $item->id ?>"><?= $item->nama ?></option>
                  <?php endforeach; ?>
                </select>
                <?php if ($validation->hasError('provinsi')) : ?>
                  <small class="text-danger"><?= $validation->getError('provinsi') ?></small>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Kabupaten <span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <select name="kabupaten" id="kabupaten" class="form-control">
                  <option selected disabled></option>
                  <?php foreach ($kabupaten as $item) : ?>
                    <option value="<?= $item->id ?>"><?= $item->nama ?></option>
                  <?php endforeach; ?>
                </select>
                <?php if ($validation->hasError('kabupaten')) : ?>
                  <small class="text-danger"><?= $validation->getError('kabupaten') ?></small>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Kecamatan <span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <select name="kecamatan" id="kecamatan" class="form-control">
                  <option selected disabled></option>
                  <?php foreach ($kecamatan as $item) : ?>
                    <option value="<?= $item->id ?>"><?= $item->nama ?></option>
                  <?php endforeach; ?>
                </select>
                <?php if ($validation->hasError('kecamatan')) : ?>
                  <small class="text-danger"><?= $validation->getError('kecamatan') ?></small>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Desa/Kelurahan <span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <select name="kelurahan" id="kelurahan" class="form-control">
                  <option selected disabled></option>
                  <?php foreach ($kelurahan as $item) : ?>
                    <option value="<?= $item->id ?>"><?= $item->nama ?></option>
                  <?php endforeach; ?>
                </select>
                <?php if ($validation->hasError('kelurahan')) : ?>
                  <small class="text-danger"><?= $validation->getError('kelurahan') ?></small>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Alamat Jalan <span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <input type="text" name="alamat" value="<?= $student->alamat ?>" class="form-control">
                <?php if ($validation->hasError('alamat')) : ?>
                  <small class="text-danger"><?= $validation->getError('alamat') ?></small>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> RT </label>
              <div class="col-sm-8">
                <input type="text" name="rt" value="<?= $student->rt ?>" class="form-control" value="0">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> RW </label>
              <div class="col-sm-8">
                <input type="text" name="rw" value="<?= $student->rw ?>" class="form-control" value="0">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Nama Dusun </label>
              <div class="col-sm-8">
                <input type="text" name="nama_dusun" value="<?= $student->nama_dusun ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Kode Pos </label>
              <div class="col-sm-8">
                <input type="text" name="kode_pos" value="<?= $student->kode_pos ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Lintang </label>
              <div class="col-sm-8">
                <input type="text" name="lintang" value="<?= $student->lintang ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Bujur </label>
              <div class="col-sm-8">
                <input type="text" name="bujur" value="<?= $student->bujur ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Tempat Tinggal <span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <input type="text" name="tempat_tinggal" value="<?= $student->tempat_tinggal ?>" class="form-control">
                <?php if ($validation->hasError('tempat_tinggal')) : ?>
                  <small class="text-danger"><?= $validation->getError('tempat_tinggal') ?></small>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Moda Transportasi <span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <input type="text" name="moda_transportasi" value="<?= $student->moda_transportasi ?>" class="form-control">
                <?php if ($validation->hasError('moda_transportasi')) : ?>
                  <small class="text-danger"><?= $validation->getError('moda_transportasi') ?></small>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Anak ke-berapa (berdasarkan KK) <span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <input type="text" name="anak_ke" value="<?= $student->anak_ke ?>" class="form-control" value="1">
                <?php if ($validation->hasError('anak_ke')) : ?>
                  <small class="text-danger"><?= $validation->getError('anak_ke') ?></small>
                <?php endif; ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Penerima KPS/PKH </label>
              <div class="col-sm-8">
                <div class="radio">
                  <label>
                    <input name="penerima_kps" value="Ya" <?= $student->penerima_kps == "Ya" ? 'checked' : '' ?> type="radio" class="ace">
                    <span class="lbl"> Ya</span>
                  </label>
                  <label>
                    <input name="penerima_kps" value="Tidak" <?= $student->penerima_kps == "Tidak" ? 'checked' : '' ?> type="radio" checked class="ace">
                    <span class="lbl"> Tidak</span>
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Apakah punya KIP? </label>
              <div class="col-sm-8">
                <div class="radio">
                  <label>
                    <input name="punya_kip" value="Ya" <?= $student->punya_kip == "Ya" ? 'checked' : '' ?> type="radio" class="ace">
                    <span class="lbl"> Ya</span>
                  </label>
                  <label>
                    <input name="punya_kip" value="Tidak" <?= $student->punya_kip == "Tidak" ? 'checked' : '' ?> type="radio" checked class="ace">
                    <span class="lbl"> Tidak</span>
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Apakah peserta didik tersebut layak mendapatkan PIP? </label>
              <div class="col-sm-8">
                <div class="radio">
                  <label>
                    <input name="layak_pip" value="Ya" <?= $student->layak_pip == "Ya" ? 'checked' : '' ?> type="radio" class="ace">
                    <span class="lbl"> Ya</span>
                  </label>
                  <label>
                    <input name="layak_pip" value="Tidak" <?= $student->layak_pip == "Tidak" ? 'checked' : '' ?> type="radio" checked class="ace">
                    <span class="lbl"> Tidak</span>
                  </label>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="widget-box widget-color-green">
        <div class="widget-header">
          <h4 class="widget-title">Data Ayah Kandung</h4>

          <span class="widget-toolbar">
            <a href="#" data-action="collapse">
              <i class="ace-icon fa fa-chevron-up"></i>
            </a>
          </span>
        </div>

        <div class="widget-body">
          <div class="widget-main">
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Nama Ayah </label>
              <div class="col-sm-8">
                <input type="text" name="nama_ayah" value="<?= $data_ayah->nama ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> NIK Ayah </label>
              <div class="col-sm-8">
                <input type="text" name="nik_ayah" value="<?= $data_ayah->nik ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Tahun Lahir Ayah </label>
              <div class="col-sm-8">
                <input type="text" name="tahun_lahir_ayah" value="<?= $data_ayah->tahun_lahir ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Pendidikan Ayah </label>
              <div class="col-sm-8">
                <input type="text" name="pendidikan_ayah" value="<?= $data_ayah->pendidikan ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Pekerjaan Ayah </label>
              <div class="col-sm-8">
                <input type="text" name="pekerjaan_ayah" value="<?= $data_ayah->pekerjaan ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Penghasilan Ayah </label>
              <div class="col-sm-8">
                <input type="text" name="penghasilan_ayah" value="<?= $data_ayah->penghasilan ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Berkebutuhan khusus Ayah </label>
              <div class="col-sm-8">
                <input type="text" name="berkebutuhan_khusus_ayah" value="<?= $data_ayah->berkebutuhan_khusus ?>" class="form-control">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="widget-box widget-color-green">
        <div class="widget-header">
          <h4 class="widget-title">Data Ibu Kandung</h4>

          <span class="widget-toolbar">
            <a href="#" data-action="collapse">
              <i class="ace-icon fa fa-chevron-up"></i>
            </a>
          </span>
        </div>

        <div class="widget-body">
          <div class="widget-main">
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Nama Ibu </label>
              <div class="col-sm-8">
                <input type="text" name="nama_ibu" value="<?= $data_ibu->nama ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> NIK Ibu </label>
              <div class="col-sm-8">
                <input type="text" name="nik_ibu" value="<?= $data_ibu->nik ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Tahun Lahir Ibu </label>
              <div class="col-sm-8">
                <input type="text" name="tahun_lahir_ibu" value="<?= $data_ibu->tahun_lahir ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Pendidikan Ibu </label>
              <div class="col-sm-8">
                <input type="text" name="pendidikan_ibu" value="<?= $data_ibu->pendidikan ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Pekerjaan Ibu </label>
              <div class="col-sm-8">
                <input type="text" name="pekerjaan_ibu" value="<?= $data_ibu->pekerjaan ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Penghasilan Ibu </label>
              <div class="col-sm-8">
                <input type="text" name="penghasilan_ibu" value="<?= $data_ibu->penghasilan ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Berkebutuhan khusus Ibu </label>
              <div class="col-sm-8">
                <input type="text" name="berkebutuhan_khusus_ibu" value="<?= $data_ibu->berkebutuhan_khusus ?>" class="form-control">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="widget-box widget-color-green">
        <div class="widget-header">
          <h4 class="widget-title">Data Wali</h4>

          <span class="widget-toolbar">
            <a href="#" data-action="collapse">
              <i class="ace-icon fa fa-chevron-up"></i>
            </a>
          </span>
        </div>

        <div class="widget-body">
          <div class="widget-main">
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Mempunyai wali </label>
              <div class="col-sm-8">
                <div class="radio">
                  <label>
                    <input name="mempunyai_wali" value="Ya" type="radio" class="ace">
                    <span class="lbl"> Ya</span>
                  </label>
                  <label>
                    <input name="mempunyai_wali" value="Tidak" type="radio" checked class="ace">
                    <span class="lbl"> Tidak</span>
                  </label>
                </div>
              </div>
            </div>
            <div id="panel-wali"></div>

          </div>
        </div>
      </div>
      <div class="widget-box widget-color-green">
        <div class="widget-header">
          <h4 class="widget-title">Kontak</h4>

          <span class="widget-toolbar">
            <a href="#" data-action="collapse">
              <i class="ace-icon fa fa-chevron-up"></i>
            </a>
          </span>
        </div>

        <div class="widget-body">
          <div class="widget-main">
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Nomor Telepon Rumah </label>
              <div class="col-sm-8">
                <input type="text" name="no_telepon_rumah" value="<?= $student->no_telepon_rumah ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Nomor HP </label>
              <div class="col-sm-8">
                <input type="text" name="nomor_hp" value="<?= $student->nomor_hp ?>" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right"> Email </label>
              <div class="col-sm-8">
                <input type="email" name="email" value="<?= $student->email ?>" class="form-control">
              </div>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Update</button>
      <a href="<?= session()->get('status') == "Siswa" ? base_url('student/profile') : base_url('calon-siswa') ?>" class="btn btn-danger">Batal</a>
    </form>
  </div>
</div>

<?php if ($student->provinsi <> null || $student->provinsi <> "") : ?>
  <script type="text/javascript">
    $('#provinsi').val('<?= $student->provinsi ?>').trigger('change');
    $('#kabupaten').val('<?= $student->kabupaten ?>').trigger('change');
    $('#kecamatan').val('<?= $student->kecamatan ?>').trigger('change');
    $('#kelurahan').val('<?= $student->kelurahan ?>').trigger('change');
  </script>
<?php endif; ?>

<script type="text/javascript">
  $('select[name="agama"]').val('<?= $student->agama ?>').trigger('change');
  $('select[name="jenjang"]').val('<?= $student->jenjang ?>').trigger('change');

  $(document).ready(function() {

    $('[name="mempunyai_wali"]').change(function() {
      if ($(this).val() == "Ya") {
        $('#panel-wali').html(`
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right"> Nama Wali </label>
            <div class="col-sm-8">
              <input type="text" name="nama_wali" value="<?= $data_wali->nama ?>" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right"> NIK Wali </label>
            <div class="col-sm-8">
              <input type="text" name="nik_wali" value="<?= $data_wali->nik ?>" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right"> Tahun Lahir Wali </label>
            <div class="col-sm-8">
              <input type="text" name="tahun_lahir_wali" value="<?= $data_wali->tahun_lahir ?>" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right"> Pendidikan Wali </label>
            <div class="col-sm-8">
              <input type="text" name="pendidikan_wali" value="<?= $data_wali->pendidikan ?>" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right"> Pekerjaan Wali </label>
            <div class="col-sm-8">
              <input type="text" name="pekerjaan_wali" value="<?= $data_wali->pekerjaan ?>" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right"> Penghasilan Wali </label>
            <div class="col-sm-8">
              <input type="text" name="penghasilan_wali" value="<?= $data_wali->penghasilan ?>" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label no-padding-right"> Berkebutuhan khusus Wali </label>
            <div class="col-sm-8">
              <input type="text" name="berkebutuhan_khusus_wali" value="<?= $data_wali->berkebutuhan_khusus ?>" class="form-control">
            </div>
          </div>
        `);
      } else {
        $('#panel-wali').html('');
      }

    });

    $('#provinsi').change(function() {
      $('#kabupaten').html('');
      $('#kecamatan').html('');
      $('#kelurahan').html('');

      $.ajax({
        url: "<?= base_url('wilayah/getKabupaten') ?>",
        type: "GET",
        data: {
          provinsiID: $(this).val()
        },
        dataType: "JSON",
        success: function(res) {
          $('#kabupaten').html(res);
        },
        error: function(err) {
          console.log(err)
        }
      });
    });

    $('#kabupaten').change(function() {
      $('#kecamatan').html('');
      $('#kelurahan').html('');

      $.ajax({
        url: "<?= base_url('wilayah/getKecamatan') ?>",
        type: "GET",
        data: {
          kabupatenID: $(this).val()
        },
        dataType: "JSON",
        success: function(res) {
          $('#kecamatan').html(res);
        },
        error: function(err) {
          console.log(err)
        }
      });
    });

    $('#kecamatan').change(function() {
      $('#kelurahan').html('');

      $.ajax({
        url: "<?= base_url('wilayah/getKelurahan') ?>",
        type: "GET",
        data: {
          kecamatanID: $(this).val()
        },
        dataType: "JSON",
        success: function(res) {
          $('#kelurahan').html(res);
        },
        error: function(err) {
          console.log(err)
        }
      });
    });
  });
</script>