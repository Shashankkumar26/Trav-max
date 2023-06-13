<?php

namespace App\Controllers;

class Profile extends BaseController
{
    public function __construct()
    {
        $session = session();
        if (!$session->is_customer_logged_in) {
            header('Location: /');
            die();
        }
    }

    public function index()
    {
        $data['page_keywords'] = '';
        $data['page_description'] = '';
        $data['page_slug'] = 'Dashboard';
        $data['page_title'] = 'Dashboard';

        $session = session();
        $user_model = model('UserModel');
        $id = $session->cust_id;
        $customer_id = $session->trav_id;
        $data['profile'] = $user_model->profile($id);
        $data['total_income'] = (int)$user_model->get_total_income($id);
        $data['pending_income'] = (int)$user_model->get_pending_income($id);
        $data['approved_income'] = (int)$user_model->get_approved_income($id);
        $data['redeemed_income'] = (int)$user_model->get_redeemed_income($id);
        $data['amount_paid'] = (int)$user_model->get_amount_paid($id);
        $data['amount_remaining'] = (int)$user_model->get_amount_remaining($id);
        $data['installments_paid'] = (int)$user_model->get_installments_paid($id);
        $data['installments_remaining'] = (int)$user_model->get_installments_remaining($id);
        $data['installments_total'] = $data['installments_paid'] + $data['installments_remaining'];
        $data['has_package'] = false;
        $data['package_information'] = $user_model->get_package($id);
        if (empty($data['package_information'])) {
            $data['has_package'] = false;
        } else {
            $data['has_package'] = true;
        }

        $team = array();
        $ids = array($customer_id);
        $p = 0;
        while ($p < 1) {
            $myfriends = $user_model->my_friends_in($ids);
            if (!empty($myfriends)) {
                $team = array_merge($team, $myfriends);
                $ids = array_column($myfriends, 'customer_id');
            } else {
                $p++;
            }
        }
        $data['total_partner'] = $team;
        $data['total_partners'] = count($team);

        //calculate sales and income
        $my_sales = 0;
        $team_sales = 0;
        $active_income = 0;
        $team_income = 0;
        for ($i = 0; $i < count($team); $i++) {
            if ($team[$i]["parent_customer_id"] == $customer_id) {
                $number_of_installments_paid = (int)$user_model->get_installments_paid($team[$i]["id"]);
                if ($number_of_installments_paid > 0) {
                    $my_sales++;
                    $income_from_this_partner = (int)$user_model->get_income_from_this_partner($id, $team[$i]["id"]);
                    $active_income += $income_from_this_partner;
                }
            } else {
                $number_of_installments_paid = (int)$user_model->get_installments_paid($team[$i]["id"]);
                if ($number_of_installments_paid > 0) {
                    $team_sales++;
                    $income_from_this_partner = (int)$user_model->get_income_from_this_partner($id, $team[$i]["id"]);
                    $team_income += $income_from_this_partner;
                }
            }
        }
        $data["my_sales"] = $my_sales;
        $data["team_sales"] = $team_sales;
        $data["total_sales"] = $my_sales + $team_sales;
        $data["active_income"] = $active_income;
        $data["team_income"] = $team_income;

        $data["package_data"] = "";
        if ($data['has_package']) {
            $data["package_data"] = $user_model->get_package_data($data['package_information'][0]['package_id']);
        } else {
            return redirect()->to('admin/start');
        }
        $db = db_connect();
        $query = $db->query('SELECT travmoney, travprofit, status FROM customer where customer_id = "' . $customer_id . '" LIMIT 1');
        $row = $query->getRow();
        $data['travmoney'] = $row->travmoney;
        $data['travprofit'] = $row->travprofit;
        $data['status'] = $row->status;
        $data['main_content'] = 'admin/home';
        return view('includes/admin/template', $data);
    }

    public function start()
    {
        $user_model = model('UserModel');
        $data['page_keywords'] = '';
        $data['page_description'] = '';
        $data['page_slug'] = 'Select Package';
        $data['page_title'] = 'Start Your Journey';
        $data['js'] = '/js/start.js';
        $data['css'] = '/css/start.css';

        $id = session('cust_id');
        $customer_id = session('bliss_id');
        $data['profile'] = $user_model->profile($id);
        $data['has_package'] = false;
        $data['package_information'] = $user_model->get_package($id);

        if (empty($data['package_information'])) {
            $data['has_package'] = false;
        } else {
            $data['has_package'] = true;
            return redirect()->to(base_url() . 'admin');
        }

        $data['main_content'] = 'admin/start';
        return view('includes/admin/template', $data);
    }

