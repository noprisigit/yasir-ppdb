<?php

namespace App\Controllers;

use App\Models\Berkas;
use App\Models\DataAyah;
use App\Models\DataIbu;
use App\Models\DataWali;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Payment;
use App\Models\Provinsi;
use App\Models\Registration;
use App\Models\Student;

class StudentController extends BaseController
{
  private $berkasModel;
  private $dataAyahModel;
  private $dataIbuModel;
  private $dataWaliModel;
  private $paymentModel;
  private $registrationModel;
  private $studentModel;

  private $provinsiModel;
  private $kabupatenModel;
  private $kecamatanModel;
  private $kelurahanModel;

  public function __construct()
  {
    $this->berkasModel = new Berkas();
    $this->dataAyahModel = new DataAyah();
    $this->dataIbuModel = new DataIbu();
    $this->dataWaliModel = new DataWali();
    $this->paymentModel = new Payment();
    $this->registrationModel = new Registration();
    $this->studentModel = new Student();

    $this->provinsiModel = new Provinsi();
    $this->kabupatenModel = new Kabupaten();
    $this->kecamatanModel = new Kecamatan();
    $this->kelurahanModel = new Kelurahan();
  }

  public function index()
  {
    $data['mainUrl'] = "student";
    $data['mainTitle'] = "Siswa";
    $data['secTitle'] = "Dashboard";
    $data['view'] = "student/index";

    $data['student'] = $this->registrationModel->getRegistration();

    return $this->template($data);
  }

  public function profile()
  {
    $data['mainUrl'] = "student/profile";
    $data['mainTitle'] = "Siswa";
    $data['secTitle'] = "Profil";
    $data['view'] = "student/profile";

    $data['student'] = $this->studentModel->find(session()->get('id'));

    return $this->template($data);
  }

  public function edit()
  {
    $data['mainUrl'] = "profile";
    $data['mainTitle'] = "Siswa";
    $data['secTitle'] = "Profil Edit";
    $data['view'] = "student/edit";
    $data['validation'] = \Config\Services::validation();

    $studentID = session()->get('id');
    $student = $this->studentModel->find($studentID);

    $data['provinsi'] = $this->provinsiModel->orderBy('nama', 'ASC')->findAll();

    if ($student->provinsi <> null || $student->provinsi <> "") {
      $data['kabupaten'] = $this->kabupatenModel->where('provinsi_id', $student->provinsi)->findAll();
      $data['kecamatan'] = $this->kecamatanModel->where('kabupaten_id', $student->kabupaten)->findAll();
      $data['kelurahan'] = $this->kelurahanModel->where('kecamatan_id', $student->kecamatan)->findAll();
    } else {
      $data['kabupaten'] = [];
      $data['kecamatan'] = [];
      $data['kelurahan'] = [];
    }


    $data['student'] = $student;
    $data['data_ayah'] = $this->dataAyahModel->where('student_id', $studentID)->first();
    $data['data_ibu'] = $this->dataIbuModel->where('student_id', $studentID)->first();
    $data['data_wali'] = $this->dataWaliModel->where('student_id', $studentID)->first();

    return $this->template($data);
  }

