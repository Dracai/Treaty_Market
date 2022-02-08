<?php namespace App\Models;

use CodeIgniter\Model;

class OrderDetails_Model extends Model
{
    protected $table = 'orderdetails';
    protected $allowedFields = ['orderNumber', 'productCode', 'quantityOrdered', 'priceEach'];

    public function countOrderDetails()
    {
        $builder = $this->builder();
        $query = $builder->countAll();
        return $query;
    }

    public function getOrderDetails($orderID = null)
    {
        if(!$orderID)
            return $this->findAll();

        return $this->asArray()
                    ->where(['orderNumber' => $orderID])
                    ->first();
    }

    public function inspectOrder($orderID)
    {
        return $this->asArray()
                    ->where(['orderNumber' => $orderID])
                    ->findAll();
    }

    public function delOrderDetails($orderNumber)
    {
        $this->db->table('orderdetails')->where('orderNumber', $orderNumber)->delete();
        return;
    }
}