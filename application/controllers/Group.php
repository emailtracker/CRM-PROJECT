  <?php
defined('BASEPATH') or exit('No direct script access allowed');

class Group extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        $this->user_model->check_session_data('admin');
        $this->load->library('email');
    }


   



public function role($param1 = "", $param2 = "")
{
    if ($this->session->userdata('admin_login') != true) {
        redirect(site_url('login'), 'refresh');
    }
    
    // CHECK ACCESS PERMISSION
    check_permission('role');

    if ($param1 == 'add') {

        $response = $this->group_model->addrole();
        if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('role_already_exists'));
        }
        redirect(site_url('group/role/manage_role'), 'refresh');
    } 


    elseif ($param1 == "edit") {

        $response = $this->group_model->edit_role($param2);
        if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('role_already_exists'));
        }
        redirect(site_url('group/role/manage_role'), 'refresh');

        

    } elseif ($param1 == "delete") {

        $this->group_model->delete_role($param2);
        $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
        redirect(site_url('group/role/manage_role'), 'refresh');
    }

    
    $page_data['page_name'] = 'group/role';
    $page_data['page_title'] = get_phrase('manage_role');
   $page_data['role'] = $this->leads_model->get_role($param2);
    $this->load->view('backend/index', $page_data);
}



public function role_form($param1 = "", $param2 = "")
{
    if ($this->session->userdata('admin_login') != true) {
        redirect(site_url('login'), 'refresh');
    }

    // CHECK ACCESS PERMISSION
    check_permission('role');

    if ($param1 == "add_role") {

        $page_data['page_name'] = 'group/role_add';
        $page_data['role'] = $this->group_model->get_role()->result_array();
        $page_data['page_title'] = get_phrase('add_role');
    }

    if ($param1 == "edit_role") {
            

        $page_data['page_name'] = 'group/role_edit';
        $page_data['page_title'] = get_phrase('edit_role');
        $page_data['role'] = $this->group_model->get_role()->result_array();
        $page_data['role_id'] = $param2;
    }


    $this->load->view('backend/index', $page_data);
}


public function manager ($param1 ="", $param2 ="")
{
    if ($this->session->userdata('admin_login') != true) {
        redirect(site_url('login'), 'refresh');
    }

    check_permission('manager');

    if ($param1 == 'add') {

        $response = $this->group_model->addmanager();
        if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('manager_already_exists'));
        }
        redirect(site_url('group/manager/manage_manager'), 'refresh');
    } 

    elseif ($param1 == "edit") {

        $response = $this->group_model->edit_manager($param2);
        if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('manager_already_exists'));
        }
        redirect(site_url('group/manager/manage_manager'), 'refresh');

        

    } elseif ($param1 == "delete") {

        $this->group_model->delete_manager($param2);
        $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
        redirect(site_url('group/manager/manage_manager'), 'refresh');
    }


    $page_data['page_name'] = 'group/manage_manager';
    $page_data['page_title'] = get_phrase('manage_manager');
   $page_data['manager'] = $this->group_model->get_manager($param2);
    $this->load->view('backend/index', $page_data);
}

public function manager_form($param1 = "", $param2 = "")
{
    if ($this->session->userdata('admin_login') != true) {
        redirect(site_url('login'), 'refresh');
    }

    // CHECK ACCESS PERMISSION
    check_permission('manager');

    if ($param1 == "addmanager") {

        $page_data['page_name'] = 'group/manager_add';
       // $page_data['role'] = $this->group_model->get_role()->result_array();
        $page_data['page_title'] = get_phrase('add_manager');
    }

    if ($param1 == "edit_manager") {
            

        $page_data['page_name'] = 'group/manager_edit';
        $page_data['page_title'] = get_phrase('edit_manager');
        $page_data['manager'] = $this->group_model->get_manager()->result_array();
        $page_data['manager_id'] = $param2;
    }
   

    $this->load->view('backend/index', $page_data);
}


