<?php namespace App\Controllers;

use App\Models\Customer_Model;
use App\Models\Products_Model;
use App\Models\Orders_Model;

class Administrator extends BaseController
{
    public function home()
    {
        $ordersModel = new Orders_Model();
        $customerModel = new Customer_Model();
        $productModel = new Products_Model();

        $ordersNum = [
            'orderNo' => $ordersModel->countOrders()
        ];

        $customerNum = [
            'custNo' => $customerModel->countCustomers()
        ];

        $prodNum = [
            'prodNo' =>$productModel->countProducts()
        ];

        echo view("templates/header", $ordersNum + $customerNum + $prodNum);
		echo view("adminHome");
		echo view("templates/footer");
    }

    public function drilldown($prodID)
    {
        helper(['form']);

        $model = new Products_Model();
        $podData['post'] = $model->getProducts($prodID);

        echo view ('templates/header', $podData);
        echo view('adminDrilldown');
        echo view ('templates/footer');
    }
}