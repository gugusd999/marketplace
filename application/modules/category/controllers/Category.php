<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MX_Controller {

	private $table1 = 'category';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('category/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nama kategori","action"]);
        $this->Createtable->order_set('0, 2');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
		$data['folder'] = "category";
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
                        'row' => ["nama_kategori"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["nama_kategori"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama_kategori"],
                    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $data['folder'] = "category";
            $data['file'] = "edit";
            echo modules::run("template", $data);
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }


    public function tambah_data()
    {
        $data['folder'] = "category";
		$data['file'] = "tambah";
		echo modules::run("template", $data);
    }


    public function simpan(){
        Form::save('category', $_POST['data']);
        redirect('category');
    }

    public function update(){
        
        Form::update('category',[
            'login_id' => $_POST['data']['login_id'],
            'id' => $_POST['data']['id']
        ], $_POST['data']);

            redirect('category');
    }
    
}
