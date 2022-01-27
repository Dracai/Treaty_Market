<?php

namespace App\Controllers;

use App\Models\Administrator_Model;
use App\Models\Customer_Model;
use App\Models\Products_Model;
use App\Models\Supplier_Model;
use App\Models\Wishlist_Model;

class GeneralUser extends BaseController
{

    //Routing -> $routes->get('view', 'controller', [filter])

    public function index()
    {
        //Echo view functions is used to load and display a particular view file
        echo view ('templates/header');
        echo view('index');
        echo view ('templates/footer');
    }

    public function login() 
    {
        $data = [];

        helper(['form']);

        //Here I am making instance of each model
        $customerModel = new Customer_Model();
        $adminModel = new Administrator_Model();

        if($this->request->getMethod() == 'post')
        {
            if($adminModel->adminCheck($_POST['email']) && $adminModel->checkPassword($_POST['email'], $_POST['passwordHash']))
            {
                $admin = $adminModel->where('email', $_POST['email'])
                                    ->first();

                $this->setAdminSession($admin);
                return redirect()->to('/adminHome');
            }
            else if($customerModel->customerCheck($_POST['email']) && $customerModel->checkPassword($_POST['email'], $_POST['passwordHash']))
            {
                $customer = $customerModel->where('email', $_POST['email'])
                                            ->first();

                //This sets the session of a user
                $this->setCustomerSession($customer);
                return redirect()->to('/');
            }
            else
            {
                $session = session();

                $session->setFlashdata('failed', 'Email and Password don\'t match');
                return redirect()->to('/login');
            }
        }

        echo view ('templates/header', $data);
        echo view('login');
        echo view ('templates/footer');
    }

    private function setCustomerSession($customer)
    {
        $shoppingCart = [];
        $data = [
            'customerNumber' => $customer['customerNumber'],
            'customerName' => $customer['customerName'],
            'contactLastName' => $customer['contactLastName'],
            'contactFirstName' => $customer['contactFirstName'],
            'phone' => $customer['phone'],
            'addressLine1' => $customer['addressLine1'],
            'addressLine2' => $customer['addressLine2'],
            'city' => $customer['city'],
            'postalCode' => $customer['postalCode'],
            'country' => $customer['country'],
            'email' => $customer['email'],
            'password' => $customer['password'],
            'shoppingCart' => $shoppingCart,
            'isLoggedInCustomer' => true
        ];

        session()->set($data);
        return true;
    }

    private function setAdminSession($admin)
    {
        $data = [
            'firstName' => $admin['firstName'],
            'lastName' => $admin['lastName'],
            'email' => $admin['email'],
            'password' => $admin['password'],
            'isLoggedInAdmin' => true
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function register() 
    {
        $data = [];

        helper(['form']);

        if($this->request->getMethod() == 'post')
        {
            $rules = [
                'contactFirstName' => 'required|min_length[3]|max_length[45]',
                'contactLastName' =>'required|min_length[3]|max_length[45]',
                'customerName' => 'required|min_length[3]|max_length[100]',
                'email' => 'required|min_length[6]|max_length[75]|valid_email|is_unique[customers.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'passwordCon' => 'matches[password]',
                'addressLine1' => 'required|max_length[100]',
                'city' => 'required|min_length[2]|max_length[30]',
                'postalCode' => 'required|min_length[3]|max_length[10]',
                'country' => 'required',
                'phone' => 'required'
            ];

            if(!$this->validate($rules))
            {
                $data['validation'] = $this->validator;
            }
            else
            {
                $model = new Customer_Model();

                $newData = [
                    'customerName' => $_POST['customerName'],
                    'contactLastName' => $_POST['contactLastName'],
                    'contactFirstName' => $_POST['contactFirstName'],
                    'phone'=> $_POST['phone'],
                    'addressLine1'=> $_POST['addressLine1'],
                    'addressLine2' => $_POST['addressLine2'],
                    'city' => $_POST['city'],
                    'postalCode' => $_POST['postalCode'],
                    'country' => $_POST['country'],
                    'creditLimit' => 0,
                    'email' => $_POST['email'],
                    'password' =>$_POST['password']
                ];

                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/login');
            }
        }
        else
        {

        }

        echo view ('templates/header', $data);
        echo view('register');
        echo view ('templates/footer');
    }

    public function browse()
    {
        $model = new Products_Model();

        $data['news'] = $model->getProducts();

        echo view ('templates/header', $data);
        echo view('browse');
        echo view ('templates/footer');
    }

    public function drilldown($prodID)
    {

        helper(['form']);

        $model = new Products_Model();
        $podData['post'] = $model->getProducts($prodID);

        echo view ('templates/header', $podData);
        echo view('drilldown');
        echo view ('templates/footer');
    }

    public function suppliers()
    {
        $data = [];

        $model = new Supplier_Model;
        $supplierData['sup'] = $model->getAllSuppliers();

        echo view ('templates/header', $supplierData);
        echo view('suppliers');
        echo view ('templates/footer');
    }

    public function profile()
    {
        $model = new Wishlist_Model();
        $data = [
            'wishlist' => $model->getProductsByCustomer(session()->get('customerNumber'))
        ];

        echo view ('templates/header', $data);
        echo view('profile');
        echo view ('templates/footer');
    }

    public function shoppingCart() 
    {
        $data['products'] = [];

        $model = new Products_Model();
        $shoppingcart = session()->get('shoppingCart');

        foreach($shoppingcart as $x => $x_value)
        {
            $data += $model->getProductsByID($x);
        }

        echo view ('templates/header', $data);
        echo view('shoppingcart');
        echo view ('templates/footer');
    }

    public function addToWishlist($price, $description, $productID)
    {
        $wishlistModel = new Wishlist_Model();

        if($wishlistModel->getItem($productID))
        {
            $session = session();
            $session->setFlashdata('duplicate', 'This item already in your wishlist !');
            return redirect()->back();
        }
        else {
            $wishlistModel->save(
            [
                'customerNumber' => session()->get('customerNumber'),
                'productID' => $productID,
                'productDescription' => $description,
                'productPrice' => $price
            ]);

            $session = session();
            $session->setFlashdata('wishlist', 'Item has been added to the wishlist !');
            return redirect()->to('/browse');
        }
    }

    public function addToShoppingCart($productID, $quantity)
    {
        $session = session();
        $session->push('shoppingCart', [$productID => $quantity]);

        return redirect()->to('/browse');
    }

    public function upload()
    {
        helper(['form', 'url']);

        $model = new Products_Model();

        $validateImg = $this->validate
        ([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/png,image/gif]',
                'max_size[file,4096]'
            ]
        ]);

        if(!$validateImg)
        {
            print_r('Either file type or size (Max 4MB) are not correct.');
        }
        else
        {
            $x_file = $this->request->getFile('file');
            $image = \Config\Services::image()
                    ->withFile($x_file)
                    ->resize(100, 100, true, 'height')
                    ->save(FCPATH.'/images'.$x_file->getRandomName());

            $x_file->move(WRITEPATH.'uploads');

            $fileData = [
                'name' => $x_file->getName(),
                'type' => $x_file->getClientMimeType()
            ];

            print_r('Image inserted and stored');
        }
    }

}
