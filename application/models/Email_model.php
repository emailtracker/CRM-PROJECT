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
        $data['reminder_interval']   = html_escape($this->input->post('remainder_interval_date'));

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
        $data['reminder_interval']   = html_escape($this->input->post('reminder_interval'));


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


    // public function get_template($param1 = "")
    // {
    //     if ($param1 != "") {
    //         $this->db->where('id', $param1);
    //     }
    //     $this->db->where('status  ', 0);
	// 	$this->db->or_where('status  ', 1);
    //     return $this->db->get('email_template');
    // }
        
        

    // public function get_mailtemplate($param1 = "")
    // {

    //      if ($param1 != "") {
    //         $this->db->where('id', $param1);
    //     }
    //     $this->db->where('status ', 0);
	// 	$this->db->or_where('status ', 1);
    //     return $this->db->get('email_template');
    // }


    public function get_automailtemplate($param1 = "")
    {
         
        if ($param1 != "") {
            $this->db->where('id', $param1);
        }
        // $this->db->where('status ', 0);
		// $this->db->or_where('status ', 1);
        return $this->db->get('mail_box');
        
         
        if(strlen(get_option('smtp_host')) > 0 && strlen(get_option('smtp_password')) > 0 && strlen(get_option('smtp_username')) > 0)
          {
            $ci = &get_instance();
            
            $ci->email->initialize();
            print_r($ci);exit;
            $ci->load->library('email');
            $ci->email->clear(true);
            $ci->email->from($inbox['from'], $inbox['to_mail']);
            $ci->email->to(str_replace(";", ",", $data['to']));
            if(isset($data['cc']) && strlen($data['cc']) > 0){
                $ci->email->cc($data['cc']);
            }
            $ci->email->subject($inbox['subject']);
            $ci->email->message($data['body']);
            foreach ($attachments as $attachment) {
                $attachment_url = module_dir_url(MAILBOX_MODULE_NAME) .'uploads/outbox/'. $outbox_id . '/'.$attachment['file_name'];
                $ci->email->attach($attachment_url);
            }
            $ci->email->send(true);
        }

                //inbox start code

                $array_inbox_id = array();
        foreach ($array_send_to as $value) {
            $to = get_staff_id_by_email(trim($value));
            if($to > 0){
                $d_inbox = $inbox;
                $d_inbox['to_sales_id'] = $to; 
                $this->db->insert(db_prefix() . 'mail_inbox', $d_inbox);
                $inbox_id = $this->db->insert_id();
                $array_inbox_id[] = $inbox_id;
            }
        }
 
                //inbox code end



                //array
                $array_send_to = array();
                 $array_to = explode(";", $data['to']);
                    if(isset($array_to) && count($array_to) > 0){
                        foreach ($array_to as $value) {
                            $array_send_to[$value] = $value;
                        }
        }
        $array_cc = explode(";", $data['cc']);
            if(isset($array_cc) && count($array_cc) > 0){
                foreach ($array_cc as $value) {
                    $array_send_to[$value] = $value;
                }
        }

                //end


                //inbox ----
                $inbox = array();
                        $inbox['from_sales_id'] = $sales_id;
                        $inbox['to'] = $data['to'];
                        $inbox['cc'] = $data['cc'];
                        $inbox['sender_name'] = get_staff_full_name($sales_id);
                        $inbox['subject'] = _strip_tags($data['subject']);
                        $inbox['body'] = _strip_tags($data['body']);
                        $inbox['body'] = nl2br_save_html($inbox['body']);
                        $inbox['date_received']      = date('Y-m-d H:i:s');
                        $inbox['folder'] = 'inbox';
                        $inbox['from_email'] = get_staff_email_by_id($sales_id);


                //inbox end-----


                //outbox---

                $outbox_id = '';
                    $outbox = array();
                    $outbox['sender_sales_id'] = $sales_id;
                    $outbox['to'] = $data['to'];
                    $outbox['cc'] = $data['cc'];
                    $outbox['sender_name'] = get_staff_full_name($sales_id);
                    $outbox['subject'] = _strip_tags($data['subject']);
                    $outbox['body'] = _strip_tags($data['body']);
                    $outbox['body'] = nl2br_save_html($outbox['body']);
                    $outbox['date_sent']      = date('Y-m-d H:i:s');
                            if(isset($data['reply_from_id'])){
                                $outbox['reply_from_id'] = $data['reply_from_id'];
                            }
                            if(isset($data['reply_type'])){
                                $outbox['reply_type'] = $data['reply_type'];
                            }
                            if(isset($data['sendmail']) && $data['sendmail']=='draft'){
                                $outbox['draft']      =  1;
                                $this->db->insert(db_prefix() . 'mail_outbox', $outbox);
                                return true;
                            }
                            if(isset($ob_id)){
                                $outbox['draft'] = 0;
                                $this->db->where('id', $ob_id);
                                $this->db->update(db_prefix() . 'mail_outbox', $outbox);
                                $outbox_id = $ob_id;
                            } else {
                                $this->db->insert(db_prefix() . 'mail_outbox', $outbox);
                                $outbox_id = $this->db->insert_id();
                            }


                //outbox end

    }



     public function add_mail()
     {
        $data['group_name'] = html_escape($this->input->post('group_name'));
        $data['select_name'] = html_escape($this->input->post('select_name'));

        $data['email_address'] = html_escape($this->input->post('email_address'));
        $data['template_name'] = html_escape($this->input->post('template_name'));
        
        $ImageCount = count($_FILES['image_name']['name']);
        for($i=0; $i <  $ImageCount; $i++){
            
            $_FILES['file']['name'] = $_FILES['image_name']['name'][$i];
            // print_r($_FILES['file']['name']);exit();
            $_FILES['file']['type'] = $_FILES['image_name']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['image_name']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['image_name']['error'][$i];
            $_FILES['file']['size'] = $_FILES['image_name']['size'][$i];


            // file upload configuration

            // $uploadPath = './uploads/';
            $config['upload_path']   =   './uploads/csv/';
            $config['allowed_types'] = '*';

         //    // load and intilize upload library
             $this->load->library('upload',$config);
             $this->upload->initialize($config);

         //    // upload file to server
             if($this->upload->do_upload('file')){

         //        // uploaded file data
                 $imageData = $this->upload->data();
                 
                 $uploadImgdata[$i]['img_path'] = 'uploads/'.$imageData['file_name'];
                 $excel = $uploadImgdata[$i]['img_path'];
        
        }


          }
        $data['upload'] = $excel;
        $data['date'] = html_escape($this->input->post('date'));

        
        // echo '<b>'; print_r($query);exit();

         $previous_data = $this->db->insert('mail_lists',$data);


         $to = $this->input->post();
          $email_address=$this->input->post();
          $template_name = $this->input->post();
         // $all_email = explode(',', $to['email_address']);
           // echo '<pre>';print_r($all_email);exit();

            // for($i = 0; $i < sizeof($all_email); $i++){}
              // echo '<pre>';print_r($all_email[$i]);
     
          $this->load->library('email');


         for($i=0; $i<count($_FILES['image_name']); $i++){
         $target_path = "uploads/".basename($_FILES['image_name']['name'][$i]);
         if(move_uploaded_file($_FILES['image_name']['tmp_name'][$i],$target_path) ){
            $this->email->attach($target_path);

            //if we don't want to keep the image
            unlink($target_path);
        }

      }

     // $this->email->attach(site_url().$excel);
    $this->email->set_newline("\r\n");
    $this->email->set_crlf("\r\n");    
    $this->email->from('ck2867485@gmail.com', 'Sprintzeal');
    // $this->email->to($all_email[$i]);
    $this->email->to($to['email_address']);
     // $this->email->Cc('sraaz271@gmail.com');

     $this->email->subject($template_name['template_name']);
    $this->email->message('hii');
    
    
 


       // $this->email->send();
       if($this->email->send()) {
         echo json_encode("Email Send Successfully");
        } else {
            $error = $this->email->print_debugger(array('headers'));
            echo json_encode($error);
        }
           
    
         redirect('emailtemplate/mail_list/mail_list',$data);
     } 



     function mutiple($uploadImgdata)
    {

     return $this->db->insert_batch('mail_box',$uploadImgdata);
    }
   



       public function select()
    {
        $this->db->order_by("name", "DESC");
        // $this->db->limit(10);
        $query = $this->db->get("import");
        return $query;

    }

    public function insert($data)
    {
        $this->db->insert_batch('import', $data);
    }

    

    public function get_automail($param1 = "")
    {
        if ($param1 != "") {
             $this->db->where('id', $param1);
         }
       
         return $this->db->get('mail_box');
     }

     public function xss_html_filter($input){
        return $this->security->xss_clean(html_escape($input));
     }

       function sendMail()
     {

  
         // $template = $this->input->post('template_name');
         $email_address = $this->input->post('email_address');
         $template = $this->input->post('template_name');
          // $time_interval = $this->input->post('time_interval');
         $select_name = $this->input->post('select_name');

            
         $template_file=  $this->db->where('template_name', $template)->get('email_template')->row_array();
         // print_r($template_file);exit();

         $email =  $this->db->where('select_name', $select_name)->get('export')->row_array();
         // echo  '<pre>';print_r($email);
        // $up = str_replace('uploads/','',$email['upload']);

          $file = fopen($email['upload'],"r");
          
          // echo '<pre>'; print_r("uploads/csv/".$email['id']);exit;
          
                // echo '<pre>';print_r($file);
                    $flag=true;
                    $this->db->trans_begin();
                    $i=1;
                        // print_r('fghjkl');exit();
                    while(($importdata = fgetcsv($file, NULL, ",")) !== FALSE)
                    {
                      
                       
                        
                        if($i++==1){ continue; }
                          // print_r($importdata); exit;
                        $importdata = $this->xss_html_filter($importdata);
                          // echo '<pre>';print_r($importdata);exit;
                        $bulk_title = $importdata;
                           // echo '<pre>';print_r($importdata);
                        $mail[] =$importdata;
                             // echo '<pre>';print_r($mail);exit;

                        foreach($mail as $key){
                        $row = array(
                            'from'         =>  $email_address, 
                            'mail'         =>  $key[1],//0
                            'bulk_desc'    =>  $template_file['template_name'],//1
                        
                        );
                        
                    // echo '<pre>';print_r($row['mail']);exit;
                     // $mesg =    $page_data['page_name'] = 'email/email_template';
                     //           $page_data['page_title'] = get_phrase('email_template');
    
                     //          $this->load->view('backend/index.php',$page_data); 
                     $this->load->library('email');

                      $this->email->from($row->from, 'Sprintzeal');
                      $this->email->to($row['mail']);
                      $this->email->subject('PMP Course');
                      // $this->email->message($row->bulk_desc);
                      $this->email->message('<!DOCTYPE html>
       <html>
        <head>
      <meta charset="utf-8">
      <title> Project Management Professional (PMP)</title>
    </head>
      <body>
     <img style="height:50px;width:100px;" src="https://media-exp1.licdn.com/dms/image/C4D0BAQHULNIi_PScTA/company-logo_200_200/0/1519864958638?e=2147483647&amp;v=beta&amp;t=eaumXX7RpKSw67g6T2p2SSWoryb4j-2ANauOTmQp3Iw" height="50" alt="profile image">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="600">
      <tr>
        <td>
          <h1 class="btn-group">Comptia security +</h1>
          <p class="btn-primary">Project Integration Management: This includes the processes and activities involved in coordinating all aspects of a project, including developing the project charter, project management plan, and project closure.</p>
          <p>The PMP course also covers the PMI Code of Ethics and Professional Conduct, as well as exam preparation and practice exams to help participants prepare for the PMP certification exam.</p>

          <p class=" btn-success" >
            Project Quality Management: This includes the processes involved in ensuring that the project meets the quality standards and requirements.

           Project Resource Management: This includes the processes involved in identifying, acquiring, and managing project resources, including personnel, equipment, and materials.
           <a href="https://www.sprintzeal.com">subscribe</a>
          </p>
        </td>
      </tr>
    </table>
  </body>
</html>');
                      $this->email->send();
                      // $this->db->where('email',$row['mail'])->update('unsubscribe',array('subscribe'=>1));


                      $flag=true;  

                      sleep($time_interval);
                      set_time_limit(300);
                        
                    }

                } 
                     // echo '<pre>';print_r($mail); exit;

 
                   if((fgetcsv($file, NULL, ",")) == FALSE){
                          $flag=false;   
                        }


                      if($flag=="false"){
                        // print_r('ghjkl');exit;
                        $this->db->trans_rollback();
                         echo 'failed';
                         show_error($this->email->print_debugger());
                    }else{
                        echo "Email sent Successfully";exit;
                        $this->session->set_flashdata('success', 'Success!! Data sent Successfully!');
                        // redirect('upload/emaillistview');
                    }
                    fclose($file);

                   // redirect('emailtemplate/mail_list/mail_list');

     }
  
  

}
