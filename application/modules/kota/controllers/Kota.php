<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends MX_Controller {

	private $table1 = 'kota';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('kota/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nama kota","action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
		$data['folder'] = "kota";
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
                        'row' => ["nama_kota"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["nama_kota"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama_kota"],
                    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $data['folder'] = "kota";
            $data['file'] = "edit";
            echo modules::run("template", $data);
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }


    public function tambah_data()
    {
        $data['folder'] = "kota";
		$data['file'] = "tambah";
		echo modules::run("template", $data);
    }


    public function simpan(){
        
                $nama_kota = post("nama_kota");
        $simpan = $this->db->query('
            INSERT INTO kota            
            (nama_kota)VALUES("'.$nama_kota.'")'
        );

        if($simpan){
            redirect('kota');
        }
    }

    public function update(){
        
                $nama_kota = post("nama_kota");
        $simpan = $this->db->query('
            UPDATE kota SET            
             nama_kota = "'.$nama_kota.'" WHERE id = '.post("id").''
        );

        if($simpan){
            redirect('kota');
        }
    }
    
}
