<?php namespace App\Models;

use CodeIgniter\Model;

class BannedCustomers_Model extends Model 
{
    protected $table = 'bannedusers';
    protected $allowedFields = ['idBannedUsers', 'email'];

    public function checkIfBanned($email)
    {
        $bannedUser = new BannedCustomers_Model();
        $banned = $bannedUser->where('email', $email)
                            ->first();

        if($banned)
        {
            return true;
        }
        else
            return false;
    }
}