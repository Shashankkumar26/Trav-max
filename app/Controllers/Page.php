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

    public function about()
	{
		$data['page_keywords'] = '';
		$data['page_description'] = '';
		$data['page_slug'] = 'about';
		$data['page_title'] = 'about';

		$data['main_content'] = 'about';
		return view('includes/front/front_template', $data);
	}

    public function testimonials()
	{
		$data['page_keywords'] = '';
		$data['page_description'] = '';
		$data['page_slug'] = 'testimonials';
		$data['page_title'] = 'testimonials';

		$data['main_content'] = 'testimonials';
		return view('includes/front/front_template', $data);
	}

    public function partner()
	{
		$data['page_keywords'] = '';
		$data['page_description'] = '';
		$data['page_slug'] = 'partner';
		$data['page_title'] = 'partner';

		$data['main_content'] = 'partner';
		return view('includes/front/front_template', $data);
	}

    public function terms_of_use()
	{
		$data['page_keywords'] = '';
		$data['page_description'] = '';
		$data['page_slug'] = 'terms_of_use';
		$data['page_title'] = 'terms_of_use';

		$data['main_content'] = 'terms_of_use';
		return view('includes/front/front_template', $data);
	}

    public function contact_us()
	{
		$data['page_keywords'] = '';
		$data['page_description'] = '';
		$data['page_slug'] = 'contact_us';
		$data['page_title'] = 'contact_us';

		$data['main_content'] = 'contact_us';
		return view('includes/front/front_template', $data);
	}
}
