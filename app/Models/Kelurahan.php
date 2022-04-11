<?php

namespace App\Models;

use CodeIgniter\Model;

class Kelurahan extends Model
{
  protected $table = "wilayah_desa";
  protected $primaryKey = "id";
  protected $returnType = "object";
  protected $allowedFields = ['kecamatan_id', 'nama'];
}