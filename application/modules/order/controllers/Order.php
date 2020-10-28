<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MX_Controller {

	private $table1 = 'order_barang';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('order/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","customer id","product id","tanggal","qty","action"]);
        $this->Createtable->order_set('0, 5');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
		$data['folder'] = "order";
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
                        'row' => ["customer_id","product_id","tanggal","qty"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["customer_id","product_id","tanggal","qty"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"customer_id", "2"=>"product_id", "3"=>"tanggal", "4"=>"qty"],
                    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $data['folder'] = "order";
            $data['file'] = "edit";
            echo modules::run("template", $data);
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }


    public function tambah_data()
    {
        $data['folder'] = "order";
		$data['file'] = "tambah";
		echo modules::run("template", $data);
    }


    public function simpan(){
        
                $customer_id = post("customer_id");
                $product_id = post("product_id");
                $tanggal = post("tanggal");
                $qty = post("qty");
        $simpan = $this->db->query('
            INSERT INTO order_barang            
            (customer_id,product_id,tanggal,qty)VALUES("'.$customer_id.'","'.$product_id.'","'.$tanggal.'","'.$qty.'")'
        );

        if($simpan){
            redirect('order');
        }
    }

    public function update(){
        
                $customer_id = post("customer_id");
                $product_id = post("product_id");
                $tanggal = post("tanggal");
                $qty = post("qty");
        $simpan = $this->db->query('
            UPDATE order_barang SET            
             customer_id = "'.$customer_id.'", product_id = "'.$product_id.'", tanggal = "'.$tanggal.'", qty = "'.$qty.'" WHERE id = '.post("id").''
        );

        if($simpan){
            redirect('order');
        }
    }
    
}
