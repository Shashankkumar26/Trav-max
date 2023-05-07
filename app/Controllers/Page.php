<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function index()
    {
        echo 'hi';
    }

    public function services()
	{
		$data['page_keywords'] = '';
		$data['page_description'] = '';
		$data['page_slug'] = 'services';
		$data['page_title'] = 'Services';

		$data['main_content'] = 'services';
		return view('includes/front/front_template', $data);
	}
}
