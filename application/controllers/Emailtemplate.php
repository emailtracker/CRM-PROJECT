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
        $this->load->library('email');
        
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
        redirect(site_url('emailtemplate/mailtemplate/add_template'), 'refresh');
    } 

     elseif ($param1 == "edit") {

        $response = $this->email_model->edit_mailtemplate($param2);
        if ($response) {
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
        } else {
            $this->session->set_flashdata('error_message', get_phrase('template_name_already_exists'));
        }
        redirect(site_url('emailtemplate/mailtemplate/edit_template'), 'refresh');
   }

    elseif ($param1 == "delete") {

    	$this->email_model->delete_mailtemplate($param2);
    	$this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
        redirect(site_url('emailtemplate/view_template/view_template'), 'refresh');
    
    }
    
   
        $page_data['page_name'] = 'email/manage_template';
	 	$page_data['page_title'] = get_phrase('manage_template');
	 	$page_data['mailtemplate'] = $this->email_model->get_mailtemplate($param2);	
	 	$this->load->view('backend/index.php', $page_data);
       
	}

	public function email_form($param1 = "",$param2 = "")
	{

	 
        
        // CHECK PERMISSION
        check_permission('mailtemplate');
        if($param1 == 'add_template'){
		

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

	
///


public function view_template($param1 = "",$param2 = "")
{

 
//  CHECK ACCESS PERMISSION
check_permission('view_template');


if ($param1 == 'add') {

    $response = $this->email_model->add_template();
    if ($response) {
        $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
    } else {
        $this->session->set_flashdata('error_message', get_phrase('template_name_already_exists'));
    }
    redirect(site_url('emailtemplate/view_template/view_template'), 'refresh');
} 

elseif ($param1 == "edit") {

    $response = $this->email_model->edit_mailtemplate($param2);
    if ($response) {
        $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
    } else {
        $this->session->set_flashdata('error_message', get_phrase('template_name_already_exists'));
    }
    redirect(site_url('emailtemplate/view_template/view_template'), 'refresh');
}

elseif ($param1 == "delete") {

    $this->email_model->delete_mailtemplate($param2);
    $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
    redirect(site_url('emailtemplate/view_template/view_template'), 'refresh');

}







    $page_data['page_name'] = 'email/view_template';
     $page_data['page_title'] = get_phrase('view_template');
     $page_data['mailtemplate'] = $this->email_model->get_mailtemplate($param2);	
     $this->load->view('backend/index.php', $page_data);
   
}


///

public function email_form1($param1 = "",$param2 = "")
	{
           
	 
        
        // CHECK PERMISSION
        check_permission('viewtemplate');
        if($param1 == 'add_template'){
		

		$page_data['page_name'] = 'email/add_templates';
		$page_data['mailtemplate'] = $this->email_model->get_mailtemplate()->result_array();
		$page_data['page_title'] = get_phrase('add_templates');
      }

      if($param1 == "edit_template"){
      	$page_data['page_name'] = 'email/edit_template';
        $page_data['page_title'] = get_phrase('edit_template');

        $page_data['mailtemplate'] = $this->email_model->get_mailtemplate()->result_array();
        $page_data['mailtemplate_id'] = $param2;
    }




		$this->load->view('backend/index.php',$page_data);
      

	}



//
	


//automail template start

public function automail_template($param1 = "",$param2 = "")
{

// print_r(site_url());exit();
  
//  CHECK ACCESS PERMISSION
check_permission('automail_template');

   if ($param1 == 'add') {

    $response = $this->email_model->add_mail();
    if ($response) {
        $this->session->set_flashdata('flash_message', get_phrase('mail_sent_successfully'));
    } else {
        $this->session->set_flashdata('error_message', get_phrase('mail_not_sent'));
    }
    redirect(site_url('emailtemplate/automail_template/automail_template'), 'refresh');
} 
 
    

     $page_data['page_name'] = 'email/automail_template';
     $page_data['page_title'] = get_phrase('automail_template');
     // $page_data['automail_template'] = $this->email_model->add_mail($param2);	
     $this->load->view('backend/index.php', $page_data);
   
}


//automail template end


      public function new(){
       $postss = $this->input->post();
        unset($postss['files']);
        $this->load->library('upload');

        $image = array();

        $ImageCount = count($_FILES['image_name']['name']);
         for($i=0; $i <  $ImageCount; $i++){
            
            $_FILES['file']['name'] = $_FILES['image_name']['name'][$i];
            // print_r($_FILES['file']['name']);exit();
            $_FILES['file']['type'] = $_FILES['image_name']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['image_name']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['image_name']['error'][$i];
            $_FILES['file']['size'] = $_FILES['image_name']['size'][$i];


            // file upload configuration

            $uploadPath = './uploads/';
            $config['upload_path']   =   $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            // load and intilize upload library
            $this->load->library('upload',$config);
            $this->upload->initialize($config);


            // upload file to server
            if($this->upload->do_upload('file')){

                

                

                // uploaded file data
                $imageData = $this->upload->data();
                $uploadImgdata[$i]['img_path'] = $imageData['file_name'];

                $postss['img_path'] = $uploadImgdata[$i]['img_path'];
                //print_r($postss['img_path']);exit();
                //$posts['img_path'] = $postss['img_path'];
                  // echo '<pre>';print_r($postss);exit();
                  $this->db->insert('mail_box',$postss);
            }
         }

         // if(!empty($uploadImgdata)){

         //    // Insert file data into database
             // $this->email_model->add_mail($postss);
         //    $this->email_model->mutiple( $uploadImgdata);
         //    $this->session->set_flashdata('danger','form submitted successfully');
            redirect('emailtemplate/automail_template/automail_template');
         // }
 

         //   $page_data['page_name'] = 'email/automail_template';
         //  $page_data['page_title'] = get_phrase('automail_template');
         // $page_data['automail_template'] = $this->email_model->add_mail($param2);   
         //  $this->load->view('backend/index.php', $page_data);

     }



//auto mail form start

     public function automail_form($param1 = "",$param2 = "")
	{

         // print_r(site_url('uploads/IMG_20210927_19255452.jpg'));exit();
         // CHECK PERMISSION
        check_permission('viewtemplate');
        if($param1 == 'add'){
		

		$page_data['page_name'] = 'email/add_templates';
		$page_data['mailtemplate'] = $this->email_model->get_mailtemplate()->result_array();
		$page_data['page_title'] = get_phrase('add_templates');
      }

      if($param1 == "edit_template"){
      	$page_data['page_name'] = 'email/edit_template';
        $page_data['page_title'] = get_phrase('edit_template');

        $page_data['mailtemplate'] = $this->email_model->get_mailtemplate()->result_array();
        $page_data['mailtemplate_id'] = $param2;
    }

     $postss = $this->input->post();
        unset($postss['files']);
        // $this->load->library('upload');
         
         $image = array();
    
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
            $config['upload_path']   =   './uploads/';
            $config['allowed_types'] = '*';

         //    // load and intilize upload library
             $this->load->library('upload',$config);
             $this->upload->initialize($config);

         //    // upload file to server
             if($this->upload->do_upload('file')){

         //        // uploaded file data
                 $imageData = $this->upload->data();
                 $uploadImgdata[$i]['img_path'] = 'uploads/'.$imageData['file_name'];

                 $postss['img_path'] = $uploadImgdata[$i]['img_path'];
         //        // print_r($postss['img_path']);exit();
         //        //$posts['img_path'] = $postss['img_path'];
         // //          // echo '<pre>';print_r($postss);exit();
                   $this->db->insert('mail_box',$postss);
 }


          }

                   $to = $this->input->post();
             $cc = $this->input->post();
            $subject = $this->input->post();
     // print_r( $to );exit();

     $this->load->library('email');
    // $this->load->library('imap');
    $this->email->attach(site_url().$postss['img_path']);
    $this->email->set_newline("\r\n");
    $this->email->set_crlf("\r\n");    
    $this->email->from('ck2867485@gmail.com', 'Sprintzeal');
    $this->email->to('abhi99326@gmail.com');
     $this->email->Cc('sraaz271@gmail.com');

    $this->email->subject($subject['subject']);
    // $this->email->message('Welcome Sprintzeal Private Limited');
    //  $this->email->attache('');
    // File upload settings 
   
    $this->email->message('<html>
    <head>
    <title>Email signature

    </title>

    </head>
    <body uploads/IMG_20210927_19255452.jpg>
    <table cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse;table-layout: fixed;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;" emb-background-style="" width="100%" direction="ltr">
<tbody>
<tr>
<td>
<table cellspacing="0" cellpadding="0" border="0" style=" border-collapse: collapse;table-layout: fixed;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;direction: ltr" emb-background-style="">
<tbody>
<tr>
<td style="padding-right:15px;vertical-align:top;font-family:Arial, Helvetica, sans-serif;">
<table style="border-collapse: collapse;table-layout: fixed;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;direction: ltr" emb-background-style="">
<tbody>
<tr>

</tr>
</tbody>
</table>
</td>
<td style="vertical-align:top;font-family:Arial, Helvetica, sans-serif;border-left:0px solid #5137F1;padding-left:15px;">
<table cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse;table-layout: fixed;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;direction: ltr" width="100%" emb-background-style="">
<tbody>
<tr>

</tr>
<tr>
<td style="color:#5137F1;text-decoration:none;font-size:18.2px;font-family:Arial, Helvetica, sans-serif;font-weight:bold;line-height:18px;mso-line-height-rule:exactly;padding-bottom:5px;">
<span style="color:#5137F1;text-decoration:none;font-size:18.2px;font-family:Arial, Helvetica, sans-serif;font-weight:bold;line-height:18px;mso-line-height-rule:exactly;">Thanks & Regards </span>
</td>
</tr>
<tr>
<td style=""><img style="height:50px;width:100px;"src="https://media-exp1.licdn.com/dms/image/C4D0BAQHULNIi_PScTA/company-logo_200_200/0/1519864958638?e=2147483647&v=beta&t=eaumXX7RpKSw67g6T2p2SSWoryb4j-2ANauOTmQp3Iw" height="50" alt="profile image" style="border-radius: 5px"></td>

</tr>
<tr>
<td style="color:#000000;text-decoration:none;font-size:13px;font-family:Arial, Helvetica, sans-serif;font-weight:normal;line-height:18px;mso-line-height-rule:exactly;padding-bottom:5px;">sprintzeal pvt ltd <a href="" style="color:#000000;text-decoration:none;font-size:13px;font-family:Arial, Helvetica, sans-serif;font-weight:normal;line-height:18px;mso-line-height-rule:exactly;"></a>
</td>
</tr>
<tr>
<td style="color:#000000;text-decoration:none;font-size:13px;font-family:Arial, Helvetica, sans-serif;font-weight:normal;line-height:18px;mso-line-height-rule:exactly;padding-bottom:5px;">Senior Developer</td>
</tr>
<tr>
<td style="color:#000000;text-decoration:none;font-size:13px;font-family:Arial, Helvetica, sans-serif;font-weight:normal;line-height:18px;mso-line-height-rule:exactly;padding-bottom:5px;"> <a href="" style="color:#000000;text-decoration:none;font-size:13px;font-family:Arial, Helvetica, sans-serif;font-weight:normal;line-height:18px;mso-line-height-rule:exactly;"></a>
</td>
</tr>
<tr>
<td style="color:#000000;text-decoration:none;font-size:13px;font-family:Arial, Helvetica, sans-serif;font-weight:normal;line-height:18px;mso-line-height-rule:exactly;padding-bottom:5px;">K.Murugan sir <a href="" style="color:#000000;text-decoration:none;font-size:13px;font-family:Arial, Helvetica, sans-serif;font-weight:normal;line-height:18px;mso-line-height-rule:exactly;"></a>
</td>
</tr>
<tr>
<td style="color:#000000;text-decoration:none;font-size:13px;font-family:Arial, Helvetica, sans-serif;font-weight:normal;line-height:18px;mso-line-height-rule:exactly;padding-bottom:5px;">
<a href="http://youremailsignature.com" target="_blank" style="color:#000000;text-decoration:underline;font-size:13px;font-family:Arial, Helvetica, sans-serif;font-weight:normal;line-height:18px;mso-line-height-rule:exactly;"></a>
</td>
</tr>
<tr>


</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
    </body>
</html>');
    
 
// $this->email->attach(site_url('/uploads/',$postss['img_path']));
  // http://localhost/pro/sprintzeal_crm_v5/$postss['img_path'];
    // print_r(site_url().$postss['img_path']);exit();
     // $this->email->attach(site_url().$postss['img_path']);
      // $this->email->attach('pictures/shadiphoto/camera');
 //Check if there is an attachment
// if ( $_FILES['image_name']['name']!='' && $_FILES['image_name']['size'] > 0 )
// {

//     $attach_path = $_FILES['image_name']['tmp_name'];
//     // print_r($attach_path);exit();
//     $attach_name = $_FILES['image_name']['name'];
//     $this->email->attach($attach_path,'attachment',$attach_name);
// }


       // $this->email->send();
     if($this->email->send()) {
         
            echo json_encode("Email Send Successfully");
        } else {
            $error = $this->email->print_debugger(array('headers'));
            echo json_encode($error);
        }
           
    
     

        

         // if(!empty($uploadImgdata)){

         //    // Insert file data into database
             // $this->email_model->add_mail($postss);
         //    $this->email_model->mutiple( $uploadImgdata);
         //    $this->session->set_flashdata('danger','form submitted successfully');
            redirect('emailtemplate/automail_template/automail_template');
         // }  




		$this->load->view('backend/index.php',$page_data);
      

	}




//automail form end


//view automail start

public function view_automail($param1 = "",$param2 = "")
{


  
//  CHECK ACCESS PERMISSION
check_permission('view_automail');


if ($param1 == 'add') {

    $response = $this->email_model->add_template();
    if ($response) {
        $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
    } else {
        $this->session->set_flashdata('error_message', get_phrase('template_name_already_exists'));
    }
    redirect(site_url('emailtemplate/view_automail/view_automail'), 'refresh');
 } 

     $page_data['page_name'] = 'email/view_automail';
     $page_data['page_title'] = get_phrase('view_automail');
     $page_data['mailtemplate'] = $this->email_model->get_mailtemplate($param2);	
     $this->load->view('backend/index.php', $page_data);
   
}



//view automail end


//view automail form start

  public function viewautomail_form($param1 = "",$param2 = "")
	{
           
       // $hostname = '{smtp.gmail.com:993/imap/ssl/novalidate-cert}'; 
        //$username = 'ck2867485@gmail.com'; $password = 'gimrfjmevhwzwjnf'; 
        //$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

        ///print_r($inbox);exit;
        // CHECK PERMISSION
        check_permission('viewtemplate');
        if($param1 == 'add'){
		

		$page_data['page_name'] = 'email/automail_template';
		$page_data['mailtemplate'] = $this->email_model->get_automailtemplate()->result_array();
		$page_data['page_title'] = get_phrase('templates');

      }

      if($param1 == "edit_template"){
      	$page_data['page_name'] = 'email/edit_template';
        $page_data['page_title'] = get_phrase('edit_template');

        $page_data['mailtemplate'] = $this->email_model->get_automailtemplate()->result_array();
        $page_data['mailtemplate_id'] = $param2;
    }

 

		$this->load->view('backend/index.php',$page_data);
      

	}

    public function mail_list()
    {
        $page_data['page_name'] = 'email/mail_list';
        $page_data['page_title'] = get_phrase('mail_list');
        $page_data['add_template'] = $this->db->get('email_template')->result_array();
        $page_data['template_name'] = $this->db->get('export')->result_array();
        $this->load->view('backend/index.php',$page_data);

    }

    public function mail_list_form()
    {
        
     $page_data['page_name'] = 'email/mail_list';
     
     $page_data['page_title'] = get_phrase('mail_list');
     $page_data['mail_list'] = $this->email_model->sendMail();    
     $this->load->view('backend/index.php', $page_data);
        
    }

    public function contact_list()
    {
       $page_data['page_name'] = 'email/email_campaign';
       $page_data['page_title'] = get_phrase('email_campaign');
      $page_data['abc'] = $this->db->get('mail_lists')->result_array();
      $this->load->view('backend/index.php',$page_data); 
    }


//view automail form end


    public function settings(){
    if($this->input->is_ajax_request()){
        $data = $this->load->view('settings',null,true);
        echo $data;
    }else{
        echo 'You cannot access this page directly';
    }
    
   }

   public function import()
   {
    $page_data['page_name'] = 'email/import_file';
    $page_data['page_title'] = get_phrase('import_file');
    $page_data['abc'] = $this->db->get('export')->result_array();
    $this->load->view('backend/index.php',$page_data); 
   }


//    public function import_data()
   
//         {
                  
//             $target_dir = "./uploads/city_excel/";
//             if (!is_dir($target_dir))
//             {
//                 mkdir($target_dir);
//             }
//             $expl       = explode('.', $_FILES['file']['name']);
            
//             $file_ext   = strtolower(end($expl));
//             $expensions = array("xls", "xlsx", "csv");
//             if (!empty($_FILES['file']['name']))
//             {
//                 if (in_array($file_ext, $expensions) === true)
//                 {
// //                    move_uploaded_file($file_tmp, $target_dir . '/' . $file_name . '.' . $file_ext);
//                     $datas = import_xl($_FILES['file']['tmp_name']);
//                     if (!empty($datas))
//                     {
//                         $ar   = 0;
//                         $save = [];
//                         foreach ($datas as $ins_data)
//                         {   
//                                     $save[$ar]['name']         = $ins_data['A'];
//                                     $save[$ar]['email_id']        = $ins_data['B'];
                            
//                             $ar++;
//                         }
//                         // echo '<pre>';print_r($save);exit;
//                         $this->db->insert_batch('export', $save);
//                         return true;
//                     }
//                 }
//             }
//         return false;
//     }


   public function import_data()
   {
    // print_r('expression');exit;
     
     $data['select_name'] = html_escape($this->input->post('select_name'));
        
        
         
         $image = array();
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
            $config['upload_path']   =   './uploads/';
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
                 // print_r($excel);exit;
        
        }


          }
        $data['upload'] = $excel;
        

        
        // echo '<b>'; print_r($query);exit();

         $previous_data = $this->db->insert('export',$data);

          
           // redirect('emailtemplate/import_file/');
           $this->import();

   } 
    
    
    public function download($id){
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
            $fileInfo = $this->file->getRows(array('id' => $id));
            
            //file path
            $file = 'uploads/files/'.$fileInfo['file_name'];
            
            //download file from directory
            force_download($file, NULL);
        }
    }


    public function email_template()
   {
    $page_data['page_name'] = 'email/email_template';
    $page_data['page_title'] = get_phrase('email_template');
    
    $this->load->view('backend/index.php',$page_data); 
   }


   public function sub(){
    $page_data['page_name'] = 'email/subscribe';
    $page_data['page_title'] = get_phrase('subscribe');
    
    $this->load->view('backend/index.php',$page_data); 
   }

   public function subscribe_data()
     { 
          $data['email']=$this->input->post('email');

       //    $present_data = $this->db->where(array('email'=>$data['email']))->get('registration')->row_array();
       // if(empty($present_data)){
          if ($data) {
            echo "You have successfully unsubscribed!";
        } else {
          echo "Sorry, there was an error unsubscribing you. Please try again later.";
        }

         $this->db->insert('unsubsrcibe',$data);
         // echo '<pre>';print_r($this->db->last_query());exit;
         // print_r($data);exit;
       //    redirect(base_url().'');
       // }else{
        
       //  print_r('Email Already Exists, Kindly Register with new email');
       //  }

        $page_data['page_name'] = 'email/subscribe';
        $page_data['page_title'] = get_phrase('subscribe');
        $this->load->view('backend/index.php',$page_data);
    }

    public function abc(){
         $page_data['page_name'] = 'email/unsubscribe';

        $page_data['page_title'] = get_phrase('unsubscribe');
        $this->db->update('unsubscribe',array('subscribe'=>1));
        $this->load->view('backend/index.php',$page_data);
    }

    


	
}