    public function select_package()
    {
        $session = session();
        $user_model = model('UserModel');
        $data['page_keywords'] = '';
        $data['page_description'] = '';
        $data['page_slug'] = 'Select Package';
        $data['page_title'] = 'Dashboard';
        $data['js'] = '/js/select_package.js';

        $id = session('cust_id');
        $customer_id = session('bliss_id');
        $data['profile'] = $user_model->profile($id);
        $data['has_package'] = false;
        $data['package_information'] = $user_model->get_package($id);
        if (empty($data['package_information'])) {
            $data['has_package'] = false;
        } else {
            return redirect()->to(base_url('admin'));
        }

        if ($this->request->getMethod() === 'post') {
            $package_id = $this->request->getPost('package_id');
            $payment_type = $this->request->getPost('payment_type');
            $package_data = $user_model->get_package_data($package_id);
            $package_amount = $package_data[0]['total'];
            $data_to_store = [
                'user_id' => $id,
                'package_id' => $package_id,
                'payment_type' => $payment_type,
                'amount_remaining' => $package_amount
            ];
            $return = $user_model->add_user_package($data_to_store);

            $date = date('Y-m-d H:i:s');
            $data_to_store = [
                'role' => 'Macro',
                'package_used' => $date,
                'macro' => 33,
                'consume' => 1,
                'package_amt' => $package_amount
            ];
            $user_model->update_profile($id, $data_to_store);

            if ($payment_type == 'traveasy_plan') {
                $intallment_amount_left = $package_amount;
                $installment_amount = 6600;
                $installment_number = 1;
                $insdate = date('Y-m-d');
                while ($intallment_amount_left > 0) {
                    $pay_date = date('Y-m-d', strtotime('+ 1 month', strtotime($insdate)));
                    $add_installment = [
                        'user_id' => $id,
                        'amount' => $installment_amount,
                        'description' => $insdate,
                        'pay_date' => $pay_date,
                        'installment_no' => $installment_number,
                        'status' => 'Active'
                    ];
                    $user_model->add_installment($add_installment);
                    $insdate = $pay_date;
                    $intallment_amount_left -= 6600;
                    $installment_number += 1;
                    if ($intallment_amount_left > 6600) {
                        $installment_amount = 6600;
                    } else {
                        $installment_amount = $intallment_amount_left;
                    }
                }
            }

            if ($return) {
                return redirect()->to(base_url('admin/package_selected_successfully'));
            } else {
                $session->setFlashdata('flash_message', 'not_updated');
            }
        }

        $data['all_packages'] = $user_model->get_all_packages();

        $data['main_content'] = 'admin/select_package';
        return view('includes/admin/template', $data);
    }

    public function package()
    {
        $user_model = model('UserModel');
        $data['css'] = '/css/package.css';
        $data['js'] = '/js/package.js';

        $id = session()->get('cust_id');
        $customer_id = session()->get('bliss_id');
        $data['profile'] = $user_model->profile($id);

        $package_id = $this->request->getVar('package');
        $data['package_data'] = $user_model->get_package_data($package_id);

        $data['main_content'] = 'admin/package';
        echo view('includes/admin/template', $data);
    }

