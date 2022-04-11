<?php

namespace App\Models;

use CodeIgniter\Model;

class Kabupaten extends Model
{
  protected $table = "wilayah_kabupaten";
  protected $primaryKey = "id";
  protected $returnType = "object";
  protected $allowedFields = ['provinsi_id', 'nama'];
}