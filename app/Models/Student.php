<?php

namespace App\Models;

use CodeIgniter\Model;

class Student extends Model
{
  protected $table = "students";
  protected $primaryKey = "id";
  protected $returnType = "object";
  protected $allowedFields = ['unique_id', 'nama', 'jenjang', 'username', 'password', 'jenis_kelamin', 'kewarganegaraan', 'nik', 'nisn', 'no_kk', 'tempat_lahir', 'tanggal_lahir', 'no_registrasi_akta_lahir', 'berkebutuhan_khusus', 'agama', 'alamat', 'rt', 'rw', 'nama_dusun', 'provinsi', 'kabupaten', 'kecamatan', 'kelurahan', 'kode_pos', 'lintang', 'bujur', 'tempat_tinggal', 'moda_transportasi', 'anak_ke', 'penerima_kps', 'punya_kip', 'layak_pip', 'no_telepon_rumah', 'nomor_hp', 'email', 'image'];

  public function getAllStudents($where = null)
  {
    $db = \Config\Database::connect();
    $builder = $db->table($this->table);
    $builder->select('students.*, data_ayah.nama as nama_ayah, data_ayah.nik as nik_ayah, data_ayah.tahun_lahir as tahun_lahir_ayah, data_ayah.pendidikan as pendidikan_ayah, data_ayah.pekerjaan as pekerjaan_ayah, data_ayah.penghasilan as penghasilan_ayah, data_ayah.berkebutuhan_khusus as berkebutuhan_khusus_ayah, data_ibu.nama as nama_ibu, data_ibu.nik as nik_ibu, data_ibu.tahun_lahir as tahun_lahir_ibu, data_ibu.pendidikan as pendidikan_ibu, data_ibu.pekerjaan as pekerjaan_ibu, data_ibu.penghasilan as penghasilan_ibu, data_ibu.berkebutuhan_khusus as berkebutuhan_khusus_ibu, data_wali.nama as nama_wali, data_wali.nik as nik_wali, data_wali.tahun_lahir as tahun_lahir_wali, data_wali.pendidikan as pendidikan_wali, data_wali.pekerjaan as pekerjaan_wali, data_wali.penghasilan as penghasilan_wali, data_wali.berkebutuhan_khusus as berkebutuhan_khusus_wali, wilayah_provinsi.nama as nama_provinsi, wilayah_kabupaten.nama as nama_kabupaten, wilayah_kecamatan.nama as nama_kecamatan, wilayah_desa.nama as nama_kelurahan');
    $builder->join('data_ayah', 'data_ayah.student_id = students.id');
    $builder->join('data_ibu', 'data_ibu.student_id = students.id');
    $builder->join('data_wali', 'data_wali.student_id = students.id');
    $builder->join('wilayah_provinsi', 'wilayah_provinsi.id = students.provinsi');
    $builder->join('wilayah_kabupaten', 'wilayah_kabupaten.id = students.kabupaten');
    $builder->join('wilayah_kecamatan', 'wilayah_kecamatan.id = students.kecamatan');
    $builder->join('wilayah_desa', 'wilayah_desa.id = students.kelurahan');

    if ($where) {
      $builder->where($where);
    }

    $query = $builder->get();
    return $query->getResultObject();
  }

  public function getGrafikAsalProvinsi()
  {
    $db = \Config\Database::connect();
    $builder = $db->table($this->table);
    $builder->select('COUNT(provinsi) as jumlah_provinsi, wilayah_provinsi.nama');
    $builder->join('wilayah_provinsi', 'wilayah_provinsi.id = students.provinsi');
    $builder->groupBy('provinsi');

    $query = $builder->get();
    return $query->getResultObject();
  }

  public function getGrafikAsalKabupaten()
  {
    $db = \Config\Database::connect();
    $builder = $db->table($this->table);
    $builder->select('COUNT(kabupaten) as jumlah_kabupaten, wilayah_kabupaten.nama');
    $builder->join('wilayah_kabupaten', 'wilayah_kabupaten.id = students.kabupaten');
    $builder->groupBy('kabupaten');

    $query = $builder->get();
    return $query->getResultObject();
  }
}
