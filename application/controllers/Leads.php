<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leads extends CI_Controller
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

public function leads_data()
 {
  $data['leads_data'] = $this->leads_model->export_data();
  //$this->load->view('backend/admin/lead/lead_view', $data);
 }

 function export()
 {
    if ($this->session->userdata('is_sales_manager') == true || $this->session->userdata('is_sales_team') == true || $this->session->userdata('is_campaign_team') == true ) {

        $this->session->set_flashdata('error_message', get_phrase('restricted'));
        redirect(site_url('leads/leads/leads_view'), 'refresh');
    }
    $file_name = 'leads_details_on_'.date('Ymd').'.csv'; 
     header("Content-Description: File Transfer"); 
     header("Content-Disposition: attachment; filename=$file_name"); 
     header("Content-Type: application/csv;");
   
     // get data 
     $leads_data = $this->leads_model->export_data();

     // file creation 
     $file = fopen('php://output', 'w');
     $header = array("name, email, website, phonenumber, designation, company, country_id, city_id, category_id, course_id"); 
     fputcsv($file, $header);
     foreach ($leads_data->result_array() as $key => $value)
     { 
       fputcsv($file, $value); 
     }
     fclose($file); 
     exit; 
 }

    public function leadssource($param1 = "", $param2 = "")
    {
      
        
        // CHECK ACCESS PERMISSION
        check_permission('leads');

        if ($param1 == 'add') {

            $response = $this->leads_model->add_leads_source();
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('Source_name_already_exists'));
            }
            redirect(site_url('leads/leadssource/leadssource'), 'refresh');
        } 


        elseif ($param1 == "edit") {

            $response = $this->leads_model->edit_leads_source($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('city_name_already_exists'));
            }
            redirect(site_url('leads/leadssource/leadssource'), 'refresh');

            

        } elseif ($param1 == "delete") {

            if ($this->session->userdata('admin_login') == true) {

                $this->leads_model->delete_leads_source($param2);
                $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
                redirect(site_url('leads/leadssource/leadssource'), 'refresh');
            }
            $this->session->set_flashdata('error_message', get_phrase('restricted'));
            redirect(site_url('leads/leadssource/leadssource'), 'refresh');
           
        }

        
        $page_data['page_name'] = 'lead/leadssource';
        $page_data['page_title'] = get_phrase('leadssource');
       $page_data['leads_source'] = $this->leads_model->get_leads_source($param2);
        $this->load->view('backend/index', $page_data);
    }



    public function leadssource_form($param1 = "", $param2 = "")
    {
      

        // CHECK ACCESS PERMISSION
        check_permission('leads');

        if ($param1 == "add_leads_source") {

            $page_data['page_name'] = 'lead/leadssource_add';
            $page_data['leadssource'] = $this->leads_model->get_leads_source()->result_array();
            $page_data['page_title'] = get_phrase('add_leads_source');
        }


        if ($param1 == "edit_leads_source") {
            

            $page_data['page_name'] = 'lead/leadssource_edit';
            $page_data['page_title'] = get_phrase('edit_leadssource');
            $page_data['leadssource'] = $this->leads_model->get_leads_source()->result_array();
            $page_data['leadssource_id'] = $param2;
        }
      
        

        $this->load->view('backend/index', $page_data);
    }


    //leadsstatuses


    public function leadsstatus($param1 = "", $param2 = "")    {

    


         // CHECK ACCESS PERMISSION
         check_permission('leads');


         if ($param1 == 'add') {

            $response = $this->leads_model->add_leads_status();
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('Source_status_already_exists'));
            }
            redirect(site_url('leads/leadsstatus/leadsstatus'), 'refresh');
        } 

        elseif ($param1 == "edit") {

            $response = $this->leads_model->edit_leads_status($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('Source_status_already_exists'));
            }
            redirect(site_url('leads/leadsstatus/leadsstatus'), 'refresh');

            

        }


        elseif ($param1 == "delete") {

            $this->leads_model->delete_leads_status($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('leads/leadsstatus/leadsstatus'), 'refresh');
        }


        $page_data['page_name'] = 'lead/leadsstatus';
        $page_data['page_title'] = get_phrase('leadsstatus');
       $page_data['leads_status'] = $this->leads_model->get_leads_status($param2);
        $this->load->view('backend/index', $page_data);
    }




    public function leadsstatus_form($param1 = "", $param2 = "")
    {

        // CHECK ACCESS PERMISSION
        check_permission('leads');

        if ($param1 == "add_leads_status") {

            $page_data['page_name'] = 'lead/leadsstatus_add';
            $page_data['leadsstatus'] = $this->leads_model->get_leads_status()->result_array();
            $page_data['page_title'] = get_phrase('add_leads_status');
        }

        if ($param1 == "edit_leads_status") {
            

            $page_data['page_name'] = 'lead/leadsstatus_edit';
            $page_data['page_title'] = get_phrase('edit_leadsstatus');
            $page_data['leadsstatus'] = $this->leads_model->get_leads_status()->result_array();
            $page_data['leadsstatus_id'] = $param2;
        }

        
        $this->load->view('backend/index', $page_data);
    }


    //leads

    public function leads($param1 = "", $param2 = "")    {

       

  // CHECK ACCESS PERMISSION
  check_permission('leads');



  if ($param1 == 'add') {


    $response = $this->leads_model->addleads();

    
    if ($response) {
        
        $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
    } else {
        $this->session->set_flashdata('error_message', get_phrase('leads_status_already_exists'));
    }
    redirect(site_url('leads/leads/leads_view'), 'refresh');
} 
elseif ($param1 == "edit") {

    $response = $this->leads_model->edit_leads($param2);
    if ($response) {
        $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
    } else {
        $this->session->set_flashdata('error_message', get_phrase('leads_name_already_exists'));
    }
    redirect(site_url('leads/leads/leads_view'), 'refresh');
}
 elseif ($param1 == "delete") {

    if ($this->session->userdata('admin_login') == true) {

    $this->leads_model->delete_leads($param2);
    $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
    redirect(site_url('leads/leads/leads_view'), 'refresh');

    
 }
 $this->session->set_flashdata('error_message', get_phrase('restricted'));
 redirect(site_url('leads/leads/leads_view'), 'refresh');
}

  

  $page_data['page_name'] = 'lead/leads_view';
  $page_data['page_title'] = get_phrase('leads_view');
 $page_data['leads'] = $this->leads_model->get_leads($param2);
  $this->load->view('backend/index', $page_data);
}


