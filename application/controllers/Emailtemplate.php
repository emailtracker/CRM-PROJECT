<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Emailtemplate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        
    }


	 public function mailtemplate($param1 = "",$param2 = "")
	{

	 
    //  CHECK ACCESS PERMISSION
    check_permission('email_template');

  
    if ($param1 == 'add') {

        $response = $this->email_model->add_template();
        if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('template_name_already_exists'));
        }
        redirect(site_url('emailtemplate/mailtemplate/manage_template'), 'refresh');
    } 

    elseif ($param1 == "edit") {

        $response = $this->email_model->edit_mailtemplate($param2);
        if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('template_name_already_exists'));
        }
        redirect(site_url('emailtemplate/mailtemplate/manage_template'), 'refresh');
}

    elseif ($param1 == "delete") {

    	$this->email_model->delete_mailtemplate($param2);
    	$this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
        redirect(site_url('emailtemplate/mailtemplate/manage_template'), 'refresh');
    
    }
    
   





        $page_data['page_name'] = 'email/manage_template';
	 	$page_data['page_title'] = get_phrase('manage_template');
	 	$page_data['mailtemplate'] = $this->leads_model->get_mailtemplate($param2);	
	 	$this->load->view('backend/index.php', $page_data);
       
	}

	public function email_form($param1 = "",$param2 = "")
	{

	
        
        // CHECK PERMISSION
        check_permission('mailtemplate');
        if($param1 == 'add'){
		

		$page_data['page_name'] = 'email/add_template';
		$page_data['mailtemplate'] = $this->email_model->get_mailtemplate()->result_array();
		$page_data['page_title'] = get_phrase('add_template');
      }

      if($param1 == "edit_template"){
      	$page_data['page_name'] = 'email/edit_template';
        $page_data['page_title'] = get_phrase('edit_template');

        $page_data['mailtemplate'] = $this->email_model->get_mailtemplate()->result_array();
        $page_data['mailtemplate_id'] = $param2;
    }




		$this->load->view('backend/index.php',$page_data);
      

	}

	

	

	
}