<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends Mx_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('Lte_datatable_show');
	}

	public function index($data)
	{
	    $data['title_html'] = 'marketplace';
	    $data['title_app'] = 'marketplace';
		$this->load->view('template_01', $data);
	}


	public function template2($data)
	{
	    $data['title_html'] = 'marketplace';
	    $data['title_app'] = 'marketplace';
		$this->load->view('template_02', $data);
	}


	public function template3($data)
	{
		$data['cacheclear'] = '';
		$data['cacheclear'] = '?v='.date('ymdhis');
	    $data['title_html'] = 'marketplace';
	    $data['title_app'] = 'marketplace';
		$this->load->view('template_03', $data);
	}

}

/* End of file Template.php */
/* Location: ./application/modules/template/controllers/Template.php */
