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

    public function getOrderNumber($customerNumber)
    {
        $db = $this->db;

        $query = $db->query('SELECT orderNumber FROM orders WHERE customerNumber = '.$customerNumber);
        $results = $query->getResult();

        return $results;
    }

    public function delOrder($orderNumber)
    {
        $this->db->table('orders')->where('orderNumber', $orderNumber)->delete();
        return;
    }

    public function setComment($orderNum, $comment)
    {
        $builder = $this->builder();
        $builder->set('comments', $comment)
                ->where('orderNumber', $orderNum)
                ->update();
    }

    public function getCustOrders($custID)
    {
        return $this->asArray()
                    ->where(['customerNumber', $custID]);
    }
}