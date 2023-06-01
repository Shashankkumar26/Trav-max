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

    function profile($id)
    {
        try {
            $db = db_connect();
            $query = $db->query("Select * from customer where id = " . $id);
            $row = $query->getResultArray();
            return $row;
        } catch (\Throwable $th) {
            $error = $db->error();
            var_dump($error);
        }
    }

    function get_total_income($id)
    {
        try {
            $db = db_connect();
            $query = $db->query("Select SUM(amount) as total from incomes where user_id = " . $id);
            $row = $query->getRow();
            return $row->total;
        } catch (\Throwable $th) {
            $error = $db->error();
            var_dump($error);
        }
    }

    function get_pending_income($id)
    {
        $db = db_connect();
        $query = $db->query("Select SUM(amount) as total from incomes where status = 'Hold' and user_id = " . $id);
        $row = $query->getRow();
        return $row->total;
    }

    function get_approved_income($id)
    {
        $db = db_connect();
        $query = $db->query("Select SUM(amount) as total from incomes where status = 'Approved' and user_id = " . $id);
        $row = $query->getRow();
        return $row->total;
    }

    function get_redeemed_income($id)
    {
        $db = db_connect();
        $query = $db->query("Select SUM(amount) as total from incomes where status = 'Redeemed' and user_id = " . $id);
        $row = $query->getRow();
        return $row->total;
    }

    function get_amount_paid($id)
    {
        $db = db_connect();
        $builder = $db->table('installment');
        $builder->select('SUM(amount) as total');
        $builder->where('user_id', $id);
        $builder->where('status', 'Paid');
        $query = $builder->get();
        return $query->getrow()->total;
    }

    function get_amount_remaining($id)
    {
        $db = db_connect();
        $builder = $db->table('installment');
        $builder->select('SUM(amount) as total');
        $builder->where('user_id', $id);
        $builder->where('status', 'Active');
        $query = $builder->get();
        return $query->getrow()->total;
    }

    function get_installments_paid($id)
    {
        $db = db_connect();
        $query = $db->query('SELECT * FROM installment where user_id = ' . $id . ' and status = "Paid"');
        return $query->getNumRows();
    }

    function get_installments_remaining($id)
    {
        $db = db_connect();
        $query = $db->query('SELECT * FROM installment where user_id = ' . $id . ' and status = "Active"');
        return $query->getNumRows();
    }

    function get_package($id)
    {
        $db = db_connect();
        $builder = $db->table('package_purchase');
        $builder->select('*');
        $builder->where('user_id', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }

    function my_friends_in($cust_id)
    {
        $db = db_connect();
        $builder = $db->table('customer');
        $builder->select('id,customer_id,f_name,l_name,rdate,direct_customer_id,parent_customer_id,macro,consume');
        $builder->whereIn('parent_customer_id', $cust_id);
        $query = $builder->get();
        return $query->getResultArray();
    }

    function get_income_from_this_partner($id, $partner_id)
    {
        $db = db_connect();
        $builder = $db->table('incomes');
        $builder->select('SUM(amount) as total');
        $builder->where('user_id', $id);
        $builder->where('user_send_by', $partner_id);
        $query = $builder->get();
        return $query->getRow()->total;
    }

    function get_package_data($id)
    {
        $db = db_connect();
        $builder = $db->table('package');
        $builder->select('*');
        $builder->where('id', $id);
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function add_user_package($data_to_store)
    {
        $db = db_connect();
        $db->table('package_purchase')->insert($data_to_store);
        return true;
    }

    public function update_profile($id, $data_to_store)
    {
        $db = db_connect();
        $builder = $db->table('customer');
        $builder->where('id', $id);
        $builder->update($data_to_store);

        return true;
    }

    public function add_installment($data)
    {
        $db = db_connect();
        $builder = $db->table('installment');
        $insert = $builder->insert($data);
        return $insert;
    }

    public function get_all_packages()
    {
        $db = db_connect();
        $builder = $db->table('package');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function get_payment_amount($id)
    {
        $db = db_connect();
        $query = $db->table('installment')
            ->select('amount')
            ->where('user_id', $id)
            ->where('status', 'Active')
            ->get();

        if ($query->getNumRows() > 0) {
            return $query->getRow()->amount;
        }

        return null;
    }

    public function get_neft($neft)
    {
        $db = db_connect();
        return $db->table('fund_request')
            ->select('*')
            ->where('neft', $neft)
            ->get()
            ->getResultArray();
    }

    public function insert_fund_request($data)
    {
        $db = db_connect();
        $builder = $db->table('fund_request');
        $builder->insert($data);

        return true;
    }

    function create_member()
    {
    }
}
