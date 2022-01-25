<?php namespace App\Models;

use CodeIgniter\Model;

class Wishlist_Model extends Model
{
    protected $table = 'wishlist';
    protected $allowedFields = ['wishlistID', 'customerNumber', 'productID', 'productDescription', 'productPrice'];

    public function getProductsByCustomer($customerNumber)
    {
        return $this->asArray()
                    ->where(['customerNumber' => $customerNumber])
                    ->findAll();
    }

    public function getItem($productID)
    {
        $builder = $this->builder();
        $query = $builder->getWhere(['productID' => $productID])->getFirstRow();

        if($query)
            return true;
        else
            return false;
    }
}