<?php

namespace App\Controllers;

use App\Models\Payment;
use App\Models\User;

class PaymentController extends BaseController
{
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

    $this->paymentModel = new Payment(); 
  }

  public function index()
  {
    if ($this->request->getVar('act') == "confirm") {
      return $this->paymentConfirmation();
    }

    $data['mainUrl'] = "payment";
    $data['mainTitle'] = "Pembayaran";
    $data['secTitle'] = "Data";
    $data['view'] = "payment/index";

    $data['payments'] = $this->paymentModel->getPayments();

    return $this->template($data);
  }

  public function paymentConfirmation()
  {
    if (md5($this->request->getPost('id')) <> $this->request->getPost('key')) {
      return redirect()->to(base_url('not-found'));
    }

    $input = [
      'id' => $this->request->getPost('id'),
      'status' => $this->request->getPost('status')
    ];

    $this->paymentModel->save($input);

    session()->setFlashdata('message', 'Bukti pembayaran telah dikonfirmasi');
    return redirect()->to(base_url('payment'));
  }
}