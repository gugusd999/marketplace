<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Useradmin extends MX_Controller {

	private $table1 = 'login';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('useradmin/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","username","password","sebagai","email","telp","status","action"]);
        $this->Createtable->order_set('0, 7');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
		$data['folder'] = "useradmin";
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
                        'row' => ["username","password","sebagai","email","telp","status"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["username","password","sebagai","email","telp","status"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"username", "2"=>"password", "3"=>"sebagai", "4"=>"email", "5"=>"telp", "6"=>"status"],
                    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $data['folder'] = "useradmin";
            $data['file'] = "edit";
            echo modules::run("template", $data);
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }


    public function tambah_data()
    {
        $data['folder'] = "useradmin";
		$data['file'] = "tambah";
		echo modules::run("template", $data);
    }


    public function simpan(){
        
                $username = post("username");
                $password = post("password");
                $sebagai = post("sebagai");
                $email = post("email");
                $telp = post("telp");
                $status = post("status");
        $simpan = $this->db->query('
            INSERT INTO login            
            (username,password,sebagai,email,telp,status)VALUES("'.$username.'","'.$password.'","'.$sebagai.'","'.$email.'","'.$telp.'","'.$status.'")'
        );

        if($simpan){
            redirect('useradmin');
        }
    }

    public function update(){
        
                $username = post("username");
                $password = post("password");
                $sebagai = post("sebagai");
                $email = post("email");
                $telp = post("telp");
                $status = post("status");
        $simpan = $this->db->query('
            UPDATE login SET            
             username = "'.$username.'", password = "'.$password.'", sebagai = "'.$sebagai.'", email = "'.$email.'", telp = "'.$telp.'", status = "'.$status.'" WHERE id = '.post("id").''
        );

        if($simpan){
            redirect('useradmin');
        }
    }
    
}
