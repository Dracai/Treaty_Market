<?php namespace App\Models;

use CodeIgniter\Model;

class Supplier_Model extends Model
{
    protected $table = 'suppliers';
    protected $allowedFields = ['id', 'name', 'address', 'contact', 'phone', 'photo'];

    public function getAllSuppliers()
    {
        return $this->findAll();
    }
}