<?php

namespace App\Models;

use CodeIgniter\Model;

class Registration extends Model
{
  protected $table = "registration";
  protected $primaryKey = "id";
  protected $returnType = "object";
  protected $allowedFields = ['unique_id', 'student_id', 'nem', 'asal_sekolah', 'prestasi', 'status', 'keterangan', 'catatan'];

  public function getRegistration($student_id = null)
  {
    $db = \Config\Database::connect();
    $builder = $db->table($this->table);
    $builder->select('registration.*, students.nama, students.id as student_id');
    $builder->join('students', 'students.id = registration.student_id');
    
    if ($student_id <> null) {
      $builder->where('student_id', $student_id);
    } else {
      $builder->where('student_id', session()->get('id'));
    }

    $query = $builder->get();

    return $query->getRowObject();
  }

  public function getRegistrations()
  {
    $db = \Config\Database::connect();
    $builder = $db->table($this->table);
    $builder->join('students', 'students.id = registration.student_id');
    $query = $builder->get();

    return $query->getResultObject();
  }
}