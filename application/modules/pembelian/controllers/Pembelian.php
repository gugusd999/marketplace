<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends MX_Controller {

	private $table1 = 'pembelian';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('pembelian/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","product","supplier","tanggal","qty","harga satuan","harga total","action"]);
        $this->Createtable->order_set('0, 7');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
		$data['folder'] = "pembelian";
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
                        "product" => ["*"],
                        "supplier" => ["*"],
					],
                    "where" => [
                        [$this->table1.".login_id", "=", generate_session('datalogin')['id']]
                    ],
                    "leftJoin" => [
                        "product" => [$this->table1.".product_id", "=", "product.id"],
                        "supplier" => [$this->table1.".supplier_id", "=", "supplier.id"]
                    ],
                    'limit' => [
                        'start' => post('start'),
                        'end' => post('length')
                    ],
                    'search' => [
                        'value' => $this->Datatable_gugus->search(),
                        'row' => ["product.nama_product","supplier.nama_supplier",$this->table1.".tanggal",$this->table1.".qty",$this->table1.".harga_satuan",$this->table1.".harga_total"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["nama_product","nama_supplier","tanggal","qty","harga_satuan","harga_total"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => [$this->table1.".id", 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"product.nama_product", "2"=>"supplier.nama_supplier", "3"=>$this->table1.".tanggal", "4"=>$this->table1.".qty", "5"=>$this->table1.".harga_satuan", "6"=>$this->table1.".harga_total"],
                    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $data['folder'] = "pembelian";
            $data['file'] = "edit";
            echo modules::run("template", $data);
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }


    public function tambah_data()
    {
        $data['folder'] = "pembelian";
		$data['file'] = "tambah";
		echo modules::run("template", $data);
    }


    public function simpan(){
        
                $product_id = post("product_id");
                $supplier_id = post("supplier_id");
                $tanggal = post("tanggal");
                $qty = post("qty");
                $harga_satuan = post("harga_satuan");
                $harga_total = post("harga_total");
                $login_id = post("login_id");
        $simpan = $this->db->query('
            INSERT INTO pembelian            
            (product_id,supplier_id,tanggal,qty,harga_satuan,harga_total,login_id)VALUES("'.$product_id.'","'.$supplier_id.'","'.$tanggal.'","'.$qty.'","'.$harga_satuan.'","'.$harga_total.'","'.$login_id.'")'
        );

        if($simpan){
            redirect('pembelian');
        }
    }

    public function update(){
        
                $product_id = post("product_id");
                $supplier_id = post("supplier_id");
                $tanggal = post("tanggal");
                $qty = post("qty");
                $harga_satuan = post("harga_satuan");
                $harga_total = post("harga_total");
                $login_id = post("login_id");
        $simpan = $this->db->query('
            UPDATE pembelian SET            
             product_id = "'.$product_id.'", supplier_id = "'.$supplier_id.'", tanggal = "'.$tanggal.'", qty = "'.$qty.'", harga_satuan = "'.$harga_satuan.'", harga_total = "'.$harga_total.'", login_id = "'.$login_id.'" WHERE id = '.post("id").''
        );

        if($simpan){
            redirect('pembelian');
        }
    }
    
}
