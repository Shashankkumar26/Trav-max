<?php

namespace App\Controllers;

class CustomerFront extends BaseController
{
    public function index()
    {
        $data['page_keywords'] = '';
        $data['page_description'] = '';
        $data['page_slug'] = 'Home';
        $data['page_title'] = 'Trav Max Holidays';

        // $data['state'] = $this->customer_model->state();
        // $data['constituency'] = $this->customer_model->fetch_constituency();
        // $data['category_list'] = $this->customer_model->get_category_list();
        $data['main_content'] = 'home_page';
        return view('includes/front/front_template', $data);
    }
}
