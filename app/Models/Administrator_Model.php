<?php namespace App\Models;

use CodeIgniter\Model;

class Administrator_Model extends Model 
{
    protected $table = 'admin';
    protected $allowedFields = ['firstName', 'lastName', 'email', 'password'];
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

    public function adminCheck($email)
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
        $adminModel = new Administrator_Model();

        $admin = $adminModel->where('email', $email)
                            ->first();

        if($admin)
            return password_verify($passwordHash, $admin['password']);
        else
            return false;
    }
}