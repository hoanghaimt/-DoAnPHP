<!-- Cấu hình hệ thống -->
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configuration extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// goi cac ham trong model
		$this->load->model('backend/Mconfiguration');
		$this->load->model('backend/Muser');
		$this->load->model('backend/Morders');

		if(!$this->session->userdata('sessionadmin'))
		{
			redirect('admin/user/login','refresh');
		}
		$this->data['user']=$this->session->userdata('sessionadmin');
		$this->data['com']='configuration';
	}
	
	public function update($id=1)
	{
		$user_role=$this->session->userdata('sessionadmin');
		if($user_role['role']==2){
			redirect('admin/E403/index','refresh'); 
		}
		$this->data['row']=$this->Mconfiguration->configuration_detail($id);

		$this->load->library('form_validation');
		$this->load->library('session');	
		$this->form_validation->set_rules('mail_smtp', 'Địa chỉ email ', 'required');
		$this->form_validation->set_rules('mail_smtp_password', 'Password email ', 'required');
		$this->form_validation->set_rules('mail_noreply', 'Mail admin', 'required');
		$this->form_validation->set_rules('priceShip', 'Phí ship', 'required');
		$this->form_validation->set_rules('title', 'Tiêu đề', 'required');
		if ($this->form_validation->run() == TRUE) 
		{
			$mydata= array(
				'mail_smtp' =>$_POST['mail_smtp'], 
				'mail_smtp_password'=>$_POST['mail_smtp_password'],
				'mail_noreply'=>$_POST['mail_noreply'],
				'priceShip'=>$_POST['priceShip'],
				'title'=>$_POST['title'], 
				'description'=>$_POST['description'],
			);
			
			$this->Mconfiguration->configuration_update($mydata,$id);
			$this->session->set_flashdata('success', 'Cập nhật Cấu hình thành công');
			redirect('admin/configuration/update','refresh');
		} 
		$this->data['view']='update';
		$this->data['title']='Cấu hình';
		$this->load->view('backend/layout', $this->data);
	}
	

}
