<style>
  #dynamic-table tr {
    cursor: pointer;
  }
</style>

<?php if (session()->getFlashdata('message')) : ?>
  <div class="alert alert-block alert-success message-alert">
    <button type="button" class="close" data-dismiss="alert">
      <i class="ace-icon fa fa-times"></i>
    </button>

    <i class="ace-icon fa fa-check green"></i>

    <?= session()->getFlashdata('message') ?>
  </div>
<?php endif; ?>

<div class="row">
  <div class="col-xs-12">

    <div class="clearfix"></div>
    <div class="table-header">
      Data Calon Siswa
    </div>

    <div>
      <p><strong>Filter By :</strong></p>
      <form action="<?= base_url('calon-siswa') ?>">
      <div class="form-group">
        <label class="control-label">Tingkat Pendidikan</label>
        <select name="jenjang" class="form-control">
          <option selected disabled></option>
          <option value="Raudatul Athfal">Raudatul Athfal</option>
          <option value="SDIT">SDIT</option>
          <option value="SMPIT">SMPIT</option>
        </select>
      </div>
      <button type="submit" name="act" value="filter" class="btn btn-primary"><i class="ace-icon fa fa-filter"></i> Filter</button>
      <button type="submit" name="act" value="excel" class="btn btn-success"><i class="ace-icon fa fa-download"></i> Export Excel</button>
      
      </form>


      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Jenjang</th>
            <th>Jenis Kelamin</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($students as $k) : ?>
            <tr data-url="<?= base_url('calon-siswa?act=detail&id=' . $k->id . '&key=' . md5($k->id)) ?>">
              <td class="text-center"><?= $no++ ?></td>
              <td><?= $k->unique_id ?></td>
              <td><?= $k->nama ?></td>
              <td><?= $k->jenjang ?></td>
              <td><?= $k->jenis_kelamin ?></td>
              <td><?= $k->nomor_hp ?></td>
              <td><?= $k->alamat ?></td>
              <td>
                <a href="<?= base_url('calon-siswa?act=edit&id=' . $k->id . '&key=' . md5($k->id)) ?>" class="btn btn-sm btn-warning">
                  <i class="ace-icon fa fa-pencil bigger-110"></i>
                  <span class="bigger-110 no-text-shadow">Edit</span>
                </a>
                <a href="<?= base_url('calon-siswa?act=delete&id=' . $k->id . '&key=' . md5($k->id)) ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?')" class="btn btn-sm btn-danger">
                  <i class="ace-icon fa fa-trash bigger-110"></i>
                  <span class="bigger-110 no-text-shadow">Delete</span>
                </a>
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

    $('table tbody tr').on('click', function() {
      window.location.href = $(this).data('url');
    });

    $('table tbody tr').on('click', 'td:last-child', function(e) {
      e.stopPropagation();
    });

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