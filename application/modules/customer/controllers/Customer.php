<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends MX_Controller {

	private $table1 = 'customer';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('customer/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","nama","no telp","email","alamat","kota id","provinsi id","username","password","action"]);
        $this->Createtable->order_set('0, 9');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
		$data['folder'] = "customer";
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
                        'row' => ["nama","no_telp","email","alamat","kota_id","provinsi_id","username","password"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["nama","no_telp","email","alamat","kota_id","provinsi_id","username","password"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"nama", "2"=>"no_telp", "3"=>"email", "4"=>"alamat", "5"=>"kota_id", "6"=>"provinsi_id", "7"=>"username", "8"=>"password"],
                    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $data['folder'] = "customer";
            $data['file'] = "edit";
            echo modules::run("template", $data);
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }


    public function tambah_data()
    {
        $data['folder'] = "customer";
		$data['file'] = "tambah";
		echo modules::run("template", $data);
    }


    public function simpan(){
        
                $nama = post("nama");
                $no_telp = post("no_telp");
                $email = post("email");
                $alamat = post("alamat");
                $kota_id = post("kota_id");
                $provinsi_id = post("provinsi_id");
                $username = post("username");
                $password = post("password");
        $simpan = $this->db->query('
            INSERT INTO customer            
            (nama,no_telp,email,alamat,kota_id,provinsi_id,username,password)VALUES("'.$nama.'","'.$no_telp.'","'.$email.'","'.$alamat.'","'.$kota_id.'","'.$provinsi_id.'","'.$username.'","'.$password.'")'
        );

        if($simpan){
            redirect('customer');
        }
    }

    public function update(){
        
                $nama = post("nama");
                $no_telp = post("no_telp");
                $email = post("email");
                $alamat = post("alamat");
                $kota_id = post("kota_id");
                $provinsi_id = post("provinsi_id");
                $username = post("username");
                $password = post("password");
        $simpan = $this->db->query('
            UPDATE customer SET            
             nama = "'.$nama.'", no_telp = "'.$no_telp.'", email = "'.$email.'", alamat = "'.$alamat.'", kota_id = "'.$kota_id.'", provinsi_id = "'.$provinsi_id.'", username = "'.$username.'", password = "'.$password.'" WHERE id = '.post("id").''
        );

        if($simpan){
            redirect('customer');
        }
    }
    
}
