<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends MX_Controller {

	private $table1 = 'chat';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('chat/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","pesan","customer id","action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
		$data['folder'] = "chat";
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
                        'row' => ["pesan","customer_id"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["pesan","customer_id"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"pesan", "2"=>"customer_id"],
                    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $data['folder'] = "chat";
            $data['file'] = "edit";
            echo modules::run("template", $data);
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }


    public function tambah_data()
    {
        $data['folder'] = "chat";
		$data['file'] = "tambah";
		echo modules::run("template", $data);
    }


    public function simpan(){
        
                $pesan = post("pesan");
                $customer_id = post("customer_id");
                $login_id = post("login_id");
        $simpan = $this->db->query('
            INSERT INTO chat            
            (pesan,customer_id,login_id)VALUES("'.$pesan.'","'.$customer_id.'","'.$login_id.'")'
        );

        if($simpan){
            redirect('chat');
        }
    }

    public function update(){
        
                $pesan = post("pesan");
                $customer_id = post("customer_id");
                $login_id = post("login_id");
        $simpan = $this->db->query('
            UPDATE chat SET            
             pesan = "'.$pesan.'", customer_id = "'.$customer_id.'", login_id = "'.$login_id.'" WHERE id = '.post("id").''
        );

        if($simpan){
            redirect('chat');
        }
    }
    
}