    public function select_plan()
    {
        $user_model = model('UserModel');
        $data['page_keywords'] = '';
        $data['page_description'] = '';
        $data['page_slug'] = 'Select Plan';
        $data['page_title'] = 'Dashboard';
        $data['js'] = '/js/select_package.js';

        $id = session()->get('cust_id');
        $customer_id = session()->get('trav_id');
        $data['profile'] = $user_model->profile($id);
        $data['has_package'] = false;
        $data['package_information'] = $user_model->get_package($id);
        if (empty($data['package_information'])) {
            $data['has_package'] = false;
        } else {
            $data['has_package'] = true;
            return redirect()->to(base_url('admin'));
        }

        $package_id = $this->request->getVar('package');
        if (empty($package_id)) {
            return redirect()->to(base_url('admin'));
        }

        $data['package_data'] = $user_model->get_package_data($package_id);
        $db = db_connect();
        $query   = $db->query('select booking_packages_number from customer where customer_id = "' . $customer_id . '"');
        $results = $query->getResultArray();
        $booking_packages_number = 1;
        foreach ($results as $row) {
            $booking_packages_number = $row['booking_packages_number'];
        }
        if ($this->request->getMethod() === 'post') {
            $package_id = $this->request->getPost('package_id');
            $payment_type = $this->request->getPost('payment_type');
            $package_data = $user_model->get_package_data($package_id);
            $package_amount = $package_data[0]['total'];
            $data_to_store = array(
                'user_id' => $id,
                'package_id' => $package_id,
                'payment_type' => $payment_type,
                'amount_remaining' => $package_amount
            );
            $return = $user_model->add_user_package($data_to_store);

            $date = date('Y-m-d H:i:s');
            $data_to_store = array('package_used' => $date, 'macro' => 33, 'consume' => 1, 'package_amt' => $package_amount);
            $user_model->update_profile($id, $data_to_store);

            if ($payment_type == "traveasy_plan") {
                $intallment_amount_left = $package_amount;
                $installment_amount = 6600;
                $installment_number = 1;
                $insdate = date('Y-m-d');
                while ($intallment_amount_left > 0) {
                    $pay_date = date('Y-m-d', strtotime("+ 1 month", strtotime($insdate)));
                    $add_installment = array('user_id' => $id, 'amount' => $installment_amount, 'description' => $insdate, 'pay_date' => $pay_date, 'installment_no' => $installment_number, 'status' => 'Active');
                    $user_model->add_installment($add_installment);
                    $insdate = $pay_date;
                    $intallment_amount_left -= 6600;
                    $installment_number += 1;
                    if ($intallment_amount_left > 6600) {
                        $installment_amount = 6600;
                    } else {
                        $installment_amount = $intallment_amount_left;
                    }
                }
            }
            if ($return == TRUE) {
                return redirect()->to(base_url('admin/package_selected_successfully'));
            } else {
                session()->setFlashdata('flash_message', 'not_updated');
            }
        }
        $data['booking_packages_number'] = $booking_packages_number;
        $data['all_packages'] = $user_model->get_all_packages();

        $data['main_content'] = 'admin/select_plan';
        return view('includes/admin/template', $data);
    }