public function leads_form($param1 = "", $param2 = "")
{
    

    // CHECK ACCESS PERMISSION
    check_permission('leads');

 

    if ($param1 == "addleads") {

        if ($this->session->userdata('is_sales_manager') == true || $this->session->userdata('is_sales_team') == true ) {

            $this->session->set_flashdata('error_message', get_phrase('restricted'));
            redirect(site_url('leads/leads/leads_view'), 'refresh');
        }

        $page_data['page_name'] = 'lead/leads';
        $page_data['leads'] = $this->leads_model->get_leads()->result_array();
        $page_data['page_title'] = get_phrase('leads');
      
       
    }

    if ($param1 == "edit_leads") {

        if ($this->session->userdata('is_campaign_team') == true || $this->session->userdata('is_sales_team') == true ) {

            $this->session->set_flashdata('error_message', get_phrase('restricted'));
            redirect(site_url('leads/leads/leads_view'), 'refresh');
        }

        $page_data['page_name'] = 'lead/leads_edit';
        $page_data['page_title'] = get_phrase('edit_leads');
        $page_data['leads'] = $this->leads_model->get_leads()->result_array();
        $page_data['leads_id'] = $param2;
    }

    
    $this->load->view('backend/index', $page_data);
}



public function getcities(){

  

$cc_countryid = $this->input->get("cc_countryid");
$city = $this->leads_model->getcityofcountry($cc_countryid);

$html = '<option value="">Select City</option>';

foreach ($city as $cities){

    $html  .= '<option value="'.$cities->cc_id.'">'.$cities->cc_name.'</option>';
}

echo $html;
}


public function getcourse()
{
    $parent = $this->input->get("parent");
    $course = $this->leads_model->getcategory($parent);

    $html = '<option value="">Select Course</option>';

    foreach( $course as $courses )
    {
        $html  .= '<option value="'.$courses->id.'">'.$courses->name.'</option>';
    }
    echo $html;
}




}