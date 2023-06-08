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

	public function signup()
	{
		$data['page_keywords'] = '';
		$data['page_description'] = '';
		$data['page_slug'] = 'signup';
		$data['page_title'] = 'signup';

		$data['main_content'] = 'signup';
		return view('signup', $data);
	}

	public function plans()
	{
		$data['page_keywords'] = '';
		$data['page_description'] = '';
		$data['page_slug'] = 'plans';
		$data['page_title'] = 'plans';

		$data['main_content'] = 'plans';
		return view('includes/front/front_template', $data);
	}

	public function micro_plans()
	{
		$data['page_keywords'] = '';
		$data['page_description'] = '';
		$data['page_slug'] = 'micro_plans';
		$data['page_title'] = 'micro_plans';

		$data['main_content'] = 'micro_plans';
		return view('includes/front/front_template', $data);
	}

	public function mega()
	{
		$data['page_keywords'] = '';
		$data['page_description'] = '';
		$data['page_slug'] = 'mega';
		$data['page_title'] = 'mega';

		$data['main_content'] = 'mega';
		return view('includes/front/front_template', $data);
	}

	public function feedback()
	{
		$customer_model = model('CustomerModel');
		$data['page_keywords'] = '';
		$data['page_description'] = '';
		$data['page_slug'] = 'feedback';
		$data['page_title'] = 'feedback';
		$data['category_list'] = $customer_model->get_category_list();
		$data['feedback'] = '';

		if ($this->request->getMethod() === 'post' && $this->request->getPost('contact') === 'Submit') {
			$to = 'realwaterservices@gmail.com';
			$subject = $this->request->getPost('subject');
			$txt = 'email :- ' . $this->request->getPost('email') . '<br/>site speed :- ' . $this->request->getPost('speed') . '<br/>feedback :- ' . $this->request->getPost('message');
			$headers = 'From: feedback@realwaterservicese.com' . "\r\n";
			$headers .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
			$headers .= 'From: <realwaterservices.com>' . "\r\n";
			// mail($to, $subject, $txt, $headers);
			$data['feedback'] = 'mail sent successfully';
		}

		$data['main_content'] = 'feedback';
		return view('includes/front/front_template', $data);
	}

	public function invite_friend($cust_id)
	{
		$data['page_keywords'] = '';
		$data['page_description'] = '';
		$data['page_slug'] = 'invite_friend';
		$data['page_title'] = 'invite_friend';
		$data['cust_id'] = $cust_id;
		$data['main_content'] = 'invite_friend';
		return view('includes/front/front_template', $data);
	}
}
