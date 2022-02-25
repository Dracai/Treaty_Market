<?php

namespace App\Controllers;

use App\Models\Administrator_Model;
use App\Models\BannedCustomers_Model;
use App\Models\Customer_Model;
use App\Models\OrderDetails_Model;
use App\Models\Orders_Model;
use App\Models\Products_Model;
use App\Models\Supplier_Model;
use App\Models\Wishlist_Model;
use CodeIgniter\Validation\Validation;

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
        $bannedUsers = new BannedCustomers_Model();

        if($this->request->getMethod() == 'post')
        {
            if(!$bannedUsers->checkIfBanned($_POST['email']))
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
            else
            {
                $session = session();
                $session->setFlashdata('banned', 'This email has been banned');
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

        $bannedUsers = new BannedCustomers_Model();

        helper(['form']);

        if($this->request->getMethod() == 'post')
        {
            if(!$bannedUsers->checkIfBanned($_POST['email']))
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
                $session = session();
                $session->setFlashdata('banned', 'Can\'t create account, email is banned');
                return redirect()->to('/register');
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

            if($this->request->getMethod() == 'post'){
                $data['news'] = $model->findProducts($_POST['searchID']);
    
                echo view ('templates/header', $data);
                echo view('browse');
                echo view ('templates/footer');
            }
            else
            {
                $data['news'] = $model->getProducts();
    
                echo view ('templates/header', $data);
                echo view('browse');
                echo view ('templates/footer');
            }
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

        $model = new Supplier_Model;
        $supplierData['sup'] = $model->getAllSuppliers();

        echo view ('templates/header', $supplierData);
        echo view('suppliers');
        echo view ('templates/footer');
    }

    public function profile()
    {
        $model = new Wishlist_Model();
        $custModel = new Customer_Model();
        $data = [
            'wishlist' => $model->getProductsByCustomer(session()->get('customerNumber'))
        ];

        if($this->request->getMethod() == 'post')
        {
            if(isset($_POST['changePassword']))
            {
                $rules = [
                    'oldPassword' => 'required|min_length[8]|max_length[255]',
                    'conOldPassword' => 'required|matches[oldPassword]',
                    'newPassword' => 'required|min_length[8]|max_length[255]',
                    'conNewPassword' => 'required|matches[newPassword]'
                ];

                if(!$this->validate($rules))
                {
                    $data['passwordValidation'] = $this->validator;
                }
                else
                {
                    if($custModel->checkPassword(session()->get('email'),$_POST['oldPassword']))
                    {
                        $custModel->updatePassword(session()->get('customerNumber'), $_POST['newPassword']);

                        session()->setFlashdata('success', 'Password is updated !');
                        return redirect()->back();
                    }
                }
            }
            elseif(isset($_POST['changeAddress']))
            {
                $rules = [
                    'addressOne' => 'required',
                    'city' => 'required',
                    'country' => 'required',
                    'addressTwo' => 'required',
                    'postalCode' => 'required'
                ];

                if(!$this->validate($rules))
                {
                    $data['addressValidation'] = $this->validator;
                }
                else
                {
                    $newData = [
                        'custNumber' => session()->get('customerNumber'),
                        'addressLine1' => $_POST['addressOne'],
                        'addressLine2' => $_POST['addressTwo'],
                        'city' => $_POST['city'],
                        'postalCode' => $_POST['postalCode'],
                        'country' => $_POST['country']
                    ];

                    if($custModel->updateAddress($newData))
                    {
                        session()->setFlashdata('success', 'Address will be updated once you login again !');
                        return redirect()->back();
                    }
                    else
                    {
                        session()->setFlashdata('failed', 'Failed to update the address !');
                        return redirect()->back();
                    }
                }
            }
            else
            {
                session()->setFlashdata('failed', 'Something gone wrong');
                return redirect()->back();
            }
        }

            echo view ('templates/header', $data);
            echo view('profile');
            echo view ('templates/footer');
    }

    public function shoppingCart() 
    {
        $model = new Products_Model();
        $prodData['products'] = [];
        $data['products'] = [];

        $data['products'] = array(session('shoppingcart'));
        $prodData = $data;

        echo view ('templates/header', $prodData);
        echo view('shoppingcart');
        echo view ('templates/footer');
    }

    public function addToWishlist($price, $description, $productID)
    {
        $wishListModel = new Wishlist_Model();
        $wishList = $wishListModel->getProductsByCustomer(session()->get('customerNumber'));

        foreach($wishList as $x)
        {
            if($x['productID'] == $productID)
            {
                $session = session();
                $session->setFlashdata('duplicate', 'This item already in your wishlist !');
                return redirect()->back();
            }
        }

            $wishListModel->save(
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

    public function addToShoppingCart($productID)
    {
        if($_POST['quantity'] == null)
        {
            $item = array(
                'id' => $productID,
                'quantity' => 1
            );
        }
        else
        {
            $item = array(
                'id' => $productID,
                'quantity' => $_POST['quantity']
            );
        }   

        $cart = array($item);
        $session = session();
        if(!$session->has('shoppingcart'))
        {
            $session->set('shoppingcart', $cart);
        }
        else
            $session->push('shoppingcart', $cart);

        session()->setFlashdata('addToCart', 'Item added to you shopping cart !');
        return redirect()->back();
    }

    public function viewCustOrders()
    {
        $model = new Orders_Model();

        $data['order'] = $model->getCustOrders(session()->get('customerNumber'));

        echo view ('templates/header', $data);
        echo view('orders');
        echo view ('templates/footer');
    }

    public function viewOrderDetails($orderID)
    {
        helper(['form']);

        $detailsModel = new OrderDetails_Model();
        $orderModel = new Orders_Model();

        if($this->request->getMethod() == 'post')
        {
            $comment = $_POST['comment'];
            $orderNum = $_POST['orderNum'];

            $orderModel->setComment($orderNum, $comment);
        }

        $orderData['orders'] = $orderModel->getCustOrders($orderID);
        $detailsData['orderDetails'] = $detailsModel->inspectOrder($orderID);

        echo view ('templates/header', $orderData + $detailsData);
        echo view('orderDrilldown');
        echo view ('templates/footer');
    }

}
