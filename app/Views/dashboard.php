<div class="row">
  <div class="space-6"></div>

  <div class="col-sm-12 infobox-container">
    <div class="infobox infobox-green">
      <div class="infobox-icon">
        <i class="ace-icon fa fa-users"></i>
      </div>

      <div class="infobox-data">
        <span class="infobox-data-number"><?= $totalPengguna ?></span>
        <div class="infobox-content">Akun Pengguna</div>
      </div>

    </div>

    <div class="infobox infobox-blue">
      <div class="infobox-icon">
        <i class="ace-icon fa fa-graduation-cap"></i>
      </div>

      <div class="infobox-data">
        <span class="infobox-data-number"><?= $totalStudent ?></span>
        <div class="infobox-content">Calon Siswa</div>
      </div>

    </div>

    <div class="infobox infobox-pink">
      <div class="infobox-icon">
        <i class="ace-icon fa fa-file"></i>
      </div>

      <div class="infobox-data">
        <span class="infobox-data-number"><?= $totalRegistration ?></span>
        <div class="infobox-content">Pendaftaran</div>
      </div>
    </div>

    <div class="infobox infobox-red">
      <div class="infobox-icon">
        <i class="ace-icon fa fa-bookmark"></i>
      </div>

      <div class="infobox-data">
        <span class="infobox-data-number"><?= $totalPayment ?></span>
        <div class="infobox-content">Pembayaran</div>
      </div>
    </div>

    <br>
    <div class="space-6"></div>

    <div class="infobox infobox-blue">
      <div class="infobox-icon">
        <i class="ace-icon fa fa-graduation-cap"></i>
      </div>

      <div class="infobox-data">
        <span class="infobox-data-number"><?= $ra ?></span>
        <div class="infobox-content">Raudhatul Atfal</div>
      </div>

    </div>

    <div class="infobox infobox-pink">
      <div class="infobox-icon">
        <i class="ace-icon fa fa-graduation-cap"></i>
      </div>

      <div class="infobox-data">
        <span class="infobox-data-number"><?= $sdit ?></span>
        <div class="infobox-content">SDIT</div>
      </div>
    </div>

    <div class="infobox infobox-red">
      <div class="infobox-icon">
        <i class="ace-icon fa fa-graduation-cap"></i>
      </div>

      <div class="infobox-data">
        <span class="infobox-data-number"><?= $smpit ?></span>
        <div class="infobox-content">SMPIT</div>
      </div>
    </div>

    <div class="space-6"></div>
  </div>

  <div class="vspace-12-sm"></div>

</div>

<div class="row">
  <div class="col-sm-4">
    <div class="widget-box">
      <div class="widget-header widget-header-flat widget-header-small">
        <h5 class="widget-title">
          <i class="ace-icon fa fa-signal"></i>
          Grafik Data Siswa
        </h5>
      </div>

      <div class="widget-body">
        <div class="widget-main">
          <div id="piechart-placeholder"></div>

          <canvas id="myChart"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="widget-box">
      <div class="widget-header widget-header-flat widget-header-small">
        <h5 class="widget-title">
          <i class="ace-icon fa fa-signal"></i>
          Grafik Asal Provinsi
        </h5>
      </div>

      <div class="widget-body">
        <div class="widget-main">
          <div id="piechart-placeholder"></div>

          <canvas id="provinsiChart"></canvas>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-4">
    <div class="widget-box">
      <div class="widget-header widget-header-flat widget-header-small">
        <h5 class="widget-title">
          <i class="ace-icon fa fa-signal"></i>
          Grafik Asal Kabupaten
        </h5>
      </div>

      <div class="widget-body">
        <div class="widget-main">
          <div id="piechart-placeholder"></div>

          <canvas id="kabupatenChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
  getGrafikJenjang();
  getGrafikAsalProvinsi();
  getGrafikAsalKabupaten();

  var ctx = document.getElementById('myChart').getContext('2d');
  var pChart = document.getElementById('provinsiChart').getContext('2d');
  var kChart = document.getElementById('kabupatenChart').getContext('2d');

  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['Raudatul Athfal', 'SDIt', 'SMPIT'],
      datasets: [{
        label: '# of Votes',
        data: [],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  var provinsiChart = new Chart(pChart, {
    type: 'pie',
    data: {
      labels: [],
      datasets: [{
        label: '# of Votes',
        data: [],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  var kabupatenChart = new Chart(kChart, {
    type: 'pie',
    data: {
      labels: [],
      datasets: [{
        label: '# of Votes',
        data: [],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  function getGrafikJenjang() {
    $.ajax({
      url: "<?= base_url('dashboard/getGrafikJenjang') ?>",
      type: "GET",
      dataType: "JSON",
      success: function(res) {
        myChart.data.datasets[0].data[0] = res.ra;
        myChart.data.datasets[0].data[1] = res.sdit;
        myChart.data.datasets[0].data[2] = res.smpit;
        myChart.update();
      },
      error: function(err) {
        console.log(err)
      }
    });

    return false;
  }

  function getGrafikAsalProvinsi() {
    $.ajax({
      url: "<?= base_url('dashboard/getGrafikAsalProvinsi') ?>",
      type: "GET",
      dataType: "JSON",
      success: function(res) {
        const dataProvinsi = res.provinsi;
        for (let i = 0; i < dataProvinsi.length; i++) {
          provinsiChart.data.labels[i] = dataProvinsi[i].nama
          provinsiChart.data.datasets[0].data[i] = dataProvinsi[i].jumlah_provinsi
        }
        provinsiChart.update();
      },
      error: function(err) {
        console.log(err)
      }
    });

    return false;
  }

  function getGrafikAsalKabupaten() {
    $.ajax({
      url: "<?= base_url('dashboard/getGrafikAsalKabupaten') ?>",
      type: "GET",
      dataType: "JSON",
      success: function(res) {
        const dataKabupaten = res.kabupaten;
        for (let i = 0; i < dataKabupaten.length; i++) {
          kabupatenChart.data.labels[i] = dataKabupaten[i].nama
          kabupatenChart.data.datasets[0].data[i] = dataKabupaten[i].jumlah_kabupaten
        }
        kabupatenChart.update();
      },
      error: function(err) {
        console.log(err)
      }
    });

    return false;
  }
</script>