    public function confirm_plan()
    {
        $user_model = model('UserModel');
        $session = session();
        $data['page_keywords'] = '';
        $data['page_description'] = '';
        $data['page_slug'] = 'Confirm Plan';
        $data['page_title'] = 'Dashboard';
        $data['css'] = '/css/confirm_plan.css';
        $data['js'] = '/js/confirm_plan.js';

        $id = session('cust_id');
        $customer_id = session('trav_id');
        $data['profile'] = $user_model->profile($id);

        $package_id = $this->request->getGet('package');
        $payment_plan = $this->request->getGet('plan');
        $payment_amount = 0;
        $data['package_data'] = $user_model->get_package_data($package_id);

        $db = db_connect();
        $query   = $db->query('select booking_packages_number from customer where customer_id = "' . $customer_id . '"');
        $result = $query->getRowArray();
        $booking_packages_number = $result['booking_packages_number'];

        if ($payment_plan == 'traveasy_plan') {
            $payment_amount = 5500 * $booking_packages_number;
        } elseif ($payment_plan == 'travlater_plan') {
            $payment_amount = 11000 * $booking_packages_number;
        } elseif ($payment_plan == 'travnow_plan') {
            $payment_amount = $data['package_data'][0]['total'] * $booking_packages_number;
        }
        $data['payment_amount'] = $payment_amount;

        if ($this->request->getMethod() === 'post') {
            $package_id = $this->request->getPost('package_id');
            $payment_type = $this->request->getPost('payment_type');
            $package_data = $user_model->get_package_data($package_id);
            $package = $package_data[0];
            if ($package["name"] == "Goa") {
                $package_amount_with_tax = $package["total"] + ($package["total"] * 0.05);
            }else{
                $package_amount_with_tax = $package["total"] + ($package["total"] * 0.05) + ($package["total"] * 0.05);
            }
            //Add packages to user in purchase table
            for ($i = 1; $i <= $booking_packages_number; $i++) {
                $add_purchase_data = [
                    'customer_id' => $customer_id,
                    'type' => 'package',
                    'item_id' => $package_id,
                    'purchase_date' => date('d-M-Y H:i:s'),
                    'purchase_price' => $package_amount_with_tax,
                    'status' => 'booked',
                ];
                $query = $db->table('purchase')->insert($add_purchase_data);
                $purchase_id = $db->insertID();
                //installments
                if ($payment_type == 'traveasy_plan') {
                    $intallment_amount_left = $package_amount_with_tax;
                    $installment_amount = 6600;
                    $installment_number = 1;
                    $insdate = date('Y-m-d');
                    while ($intallment_amount_left > 0) {
                        $pay_date = date('Y-m-d', strtotime("+ 1 month", strtotime($insdate)));
                        $add_installment = [
                            'user_id' => $id,
                            'amount' => $installment_amount,
                            'description' => $insdate,
                            'pay_date' => $pay_date,
                            'installment_no' => $installment_number,
                            'status' => 'Active'
                        ];
                        $user_model->add_installment($add_installment);
                        $insdate = $pay_date;
                        $intallment_amount_left -= 6600;
                        $installment_number += 1;
                        if ($intallment_amount_left > 6600) {
                            $installment_amount = 6600;
                        } else {
                            $installment_amount = $intallment_amount_left;
                        }
                    }
                } elseif ($payment_type == 'travnow_plan') {
                    $intallment_amount_left = $package_amount_with_tax;
                    $installment_amount = $package_amount_with_tax;
                    $installment_number = 1;
                    $insdate = date('Y-m-d');
                    $pay_date = date('Y-m-d');
                    $add_installment = [
                        'user_id' => $id,
                        'amount' => $installment_amount,
                        'description' => $insdate,
                        'pay_date' => $pay_date,
                        'installment_no' => $installment_number,
                        'status' => 'Active'
                    ];
                    $user_model->add_installment($add_installment);
                } elseif ($payment_type == 'travlater_plan') {
                    $intallment_amount_left = $package_amount_with_tax;
                    $installment_amount = 11000;
                    $installment_number = 1;
                    $insdate = date('Y-m-d');
                    $pay_date = date('Y-m-d');
                    $add_installment = [
                        'user_id' => $id,
                        'amount' => $installment_amount,
                        'description' => $insdate,
                        'pay_date' => $pay_date,
                        'installment_no' => $installment_number,
                        'status' => 'Active',
                        'order_id' => $purchase_id
                    ];
                    $user_model->add_installment($add_installment);
                    $insdate = $pay_date;
                    $intallment_amount_left -= 11000;
                    $installment_number += 1;
                    if ($intallment_amount_left > 5500) {
                        $installment_amount = 5500;
                    } else {
                        $installment_amount = $intallment_amount_left;
                    }
                    $installment_amount = 5500;
                    while ($intallment_amount_left > 0) {
                        $pay_date = date('Y-m-d', strtotime("+ 1 month", strtotime($insdate)));
                        $add_installment = [
                            'user_id' => $id,
                            'amount' => $installment_amount,
                            'description' => $insdate,
                            'pay_date' => $pay_date,
                            'installment_no' => $installment_number,
                            'status' => 'Active',
                            'order_id' => $purchase_id
                        ];
                        $user_model->add_installment($add_installment);
                        $insdate = $pay_date;
                        $intallment_amount_left -= 5500;
                        $installment_number += 1;
                        if ($intallment_amount_left > 5500) {
                            $installment_amount = 5500;
                        } else {
                            $installment_amount = $intallment_amount_left;
                        }
                    }
                }
            }

            //Need to delete this and update changes as required.
            $data_to_store = [
                'user_id' => $id,
                'package_id' => $package_id,
                'payment_type' => $payment_type,
                'amount_remaining' => $package_amount_with_tax
            ];
            $return = $user_model->add_user_package($data_to_store);

            if ($return == true) {
                return redirect()->to(base_url('admin/package_selected_successfully'));
            } else {
                $session->setFlashdata('flash_message', 'not_updated');
            }
        }

        $data['main_content'] = 'admin/confirm_plan';
        return view('includes/admin/template', $data);
    }

