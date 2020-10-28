<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends MX_Controller {

	private $table1 = 'brand';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('brand/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nama brand","action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
		$data['folder'] = "brand";
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
                    "where" => [
                        ["login_id", "=", generate_session('datalogin')['id']]
                    ],
                    'limit' => [
                        'start' => post('start'),
                        'end' => post('length')
                    ],
                    'search' => [
                        'value' => $this->Datatable_gugus->search(),
                        'row' => ["nama_brand"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["nama_brand"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama_brand"],
                    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $data['folder'] = "brand";
            $data['file'] = "edit";
            echo modules::run("template", $data);
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }


    public function tambah_data()
    {
        $data['folder'] = "brand";
		$data['file'] = "tambah";
		echo modules::run("template", $data);
    }


    public function simpan(){
        
                $nama_brand = post("nama_brand");
                $login_id = post("login_id");
        $simpan = $this->db->query('
            INSERT INTO brand            
            (nama_brand,login_id)VALUES("'.$nama_brand.'","'.$login_id.'")'
        );

        if($simpan){
            redirect('brand');
        }
    }

    public function update(){
        
                $nama_brand = post("nama_brand");
                $login_id = post("login_id");
        $simpan = $this->db->query('
            UPDATE brand SET            
             nama_brand = "'.$nama_brand.'", login_id = "'.$login_id.'" WHERE id = '.post("id").''
        );

        if($simpan){
            redirect('brand');
        }
    }
    
}
