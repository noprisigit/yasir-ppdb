<div class="row">
  <div class="col-xs-12">
    <?php if (session()->getFlashdata('message')) : ?>
      <div class="alert alert-block alert-success message-alert">
        <button type="button" class="close" data-dismiss="alert">
          <i class="ace-icon fa fa-times"></i>
        </button>

        <i class="ace-icon fa fa-check green"></i>

        <?= session()->getFlashdata('message') ?>
      </div>
    <?php endif; ?>

    <div class="clearfix"></div>
    <div class="table-header">
      Data Pembayaran
    </div>

    <div>
      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th>Struk</th>
            <th>Informasi Pembayaran</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($payments as $payment) : ?>
            <tr>
              <td class="text-center"><?= $no++ ?></td>
              <td>
                <a href="<?= base_url('assets/images/bukti_bayar/' . $payment->image) ?>" target="_blank"><img src="<?= base_url('assets/images/bukti_bayar/' . $payment->image) ?>" width="50px" alt="Bukti Bayar"></a>
              </td>
              <td>
                <?= $payment->unique_id ?><br>
                Nama Siswa : <?= $payment->nama ?> | <?= $payment->kode_daftar ?> <br>
                <em>Pesan : <?= $payment->description ?> <?= $payment->date ?></em> #Nominal Rp <?= number_format($payment->nominal) ?>
              </td>
              <td>
                <?php if ($payment->status == "Sedang Diverifikasi") : ?>
                  <span class="label label-lg label-warning arrowed-right"><?= $payment->status ?></span>
                <?php elseif ($payment->status == "Diterima") : ?>
                  <span class="label label-lg label-success arrowed-right"><?= $payment->status ?></span>
                <?php else : ?>
                  <span class="label label-lg label-danger arrowed-right"><?= $payment->status ?></span>
                <?php endif; ?>
              </td>
              <td>
                <?php if ($payment->status == "Sedang Diverifikasi") : ?>
                  <a href="#" class="btn btn-sm btn-primary btn-confirm" data-id="<?= $payment->id ?>" data-key="<?= md5($payment->id) ?>" data-image="<?= $payment->image ?>" data-status="<?= $payment->status ?>" data-toggle="modal" data-target="#myModal">
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    <span class="bigger-110 no-text-shadow">Konfirmasi Pembayaran</span>
                  </a>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Konfirmasi Pembayaran</h4>
      </div>
      <form action="<?= base_url('payment/confirm') ?>" method="POST">
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
          <input type="hidden" name="key" id="key">
          <a href="" id="url" target="_blank">
            <img src="" id="image" alt="" width="100%">
          </a>
          <input type="text" id="status" class="form-control" readonly>
        </div>
        <div class="modal-footer">
          <button type="submit" name="status" value="Ditolak" class="btn btn-danger">Tolak</button>
          <button type="submit" name="status" value="Diterima" class="btn btn-success">Terima</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.dataTables.bootstrap.min.js') ?>"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#dynamic-table').DataTable();

    $('.btn-confirm').on(ace.click_event, function(e) {
      e.preventDefault();
      console.log($(this).data());
      const imageUrl = "<?= base_url('assets/images/bukti_bayar') ?>" + "/" + $(this).data('image');
      $('#myModal #image').attr('src', imageUrl);
      $('#myModal #url').attr('href', imageUrl);
      $('#myModal #status').val($(this).data('status'));
      $('#myModal #id').val($(this).data('id'));
      $('#myModal #key').val($(this).data('key'));
    });

    $(".delete").on(ace.click_event, function(e) {
      e.preventDefault();
      const url = $(this).attr('href');

      bootbox.confirm({
        message: "Apakah kamu yakin? Data ini tidak bisa dikembalikan",
        buttons: {
          confirm: {
            label: "Delete",
            className: "btn-danger btn-sm",
          },
          cancel: {
            label: "Cancel",
            className: "btn-sm",
          }
        },
        callback: function(result) {
          if (result) {
            window.location.href = url;
          }
        }
      });
    });
  });
</script>