    public function package_selected_successfully()
    {
        $user_model = model('UserModel');
        $data['page_keywords'] = '';
        $data['page_description'] = '';
        $data['page_slug'] = 'Select Package';
        $data['page_title'] = 'Dashboard';

        $id = session('cust_id');
        $customer_id = session('bliss_id');
        $data['profile'] = $user_model->profile($id);
        $data['has_package'] = false;
        $data['package_information'] = $user_model->get_package($id);
        if (empty($data['package_information'])) {
            $data['has_package'] = false;
            return redirect()->to(base_url('admin/select_package'));
        } else {
            $data['has_package'] = true;
            $package_id = $data['package_information'][0]['package_id'];
            $data['package_data'] = $user_model->get_package_data($package_id);
            $data['payment_amount'] = $user_model->get_payment_amount($id);
            $db = db_connect();
            $query   = $db->query('select booking_packages_number from customer where customer_id = "' . $customer_id . '"');
            $result = $query->getRowArray();
            $booking_packages_number = $result['booking_packages_number'];
            $data['booking_packages_number'] = $booking_packages_number;
        }

        $data['main_content'] = 'admin/package_selected_successfully';
        return view('includes/admin/template', $data);
    }

    public function request_fund()
    {
        $user_model = model('UserModel');
        $id = session()->get('cust_id');
        $customer_id = session()->get('bliss_id');

        $data['image_error'] = 'false';

        $cimage = '';
        $neft = $this->request->getPost('neft');
        if ($this->request->getMethod() === 'post') {

            $data['request_pin'] = $user_model->get_neft($neft);

            $validationRules = [
                'amount' => 'required',
            ];

            $validationMessages = [
                'amount' => [
                    'required' => 'The amount field is required.',
                ],
            ];

            if ($this->validate($validationRules, $validationMessages)) {
                $image = '';
                // file upload start here
                $imageFile = $this->request->getFile('image');
                if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                    $imageFile->move(ROOTPATH . 'public/assets/images');
                    $image = $imageFile->getName();
                } else {
                    $errors = $imageFile->getErrorString() . ' (' . $imageFile->getError() . ')';
                    $image = '';
                }
                //----- end file upload -----------

                $data_to_store = [
                    'user_id' => $id,
                    'amount' => $this->request->getPost('amount'),
                    'mode' => $this->request->getPost('mode'),
                    'subject' => $this->request->getPost('subject'),
                    'neft' => $this->request->getPost('neft'),
                    'description' => $this->request->getPost('description'),
                    'status' => 'Pending',
                    'image' => $image
                ];

                if ($user_model->insert_fund_request($data_to_store)) {
                    session()->setFlashdata('flash_message', 'updated');
                    return redirect()->to('/admin/request-fund');
                } else {
                    session()->setFlashdata('flash_message', 'not_updated');
                }
            }
        }

        if (!empty($_GET['type']) && $_GET['type'] == "installment") {
            $data['payment_amount'] = $user_model->get_payment_amount($id);
        }

