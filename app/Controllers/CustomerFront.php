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

        $data['main_content'] = 'home_page';
        return view('includes/front/front_template', $data);
    }
}
