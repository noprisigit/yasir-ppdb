<?php

namespace App\Controllers;

use App\Models\Payment;
use App\Models\Registration;
use App\Models\Student;
use App\Models\User;

class HomeController extends BaseController
{
  private $userModel;
  private $studentModel;
  private $registrationModel;
  private $paymentModel;

  public function __construct()
  {
    if (!session()->get('id')) {
      header('location: ' . base_url('login'));
      die;
    } else {
      if (session()->get('status') <> "Administrator" || session()->get('Petugas PSB')) {
        header('location: ' .base_url('not-found'));
        die;
      }
    }

    $this->userModel = new User();
    $this->studentModel = new Student();
    $this->registrationModel = new Registration();
    $this->paymentModel = new Payment();
  }

  public function index()
  {
    $data['mainTitle'] = "Home";
    $data['secTitle'] = "Dashboard";
    $data['view'] = "dashboard";

    $data['totalPengguna'] = $this->userModel->countAllResults();
    $data['totalStudent'] = $this->studentModel->countAllResults();
    $data['totalRegistration'] = $this->registrationModel->countAllResults();
    $data['totalPayment'] = $this->paymentModel->countAllResults();

    $data['ra'] = $this->studentModel->where('jenjang', 'Raudatul Athfal')->countAllResults();
    $data['sdit'] = $this->studentModel->where('jenjang', 'SDIT')->countAllResults();
    $data['smpit'] = $this->studentModel->where('jenjang', 'SMPIT')->countAllResults();

    return $this->template($data);
  }

  public function getGrafikJenjang()
  {
    $data['ra'] = $this->studentModel->where('jenjang', 'Raudatul Athfal')->countAllResults();
    $data['sdit'] = $this->studentModel->where('jenjang', 'SDIT')->countAllResults();
    $data['smpit'] = $this->studentModel->where('jenjang', 'SMPIT')->countAllResults();

    return json_encode($data);
  }

  public function getGrafikAsalProvinsi()
  {
    $data['provinsi'] = $this->studentModel->getGrafikAsalProvinsi();

    return json_encode($data);
  }

  public function getGrafikAsalKabupaten()
  {
    $data['kabupaten'] = $this->studentModel->getGrafikAsalKabupaten();

    return json_encode($data);
  }
}
