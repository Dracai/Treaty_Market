<?php namespace App\Models;

use CodeIgniter\Model;

class Products_Model extends Model
{
    protected $table = 'products';
    protected $allowedFields = ['produceCode', 'description', 'category', 'supplier', 'quantityInStock', 'bulkBuyPrice', 'bulkSalePrice', 'photo'];

    public function getProducts($prodCode = null)
    {
        if(!$prodCode)
            return $this->findAll();

        return $this->asArray()
                    ->where(['produceCode' => $prodCode])
                    ->first();
    }

    public function countProducts() 
    {
        $builder = $this->builder();
        $query = $builder->countAll();
        return $query;
    }
}