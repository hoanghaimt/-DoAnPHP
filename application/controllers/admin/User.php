<!-- Đăng nhập admin -->
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('backend/Muser');
		$this->load->model('backend/Morders'); 
	}

	public function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Tên đăng nhập', 'required|min_length[5]|max_length[32]');
		$this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[5]|max_length[32]');
       // kiểm tra thông tin nhập đầy đủ ko
        if ($this->form_validation->run() ==TRUE)
        {

        	$username = $_POST['username'];
        	$password = sha1($_POST['password']);
        	//Kiểm tra thông tin tài khoản có tồn tại không
        	if($this->Muser->user_login($username, $password)!=FALSE)
        	{

        		$row = $this->Muser->user_login($username, $password);
        		$this->session->set_userdata('sessionadmin',$row);
        		$this->session->set_userdata('id',$row['id']);
        		//đăng nhập thành công và đi vào trong admin
        		redirect('admin','refresh');
        	}
        	//Thất bại
        	else
	        {
	        	$data['error']='Thông tin nhập không chính xác || Không có quyền truy cập';
	        	$this->load->view('backend/components/user/login', $data);
	        }
        }
        // Thất bại
        else
        {
        	$this->load->view('backend/components/user/login');
        }
	}
	//Đăng xuất tài khoản
	public function logout()
	{
		$array_items = array('sessionadmin', 'id');
        $this->session->unset_userdata($array_items);
		redirect('admin','refresh');
	}

}

