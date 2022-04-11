<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengumuman extends Model
{
  protected $table = "announcements";
  protected $primaryKey = "id";
  protected $returnType = "object";
  protected $allowedFields = ['student_id', 'penilaian', 'catatan', 'status'];

  public function getAllPengumuman()
  {
    $db = \Config\Database::connect();
    $builder = $db->table($this->table);
    $builder->select('announcements.*, students.nama, registration.unique_id as kode_daftar');
    $builder->join('students', 'students.id = announcements.student_id');
    $builder->join('registration', 'registration.student_id = students.id');
    $query = $builder->get();

    return $query->getResultObject();
  }
}