public function department($param1 = "", $param2 = "")
{
    if ($this->session->userdata('admin_login') != true) {
        redirect(site_url('login'), 'refresh');
    }

    check_permission('department');

    if ($param1 == 'add') {

        $response = $this->group_model->add_department();
        if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('department_already_exists'));
        }
        redirect(site_url('group/department/manage_department'), 'refresh');
    } 

    elseif ($param1 == "edit") {

        $response = $this->group_model->edit_department($param2);
        if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('department_already_exists'));
        }
        redirect(site_url('group/department/manage_department'), 'refresh');

        

    } elseif ($param1 == "delete") {

        $this->group_model->delete_department($param2);
        $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
        redirect(site_url('group/department/manage_department'), 'refresh');
    }

    $page_data['page_name'] = 'group/department';
    $page_data['page_title'] = get_phrase('manage_department');
   $page_data['department'] = $this->group_model->get_department($param2);
    $this->load->view('backend/index', $page_data);

}

public function department_form($param1 = "", $param2 = "")
{
    if ($this->session->userdata('admin_login') != true) {
        redirect(site_url('login'), 'refresh');
    }

    // CHECK ACCESS PERMISSION
    check_permission('department');

    if ($param1 == "add_department") {

        $page_data['page_name'] = 'group/department_add';
        $page_data['department'] = $this->group_model->get_department()->result_array();
        $page_data['page_title'] = get_phrase('add_department');
    }

   if ($param1 == "edit_department") {
            

        $page_data['page_name'] = 'group/department_edit';
        $page_data['page_title'] = get_phrase('edit_department');
        $page_data['department'] = $this->group_model->get_department()->result_array();
        $page_data['department_id'] = $param2;
    }
   

    $this->load->view('backend/index', $page_data);
}

public function team ($param1 ="", $param2 ="")
{
    if ($this->session->userdata('admin_login') != true) {
        redirect(site_url('login'), 'refresh');
    }

    check_permission('team');

    if ($param1 == 'add') {

        $response = $this->group_model->add_team();
        if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('team_member_already_exists'));
        }
        redirect(site_url('group/team/manage_team'), 'refresh');
    } 

    elseif ($param1 == "edit") {

        $response = $this->group_model->edit_team($param2);
        if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('team_member_already_exists'));
        }
        redirect(site_url('group/team/manage_team'), 'refresh');

        

    } elseif ($param1 == "delete") {

        $this->group_model->delete_team($param2);
        $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
        redirect(site_url('group/team/manage_team'), 'refresh');
    }




    $page_data['page_name'] = 'group/manage_team';
    $page_data['page_title'] = get_phrase('manage_team');
   $page_data['team'] = $this->group_model->get_team($param2);
    $this->load->view('backend/index', $page_data);
}

public function team_form($param1 = "", $param2 = "")
{
    if ($this->session->userdata('admin_login') != true) {
        redirect(site_url('login'), 'refresh');
    }

    // CHECK ACCESS PERMISSION
    check_permission('team');

    if ($param1 == "add_team") {

        $page_data['page_name'] = 'group/team_add';
        $page_data['team'] = $this->group_model->get_team()->result_array();
        $page_data['page_title'] = get_phrase('add_team');
    }

    if ($param1 == "edit_team") {
            

        $page_data['page_name'] = 'group/team_edit';
        $page_data['page_title'] = get_phrase('edit_team');
        $page_data['team'] = $this->group_model->get_team()->result_array();
        $page_data['team_id'] = $param2;
    }

  
   

    $this->load->view('backend/index', $page_data);
}


public function mail($param1 ="", $param2 =""){

    if($this->session->userdata('admin_login') != true){
        redirect(site_url('login'), 'refresh');
    }

    check_permission('mailbox');

    if ($param1 == 'add') {

        $response = $this->group_model->add_mail();
        if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('mail_sent_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('mail_not_sent'));
        }
        redirect(site_url('group/mail/manage_mail'), 'refresh');
    } 

    
    $page_data['page_name'] = 'mail/manage_mail';
    $page_data['page_title'] = get_phrase('manage_mail');
    $this->load->view('backend/index', $page_data);
}

public function mail_form($param1 = "", $param2 = "")
{
    if ($this->session->userdata('admin_login') != true) {
        redirect(site_url('login'), 'refresh');
    }

    // CHECK ACCESS PERMISSION
    check_permission('mailbox');

    if ($param1 == "add_mail") {

        $page_data['page_name'] = 'mail/compose_mail';
        $page_data['page_title'] = get_phrase('add_mail');
    }


    $this->load->view('backend/index', $page_data);
}

}


