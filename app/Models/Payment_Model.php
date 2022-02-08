<?php namespace App\Models;

use CodeIgniter\Model;

class Payment_Model extends Model 
{
    protected $table = 'payments';
    protected $allowedFields = ['customerNumber', 'cardType', 'cardNumber', 'cardName', 'expiryDate', 'CVV', 'checkNumber', 'paymentDate', 'amount', 'orderNumber'];

    function delCustPayments($customerNumber) 
    {
        $this->db->table('payments')->where('customerNumber', $customerNumber)->delete();
        return;
    }
}