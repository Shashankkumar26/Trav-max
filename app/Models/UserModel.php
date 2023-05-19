<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    function validate_user($user_name, $password)
    {
        try {
            $db = db_connect();
            $query = $db->query("Select * from customer where (email='" . $user_name . "' OR customer_id='" . $user_name . "' OR phone='" . $user_name . "') and pass_word = '" . $password . "'");
            $row = $query->getRow();
        } catch (\Throwable $th) {
            $error = $db->error();
            var_dump($error);
        }
        if ($row != null) {
            $return['login'] = 'true';
            $return['cust_id'] = $row->id;
            $return['full_name'] = $row->f_name . ' ' . $row->l_name;
            $return['email'] = $row->email;
            $return['trav_id'] = $row->customer_id;
            $return['status'] = $row->status;
            if ($row->image == '') {
                $return['cust_img'] = '/images/man-person.png';
            } else {
                $return['cust_img'] = '/images/user/' . $row->image;
            }
            return $return;
        } else {
            $return['login'] = 'false';
            return $return;
        }
    }
}
