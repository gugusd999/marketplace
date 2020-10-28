<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Propinsi extends MX_Controller {

	private $table1 = 'provinsi';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('propinsi/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nama provinsi","action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
		$data['folder'] = "propinsi";
		$data['file'] = "view";
		echo modules::run("template", $data);
	}

	public function table_show($action = 'show', $keyword = '')
	{
		if ($action == "show") {
        
            if (isset($_POST['order'])): $setorder = $_POST['order']; else: $setorder = ''; endif;

            $this->Datatable_gugus->datatable(
                [
                    "table" => $this->table1,
                    "select" => [
						"*"
					],
                    'limit' => [
                        'start' => post('start'),
                        'end' => post('length')
                    ],
                    'search' => [
                        'value' => $this->Datatable_gugus->search(),
                        'row' => ["nama_provinsi"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["nama_provinsi"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama_provinsi"],
                    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $data['folder'] = "propinsi";
            $data['file'] = "edit";
            echo modules::run("template", $data);
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }


    public function tambah_data()
    {
        $data['folder'] = "propinsi";
		$data['file'] = "tambah";
		echo modules::run("template", $data);
    }


    public function simpan(){
        
                $nama_provinsi = post("nama_provinsi");
        $simpan = $this->db->query('
            INSERT INTO provinsi            
            (nama_provinsi)VALUES("'.$nama_provinsi.'")'
        );

        if($simpan){
            redirect('propinsi');
        }
    }

    public function update(){
        
                $nama_provinsi = post("nama_provinsi");
        $simpan = $this->db->query('
            UPDATE provinsi SET            
             nama_provinsi = "'.$nama_provinsi.'" WHERE id = '.post("id").''
        );

        if($simpan){
            redirect('propinsi');
        }
    }
    
}
