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
