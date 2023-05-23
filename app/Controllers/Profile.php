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
            redirect(base_url() . 'admin/start');
        }
        $db = db_connect();
        $query = $db->query('SELECT travmoney, travprofit FROM customer where customer_id = "' . $customer_id . '" LIMIT 1');
        $row = $query->getRow();
        $data['travmoney'] = $row->travmoney;
        $data['travprofit'] = $row->travprofit;
        $data['main_content'] = 'admin/home';
        return view('includes/admin/template', $data);
    }
}
