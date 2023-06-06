<?php

namespace App\Controllers;

class DistributorLevelInformation extends BaseController
{

    public function index()
    {
        $uri = service('uri');
        $user_model = model('UserModel');
        $id = session('cust_id');
        $customer_id = session('bliss_id');
        $data['profile'] = $user_model->profile($id);
        $data['parent_profile'] = $user_model->parent_profile($data['profile'][0]['direct_customer_id']);
        $data['myfriends'] = [];
        $data['show_inner'] = 'false';
        $data['current_user'] = $customer_id;
        $inner_users = $uri->getSegment(3);
        $level = 1;
        if ($this->request->getPost('level') != '') {
            $level = $this->request->getPost('level');
        }
        $cus_array = [];
        $user_list = [];
        $cus_array[] = $customer_id;
        $myfriendid = [$id];
        $p = 0;
        while ($p < $level) {
            $myfriends = $user_model->friends_by_position_direct_in_array($cus_array);
            if (!empty($myfriends)) {
                $user_list = $myfriends;
                $cus_array = array_column($myfriends, 'customer_id');
            } else {
                $user_list = [];
            }
            $p++;
        }
        $data['myfriends'] = $user_list;
        $data['main_content'] = 'admin/DistributorLevelInformation';
        return view('includes/admin/template', $data);
    }
}
