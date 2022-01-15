<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPegawai extends Mode
{
    protected $table = "pegawai";
    protected $primaryKey = "id";
    protected $allowedFields = ['nama','email','bidang','alamat'];
}