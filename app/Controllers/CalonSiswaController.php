<?php

namespace App\Controllers;

use App\Models\Berkas;
use App\Models\DataAyah;
use App\Models\DataIbu;
use App\Models\DataWali;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pengumuman;
use App\Models\Provinsi;
use App\Models\Registration;
use App\Models\Student;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CalonSiswaController extends BaseController
{
  private $berkasModel;
  private $dataAyahModel;
  private $dataIbuModel;
  private $dataWaliModel;
  private $pengumumanModel;
  private $registrationModel;
  private $studentModel;

  private $provinsiModel;
  private $kabupatenModel;
  private $kecamatanModel;
  private $kelurahanModel;

  public function __construct()
  {
    if (!session()->get('id')) {
      header('location: ' . base_url('login'));
      die;
    } else {
      if (session()->get('status') <> "Administrator" || session()->get('Petugas PSB')) {
        header('location: ' . base_url('not-found'));
        die;
      }
    }

    $this->berkasModel = new Berkas();
    $this->dataAyahModel = new DataAyah();
    $this->dataIbuModel = new DataIbu();
    $this->dataWaliModel = new DataWali();
    $this->pengumumanModel = new Pengumuman();
    $this->registrationModel = new Registration();
    $this->studentModel = new Student();

    $this->provinsiModel = new Provinsi();
    $this->kabupatenModel = new Kabupaten();
    $this->kecamatanModel = new Kecamatan();
    $this->kelurahanModel = new Kelurahan();
  }

  public function index()
  {
    if ($this->request->getVar('act') == 'detail') {
      return $this->detailCalonSiswa();
    }

    if ($this->request->getVar('act') == 'edit') {
      return $this->editCalonSiswa();
    }

    if ($this->request->getVar('act') == 'delete') {
      return $this->deleteCalonSiswa();
    }

    if ($this->request->getVar('act') == 'excel') {
      if ($this->request->getVar('jenjang') <> "") {
        return $this->exportExcel($this->request->getVar('jenjang'));
      } else {
        return $this->exportExcel();
      }
    }

    if ($this->request->getVar('act') == 'filter' && $this->request->getVar('jenjang') <> "") {
      $data['students'] = $this->studentModel->where('jenjang', $this->request->getVar('jenjang'))->find();
    } else {
      $data['students'] = $this->studentModel->findAll();
    }

    $data['mainUrl'] = "calon-siswa";
    $data['mainTitle'] = "Calon Siswa";
    $data['secTitle'] = "Data";
    $data['view'] = "calon-siswa/index";

    return $this->template($data);
  }

  public function exportExcel($jenjang = null)
  {
    if ($jenjang <> null) {
      $students = $this->studentModel->getAllStudents(['jenjang' => $jenjang]);
    } else {
      $students = $this->studentModel->getAllStudents();
    }

    $spreadsheet = new Spreadsheet();

    $spreadsheet->setActiveSheetIndex(0)
      ->mergeCells('A1:BA1')
      ->setCellValue('A1', 'Data Siswa Yasir Islamic School');

    $styleArray = [
      'borders' => [
        'allBorders' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
      ],
    ];
    $spreadsheet->setActiveSheetIndex(0)->getStyle('A4:BA4')->applyFromArray($styleArray);

    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('A4', 'No')
      ->setCellValue('B4', 'Nama')
      ->setCellValue('C4', 'Jenjang')
      ->setCellValue('D4', 'Kewarganegaraan')
      ->setCellValue('E4', 'NIK')
      ->setCellValue('F4', 'NISN')
      ->setCellValue('G4', 'No KK')
      ->setCellValue('H4', 'Tempat Lahir')
      ->setCellValue('I4', 'Tanggal Lahir')
      ->setCellValue('J4', 'No Registrasi Akta Lahir')
      ->setCellValue('K4', 'Berkebutuhan Khusus')
      ->setCellValue('L4', 'Agama')
      ->setCellValue('M4', 'Provinsi')
      ->setCellValue('N4', 'Kabupaten')
      ->setCellValue('O4', 'Kecamatan')
      ->setCellValue('P4', 'Kelurahan')
      ->setCellValue('Q4', 'ALamat')
      ->setCellValue('R4', 'RT')
      ->setCellValue('S4', 'RW')
      ->setCellValue('T4', 'Nama Dusun')
      ->setCellValue('U4', 'Kode Pos')
      ->setCellValue('V4', 'Lintang')
      ->setCellValue('W4', 'Bujur')
      ->setCellValue('X4', 'Tempat Tinggal')
      ->setCellValue('Y4', 'Moda Transportasi')
      ->setCellValue('Z4', 'Anak Ke')
      ->setCellValue('AA4', 'Penerima KPS')
      ->setCellValue('AB4', 'Punya KIP')
      ->setCellValue('AC4', 'Layak PIP')
      ->setCellValue('AD4', 'No Telepon Rumah')
      ->setCellValue('AE4', 'Nomor HP')
      ->setCellValue('AF4', 'Email')
      ->setCellValue('AG4', 'Nama Ayah')
      ->setCellValue('AH4', 'NIK Ayah')
      ->setCellValue('AI4', 'Tahun Lahir Ayah')
      ->setCellValue('AJ4', 'Pendidikan Ayah')
      ->setCellValue('AK4', 'Pekerjaan Ayah')
      ->setCellValue('AL4', 'Penghasilan Ayah')
      ->setCellValue('AM4', 'Berkebutuhan Khusus Ayah')
      ->setCellValue('AN4', 'Nama Ibu')
      ->setCellValue('AO4', 'NIK Ibu')
      ->setCellValue('AP4', 'Tahun Lahir Ibu')
      ->setCellValue('AQ4', 'Pendidikan Ibu')
      ->setCellValue('AR4', 'Pekerjaan Ibu')
      ->setCellValue('AS4', 'Penghasilan Ibu')
      ->setCellValue('AT4', 'Berkebutuhan Khusus Ibu')
      ->setCellValue('AU4', 'Nama Wali')
      ->setCellValue('AV4', 'NIK Wali')
      ->setCellValue('AW4', 'Tahun Lahir Wali')
      ->setCellValue('AX4', 'Pendidikan Wali')
      ->setCellValue('AY4', 'Pekerjaan Wali')
      ->setCellValue('AZ4', 'Penghasilan Wali')
      ->setCellValue('BA4', 'Berkebutuhan Khusus Wali');


    $column = 5;
    $no = 1;
    foreach ($students as $item) {
      $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A' . $column, $no++)
        ->setCellValue('B' . $column, $item->nama)
        ->setCellValue('C' . $column, $item->jenjang)
        ->setCellValue('D' . $column, $item->kewarganegaraan)
        ->setCellValue('E' . $column, $item->nik)
        ->setCellValue('F' . $column, $item->nisn)
        ->setCellValue('G' . $column, $item->no_kk)
        ->setCellValue('H' . $column, $item->tempat_lahir)
        ->setCellValue('I' . $column, $item->tanggal_lahir)
        ->setCellValue('J' . $column, $item->no_registrasi_akta_lahir)
        ->setCellValue('K' . $column, $item->berkebutuhan_khusus)
        ->setCellValue('L' . $column, $item->agama)
        ->setCellValue('M' . $column, $item->nama_provinsi)
        ->setCellValue('N' . $column, $item->nama_kabupaten)
        ->setCellValue('O' . $column, $item->nama_kecamatan)
        ->setCellValue('P' . $column, $item->nama_kelurahan)
        ->setCellValue('Q' . $column, $item->alamat)
        ->setCellValue('R' . $column, $item->rt)
        ->setCellValue('S' . $column, $item->rw)
        ->setCellValue('T' . $column, $item->nama_dusun)
        ->setCellValue('U' . $column, $item->kode_pos)
        ->setCellValue('V' . $column, $item->lintang)
        ->setCellValue('W' . $column, $item->bujur)
        ->setCellValue('X' . $column, $item->tempat_tinggal)
        ->setCellValue('Y' . $column, $item->moda_transportasi)
        ->setCellValue('Z' . $column, $item->anak_ke)
        ->setCellValue('AA' . $column, $item->penerima_kps)
        ->setCellValue('AB' . $column, $item->punya_kip)
        ->setCellValue('AC' . $column, $item->layak_pip)
        ->setCellValue('AD' . $column, $item->no_telepon_rumah)
        ->setCellValue('AE' . $column, $item->nomor_hp)
        ->setCellValue('AF' . $column, $item->email)
        ->setCellValue('AG' . $column, $item->nama_ayah)
        ->setCellValue('AH' . $column, $item->nik_ayah)
        ->setCellValue('AI' . $column, $item->tahun_lahir_ayah)
        ->setCellValue('AJ' . $column, $item->pendidikan_ayah)
        ->setCellValue('AK' . $column, $item->pekerjaan_ayah)
        ->setCellValue('AL' . $column, $item->penghasilan_ayah)
        ->setCellValue('AM' . $column, $item->berkebutuhan_khusus_ayah)
        ->setCellValue('AN' . $column, $item->nama_ibu)
        ->setCellValue('AO' . $column, $item->nik_ibu)
        ->setCellValue('AP' . $column, $item->tahun_lahir_ibu)
        ->setCellValue('AQ' . $column, $item->pendidikan_ibu)
        ->setCellValue('AR' . $column, $item->pekerjaan_ibu)
        ->setCellValue('AS' . $column, $item->penghasilan_ibu)
        ->setCellValue('AT' . $column, $item->berkebutuhan_khusus_ibu)
        ->setCellValue('AU' . $column, $item->nama_wali)
        ->setCellValue('AV' . $column, $item->nik_wali)
        ->setCellValue('AW' . $column, $item->tahun_lahir_wali)
        ->setCellValue('AX' . $column, $item->pendidikan_wali)
        ->setCellValue('AY' . $column, $item->pekerjaan_wali)
        ->setCellValue('AZ' . $column, $item->penghasilan_wali)
        ->setCellValue('BA' . $column, $item->berkebutuhan_khusus_wali);
      
      $spreadsheet->setActiveSheetIndex(0)->getStyle('A' . $column . ':BA'. $column)->applyFromArray($styleArray);

      $column++;
    }

    $writer = new Xlsx($spreadsheet);
    $fileName = "Data Siswa";

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
  }

  public function detailCalonSiswa()
  {
    if (md5($this->request->getVar('id')) <> $this->request->getVar('key')) {
      return redirect()->to(base_url('not-found'));
    }

    $data['mainUrl'] = "calon-siswa";
    $data['mainTitle'] = "Siswa";
    $data['secTitle'] = "Berkas";
    $data['view'] = "calon-siswa/berkas";
    $data['validation'] = \Config\Services::validation();

    $data['student'] = $this->registrationModel->getRegistration($this->request->getVar('id'));
    $data['berkas'] = $this->berkasModel->where('student_id', $this->request->getVar('id'))->find();

    $data['berkasProses'] = $this->berkasModel->where(['student_id' => $this->request->getVar('id'), 'status' => 'Sedang Diverifikasi'])->find();
    $data['pengumuman'] = $this->pengumumanModel->where('student_id', $this->request->getVar('id'))->first();

    return $this->template($data);
  }

  public function editCalonSiswa()
  {
    if (md5($this->request->getVar('id')) <> $this->request->getVar('key')) {
      return redirect()->to(base_url('not-found'));
    }

    $data['mainUrl'] = "calon-siswa";
    $data['mainTitle'] = "Calon Siswa";
    $data['secTitle'] = "Edit";
    $data['view'] = "student/edit";
    $data['validation'] = \Config\Services::validation();

    $studentID = $this->request->getVar('id');
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

  public function deleteCalonSiswa()
  {
    if (md5($this->request->getVar('id')) <> $this->request->getVar('key')) {
      return redirect()->to(base_url('not-found'));
    }

    $studentID = $this->request->getVar('id');

    $student = $this->studentModel->find($studentID);
    $this->studentModel->delete($studentID);
    $this->dataAyahModel->where('student_id', $studentID)->delete();
    $this->dataIbuModel->where('student_id', $studentID)->delete();
    $this->dataWaliModel->where('student_id', $studentID)->delete();

    session()->setFlashdata('message', 'Data siswa a.n ' . $student->nama . ' telah dihapus');
    return redirect()->to(base_url('calon-siswa'));
  }

  public function verify()
  {
    if (md5($this->request->getPost('id')) <> $this->request->getPost('key')) {
      return redirect()->to(base_url('not-found'));
    }

    $berkas = $this->berkasModel->find($this->request->getPost('id'));

    $input = [
      'id' => $this->request->getPost('id'),
      'status' => $this->request->getPost('status'),
      'catatan' => $this->request->getPost('catatan')
    ];

    $this->berkasModel->save($input);

    session()->setFlashdata('message', $berkas->jenis_berkas . ' telah diverifikasi');
    return redirect()->to(base_url('calon-siswa?act=detail&id=' . $berkas->student_id . '&key=' . md5($berkas->student_id)));
  }

  public function prosesPendaftaran()
  {
    $formValidation = [
      'penilaian' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Penilaian harus diisi'
        ]
      ],
      'status' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Status kelulusan harus dipilih'
        ]
      ]
    ];

    if (!$this->validate($formValidation)) {
      $validation = \Config\Services::validation();
      return redirect()->to(base_url('calon-siswa?act=detail&id=' . $this->request->getPost('student_id') . '&key=' . md5($this->request->getPost('student_id'))))->withInput()->with('validation', $validation);
    }

    if (md5($this->request->getPost('student_id')) <> $this->request->getPost('key')) {
      return redirect()->to(base_url('not-found'));
    }

    $input = [
      'student_id' => $this->request->getPost('student_id'),
      'penilaian' => $this->request->getPost('penilaian'),
      'catatan' => $this->request->getPost('catatan'),
      'status' => $this->request->getPost('status')
    ];

    $this->pengumumanModel->insert($input);
    $this->registrationModel->where('student_id', $this->request->getPost('student_id'))->set(['status' => $this->request->getPost('status')])->update();

    session()->setFlashdata('message', 'Proses validasi data siswa telah selesai');
    return redirect()->to(base_url('calon-siswa?act=detail&id=' . $this->request->getPost('student_id') . '&key=' . md5($this->request->getPost('student_id'))));
  }

  public function pengumuman()
  {
    $data['mainUrl'] = "pengumuman";
    $data['mainTitle'] = "Pengumuman";
    $data['secTitle'] = "Data";
    $data['view'] = "calon-siswa/pengumuman";
    $data['validation'] = \Config\Services::validation();

    $data['pengumuman'] = $this->pengumumanModel->getAllPengumuman();

    return $this->template($data);
  }
}
