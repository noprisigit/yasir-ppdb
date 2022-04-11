<div class="row">
  <div class="col-xs-12">
    <div class="widget-box widget-color-green">
      <div class="widget-header widget-header-flat">
        <h5 class="widget-title bigger lighter">
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

          <h3>Silahkan unggah berkas-berkas anda pada panel dibawah ini.</h3>
          <form action="<?= base_url('student/berkas/upload/process') ?>" method="POST" enctype="multipart/form-data">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Jenis Berkas</th>
                  <th width="25%">File <span class="text-danger">*Wajib Diisi</span></th>
                  <th>Deskripsi</th>
                  <th>Catatan</th>
                </tr>
              </thead>
              <tbody>
                <!-- <tr>
              <td>Kartu Tanda Penduduk</td>
              <td class="text-center">
                <input type="hidden" name="id_pendaftaran" value="DFT2109002">
                <input type="hidden" name="jenis_berkas[]" value="KTP">
                <input type="file" accept="image/*" name="foto[]" required>
              </td>
              <td>
                <input type="text" class="form-control" name="deskripsi[]">
              </td>
              <td>
                <input type="text" class="form-control" name="catatan[]">
              </td>
            </tr> -->
                <tr>
                  <td>Akte Kelahiran</td>
                  <td class="text-center">
                    <input type="hidden" name="student_id" value="<?= session()->get('id') ?>">
                    <input type="hidden" name="jenis_berkas[]" value="Akte Kelahiran">
                    <input type="file" accept="image/*" name="foto[]" required="">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="deskripsi[]">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="catatan[]">
                  </td>
                </tr>
                <tr>
                  <td>Kartu Keluarga</td>
                  <td>
                    <input type="hidden" name="jenis_berkas[]" value="Kartu Keluarga">
                    <input type="file" accept="image/*" name="foto[]" required="">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="deskripsi[]">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="catatan[]">
                  </td>
                </tr>
                <tr>
                  <td>Ijazah <span class="text-danger">*Jika ada</span></td>
                  <td>
                    <input type="hidden" name="jenis_berkas[]" value="Ijazah">
                    <input type="file" accept="image/*" name="foto[]">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="deskripsi[]">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="catatan[]">
                  </td>
                </tr>
                <tr>
                  <td>Transkip Nilai <span class="text-danger">*Jika ada</span></td>
                  <td>
                    <input type="hidden" name="jenis_berkas[]" value="Transkip Nilai">
                    <input type="file" accept="image/*" name="foto[]">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="deskripsi[]">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="catatan[]">
                  </td>
                </tr>
                <tr>
                  <td>Nilai Raport <span class="text-danger">*Jika ada</span></td>
                  <td>
                    <input type="hidden" name="jenis_berkas[]" value="Nilai Raport">
                    <input type="file" accept="image/*" name="foto[]">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="deskripsi[]">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="catatan[]">
                  </td>
                </tr>
                <!-- <tr>
              <td>Hasil Tes Psikologi</td>
              <td>
                <input type="hidden" name="jenis_berkas[]" value="Hasil Tes Psikologi">
                <input type="file" accept="image/*" name="foto[]" required>
              </td>
              <td>
                <input type="text" class="form-control" name="deskripsi[]">
              </td>
              <td>
                <input type="text" class="form-control" name="catatan[]">
              </td>
            </tr> -->
                <tr>
                  <td>Pas Foto</td>
                  <td>
                    <input type="hidden" name="jenis_berkas[]" value="Foto">
                    <input type="file" accept="image/*" name="foto[]" required="">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="deskripsi[]">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="catatan[]">
                  </td>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <td></td>
                  <td colspan="3">
                    <input name="Simpan" type="submit" id="Simpan" value="Simpan" class="btn btn-primary">
                  </td>
                </tr>
              </tfoot>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>