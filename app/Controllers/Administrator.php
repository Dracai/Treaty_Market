<?php namespace App\Controllers;

use App\Models\BannedCustomers_Model;
use App\Models\BannedCustoner_Model;
use App\Models\Customer_Model;
use App\Models\OrderDetails_Model;
use App\Models\Products_Model;
use App\Models\Orders_Model;
use App\Models\Payment_Model;

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

        if($this->request->getMethod() == 'post')
        {
            if(!isset($_FILES['file']) || $_FILES['file']['error'] == UPLOAD_ERR_NO_FILE)
            {
                $rules = [
                    'description' => 'required|min_length[3]',
                    'category' => 'required',
                    'quantity' => 'required',
                    'bulkBuyPrice' => 'required',
                    'bulkSalePrice' => 'required'
                ];

                if(!$this->validate($rules))
                {
                    $data['validation'] = $this->validator;
                }
                else
                {
                    $str = $_POST['description'];
                    $fileName = str_replace(' ', '', $str).'.jpg';

                    $newData = [
                        'produceCode' => $prodID,
                        'description' => $_POST['description'],
                        'category' => $_POST['category'],
                        'quantityInStock' => $_POST['quantity'],
                        'bulkBuyPrice' => (double)$_POST['bulkBuyPrice'],
                        'bulkSalePrice' => (double)$_POST['bulkSalePrice'],
                        'photo' => $fileName
                    ];
                }

                $model->updateProdWithNoPhoto($newData);

                $session = session();
                $session->setFlashdata('worked', 'Product has been updated !');
                return redirect()->back();
            }
            else
            {
                $rules = [
                    'description' => 'required|min_length[3]',
                    'category' => 'required',
                    'quantity' => 'required',
                    'bulkBuyPrice' => 'required',
                    'bulkSalePrice' => 'required'
                ];

                if(!$this->validate($rules))
                {
                    $data['validation'] = $this->validator;
                }
                else
                {
                    $str = $_POST['description'];
                    $fileName = str_replace(' ', '', $str).'.jpg';

                    $newData = [
                        'produceCode' => $prodID,
                        'description' => $_POST['description'],
                        'category' => $_POST['category'],
                        'quantityInStock' => $_POST['quantity'],
                        'bulkBuyPrice' => (double)$_POST['bulkBuyPrice'],
                        'bulkSalePrice' => (double)$_POST['bulkSalePrice'],
                        'photo' => $fileName
                    ];

                    if($model->updateProdWithPhoto($newData)){
                        $validateImg = $this->validate([
                            'file' => [
                                'uploaded[file]',
                                'mime_in[file,image/jpg,image/jpeg,image/png,image/gif]',
                                'max_size[file,4096]',
                            ]
                        ]);
        
                        if(!$validateImg)
                        {
                            print_r('Either file type or size (Max 4MB not correct.');
                        }
                        else 
                        {
                            $x_file = $this->request->getFile('file');
                            $image = \Config\Services::image()
                                ->withFile($x_file)
                                ->resize(345, 186, true, 'height')
                                ->save(FCPATH.'/assets/images/products/full/'.$fileName);
                        }
        
                        $validateThumbnail = $this->validate([
                            'file' => [
                                'uploaded[file]',
                                'mime_in[file,image/jpg,image/jpeg,image/png,image/gif]',
                                'max_size[file,4096]',
                            ]
                        ]);
        
                        if(!$validateThumbnail)
                        {
                            print_r('Either file type or size (Max 4MB not correct.');
                        }
                        else
                        {
                            $x_file = $this->request->getFile('file');
                            $image = \Config\Services::image()
                                ->withFile($x_file)
                                ->resize(140, 76, true, 'height')
                                ->save(FCPATH.'/assets/images/products/thumbs/'.$fileName);
                        }
        
                        $session = session();
                        $session->setFlashdata('worked', 'Product has been updated !');
                        return redirect()->back();
                    }
                }
            }
        }

        $podData['post'] = $model->getProducts($prodID);

        echo view ('templates/header', $podData);
        echo view('adminDrilldown');
        echo view ('templates/footer');
    }

    public function addProduct()
    {
        $data = [];
        helper(['form', 'url']);

        if($this->request->getMethod() == 'post')
        {
            $rules = [
                'description' => 'required|min_length[3]',
                'category' => 'required',
                'quantity' => 'required',
                'bulkBuyPrice' => 'required',
                'bulkSalePrice' => 'required'
            ];

            if(!$this->validate($rules))
            {
                $data['validation'] = $this->validator;
            }
            else
            {
                $model = new Products_Model();
                $prodID = $model->countIDs();
                if($prodID == 0)
                {
                    $prodID = 1;
                }

                $str = $_POST['description'];
                $fileName = str_replace(' ', '', $str).'.jpg';

                $newData = [
                    'produceCode' => 'S20_'.$prodID,
                    'description' => $_POST['description'],
                    'category' => $_POST['category'],
                    'supplier' => $_POST['supplier'],
                    'quantityInStock' => $_POST['quantity'],
                    'bulkBuyPrice' => $_POST['bulkBuyPrice'],
                    'bulkSalePrice' => $_POST['bulkSalePrice'],
                    'photo' => $fileName
                ];

                $model->save($newData);

                $validateImg = $this->validate([
                    'file' => [
                        'uploaded[file]',
                        'mime_in[file,image/jpg,image/jpeg,image/png,image/gif]',
                        'max_size[file,4096]',
                    ]
                ]);

                if(!$validateImg)
                {
                    print_r('Either file type or size (Max 4MB not correct.');
                }
                else 
                {
                    $x_file = $this->request->getFile('file');
                    $image = \Config\Services::image()
                        ->withFile($x_file)
                        ->resize(345, 186, true, 'height')
                        ->save(FCPATH.'/assets/images/products/full/'.$fileName);
                }

                $validateThumbnail = $this->validate([
                    'file' => [
                        'uploaded[file]',
                        'mime_in[file,image/jpg,image/jpeg,image/png,image/gif]',
                        'max_size[file,4096]',
                    ]
                ]);

                if(!$validateThumbnail)
                {
                    print_r('Either file type or size (Max 4MB not correct.');
                }
                else
                {
                    $x_file = $this->request->getFile('file');
                    $image = \Config\Services::image()
                        ->withFile($x_file)
                        ->resize(140, 76, true, 'height')
                        ->save(FCPATH.'/assets/images/products/thumbs/'.$fileName);
                }

                $session = session();
                $session->setFlashdata('productAdd', 'Product has been successfully uploaded');
                return redirect()->to('/browse');
            }
        }
            echo view ('templates/header', $data);
            echo view('addProduct');
            echo view ('templates/footer');
    }

    public function delProduct()
    {
        $model = new Products_Model();

        $urlsplit = explode('/', current_url());
        $prodID = $urlsplit[count($urlsplit) - 1];

        $model->delProd($prodID);
        $session = session();
        $session->getFlashdata('deletedProduct', 'Product has been deleted.');
        return redirect()->to('/browse');
    }

    public function viewOrders()
    {
        $model = new Orders_Model();

        $data['order'] = $model->getOrders();

        echo view ('templates/header', $data);
        echo view('orders');
        echo view ('templates/footer');
    }

    public function viewOrderDetails($orderID)
    {
        helper(['form']);

        $detialsModel = new OrderDetails_Model();
        $orderModel = new Orders_Model();

        if($this->request->getMethod() == 'post')
        {
            $comment = $_POST['comment'];
            $orderNum = $_POST['orderNum'];

            $orderModel->setComment($orderNum, $comment);
        }

        $orderData['orders'] = $orderModel->getOrders($orderID);
        $detailsData['orderDetails'] = $detialsModel->inspectOrder($orderID);

        echo view ('templates/header', $orderData + $detailsData);
        echo view('orderDrilldown');
        echo view ('templates/footer');
    }

    public function displayUsers()
    {
        $model = new Customer_Model();

        $data['customers'] = $model->getCustomers();

        echo view ('templates/header', $data);
        echo view('adminUsers');
    }

    public function delCustomer()
    {
        $customer = new Customer_Model();
        $orders = new Orders_Model();
        $orderDetails = new OrderDetails_Model();
        $payments = new Payment_Model();

        $urlsplit = explode('/', current_url());
        $cutomerNumber = $urlsplit[count($urlsplit) - 1];

        $results = $orders->getOrderNumber($cutomerNumber);

        foreach($results as $x)
        {
            $orderDetails->delOrderDetails($x->orderNumber);
            $orders->delOrder($x->orderNumber);
        }
        $payments->delCustPayments($cutomerNumber);

        $customer->deleteCustomer($cutomerNumber);
        $session = session();
        $session->setFlashdata('deletedUser', 'The customer has been deleted');

        return redirect()->back();
    }

    public function banCustomer()
    {
        $customerModel = new Customer_Model();
        $banned = new BannedCustomers_Model();
        $orders = new Orders_Model();
        $payments = new Payment_Model();
        $orderDetails = new OrderDetails_Model();


        $urlsplit = explode('/', current_url());
        $customerNumber = $urlsplit[count($urlsplit) - 1];

        $customerDetail = $customerModel->searchCustomer($customerNumber);
        $bannedUser = [
            'email' => $customerDetail->{'email'}
        ];
        $banned->save($bannedUser);

        $results = $orders->getOrderNumber($customerNumber);

        foreach($results as $x)
        {
            $orderDetails->delOrderDetails($x->orderNumber);
            $orders->delOrder($x->orderNumber);
        }
        $payments->delCustPayments($customerNumber);

        $customerModel->deleteCustomer($customerNumber);
        $session = session();
        $session->setFlashdata('userBanned', 'The customer has been banned.');

        return redirect()->back();

    }
}