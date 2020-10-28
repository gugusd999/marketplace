<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends MX_Controller {

	private $table1 = 'slider';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Createtable');
		$this->load->model('Datatable_gugus');
	}

	public function index()
	{
        $this->Createtable->location('slider/table_show');
        $this->Createtable->table_name('tableku');
        $this->Createtable->create_row(["no","foto","title","keterangan","action"]);
        $this->Createtable->order_set('0, 4');
		$show = $this->Createtable->create();

		$data['datatable'] = $show;
		$data['folder'] = "slider";
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
                        'row' => ["foto","title","keterangan"]
                    ],
                    'table-draw' => post('draw'),
                    'table-show' => [
                        'key' => 'id',
                        'data' => ["foto","title","keterangan"]
                    ],
                    "action" => "standart",
                    'order' => [
                        'order-default' => ['id', 'ASC'],
                        'order-data' => $setorder,
                        'order-option' => [ "1"=>"foto", "2"=>"title", "3"=>"keterangan"],
                    ],
                ]
            );
            $this->Datatable_gugus->table_show();
        }elseif ($action == "update") {
            $data_row = $this->db->query("SELECT * FROM ".$this->table1." WHERE id = '".$keyword."'")->row();
            $data['form_data'] = $data_row;
            $data['folder'] = "slider";
            $data['file'] = "edit";
            echo modules::run("template", $data);
        }elseif ($action == "delete") {
            $hapus_data = $this->db->query("DELETE FROM ".$this->table1." WHERE id = '".post("id")."'");
        }
    }


    public function tambah_data()
    {
        $data['folder'] = "slider";
		$data['file'] = "tambah";
		echo modules::run("template", $data);
    }


    public function simpan(){
        
                $foto = post("foto");
                $title = post("title");
                $keterangan = post("keterangan");
        $simpan = $this->db->query('
            INSERT INTO slider            
            (foto,title,keterangan)VALUES("'.$foto.'","'.$title.'","'.$keterangan.'")'
        );

        if($simpan){
            redirect('slider');
        }
    }

    public function update(){
        
                $foto = post("foto");
                $title = post("title");
                $keterangan = post("keterangan");
        $simpan = $this->db->query('
            UPDATE slider SET            
             foto = "'.$foto.'", title = "'.$title.'", keterangan = "'.$keterangan.'" WHERE id = '.post("id").''
        );

        if($simpan){
            redirect('slider');
        }
    }
    
}
