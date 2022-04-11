<?php

namespace App\Models;

use CodeIgniter\Model;

class Provinsi extends Model
{
  protected $table = "wilayah_provinsi";
  protected $primaryKey = "id";
  protected $returnType = "object";
  protected $allowedFields = ['nama'];
}