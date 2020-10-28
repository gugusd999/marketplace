<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends MX_Controller {

	private $table1 = 'supplier';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('supplier/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nama supplier","alamat","no telp","action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
		$data['folder'] = "supplier";
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
                        'row' => ["nama_supplier","alamat","no_telp"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["nama_supplier","alamat","no_telp"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama_supplier", "2"=>"alamat", "3"=>"no_telp"],
                    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $data['folder'] = "supplier";
            $data['file'] = "edit";
            echo modules::run("template", $data);
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }


    public function tambah_data()
    {
        $data['folder'] = "supplier";
		$data['file'] = "tambah";
		echo modules::run("template", $data);
    }


    public function simpan(){
        
                $nama_supplier = post("nama_supplier");
                $alamat = post("alamat");
                $no_telp = post("no_telp");
                $login_id = post("login_id");
        $simpan = $this->db->query('
            INSERT INTO supplier            
            (nama_supplier,alamat,no_telp,login_id)VALUES("'.$nama_supplier.'","'.$alamat.'","'.$no_telp.'","'.$login_id.'")'
        );

        if($simpan){
            redirect('supplier');
        }
    }

    public function update(){
        
                $nama_supplier = post("nama_supplier");
                $alamat = post("alamat");
                $no_telp = post("no_telp");
                $login_id = post("login_id");
        $simpan = $this->db->query('
            UPDATE supplier SET            
             nama_supplier = "'.$nama_supplier.'", alamat = "'.$alamat.'", no_telp = "'.$no_telp.'", login_id = "'.$login_id.'" WHERE id = '.post("id").''
        );

        if($simpan){
            redirect('supplier');
        }
    }
    
}
