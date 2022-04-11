<?php

namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController
{
  private $validation;
  private $userModel;

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

    $this->validation = \Config\Services::validation();
    $this->userModel = new User();
  }

  public function index()
  {
    $data['mainUrl'] = "user";
    $data['mainTitle'] = "User";
    $data['secTitle'] = "Data";
    $data['view'] = "user/index";

    $data['users'] = $this->userModel->findAll();

    return $this->template($data);
  }

  public function create()
  {
    $data['mainUrl'] = "user";
    $data['mainTitle'] = "User";
    $data['secTitle'] = "Tambah";
    $data['view'] = "user/create";
    $data['validation'] = \Config\Services::validation();

    return $this->template($data);
  }

  public function store()
  {
    $formValidation = [
      'name' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama pengguna tidak boleh kosong'
        ]
      ],
      'username' => [
        'rules' => 'required|is_unique[users.username]',
        'errors' => [
          'required' => 'Username tidak boleh kosong',
          'is_unique' => 'Username ini telah terdaftar'
        ]
      ],
      'password' => [
        'rules' => 'required|matches[confirm_password]',
        'errors' => [
          'required' => 'Password tidak boleh kosong'
        ]
      ],
      'confirm_password' => [
        'rules' => 'required|matches[password]',
        'errors' => [
          'required' => 'Konfirmasi password tidak boleh kosong',
          'matches' => 'Password tidak sama'
        ]
      ],
      'email' => [
        'rules' => 'required|is_unique[users.email]',
        'errors' => [
          'required' => 'Email tidak boleh kosong',
          'is_unique' => 'Email ini telah terdaftar'
        ]
      ],
      'phone_number' => [
        'rules' => 'required|is_unique[users.phone_number]',
        'errors' => [
          'required' => 'Nomor telepon tidak boleh kosong',
          'phone_number' => 'Nomor telepon ini telah terdaftar'
        ]
      ],
      'level' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Level harus dipilih'
        ]
      ],
      'status' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Status harus dipilih'
        ]
      ],
    ];


    if (!$this->validate($formValidation)) {
      $validation = \Config\Services::validation();
      return redirect()->to(base_url('user/create'))->withInput()->with('validation', $validation);
    }

    $input = [
      'name' => $this->request->getPost('name'),
      'email' => $this->request->getPost('email'),
      'phone_number' => $this->request->getPost('phone_number'),
      'level' => $this->request->getPost('level'),
      'username' => $this->request->getPost('username'),
      'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
      'status' => $this->request->getPost('status'),
      'description' => $this->request->getPost('description'),
    ];

    $this->userModel->insert($input);

    session()->setFlashdata('message', 'Data pengguna baru berhasil ditambahkan');
    return redirect()->to(base_url('user'));
  }

  public function edit()
  {
    $uri = service('uri');
    $username = $uri->getSegment(3);

    $user = $this->userModel->where('username', $username)->first();

    if (!$user) {
      return redirect()->to(base_url('not-found'));
    }

    $data['mainUrl'] = "user";
    $data['mainTitle'] = "User";
    $data['secTitle'] = "Edit";
    $data['view'] = "user/edit";
    $data['validation'] = \Config\Services::validation();
    $data['user'] = $user;

    return $this->template($data);
  }

  public function update()
  {
    $formValidation = [
      'name' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama pengguna tidak boleh kosong'
        ]
      ],
      'username' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Username tidak boleh kosong'
        ]
      ],
      'email' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Email tidak boleh kosong'
        ]
      ],
      'phone_number' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nomor telepon tidak boleh kosong'
        ]
      ],
      'level' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Level harus dipilih'
        ]
      ],
      'status' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Status harus dipilih'
        ]
      ],
    ];


    if (!$this->validate($formValidation)) {
      $validation = \Config\Services::validation();
      return redirect()->to(base_url('user/edit/' . $this->request->getPost('username')))->withInput()->with('validation', $validation);
    }

    if (md5($this->request->getPost('id')) <> $this->request->getPost('key')) {
      return redirect()->to(base_url('not-found'));
    }

    $input = [
      'id' => $this->request->getPost('id'),
      'name' => $this->request->getPost('name'),
      'email' => $this->request->getPost('email'),
      'phone_number' => $this->request->getPost('phone_number'),
      'level' => $this->request->getPost('level'),
      'username' => $this->request->getPost('username'),
      'status' => $this->request->getPost('status'),
      'description' => $this->request->getPost('description'),
    ];

    $this->userModel->save($input);

    session()->setFlashdata('message', 'Data pengguna telah berhasil diperbarui');
    return redirect()->to(base_url('user'));
  }

  public function resetPassword()
  {
    $uri = service('uri');
    $username = $uri->getSegment(3);

    $user = $this->userModel->where('username', $username)->first();

    if (!$user) {
      return redirect()->to(base_url('not-found'));
    }

    $data['mainUrl'] = "user";
    $data['mainTitle'] = "User";
    $data['secTitle'] = "Reset Password";
    $data['view'] = "user/reset-password";
    $data['validation'] = \Config\Services::validation();
    $data['user'] = $user;

    return $this->template($data);
  }

  public function storeResetPassword()
  {
    $formValidation = [
      'name' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama pengguna tidak boleh kosong'
        ]
      ],
      'username' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Username tidak boleh kosong',
          'is_unique' => 'Username ini telah terdaftar'
        ]
      ],
      'password' => [
        'rules' => 'required|matches[confirm_password]',
        'errors' => [
          'required' => 'Password tidak boleh kosong'
        ]
      ],
      'confirm_password' => [
        'rules' => 'required|matches[password]',
        'errors' => [
          'required' => 'Konfirmasi password tidak boleh kosong',
          'matches' => 'Password tidak sama'
        ]
      ],
    ];


    if (!$this->validate($formValidation)) {
      $validation = \Config\Services::validation();
      return redirect()->to(base_url('user/create'))->withInput()->with('validation', $validation);
    }

    if (md5($this->request->getPost('id')) <> $this->request->getPost('key')) {
      return redirect()->to(base_url('not-found'));
    }

    $input = [
      'id' => $this->request->getPost('id'),
      'username' => $this->request->getPost('username'),
      'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
    ];

    $this->userModel->save($input);

    session()->setFlashdata('message', 'Reset password username ' . $this->request->getPost('username') . ' berhasil dilakukan');
    return redirect()->to(base_url('user'));
  }

  public function destroy()
  {
    if (md5($this->request->getVar('id')) <> $this->request->getVar('key')) {
      return redirect()->to(base_url('not-found'));
    }

    $this->userModel->delete($this->request->getVar('id'));

    session()->setFlashdata('message', 'Data pengguna telah berhasil dihapus');
    return redirect()->to(base_url('user'));
  }
}
