<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
  protected $table = "users";
  protected $primaryKey = "id";
  protected $returnType = "object";
  protected $allowedFields = ['name', 'email', 'phone_number', 'level', 'username', 'password', 'status', 'description'];

  public function countAllUser()
  {
    $db = \Config\Database::connect();
    $builder = $db->table($this->table);
    $builder->selectCount('name');
    $query = $builder->get();

    return $query->getRowObject();
  }
}