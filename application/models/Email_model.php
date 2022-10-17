<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		 /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
	}
	
    public function add_template()
    {
        $data['template_name']   = html_escape($this->input->post('template_name'));
        $data['body']   = html_escape($this->input->post('body'));
        $data['remainder_interval_date']   = html_escape($this->input->post('remainder_interval_date'));

        // CHECK IF THE TEMPLATE NAME NAME ALREADY EXISTS
        $this->db->where('template_name', $data['template_name']);
        $previous_data = $this->db->get('email_template')->num_rows();

        if ($previous_data == 0) {

            $this->db->insert('email_template', $data);
            return true;
        }
           return false;
    } 


    public function get_mailtemplate($param1 = "")
    {
        if ($param1 != "") {
             $this->db->where('id', $param1);
         }
       
         return $this->db->get('email_template');
     }


     public function get_mailtemplate_details_by_id($id)
    {
       
        return $this->db->get_where('email_template', array('id' => $id));
    }
 

    public function edit_mailtemplate($param1)
    {

        $data['template_name']   = html_escape($this->input->post('template_name'));
        $data['body']   =   html_escape($this->input->post('body'));
        $data['remainder_interval_date']   = html_escape($this->input->post('remainder_interval_date'));


        // CHECK IF THE SOURCE NAME ALREADY EXISTS
         $this->db->where('template_name', $data['template_name']);
        $previous_data = $this->db->get('email_template')->result_array();
        $checker = true;
        foreach ($previous_data as $row) {
            if ($row['id'] != $param1) {
                $checker = false;
                break;
            }
        }

        if ($checker) {
        
            $this->db->where('id', $param1);
            $this->db->update('email_template', $data);

            return true;
        }
        return false;
    }
   



	 public function delete_mailtemplate($id)
    { 
                //$this->db->where('id', $id);
                // $this->db->delete('email_template',arr);
                $this->db -> where('id', $id);
                $this->db -> delete('email_template');
                redirect(site_url('emailtemplate/mailtemplate/manage_template'),'refresh');
    }
        
        


  

}
