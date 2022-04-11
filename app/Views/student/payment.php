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
      <form action="<?= base_url('student/payment/process') ?>" enctype="multipart/form-data" method="POST" class="form-horizontal" role="form">
        <div class="widget-box widget-color-green">
          <div class="widget-header">
            <h4 class="widget-title">Form Pembayaran</h4>

            <span class="widget-toolbar">
              <a href="#" data-action="collapse">
                <i class="ace-icon fa fa-chevron-up"></i>
              </a>
            </span>
          </div>

          <div class="widget-body">
            <div class="widget-main">
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Nominal <span class="text-danger">*</span> </label>
                <div class="col-sm-8">
                  <input type="hidden" name="id" value="<?= session()->get('id') ?>">
                  <input type="hidden" name="key" value="<?= md5(session()->get('id')) ?>">
                  <input type="text" name="nominal" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Info Pembayaran <span class="text-danger">*</span> </label>
                <div class="col-sm-8">
                  <input type="text" name="catatan" class="form-control" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label no-padding-right"> Bukti Bayar <span class="text-danger">*</span> </label>
                <div class="col-sm-8">
                  <input type="file" accept="image/*" name="bukti_bayar" class="form-control" required>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <button type="submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
                  <a href="<?= base_url('student/profile') ?>" class="btn btn-danger">Batal</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>

      <hr>

      <div class="widget-box widget-color-green">
        <div class="widget-header">
          <h4 class="widget-title">Data Pembayaran</h4>

          <span class="widget-toolbar">
            <a href="#" data-action="collapse">
              <i class="ace-icon fa fa-chevron-up"></i>
            </a>
          </span>
        </div>

        <div class="widget-body">
          <div class="widget-main">
            <table class="table table-striped table-bordered table-hover" width="100%">
              <thead>
                <tr style="background-color: #f9f9f9;">
                  <th class="text-center">No</th>
                  <th>Struk</th>
                  <th>Informasi Pembayaran</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php if (count($payments) > 0) : ?>
                  <?php $no = 1; ?>
                  <?php foreach ($payments as $k) : ?>
                    <tr>
                      <td class="text-center"><?= $no++ ?></td>
                      <td>
                        <a href="<?= base_url('assets/images/bukti_bayar/' . $k->image) ?>" target="_blank"><img src="<?= base_url('assets/images/bukti_bayar/' . $k->image) ?>" width="50px" alt="Bukti Bayar"></a>
                      </td>
                      <td>
                        <strong><?= $k->unique_id ?></strong> <br>
                        <em>Pesan : <?= $k->date ?> WIB</em> <br>
                        #Nominal Rp <?= number_format($k->nominal) ?>
                      </td>
                      <td>
                        <?php if ($k->status == "Sedang Diverifikasi") : ?>
                          <span class="label label-lg label-warning arrowed-right"><?= $k->status ?></span>
                        <?php elseif ($k->status == "Diterima") : ?>
                          <span class="label label-lg label-success arrowed-right"><?= $k->status ?></span>
                        <?php else : ?>
                          <span class="label label-lg label-danger arrowed-right"><?= $k->status ?></span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if ($k->status == "Sedang Diverifikasi") : ?>
                          <a href="<?= base_url('student/payment?act=edit&id=' . $k->id . '&key=' . md5($k->id)) ?>" class="btn btn-sm btn-warning">
                            <i class="ace-icon fa fa-pencil bigger-110"></i>
                            <span class="bigger-110 no-text-shadow">Edit</span>
                          </a>
                          <a href="<?= base_url('student/payment?act=delete&id=' . $k->id . '&key=' . md5($k->id)) ?>" onclick="return confirm('Apakah anda yakin untuk menghapus ini?')" class="btn btn-sm btn-danger">
                            <i class="ace-icon fa fa-trash bigger-110"></i>
                            <span class="bigger-110 no-text-shadow">Hapus</span>
                          </a>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else : ?>
                  <tr>
                    <td class="text-center" colspan="5"><strong>Data belum ada...</strong></td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>