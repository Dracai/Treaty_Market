<?php namespace App\Models;

use CodeIgniter\Model;

class Customer_Model extends Model 
{
    protected $table = 'customers';
    protected $allowedFields = ['customerNumber', 'customerName', 'contactLastName', 'contactFirstName', 'phone', 'addressLine1', 'addressLine2', 'city', 'postalCode', 'country', 'creditLimit', 'email', 'password'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
        $data = $this->hashingPassword($data);
        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->hashingPassword($data);
        return $data;
    }

    protected function hashingPassword(array $data)
    {
        if(isset($data['data']['password']))
        {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    public function customerCheck($email)
    {
        $builder = $this->builder();
        $query = $builder->getWhere(['email' => $email])->getFirstRow();

        if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function checkPassword($email, $passwordHash)
    {
        $customerModel = new Customer_Model();
        
        $customer = $customerModel->where('email', $email)
                                    ->first();

        if($customer)
            return password_verify($passwordHash, $customer['password']);
        else
            return false;
    }

    public function countCustomers()
    {
        $builder = $this->builder();
        $query = $builder->countAll();
        return $query;
    }

    public function getCustomers($customerNumber = null) 
    {
        if(!$customerNumber)
            return $this->findAll();
        
        return $this->asArray()
                    ->where(['customerNumber' => $customerNumber])
                    ->first();
    }

    public function deleteCustomer($customerNumber)
    {
        $this->db->table('customers')->where('customerNumber', $customerNumber)->delete();
        return;
    }

    public function searchCustomer($customerNumber) 
    {
        $builder = $this->builder();
        $query = $builder->getWhere(['customerNumber' => $customerNumber])->getFirstRow();

        if($query)
        {
            return $query;
        }
        else
            return null;
    }
}