  public function update()
  {
    $formValidation = [
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama tidak boleh kosong'
        ]
      ],
      'jenjang' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Pendaftaran tingkat apa harus dipilih'
        ]
      ],
      'tanggal_lahir' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tangga lahir tidak boleh kosong'
        ]
      ],
      'kewarganegaraan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Kewarganegaraan tidak boleh kosong'
        ]
      ],
      'agama' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Agama tidak boleh kosong'
        ]
      ],
      'alamat' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Alamat tidak boleh kosong'
        ]
      ],
      'provinsi' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Provinsi tidak boleh kosong'
        ]
      ],
      'kabupaten' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Kabupaten tidak boleh kosong'
        ]
      ],
      'kecamatan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Kecamatan tidak boleh kosong'
        ]
      ],
      'kelurahan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Kelurahan tidak boleh kosong'
        ]
      ],
      'tempat_tinggal' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tempat tinggal tidak boleh kosong'
        ]
      ],
      'moda_transportasi' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Moda Transportasi tidak boleh kosong'
        ]
      ],
      'anak_ke' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Anak ke-berapa tidak boleh kosong'
        ]
      ]
    ];

    if (!$this->validate($formValidation)) {
      $validation = \Config\Services::validation();
      return redirect()->to(base_url('student/profile/edit'))->withInput()->with('validation', $validation);
    }

    if (md5($this->request->getPost('id')) <> $this->request->getPost('key')) {
      return redirect()->to(base_url('not-found'));
    }

    $dataPribadi = [
      'id' => $this->request->getPost('id'),
      'nama' => $this->request->getPost('nama'),
      'jenjang' => $this->request->getPost('jenjang'),
      'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
      'nisn' => $this->request->getPost('nisn'),
      'kewarganegaraan' => $this->request->getPost('kewarganegaraan'),
      'nik' => $this->request->getPost('nik'),
      'no_kk' => $this->request->getPost('no_kk'),
      'tempat_lahir' => $this->request->getPost('tempat_lahir'),
      'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
      'no_registrasi_akta_lahir' => $this->request->getPost('no_registrasi_akta_lahir'),
      'berkebutuhan_khusus' => $this->request->getPost('berkebutuhan_khusus'),
      'agama' => $this->request->getPost('agama'),
      'alamat' => $this->request->getPost('alamat'),
      'rt' => $this->request->getPost('rt'),
      'rw' => $this->request->getPost('rw'),
      'nama_dusun' => $this->request->getPost('nama_dusun'),
      'provinsi' => $this->request->getPost('provinsi'),
      'kabupaten' => $this->request->getPost('kabupaten'),
      'kecamatan' => $this->request->getPost('kecamatan'),
      'kelurahan' => $this->request->getPost('kelurahan'),
      'kode_pos' => $this->request->getPost('kode_pos'),
      'lintang' => $this->request->getPost('lintang'),
      'bujur' => $this->request->getPost('bujur'),
      'tempat_tinggal' => $this->request->getPost('tempat_tinggal'),
      'moda_transportasi' => $this->request->getPost('moda_transportasi'),
      'anak_ke' => $this->request->getPost('anak_ke'),
      'penerima_kps' => $this->request->getPost('penerima_kps'),
      'punya_kip' => $this->request->getPost('punya_kip'),
      'layak_pip' => $this->request->getPost('layak_pip'),
      'no_telepon_rumah' => $this->request->getPost('no_telepon_rumah'),
      'nomor_hp' => $this->request->getPost('nomor_hp'),
      'email' => $this->request->getPost('email'),
    ];

    $dataAyah = [
      'nama' => $this->request->getPost('nama_ayah'),
      'nik' => $this->request->getPost('nik_ayah'),
      'tahun_lahir' => $this->request->getPost('tahun_lahir_ayah'),
      'pendidikan' => $this->request->getPost('pendidikan_ayah'),
      'pekerjaan' => $this->request->getPost('pekerjaan_ayah'),
      'penghasilan' => $this->request->getPost('penghasilan_ayah'),
      'berkebutuhan_khusus' => $this->request->getPost('berkebutuhan_khusus_ayah'),
    ];

    $dataIbu = [
      'nama' => $this->request->getPost('nama_ibu'),
      'nik' => $this->request->getPost('nik_ibu'),
      'tahun_lahir' => $this->request->getPost('tahun_lahir_ibu'),
      'pendidikan' => $this->request->getPost('pendidikan_ibu'),
      'pekerjaan' => $this->request->getPost('pekerjaan_ibu'),
      'penghasilan' => $this->request->getPost('penghasilan_ibu'),
      'berkebutuhan_khusus' => $this->request->getPost('berkebutuhan_khusus_ibu'),
    ];


    $this->studentModel->save($dataPribadi);
    $this->dataAyahModel->where('student_id', $this->request->getPost('id'))->set($dataAyah)->update();
    $this->dataIbuModel->where('student_id', $this->request->getPost('id'))->set($dataIbu)->update();

    if ($this->request->getPost('mempunyai_wali') == "Ya") {
      $dataWali = [
        'nama' => $this->request->getPost('nama_wali'),
        'nik' => $this->request->getPost('nik_wali'),
        'tahun_lahir' => $this->request->getPost('tahun_lahir_wali'),
        'pendidikan' => $this->request->getPost('pendidikan_wali'),
        'pekerjaan' => $this->request->getPost('pekerjaan_wali'),
        'penghasilan' => $this->request->getPost('penghasilan_wali'),
        'berkebutuhan_khusus' => $this->request->getPost('berkebutuhan_khusus_wali'),
      ];

      $this->dataWaliModel->where('student_id', $this->request->getPost('id'))->set($dataWali)->update();
    }

    session()->setFlashdata('message', 'Data diri siswa telah diperbarui');
    return redirect()->to(base_url('student/profile'));
  }

  public function registration()
  {
    $data['mainUrl'] = "student/profile";
    $data['mainTitle'] = "Siswa";
    $data['secTitle'] = "Pendaftaran";
    $data['view'] = "student/registration";
    $data['validation'] = \Config\Services::validation();

    $data['student'] = $this->studentModel->find(session()->get('id'));

    return $this->template($data);
  }

  public function processRegistration()
  {
    $formValidation = [
      'nem' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'NEM tidak boleh kosong'
        ]
      ],
      'asal_sekolah' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Asal sekolah tidak boleh kosong'
        ]
      ],
    ];

    if (!$this->validate($formValidation)) {
      $validation = \Config\Services::validation();
      return redirect()->to(base_url('student/registration'))->withInput()->with('validation', $validation);
    }

    $input = [
      'unique_id' => 'DFT' . date('Ymd') . session()->get('id'),
      'student_id' => session()->get('id'),
      'nem' => $this->request->getPost('nem'),
      'asal_sekolah' => $this->request->getPost('asal_sekolah'),
      'prestasi' => $this->request->getPost('prestasi'),
      'keterangan' => '',
      'catatan' => $this->request->getPost('catatan'),
      'status' => 'Sedang Diproses'
    ];

    $this->registrationModel->insert($input);

    session()->setFlashdata('message', 'Pendaftaran anda berhasil dilakukan, silahkan lengkapi berkas yang diperlukan');
    return redirect()->to(base_url('student/berkas'));
  }

  public function berkas()
  {
    if ($this->request->getVar('act') == "edit") {
      return $this->editBerkas();
    }

    if ($this->request->getVar('act') == "delete") {
      return $this->deleteBerkas();
    }

    $data['mainUrl'] = "student/profile";
    $data['mainTitle'] = "Siswa";
    $data['secTitle'] = "Berkas";
    $data['view'] = "student/berkas";
    $data['validation'] = \Config\Services::validation();

    $data['student'] = $this->registrationModel->getRegistration();
    $data['berkas'] = $this->berkasModel->where('student_id', session()->get('id'))->find();

    return $this->template($data);
  }

  public function uploadBerkas()
  {
    $data['mainUrl'] = "student/profile";
    $data['mainTitle'] = "Siswa";
    $data['secTitle'] = "Upload Berkas";
    $data['view'] = "student/upload_berkas";
    $data['validation'] = \Config\Services::validation();

    $data['student'] = $this->registrationModel->getRegistration();
    $data['berkas'] = $this->berkasModel->where('student_id', session()->get('id'))->find();

    return $this->template($data);
  }

  public function processUploadBerkas()
  {

    $photos = $this->request->getFiles();

    foreach ($photos['foto'] as $photo_k => $photo_v) {
		if ($photo_v->isValid()) {

      $fileName = $photo_v->getRandomName();

			$input[] = [
				'student_id' => $this->request->getPost('student_id'),
				'jenis_berkas' => $this->request->getPost('jenis_berkas[]')[$photo_k],
				'deskripsi_berkas' => $this->request->getPost('deskripsi[]')[$photo_k],
				'dokumen' => $fileName,
				'status' => 'Sedang Diverifikasi',
				'catatan' => $this->request->getPost('catatan[]')[$photo_k]
			];

			$photo_v->move(ROOTPATH . 'assets/images/dokumen', $fileName);
		}
    }

    $this->berkasModel->insertBatch($input);

    session()->setFlashdata('message', 'Seluruh berkas berhasil diupload');
    return redirect()->to(base_url('student/berkas'));
  }

  public function editBerkas()
  {
    if (md5($this->request->getVar('id')) <> $this->request->getVar('key')) {
      return redirect()->to(base_url('not-found'));
    }

    $data['mainUrl'] = "student/profile";
    $data['mainTitle'] = "Siswa";
    $data['secTitle'] = "Edit Berkas";
    $data['view'] = "student/edit_berkas";
    $data['validation'] = \Config\Services::validation();

    $data['student'] = $this->registrationModel->getRegistration();
    $data['berkas'] = $this->berkasModel->find($this->request->getVar('id'));

    return $this->template($data);
  }

  public function deleteBerkas()
  {
    if (md5($this->request->getVar('id')) <> $this->request->getVar('key')) {
      return redirect()->to(base_url('not-found'));
    }

    $berkas = $this->berkasModel->find($this->request->getVar('id'));
    $this->berkasModel->delete($this->request->getVar('id'));

    session()->setFlashdata('message', 'Dokumen ' . $berkas->jenis_berkas . ' telah dihapus');
    return redirect()->to(base_url('student/berkas'));
  }

  public function reuploadBerkas()
  {

    if (md5($this->request->getPost('id')) <> $this->request->getPost('key')) {
      return redirect()->to(base_url('not-found'));
    }

    $berkas = $this->berkasModel->find($this->request->getPost('id'));
    if ($berkas) {
      $filePath = ROOTPATH . 'assets/images/dokumen/' . $berkas->dokumen;
      if (file_exists($filePath)) {
        unlink($filePath);
      }
    }

    $dokumen = $this->request->getFile('dokumen');
    $fileName = $dokumen->getRandomName();

    $input = [
      'id' => $this->request->getPost('id'),
      'jenis_berkas' => $this->request->getPost('jenis_berkas'),
      'deskripsi_berkas' => $this->request->getPost('deskripsi'),
      'catatan' => $this->request->getPost('catatan'),
      'status' => 'Sedang Diverifikasi',
      'dokumen' => $fileName
    ];

    $dokumen->move(ROOTPATH . 'assets/images/dokumen', $fileName);

    $this->berkasModel->save($input);
    session()->setFlashdata('message', $this->request->getPost('jenis_berkas') . ' telah diperbarui');
    return redirect()->to(base_url('student/berkas'));
  }

  public function changeAvatar()
  {
    $image = $this->request->getFile('avatar');
    if ($image->isValid()) {
      $student = $this->studentModel->find(session()->get('id'));

      if ($student->image <> "user.png") {
        $imagePath = ROOTPATH . 'assets/images/avatars/' . $student->image;
        if (file_exists($imagePath)) {
          unlink($imagePath);
        }
      }

      $fileName = $image->getRandomName();

      $input = [
        'id' => session()->get('id'),
        'image' => $fileName
      ];

      $image->move(ROOTPATH . 'assets/images/avatars', $fileName);

      $this->studentModel->save($input);

      session()->setFlashdata('message', 'Avatar telah diperbarui');
      return redirect()->to(base_url('student/profile'));
    } else {
      return redirect()->to(base_url('student/profile'));
    }
  }

  public function payment()
  {
    if ($this->request->getVar('act') == "edit") {
      return $this->editPayment();
    }

    if ($this->request->getVar('act') == "delete") {
      return $this->deletePayment();
    }

    $data['mainUrl'] = "student/profile";
    $data['mainTitle'] = "Siswa";
    $data['secTitle'] = "Pembayaran";
    $data['view'] = "student/payment";
    $data['validation'] = \Config\Services::validation();

    $data['student'] = $this->registrationModel->getRegistration();
    $data['payments'] = $this->paymentModel->where('student_id', session()->get('id'))->find();

    return $this->template($data);
  }

  public function processPayment()
  {
    if (md5($this->request->getPost('id')) <> $this->request->getPost('key')) {
      return redirect()->to(base_url('not-found'));
    }

    $bukti_bayar = $this->request->getFile('bukti_bayar');
    $fileName = $bukti_bayar->getRandomName();

    $input = [
      'student_id' => $this->request->getPost('id'),
      'unique_id' => 'PMB' . date('Ymd') . $this->request->getPost('id'),
      'image' => $fileName,
      'nominal' => $this->request->getPost('nominal'),
      'description' => $this->request->getPost('catatan'),
      'status' => 'Sedang Diverifikasi'
    ];

    $bukti_bayar->move(ROOTPATH . 'assets/images/bukti_bayar', $fileName);

    $this->paymentModel->insert($input);

    session()->setFlashdata('message', 'Bukti pembayaran berhasil diunggah');
    return redirect()->to(base_url('student/payment'));
  }

  public function editPayment()
  {
    if (md5($this->request->getVar('id')) <> $this->request->getVar('key')) {
      return redirect()->to(base_url('not-found'));
    }

    $data['mainUrl'] = "student/profile";
    $data['mainTitle'] = "Siswa";
    $data['secTitle'] = "Pembayaran";
    $data['view'] = "student/edit_payment";
    $data['validation'] = \Config\Services::validation();

    $data['payments'] = $this->paymentModel->where('student_id', session()->get('id'))->find();
    $data['payment'] = $this->paymentModel->find($this->request->getVar('id'));

    return $this->template($data);
  }

  public function reuploadPayment()
  {
    if (md5($this->request->getPost('id')) <> $this->request->getPost('key')) {
      return redirect()->to(base_url('not-found'));
    }

    $payment = $this->paymentModel->find($this->request->getPost('id'));
    if ($payment) {
      $filePath = ROOTPATH . 'assets/images/bukti_bayar/' . $payment->image;
      if (file_exists($filePath)) {
        unlink($filePath);
      }
    }

    $bukti_bayar = $this->request->getFile('bukti_bayar');
    $fileName = $bukti_bayar->getRandomName();

    $input = [
      'id' => $this->request->getPost('id'),
      'image' => $fileName,
      'nominal' => $this->request->getPost('nominal'),
      'description' => $this->request->getPost('catatan'),
      'status' => 'Sedang Diverifikasi'
    ];

    $bukti_bayar->move(ROOTPATH . 'assets/images/bukti_bayar', $fileName);

    $this->paymentModel->save($input);

    session()->setFlashdata('message', 'Bukti pembayaran berhasil diperbarui');
    return redirect()->to(base_url('student/payment'));
  }

  public function deletePayment()
  {
    if (md5($this->request->getVar('id')) <> $this->request->getVar('key')) {
      return redirect()->to(base_url('not-found'));
    }

    $payment = $this->paymentModel->find($this->request->getVar('id'));
    if ($payment) {
      $filePath = ROOTPATH . 'assets/images/bukti_bayar/' . $payment->image;
      if (file_exists($filePath)) {
        unlink($filePath);
      }
    }

    $this->paymentModel->delete($this->request->getVar('id'));

    session()->setFlashdata('message', 'Bukti pembayaran berhasil dihapus');
    return redirect()->to(base_url('student/payment'));
  }
}
