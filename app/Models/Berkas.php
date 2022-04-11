<?php

namespace App\Models;

use CodeIgniter\Model;

class Berkas extends Model
{
  protected $table = "berkas";
  protected $primaryKey = "id";
  protected $returnType = "object";
  protected $allowedFields = ['student_id', 'jenis_berkas', 'deskripsi_berkas', 'dokumen', 'status', 'catatan'];
}