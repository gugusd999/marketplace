<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MX_Controller {

	private $table1 = 'product';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
        $this->load->library("form_db");
	}

	public function index()
	{
        $this->Createtable->location('product/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nama product","brand","category","model year","action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
		$data['folder'] = "product";
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
						$this->table1 => ["*"],
                        "brand" => ["*"],
                        "category" => ["*"]
					],
                    "where" => [
                        [$this->table1.".login_id", "=", generate_session('datalogin')['id']]
                    ],
                    "leftJoin" => [
                        "brand" => [$this->table1.".brand_id", "=", "brand.id"],
                        "category" => [$this->table1.".category_id", "=", "category.id"]
                    ]
                    ,'limit' => [
                        'start' => post('start'),
                        'end' => post('length')
                    ],
                    'search' => [
                        'value' => $this->Datatable_gugus->search(),
                        'row' => [$this->table1.".nama_product", "brand.nama_brand", "category.nama_kategori", $this->table1.".model_year"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["nama_product","nama_brand","nama_kategori","model_year"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => [$this->table1.'.id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=> $this->table1.".nama_product", "2"=> "brand.nama_brand", "3"=> "category.nama_kategori", "4"=> $this->table1.".model_year"],
                    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['select'] = $this->form_db;
            $data['form_data'] = $data_row;
            $data['folder'] = "product";
            $data['file'] = "edit";
            echo modules::run("template", $data);
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }


    public function tambah_data()
    {
        $data['select'] = $this->form_db;
        $data['folder'] = "product";
		$data['file'] = "tambah";
		echo modules::run("template", $data);
    }


    public function simpan(){
        
                $nama_product = post("nama_product");
                $brand_id = post("brand_id");
                $category_id = post("category_id");
                $model_year = post("model_year");
                $login_id = post("login_id");
        $simpan = $this->db->query('
            INSERT INTO product            
            (nama_product,brand_id,category_id,model_year,login_id)VALUES("'.$nama_product.'","'.$brand_id.'","'.$category_id.'","'.$model_year.'","'.$login_id.'")'
        );

        if($simpan){
            redirect('product');
        }
    }

    public function update(){
        
                $nama_product = post("nama_product");
                $brand_id = post("brand_id");
                $category_id = post("category_id");
                $model_year = post("model_year");
                $login_id = post("login_id");
        $simpan = $this->db->query('
            UPDATE product SET            
             nama_product = "'.$nama_product.'", brand_id = "'.$brand_id.'", category_id = "'.$category_id.'", model_year = "'.$model_year.'", login_id = "'.$login_id.'" WHERE id = '.post("id").''
        );

        if($simpan){
            redirect('product');
        }
    }
    
}
