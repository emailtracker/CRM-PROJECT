
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
    $data['first_name']   = html_escape($this->input->post('first_name'));
    $data['email']   = html_escape($this->input->post('email'));
    $data['phone']   = html_escape($this->input->post('phone'));
    $data['department_id']   = html_escape($this->input->post('department_id'));
    $data['role_id']   = html_escape($this->input->post('role_id'));
    $data['designation']   = html_escape($this->input->post('designation'));
    $data['password']   = sha1(html_escape($this->input->post('password')));
 
    
  

    // CHECK IF THE MANAGER ALREADY EXISTS
    $this->db->where('email', $data['email']);
    $previous_data = $this->db->get('users')->num_rows();

    if ($previous_data == 0) {

        $this->db->insert('users', $data);
        return true;
    }
       return false;
} 
        

public function get_manager($id = 0)
{
    if ($id > 0) {
        return $this->db->get_where('users', array('id' => $id, 'role_id' => 3));
    } else {
        return $this->db->get_where('users', array('role_id' => 3));
    }
 }

 public function get_manager_details_by_id($id)
 {
    
     return $this->db->get_where('users', array('id' => $id));
 }

 public function edit_manager($param1)
 {
    $data['first_name']   = html_escape($this->input->post('first_name'));
    $data['email']   = html_escape($this->input->post('email'));
    $data['phone']   = html_escape($this->input->post('phone'));
    $data['department_id']   = html_escape($this->input->post('department_id'));
    $data['role_id']   = html_escape($this->input->post('role_id'));
    $data['designation']   = html_escape($this->input->post('designation'));
    $data['password']   = sha1(html_escape($this->input->post('password')));
   

     // CHECK IF THE SOURCE NAME ALREADY EXISTS
      $this->db->where('email', $data['email']);
     $previous_data = $this->db->get('users')->result_array();
     $checker = true;
     foreach ($previous_data as $row) {
         if ($row['id'] != $param1) {
             $checker = false;
             break;
         }
     }

     if ($checker) {
         
         $this->db->where('id', $param1);
         $this->db->update('users', $data);

         return true;
     }
     return false;
 }

 public function delete_manager($id)
 {
             $this->db->where('id', $id);
             $this->db->delete('users');
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


 public function add_team()
{
    $data['first_name']   = html_escape($this->input->post('first_name'));
    $data['email']   = html_escape($this->input->post('email'));
    $data['phone']   = html_escape($this->input->post('phone'));
    $data['department_id']   = html_escape($this->input->post('department_id'));
    $data['role_id']   = html_escape($this->input->post('role_id'));
    $data['manager_id']   = html_escape($this->input->post('manager_id'));
    $data['designation']   = html_escape($this->input->post('designation'));
    $data['password']   = sha1(html_escape($this->input->post('password')));
    
  

    // CHECK IF THE Team Member EMAIL ALREADY EXISTS
    $this->db->where('email', $data['email']);
    $previous_data = $this->db->get('users')->num_rows();

    if ($previous_data == 0) {

        $this->db->insert('users', $data);
        return true;
    }
       return false;
} 

public function get_team($id = 0)
 {
    if ($id > 0) {
        return $this->db->get_where('users', array('id' => $id, 'role_id' => 4));
    } else {
        return $this->db->get_where('users', array('role_id' => 4));
    }
  }

  
 public function edit_team($param1)
 {
    $data['first_name']   = html_escape($this->input->post('first_name'));
    $data['email']   = html_escape($this->input->post('email'));
    $data['phone']   = html_escape($this->input->post('phone'));
    $data['department_id']   = html_escape($this->input->post('department_id'));
    $data['role_id']   = html_escape($this->input->post('role_id'));
    $data['manager_id']   = html_escape($this->input->post('manager_id'));
    $data['designation']   = html_escape($this->input->post('designation'));
    $data['password']   = sha1(html_escape($this->input->post('password')));
   

     // CHECK IF THE EMAIL ALREADY EXISTS
      $this->db->where('email', $data['email']);
     $previous_data = $this->db->get('users')->result_array();
     $checker = true;
     foreach ($previous_data as $row) {
         if ($row['id'] != $param1) {
             $checker = false;
             break;
         }
     }

     if ($checker) {
         
         $this->db->where('id', $param1);
         $this->db->update('users', $data);

         return true;
     }
     return false;
 }

 public function delete_team($id)
 {
             $this->db->where('id', $id);
             $this->db->delete('users');
 }
 
 public function get_team_details_by_id($id)
 {
    
     return $this->db->get_where('users', array('id' => $id));
 }


 	
 public function add_mail()
 {
     $data['to_mail']   = html_escape($this->input->post('to_mail'));
     $data['cc_mail']   = html_escape($this->input->post('cc_mail'));
     $data['subject']   = html_escape($this->input->post('subject'));
   
     $previous_data = $this->db->insert('mail_information', $data);

     if ($previous_data == 1) {


        $config = Array(
            
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 587,
            'smtp_user' => 'aadhiya2610@gmail.com', // change it to yours
            'smtp_pass' => 'Anusriju@261011', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
            );
            $email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $message = "<html>
            <head>
                <title></title>
            </head>
            <body>
              
              
                <p>".$subject."</p>
              
            </body>
            </html>";
            
    
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('aadhiya2610@gmail.com'); // change it to yours
            $this->email->to($email);// change it to yours
            $this->email->subject($subject);
           
            if($this->email->send())
            {
                echo 'Email sent.';
            }
            else
            {
                show_error($this->email->print_debugger());
            }
         
   
 }


}


}




    




    


      
       
    

