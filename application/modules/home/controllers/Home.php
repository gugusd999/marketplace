<?php

class Home extends MX_Controller{

    public function __construct()
	{
		parent::__construct();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

    public function index()
    {
        $data['folder'] = "home";
		$data['file'] = "view";
		echo modules::run("template/template2", $data);
    }

}
