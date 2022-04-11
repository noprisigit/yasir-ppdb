<?php

namespace App\Models;

use CodeIgniter\Model;

class DataWali extends Model
{
  protected $table = "data_wali";
  protected $primaryKey = "id";
  protected $returnType = "object";
  protected $allowedFields = ['student_id', 'nama', 'nik', 'tahun_lahir', 'pendidikan', 'pekerjaan', 'penghasilan', 'berkebutuhan_khusus'];
}