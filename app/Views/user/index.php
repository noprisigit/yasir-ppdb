<div class="row">
  <div class="col-xs-12">
    <a href="<?= base_url('user/create') ?>" class="btn btn-success" style="margin-bottom: 8px;">
      <i class="ace-icon fa fa-plus"></i>
      Tambah Pengguna
    </a>

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
      Data Pengguna
    </div>

    <!-- div.table-responsive -->

    <!-- div.dataTables_borderWrap -->
    <div>
      <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>Nama Pengguna</th>
            <th>Telepon</th>
            <th>Level</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user) : ?>
            <tr>
              <td><?= $user->name ?></td>
              <td><?= $user->phone_number ?></td>
              <td><?= $user->level ?></td>
              <td><?= $user->status == "Aktif" ? '<span class="label label-success">Aktif</span>' : '<span class="label label-danger">Tidak Aktif</span>' ?></td>

              <td>
                <div class="hidden-sm hidden-xs action-buttons">
                  <a class="blue" href="<?= base_url('user/reset-password/' . $user->username) ?>" data-toggle="tooltip" data-placement="top" title="Ganti Password">
                    <i class="ace-icon fa fa-key bigger-130"></i>
                  </a>

                  <a class="green" href="<?= base_url('user/edit/' . $user->username) ?>" data-toggle="tooltip" data-placement="top" title="Edit">
                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                  </a>

                  <a class="red delete" href="<?= base_url('user/destroy?id=' . $user->id . '&key=' . md5($user->id)) ?>" data-toggle="tooltip" data-placement="top" title="Hapus">
                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                  </a>
                </div>

                <!-- <div class="hidden-md hidden-lg">
                  <div class="inline pos-rel">
                    <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                      <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                    </button>

                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                      <li>
                        <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                          <span class="blue">
                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                          </span>
                        </a>
                      </li>

                      <li>
                        <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                          <span class="green">
                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                          </span>
                        </a>
                      </li>

                      <li>
                        <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                          <span class="red">
                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                          </span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div> -->
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="<?= base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.dataTables.bootstrap.min.js') ?>"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#dynamic-table').DataTable();

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