<?php

namespace App\Controllers;

use App\Models\DataAyah;
use App\Models\DataIbu;
use App\Models\DataWali;
use App\Models\Student;
use App\Models\User;

class LandingController extends BaseController
{
  private $dataAyahModel;
  private $dataIbuModel;
  private $dataWaliModel;
  private $studentModel;
  private $userModel;

  public function __construct()
  {
    $this->dataAyahModel = new DataAyah();
    $this->dataIbuModel = new DataIbu();
    $this->dataWaliModel = new DataWali();
    $this->studentModel = new Student();
    $this->userModel = new User();
  }

  public function template($data)
  {
    return view('landing/template', $data);
  }

  public function index()
  {
    $data['view'] = 'landing/index';
    $data['title'] = "Home";
    $data['validation'] = \Config\Services::validation();

    return $this->template($data);
  }

  public function profile()
  {
    $data['view'] = 'landing/profile';
    $data['title'] = "Profile";

    return $this->template($data);
  }

  public function about()
  {
    $data['view'] = 'landing/about';
    $data['title'] = "About";

    return $this->template($data);
  }

  public function registration()
  {
    $data['view'] = 'landing/registration';
    $data['title'] = "Registration";
    $data['validation'] = \Config\Services::validation();

    return $this->template($data);
  }

  public function store()
  {
    $formValidation = [
      'jenjang' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Pendaftaran tingkat apa harus dipilih'
        ]
      ],
      'full_name' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama pengguna tidak boleh kosong'
        ]
      ],
      'dob' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tanggal lahir tidak boleh kosong'
        ]
      ],
      'nik' => [
        'rules' => 'required|is_unique[students.nik]',
        'errors' => [
          'required' => 'NIK tidak boleh kosong'
        ]
      ],
      'username' => [
        'rules' => 'required|is_unique[students.username]',
        'errors' => [
          'required' => 'Username tidak boleh kosong',
          'is_unique' => 'Username ini telah terdaftar'
        ]
      ],
      'password' => [
        'rules' => 'required|matches[confirm_password]',
        'errors' => [
          'required' => 'Password tidak boleh kosong',
          'matches' => 'Password tidak sama'
        ]
      ],
      'confirm_password' => [
        'rules' => 'required|matches[password]',
        'errors' => [
          'required' => 'Konfirmasi password tidak boleh kosong',
          'matches' => 'Password tidak sama'
        ]
      ]
    ];

    if (!$this->validate($formValidation)) {
      $validation = \Config\Services::validation();
      return redirect()->to(base_url('registration'))->withInput()->with('validation', $validation);
    }

    $input = [
      'unique_id' => 'CSW' . date('Ymds'),
      'nama' => $this->request->getPost('full_name'),
      'jenjang' => $this->request->getPost('jenjang'),
      'username' => $this->request->getPost('username'),
      'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
      'tanggal_lahir' => $this->request->getPost('dob'),
      'nik' => $this->request->getPost('nik'),
      'nisn' => $this->request->getPost('nisn'),
    ];

    $this->studentModel->insert($input);

    $dataAyah = [
      'student_id' => $this->studentModel->getInsertID()
    ];

    $this->dataAyahModel->insert($dataAyah);

    $dataIbu = [
      'student_id' => $this->studentModel->getInsertID()
    ];

    $this->dataIbuModel->insert($dataIbu);

    $dataWali = [
      'student_id' => $this->studentModel->getInsertID()
    ];

    $this->dataWaliModel->insert($dataWali);

    session()->setFlashdata('message', 'Pendaftaran anda berhasil diproses. Silahkan melakukan login');
    return redirect()->to(base_url('login'));
  }

  public function login()
  {
    $data['view'] = 'landing/login';
    $data['title'] = "Login";
    $data['validation'] = \Config\Services::validation();

    return $this->template($data);
  }

  public function processLogin()
  {
    $formValidation = [
      'username' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Username tidak boleh kosong'
        ]
      ],
      'password' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Password tidak boleh kosong'
        ]
      ]
    ];

    if (!$this->validate($formValidation)) {
      $validation = \Config\Services::validation();
      return redirect()->to(base_url('login'))->withInput()->with('validation', $validation);
    }

    $username = htmlspecialchars($this->request->getPost('username'), TRUE);
    $password = htmlspecialchars($this->request->getPost('password'), TRUE);

    $student = $this->studentModel->where(['username' => $username, ''])->first();
    $user = $this->userModel->where(['username' => $username, 'status' => 'Aktif'])->first();

    if ($student) {
      if (password_verify($password, $student->password)) {
        $session = [
          'id' => $student->id,
          'name' => $student->nama,
          'status' => 'Siswa'
        ];
        session()->set($session);
        echo "<script>alert('Otentikasi " . $session['status'] . " an \"" . $session['name'] . "\" berhasil Login!');
        document.location.href='" . base_url('student') . "';</script>";
      } else {
        session()->setFlashdata('err_message', 'Username atau password tidak valid');
        return redirect()->to(base_url('login'));
      }
    } elseif ($user) {
      if (password_verify($password, $user->password)) {
        $session = [
          'id' => $user->id,
          'name' => $user->name,
          'status' => $user->level
        ];
        session()->set($session);
        echo "<script>alert('Otentikasi " . $session['status'] . " an \"" . $session['name'] . "\" berhasil Login!');
        document.location.href='" . base_url('dashboard') . "';</script>";
      } else {
        session()->setFlashdata('err_message', 'Username atau password tidak valid');
        return redirect()->to(base_url('login'));
      }
    } else {
      session()->setFlashdata('err_message', 'Username atau password tidak valid');
      return redirect()->to(base_url('login'));
    }
  }

  public function logout()
  {
    $session = ['id', 'name', 'status'];
    session()->remove($session);
    session()->setFlashdata('success_message', 'Sesi anda telah berakhir');

    return redirect()->to(base_url('login'));
  }
}
