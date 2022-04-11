<?php

namespace App\Models;

use CodeIgniter\Model;

class Payment extends Model
{
  protected $table = "payments";
  protected $primaryKey = "id";
  protected $returnType = "object";
  protected $allowedFields = ['student_id', 'unique_id', 'date', 'image', 'nominal', 'description', 'status'];

  public function getPayments()
  {
    $db = \Config\Database::connect();
    $builder = $db->table($this->table);
    $builder->select('payments.*, students.nama, registration.unique_id as kode_daftar');
    $builder->join('students', 'students.id = payments.student_id');
    $builder->join('registration', 'registration.student_id = students.id');
    $builder->orderBy('id', 'DESC');
    $query = $builder->get();

    return $query->getResultObject();
  }
}