        $data['profile'] = $user_model->profile($id);
        $data['main_content'] = 'admin/request_fund';
        return view('includes/admin/template', $data);
    }

    public function kyc()
    {
        $user_model = model('UserModel');
        $session = session();
        $validation = \Config\Services::validation();
        $id = $session->get('cust_id');
        $customer_id = $session->get('bliss_id');

        if ($this->request->getMethod() === 'post') {
            $validation->setRules([
                'bank_name' => 'required|trim',
                //'branch' => 'required|trim',
                'account_name' => 'required',
                //'account_type' => 'required|trim',
                'account_no' => 'required|trim',
                'ifsc' => 'required'
            ]);

            if ($validation->withRequest($this->request)->run()) {
                $panimage = '';
                $uploadConfig = [
                    'path' => 'images/user/',
                    'allowed_types' => 'gif|jpg|png|jpeg',
                    'max_width' => 1024,
                    'max_height' => 1024
                ];
                $upload = $this->upload->withConfig($uploadConfig);

                if ($panimageFile = $this->request->getFile('panimage')) {
                    if ($this->request->getPost('panimage_old') != '') {
                        unlink('images/user/' . $this->request->getPost('panimage_old'));
                    }

                    if ($upload->doUpload('panimage')) {
                        $panimage = $upload->getName();
                    } else {
                        $panimage = $this->request->getPost('panimage_old');
                    }
                }

                $aadharimage = '';
                if ($aadharimageFile = $this->request->getFile('aadharimage')) {
                    if ($this->request->getPost('aadharimage_old') != '') {
                        unlink('images/user/' . $this->request->getPost('aadharimage_old'));
                    }

                    if ($upload->doUpload('aadharimage')) {
                        $aadharimage = $upload->getName();
                    } else {
                        $aadharimage = $this->request->getPost('aadharimage_old');
                    }
                }

                $cheque_img = '';
                if ($chequeImgFile = $this->request->getFile('cheque_img')) {
                    if ($this->request->getPost('cheque_img_old') != '') {
                        unlink('images/user/' . $this->request->getPost('cheque_img_old'));
                    }

                    if ($upload->doUpload('cheque_img')) {
                        $cheque_img = $upload->getName();
                    } else {
                        $cheque_img = $this->request->getPost('cheque_img_old');
                    }
                }

                $data_to_store = [
                    'pancard' => $this->request->getPost('pancard'),
                    'applied_pan' => $applied_pan,
                    'panimage' => $panimage,
                    'aadhar' => $this->request->getPost('aadhar'),
                    'applied_aadhar' => $applied_aadhar,
                    'aadharimage' => $aadharimage,
                    'cheque_img' => $cheque_img,
                    'gender' => $this->request->getPost('gender'),
                    'bank_name' => $this->request->getPost('bank_name'),
                    //'branch' => $this->request->getPost('branch'), 
                    'account_name' => $this->request->getPost('account_name'),
                    //'account_type' => $this->request->getPost('account_type'),  
                    'account_no' => $this->request->getPost('account_no'),
                    //'bank_city' => $this->request->getPost('bank_city'),
                    //'bank_state' => $this->request->getPost('bank_state'), 
                    'ifsc' => $this->request->getPost('ifsc'),
                    'var_status' => $var_status
                ];

                $return = $user_model->update_profile($id, $data_to_store);

                if ($return == true) {
                    $session->setFlashdata('flash_message', 'updated');
                    return redirect()->to(base_url() . 'admin/kyc');
                } else {
                    $session->setFlashdata('flash_message', 'not_updated');
                }
            }
        }

        $data['profile'] = $user_model->profile($id);
        $data['main_content'] = 'admin/kyc';
        return view('includes/admin/template', $data);
    }

    public function installments()
    {
        $user_model = model('UserModel');
        $id = session()->get('cust_id');
        $customer_id = session()->get('bliss_id');
        $data['profile'] = $user_model->profile($id);
        $data['pin'] = $user_model->get_all_installment($id);

        $razorpay = 'false';

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'amount' => 'required'
            ];
            $errors = [
                'amount' => [
                    'required' => 'The amount field is required.'
                ]
            ];

            if ($this->validate($rules, $errors)) {
                if ($this->request->getPost('how_to_pay') == 'razorpay') {
                    $status = 'Process';
                } else {
                    $status = 'Pending';
                }

                $data_to_store = [
                    'user_id' => $id,
                    'dis' => 'Installment amount',
                    'cr' => $this->request->getPost('amount'),
                    'qty' => 1,
                    'how_to_pay' => $this->request->getPost('how_to_pay'),
                    'status' => $status,
                ];
                $order_id = $user_model->add_order($data_to_store);

                $razorpay = 'true';
            }
        }

        if ($razorpay == 'true') {
            $data['order_id'] = $order_id;
            $data['order_amt'] = $this->request->getPost('amount');
            $data['oname'] = $data['profile'][0]['f_name'];
            $data['phone'] = $data['profile'][0]['phone'];
            $data['email'] = $data['profile'][0]['email'];
            $data['contst'] = 'Installment';
            $data['returnuri'] = 'admin/installments';
            session()->set('insid', $this->request->getPost('id'));
            $data['main_content'] = 'admin/razorpay';
            return view('includes/admin/template', $data);
        } else {
            $data['main_content'] = 'admin/installment';
            return view('includes/admin/template', $data);
        }
    }
}
