<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Harga_jual extends MX_Controller {

	private $table1 = 'harga_jual';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('harga_jual/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","product","harga item","action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
		$data['folder'] = "harga_jual";
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
                        "product" => ["*"]
					],
                    "where" => [
                        [$this->table1.".login_id", "=", generate_session('datalogin')['id']]
                    ],
                    "leftJoin" => [
                        "product" => [$this->table1.".product_id", "=", "product.id"]
                    ]
                    ,'limit' => [
                        'start' => post('start'),
                        'end' => post('length')
                    ],
                    'search' => [
                        'value' => $this->Datatable_gugus->search(),
                        'row' => ["product.nama_product",$this->table1.".harga_item"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["nama_product","harga_item"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => [$this->table1.'.id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"product.nama_product", "2"=>$this->table1.".harga_item"],
                    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $data['folder'] = "harga_jual";
            $data['file'] = "edit";
            echo modules::run("template", $data);
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }


    public function tambah_data()
    {
        $data['folder'] = "harga_jual";
		$data['file'] = "tambah";
		echo modules::run("template", $data);
    }


    public function simpan(){
        
                $product_id = post("product_id");
                $harga_item = post("harga_item");
                $login_id = post("login_id");
        $simpan = $this->db->query('
            INSERT INTO harga_jual            
            (product_id,harga_item,login_id)VALUES("'.$product_id.'","'.$harga_item.'","'.$login_id.'")'
        );

        if($simpan){
            redirect('harga_jual');
        }
    }

    public function update(){
        
                $product_id = post("product_id");
                $harga_item = post("harga_item");
                $login_id = post("login_id");
        $simpan = $this->db->query('
            UPDATE harga_jual SET            
             product_id = "'.$product_id.'", harga_item = "'.$harga_item.'", login_id = "'.$login_id.'" WHERE id = '.post("id").''
        );

        if($simpan){
            redirect('harga_jual');
        }
    }
    
}
