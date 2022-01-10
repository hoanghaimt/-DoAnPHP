<!-- Quan lý tk khách hàng -->
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('backend/Mcustomer');
		$this->load->model('backend/Muser');
		$this->load->model('backend/Morders');
		if(!$this->session->userdata('sessionadmin'))
		{
			redirect('admin/user/login','refresh');
		}
		$this->data['user']=$this->session->userdata('sessionadmin');
		$this->data['com']='customer';
	}

	public function index()
	{
		$this->load->library('phantrang');
		$limit=10;
		$current=$this->phantrang->PageCurrent();
		$first=$this->phantrang->PageFirst($limit, $current);
		$total=$this->Mcustomer->customer_count();
		$this->data['strphantrang']=$this->phantrang->PagePer($total, $current, $limit, $url='admin/customer');
		$this->data['list']=$this->Mcustomer->customer_all($limit, $first);
		$this->data['view']='index';
		$this->data['title']='Danh sách khách hàng';
		$this->load->view('backend/layout', $this->data);
	}

	public function update($id) 
	{
		$this->data['row']=$this->Mcustomer->customer_detail($id);
		$this->data['view']='update';
		$this->data['title']='Cập nhật khách hàng';
		$this->load->view('backend/layout', $this->data);
	}
	public function status($id) 
		{
			$row=$this->Mcustomer->customer_detail($id);
			$status=($row['status']==1)?0:1;
			$mydata= array('status' => $status);
			$this->Mcustomer->customer_update($mydata, $id);
			$this->session->set_flashdata('success', 'Cập nhật trạng thái thành công');
			redirect('admin/customer/','refresh');
		}
	
	 public function insert(){
	$this->load->library('phantrang');
		$limit=20;
		$current=$this->phantrang->PageCurrent();
		$first=$this->phantrang->PageFirst($limit, $current);
		$total=$this->Mcustomer->customer_count();
		$this->data['strphantrang']=$this->phantrang->PagePer($total, $current, $limit, $url='admin/customer');
		$this->data['list']=$this->Mcustomer->customer_all($limit, $first);
		$this->data['view']='insert';
		$this->data['title']='Danh sách khách hàng';
		$this->load->view('backend/layout', $this->data);
		
	}
 
}