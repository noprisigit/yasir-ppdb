<?php

namespace App\Controllers;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Provinsi;

class WilayahController extends BaseController
{
  private $provinsiModel;
  private $kabupatenModel;
  private $kecamatanModel;
  private $kelurahanModel;

  public function __construct()
  {
    $this->provinsiModel = new Provinsi();
    $this->kabupatenModel = new Kabupaten();
    $this->kecamatanModel = new Kecamatan();
    $this->kelurahanModel = new Kelurahan();
  }

  public function getKabupaten()
  {
    if ($this->request->getVar('provinsiID') <> null) {
      $kabupaten = $this->kabupatenModel->where('provinsi_id', $this->request->getVar('provinsiID'))->find();

      $output = '';
      $output .= '<option selected disabled></option>';
      foreach ($kabupaten as $item) {
        $output .= '<option value="' . $item->id . '">' . $item->nama . '</option>';
      }

      return json_encode($output);
    }
  }

  public function getKecamatan()
  {
    if ($this->request->getVar('kabupatenID') <> null) {
      $kecamatan = $this->kecamatanModel->where('kabupaten_id', $this->request->getVar('kabupatenID'))->find();

      $output = '';
      $output .= '<option selected disabled></option>';
      foreach ($kecamatan as $item) {
        $output .= '<option value="' . $item->id . '">' . $item->nama . '</option>';
      }

      return json_encode($output);
    }
  }

  public function getKelurahan()
  {
    if ($this->request->getVar('kecamatanID') <> null) {
      $kelurahan = $this->kelurahanModel->where('kecamatan_id', $this->request->getVar('kecamatanID'))->find();

      $output = '';
      $output .= '<option selected disabled></option>';
      foreach ($kelurahan as $item) {
        $output .= '<option value="' . $item->id . '">' . $item->nama . '</option>';
      }

      return json_encode($output);
    }
  }
}
