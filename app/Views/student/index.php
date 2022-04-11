<div class="row">
  <div class="col-xs-12">
    <div class="alert alert-block alert-info">
      <button type="button" class="close" data-dismiss="alert">
        <i class="ace-icon fa fa-times"></i>
      </button>
      Selamat Datang di Sistem Pendaftaran Online Yasir Islamic School.
    </div>
    <div class="hr hr32 hr-dotted"></div>
    <?php if (!$student) : ?>
      <div class="widget-box widget-color-orange">
        <div class="widget-header">
          <h5 class="widget-title bigger lighter">Informasi</h5>
        </div>

        <div class="widget-body">
          <div class="widget-main">
            <h4><strong>Selamat Datang di e-Pendaftaran</strong></h4>
            <p>Silahkan melakukan pendaftaran terlebih dahulu pada menu <strong>Registrasi PSB</strong>.</p>
          </div>
        </div>
      </div>
    <?php elseif ($student && $student->status == "Sedang Diproses") : ?>
      <div class="widget-box widget-color-blue">
        <div class="widget-header">
          <h5 class="widget-title bigger lighter">Informasi</h5>
        </div>

        <div class="widget-body">
          <div class="widget-main">
            <h4><strong>Pendaftaran Sedang Diproses</strong></h4>
            <p>Harap menunggu, pendaftaran anda sedang divalidasi oleh panitia PSB kami. Terima kasih.</p>
          </div>
        </div>
      </div>
    <?php elseif ($student && $student->status == "Lulus") : ?>
      <div class="widget-box widget-color-green">
        <div class="widget-header">
          <h5 class="widget-title bigger lighter">Informasi</h5>
        </div>

        <div class="widget-body">
          <div class="widget-main">
            <h4><strong>Congratulation!!!</strong></h4>
            <p>Selamat anda dinyatakan <strong>LULUS</strong>.</p>
          </div>
        </div>
      </div>
    <?php else : ?>
      <div class="widget-box widget-color-red">
        <div class="widget-header">
          <h5 class="widget-title bigger lighter">Informasi</h5>
        </div>

        <div class="widget-body">
          <div class="widget-main">
            <h4><strong>Mohon Maaf!!!</strong></h4>
            <p>Anda dinyatakan <strong>TIDAK LULUS</strong>. Jangan patah semangat yaa :)</p>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>