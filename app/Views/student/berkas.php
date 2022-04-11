<?php if (session()->getFlashdata('message')) : ?>
  <div class="alert alert-block alert-success message-alert">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>

    <i class="ace-icon fa fa-check green"></i>
    <?= session()->getFlashdata('message') ?>.
  </div>
<?php endif; ?>

<?php if (!$student) : ?>
  <div class="alert alert-block alert-danger">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>

    <i class="ace-icon fa fa-ban red"></i>
    Anda belum melakukan pendaftaran. Silahkan melakukan pendaftaran terlebih dahulu pada menu Registrasi PSB.
  </div>
<?php else : ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="widget-box widget-color-green">
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
                        <a href="<?= base_url('student/berkas?act=edit&id=' . $k->id . '&key=' . md5($k->id)) ?>" class="btn btn-sm btn-warning">
                          <i class="ace-icon fa fa-pencil bigger-110"></i>
                          <span class="bigger-110 no-text-shadow">Edit</span>
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

            <?php if (count($berkas) < 7) : ?>
              <a href="<?= base_url('student/berkas/upload') ?>" class="btn btn-warning">Upload Berkas</a>
              <font color="#ff0000"><b><i>Silakan Lengkapi berkas Anda....</i></b></font>
            <?php else : ?>
              <font color="#f00fA0"><b><i>Terimakasih Anda sudah melengkapi Berkas Anda ..Harap tunggu sedang dalam verifikasi Petugas.... </i></b></font>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>