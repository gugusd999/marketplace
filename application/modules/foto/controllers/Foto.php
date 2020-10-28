<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto extends MX_Controller {

	private $table1 = 'foto_product';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
        $this->load->library("form_db");
	}

	public function index()
	{
        $this->Createtable->location('foto/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","product","foto","action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
		$data['folder'] = "foto";
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
                        'row' => ["product_id","foto"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["product_id","foto"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"product_id", "2"=>"foto"],
                    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $data['folder'] = "foto";
            $data['file'] = "edit";
            echo modules::run("template", $data);
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }


    public function tambah_data()
    {
        $data['folder'] = "foto";
		$data['file'] = "tambah";
		echo modules::run("template", $data);
    }


    public function simpan(){
        
                $product_id = post("product_id");
                $foto = getfile("foto", "foto-product-market", "product-".$product_id."-");
                $login_id = post("login_id");
        $simpan = $this->db->query('
            INSERT INTO foto_product            
            (product_id,foto,login_id)VALUES("'.$product_id.'","'.$foto.'","'.$login_id.'")'
        );

        if($simpan){
            redirect('foto');
        }
    }

    public function update(){
        
                $product_id = post("product_id");
                $foto = form::getfile("foto", "foto-product-market", "product-".$product_id."-", post('id'), $this->table1);
                $login_id = post("login_id");
        $simpan = $this->db->query('
            UPDATE foto_product SET            
             product_id = "'.$product_id.'", foto = "'.$foto.'", login_id = "'.$login_id.'" WHERE id = '.post("id").''
        );

        if($simpan){
            redirect('foto');
        }
    }
    
}
