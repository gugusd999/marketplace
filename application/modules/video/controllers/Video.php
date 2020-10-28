<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends MX_Controller {

	private $table1 = 'video_product';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('video/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","product id","video","action"]);
        $this->Createtable->order_set('0, 3');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
		$data['folder'] = "video";
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
                        'row' => ["product.nama_product", $this->table1.".video"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["nama_product","video"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => [$this->table1.'.id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=> "product.nama_product", "2"=> $this->table1.".video"],
                    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $data['folder'] = "video";
            $data['file'] = "edit";
            echo modules::run("template", $data);
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }


    public function tambah_data()
    {
        $data['folder'] = "video";
		$data['file'] = "tambah";
		echo modules::run("template", $data);
    }


    public function simpan(){
        
                $product_id = post("product_id");
                $video = post("video");
                $login_id = post("login_id");
        $simpan = $this->db->query('
            INSERT INTO video_product            
            (product_id,video,login_id)VALUES("'.$product_id.'","'.$video.'","'.$login_id.'")'
        );

        if($simpan){
            redirect('video');
        }
    }

    public function update(){
        
                $product_id = post("product_id");
                $video = post("video");
                $login_id = post("login_id");
        $simpan = $this->db->query('
            UPDATE video_product SET            
             product_id = "'.$product_id.'", video = "'.$video.'", login_id = "'.$login_id.'" WHERE id = '.post("id").''
        );

        if($simpan){
            redirect('video');
        }
    }
    
}
