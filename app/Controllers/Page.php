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

    public function packages()
	{
		$data['page_keywords'] = '';
		$data['page_description'] = '';
		$data['page_slug'] = 'packages';
		$data['page_title'] = 'packages';

		$data['main_content'] = 'packages';
		return view('includes/front/front_template', $data);
	}

    public function regis()
	{
		$data['page_keywords'] = '';
		$data['page_description'] = '';
		$data['page_slug'] = 'regis';
		$data['page_title'] = 'regis';

		$data['main_content'] = 'regis';
		return view('includes/front/front_template', $data);
	}
}
