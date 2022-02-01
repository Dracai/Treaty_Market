<?php namespace App\Models;

use CodeIgniter\Model;

class Orders_Model extends Model
{
    protected $table = 'orders';
    protected $allowedFields = ['orderNumber', 'orderDate', 'requiredDate', 'shippedDate', 'status', 'comments', 'customerNumber'];

    public function countOrders()
    {
        $builder = $this->builder();
        $query = $builder->countAll();
        return $query;
    }

    public function getOrders($orderID = null)
    {
        if(!$orderID)
            return $this->findAll();

        return $this->asArray()
                    ->where(['orderNumber' => $orderID])
                    ->first();
    }
}