<?php

namespace App\Controllers;

class User extends BaseController
{
    function validate_credentials()
    {
        $user_model = model('UserModel');
        $session = session();
        $user_name = $this->request->getPost("user_name");
        $password = $this->__encrip_password($this->request->getPost("password"));
        $is_valid = $user_model->validate_user($user_name, $password);

        if ($is_valid['login'] == 'false') {
            echo '<div class="alert alert-danger">Username or password is wrong.</div>';
        } elseif ($is_valid['login'] == 'true') {
            $data = array('full_name' => $is_valid['full_name'], 'email' => $is_valid['email'], 'trav_id' => $is_valid['trav_id'],  'cust_id' => $is_valid['cust_id'], 'cust_img' => $is_valid['cust_img'], 'is_customer_logged_in' => true);
            $session->set($data);
            //$user_model->update_profile($is_valid['trav_id'], array('last_visit' => date('Y-m-d H:i:s')));
            echo '<div class="alert alert-success">Login Successfull</div>';
        } else {
            echo '<div class="alert alert-danger">Some Error Occured.</div>';
        }
    }

    function create_member()
    {
        $validation = \Config\Services::validation();
        $validation->reset();
        // field name, error message, validation rules
        $validation->setRule('f_name', 'first name', 'trim|required|min_length[3]');
        $validation->setRule('l_name', 'last name', 'trim|required');
        $validation->setRule('number', 'phone', 'trim|required|numeric|min_length[10]|max_length[10]');
        $validation->setRule('email', 'email', 'trim|required|valid_email');
        $validation->setRule('password', 'password', 'trim|required|min_length[6]|max_length[32]');
        $validation->setRule('cpassword', 'confirm password', 'trim|required|min_length[6]|matches[password]');
        $validation->setRule('trav_id', 'Referral id', 'required');

        if (!$validation->run($_POST)) {
            $errors = $validation->getErrors();
            $value = empty($errors) ?"" : reset($errors);
            $data = array("status" => "error", "message" => $value);
            header("Content-Type: application/json");
            echo json_encode($data);
            exit();
        } else {
            $user_model = model('UserModel');
            $session = session();
            $query = $user_model->create_member();
        }
    }

    function __encrip_password($password)
    {
        return md5($password);
    }

    function logout()
    {
        $session = session();
        $session->destroy();
        header('Location: /');
        die();
    }
}
