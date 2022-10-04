<?php
defined('BASEPATH') or exit('No direct script access allowed');
//v5.7
class Group_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        
    }
	
	
    public function addrole()
    {
        $data['name']   = html_escape($this->input->post('name'));
      

        // CHECK IF THE SOURCE NAME ALREADY EXISTS
        $this->db->where('name', $data['name']);
        $previous_data = $this->db->get('role')->num_rows();

        if ($previous_data == 0) {

            $this->db->insert('role', $data);
            return true;
        }
           return false;
    } 


    public function get_role($param1 = "")
    {
        if ($param1 != "") {
             $this->db->where('id', $param1);
         }
       
         return $this->db->get('role');
     }


     public function get_role_details_by_id($id)
    {
       
        return $this->db->get_where('role', array('id' => $id));
    }
 

    public function edit_role($param1)
    {
        $data['name']   = html_escape($this->input->post('name'));
      

        // CHECK IF THE SOURCE NAME ALREADY EXISTS
         $this->db->where('name', $data['name']);
        $previous_data = $this->db->get('role')->result_array();
        $checker = true;
        foreach ($previous_data as $row) {
            if ($row['id'] != $param1) {
                $checker = false;
                break;
            }
        }

        if ($checker) {
            
            $this->db->where('id', $param1);
            $this->db->update('role', $data);

            return true;
        }
        return false;
    }


    public function delete_role($id)
    {
				$this->db->where('id', $id);
		        $this->db->delete('role');
    }

  
//Manager

	
public function addmanager()
{
    $data['name']   = html_escape($this->input->post('name'));
    $data['email']   = html_escape($this->input->post('email'));
    $data['phone']   = html_escape($this->input->post('phone'));
    $data['role_id']   = html_escape($this->input->post('role_id'));
    $data['designation']   = html_escape($this->input->post('designation'));
    $data['name']   = html_escape($this->input->post('name'));
    $data['password']   = html_escape($this->input->post('password'));
    
  

    // CHECK IF THE SOURCE NAME ALREADY EXISTS
    $this->db->where('name', $data['name']);
    $previous_data = $this->db->get('manager')->num_rows();

    if ($previous_data == 0) {

        $this->db->insert('manager', $data);
        return true;
    }
       return false;
} 
        

public function get_manager($param1 = "")
{
    if ($param1 != "") {
         $this->db->where('id', $param1);
     }
   
     return $this->db->get('manager');
 }

 public function get_manager_details_by_id($id)
 {
    
     return $this->db->get_where('manager', array('id' => $id));
 }

 public function edit_manager($param1)
 {
    $data['name']   = html_escape($this->input->post('name'));
    $data['email']   = html_escape($this->input->post('email'));
    $data['phone']   = html_escape($this->input->post('phone'));
    $data['role_id']   = html_escape($this->input->post('role_id'));
    $data['designation']   = html_escape($this->input->post('designation'));
    $data['name']   = html_escape($this->input->post('name'));
    $data['password']   = html_escape($this->input->post('password'));
   

     // CHECK IF THE SOURCE NAME ALREADY EXISTS
      $this->db->where('name', $data['name']);
     $previous_data = $this->db->get('manager')->result_array();
     $checker = true;
     foreach ($previous_data as $row) {
         if ($row['id'] != $param1) {
             $checker = false;
             break;
         }
     }

     if ($checker) {
         
         $this->db->where('id', $param1);
         $this->db->update('manager', $data);

         return true;
     }
     return false;
 }

 public function delete_manager($id)
 {
             $this->db->where('id', $id);
             $this->db->delete('manager');
 }

 public function add_department()
 {
     $data['department']   = html_escape($this->input->post('department'));
   

     // CHECK IF THE SOURCE NAME ALREADY EXISTS
     $this->db->where('department', $data['department']);
     $previous_data = $this->db->get('department')->num_rows();

     if ($previous_data == 0) {

         $this->db->insert('department', $data);
         return true;
     }
        return false;
 } 

 public function get_department($param1 = "")
 {
     if ($param1 != "") {
          $this->db->where('id', $param1);
      }
    
      return $this->db->get('department');
  }

  public function edit_department($param1)
    {
        $data['department']   = html_escape($this->input->post('department'));
      

        // CHECK IF THE SOURCE NAME ALREADY EXISTS
         $this->db->where('department', $data['department']);
        $previous_data = $this->db->get('department')->result_array();
        $checker = true;
        foreach ($previous_data as $row) {
            if ($row['id'] != $param1) {
                $checker = false;
                break;
            }
        }

        if ($checker) {
            
            $this->db->where('id', $param1);
            $this->db->update('department', $data);

            return true;
        }
        return false;
    }

    public function delete_department($id)
    {
                $this->db->where('id', $id);
                $this->db->delete('department');
    }

    public function get_department_details_by_id($id)
 {
    
     return $this->db->get_where('department', array('id' => $id));
 }

}





    




    


      
       
    

