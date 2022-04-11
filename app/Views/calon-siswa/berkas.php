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
    <?php if (!$student) : ?>
      <div class="widget-box widget-color-red">
        <div class="widget-header">
          <h5 class="widget-title bigger lighter">Informasi</h5>
        </div>

        <div class="widget-body">
          <div class="widget-main">
            <h4><strong>Data tidak ditemukan</strong></h4>
            <p>Calon siswa ini belum melakukan pendaftaran.</p>
          </div>
        </div>
      </div>
    <?php else : ?>
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
  
            <hr>
  
            <?php if (count($berkasProses) > 0) : ?>
              <p><strong>Silahkan melakukan verifikasi berkas calon siswa terlebih dahulu.</strong></p>
            <?php elseif ($pengumuman) : ?>
              <h2>Siswa ini dinyatakan <span class="text-uppercase"><strong><?= $pengumuman->status ?></strong></span></h2>
            <?php else : ?>
              <div class="row">
                <div class="col-md-6">
                  <div class="widget-box">
                    <div class="widget-header widget-header-flat">
                      <h4 class="widget-title smaller">Form Kelulusan</h4>
                    </div>
  
                    <div class="widget-body">
                      <div class="widget-main">
                        <form action="<?= base_url('calon-siswa/process') ?>" method="POST">
                          <input type="hidden" name="student_id" value="<?= $student->student_id ?>">
                          <input type="hidden" name="key" value="<?= md5($student->student_id) ?>">
                          <div class="form-group">
                            <label><strong>Penilaian</strong></label>
                            <input type="text" name="penilaian" class="form-control">
                            <?php if ($validation->hasError('penilaian')) : ?>
                              <small class="text-danger"><?= $validation->getError('penilaian') ?></small>
                            <?php endif; ?>
                          </div>
                          <div class="form-group">
                            <label><strong>Catatan</strong></label>
                            <input type="text" name="catatan" class="form-control">
                          </div>
                          <div class="form-group">
                            <label for=""><strong>Status Kelulusan</strong></label>
                            <select name="status" class="form-control">
                              <option selected disabled></option>
                              <option value="Lulus">Lulus</option>
                              <option value="Tidak Lulus">Tidak Lulus</option>
                            </select>
                            <?php if ($validation->hasError('status')) : ?>
                              <small class="text-danger"><?= $validation->getError('status') ?></small>
                            <?php endif; ?>
                          </div>
                          <input type="submit" name="ubah_status_kelulusan" value="Proses" class="btn btn-primary">
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endif; ?>
  
            <hr>
  
            <table class="table table-striped table-bordered table-hover" width="100%">
              <thead>
                <tr style="background-color: #f9f9f9;">
                  <th class="text-center">No</th>
                  <th>Dokumen</th>
                  <th>Nama Berkas</th>
                  <th>Deskripsi</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php if (count($berkas) > 0) : ?>
                  <?php $no = 1; ?>
                  <?php foreach ($berkas as $k) : ?>
                    <tr>
                      <td class="text-center"><?= $no++ ?></td>
                      <td>
                        <a href="<?= base_url('assets/images/dokumen/' . $k->dokumen) ?>" target="_blank"><img src="<?= base_url('assets/images/dokumen/' . $k->dokumen) ?>" width="50px" alt="<?= $k->jenis_berkas ?>"></a>
                      </td>
                      <td><?= $k->jenis_berkas ?></td>
                      <td>
                        <?= $k->deskripsi_berkas ?> <br>
                        <em>catatan : <?= $k->catatan ?></em>
                      </td>
                      <td>
                        <?php if ($k->status == "Sedang Diverifikasi") : ?>
                          <span class="label label-lg label-warning arrowed-right"><?= $k->status ?></span>
                        <?php elseif ($k->status == "Valid") : ?>
                          <span class="label label-lg label-success arrowed-right"><?= $k->status ?></span>
                        <?php else : ?>
                          <span class="label label-lg label-danger arrowed-right"><?= $k->status ?></span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <a href="#" data-id="<?= $k->id ?>" data-key="<?= md5($k->id) ?>" data-status="<?= $k->status ?>" data-dokumen="<?= $k->dokumen ?>" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-warning btn-verify">
                          <i class="ace-icon fa fa-pencil bigger-110"></i>
                          <span class="bigger-110 no-text-shadow">Verifikasi</span>
                        </a>
                        <!-- <a href="<?= base_url('student/berkas?act=delete&id=' . $k->id . '&key=' . md5($k->id)) ?>" onclick="return confirm('Apakah anda yakin untuk menghapus ini?')" class="btn btn-sm btn-danger">
                          <i class="ace-icon fa fa-trash bigger-110"></i>
                          <span class="bigger-110 no-text-shadow">Hapus</span>
                        </a> -->
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else : ?>
                  <tr>
                    <td colspan="6" class="text-center"><strong>Data-data berkas belum tersedia...</strong></td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Verifikasi Berkas</h4>
      </div>
      <form action="<?= base_url('calon-siswa/verify') ?>" method="POST">
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <input type="hidden" name="key" id="key">
          <a href="" id="url" target="_blank">
            <img src="" id="image" alt="" width="100%">
          </a>
          <div class="form-group" style="margin-top: 8px;">
            <label for="">Status</label>
            <input type="text" id="status" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label>Catatan Tambahan</label>
            <input type="text" id="catatan" class="form-control" style="margin-top: 8px;">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="status" value="Tidak Valid" class="btn btn-danger">Tidak Valid</button>
          <button type="submit" name="status" value="Valid" class="btn btn-success">Valid</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
  $(document).ready(function() {
    $('.btn-verify').on(ace.click_event, function(e) {
      e.preventDefault();
      const dokumenUrl = "<?= base_url('assets/images/dokumen') ?>" + "/" + $(this).data('dokumen');
      $('#myModal #image').attr('src', dokumenUrl);
      $('#myModal #url').attr('href', dokumenUrl);
      $('#myModal #status').val($(this).data('status'));
      $('#myModal #id').val($(this).data('id'));
      $('#myModal #key').val($(this).data('key'));
    });
  });
</script>