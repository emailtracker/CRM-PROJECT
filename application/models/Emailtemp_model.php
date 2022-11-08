<?php
defined('BASEPATH') or exit('No direct script access allowed');
//v5.7
class Emailtemp_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
	public function get_email_template($param1 = "")
    {
        if ($param1 != "") {
            $this->db->where('id', $param1);
        }
        return $this->db->get('email_template');
    }
	public function get_email_template_by_id($id)
    {
        return $this->db->get_where('email_template', array('id' => $id));
    }
	public function delete_email_template($id)
    {
    	$this->db->where('id', $id);      
				$this->db->where('id', $id);
		        $this->db->delete('email_template');
    }
	public function add_email_template()
    {
        $data['first_name']   = html_escape($this->input->post('first_name'));
        $data['last_name']   = html_escape($this->input->post('last_name'));
        $data['biography'] = html_escape($this->input->post('biography'));
		$data['sub_category_id']   = $this->input->post('sub_category_id');
		$data['category_id']   = $this->input->post('category_id');
		$data['country_id']   = $this->input->post('country_id');
		$data['city_id']   = $this->input->post('city_id');
		$data['rating']   = $this->input->post('rating');
		$data['status']   = $this->input->post('status');
		$data['video_type']   = $this->input->post('video_type');
		$data['video_url']   = $this->input->post('video_url');
		$data['course_type_id']   = $this->input->post('course_type_id');
		$data['type_of_review']   = 'email_template';
		$data['comment']   = $this->input->post('comment');
			$social_link['facebook'] = html_escape($this->input->post('facebook_link'));
            $social_link['twitter'] = html_escape($this->input->post('twitter_link'));
            $social_link['linkedin'] = html_escape($this->input->post('linkedin_link'));
			$social_link['instagram'] = html_escape($this->input->post('instagram_link'));
			$data['facebook']   = $social_link['facebook'];
			$data['twitter']   = $social_link['twitter'];
			$data['linkedin']   = $social_link['linkedin'];
			$data['instagram']   = $social_link['instagram'];
            $data['social_links'] = json_encode($social_link);
       $this->db->where('first_name', $data['first_name'])->where('video_url', $data['video_url'])->where('country_id', $data['country_id']);
        $previous_data = $this->db->get('review')->num_rows();
		
		$get_cat               = $this->db->where('c_id', $data['country_id'])->get('country')->row();
		$course_name = $get_crse->c_code;
        if ($previous_data == 0) {
                if (!file_exists('uploads/review/email_template/profile_image')) {
                    mkdir('uploads/review/email_template/profile_image', 0777, true);
                }
                if ($_FILES['profile_image']['name'] == "") {
                    $data['profile_image'] = $data['first_name'].'_'.md5(rand(10000000, 20000000)).'.png';
                } else {
                    $data['profile_image'] = $data['first_name'].'_'.md5(rand(10000000, 20000000)) . '.jpg';
                    move_uploaded_file($_FILES['profile_image']['tmp_name'], 'uploads/review/email_template/profile_image/' . $data['profile_image']);
                }
				
				if (!file_exists('uploads/review/email_template/video_image')) {
                    mkdir('uploads/review/email_template/video_image', 0777, true);
                }
                if ($_FILES['review_video_image']['name'] == "") {
                    $data['review_video_image'] = $course_name.'_'.md5(rand(10000000, 20000000)).'.png';
                } else {
                    $data['review_video_image'] = $course_name.'_'.md5(rand(10000000, 20000000)).'.jpg';
                    move_uploaded_file($_FILES['review_video_image']['tmp_name'], 'uploads/review/email_template/video_image/' . $data['review_video_image']);
                }
				
            $data['added_date'] = strtotime(date('D, d-M-Y'));
			$data['updated_date'] = strtotime(date('D, d-M-Y'));
            $this->db->insert('review', $data);
            return true;
        }

        return false;
    }
	public function update_email_template($param1)
    {
        $data['first_name']   = html_escape($this->input->post('first_name'));
        $data['last_name']   = html_escape($this->input->post('last_name'));
        $data['biography'] = html_escape($this->input->post('biography'));
		$data['country_id']   = $this->input->post('country_id');
		$data['city_id']   = $this->input->post('city_id');
		$data['rating']   = $this->input->post('rating');
		$data['status']   = $this->input->post('status');
		$data['video_type']   = $this->input->post('video_type');
		$data['video_url']   = $this->input->post('video_url');
		$data['type_of_review']   = 'email_template';
		$data['comment']   = $this->input->post('comment');
			$social_link['facebook'] = html_escape($this->input->post('facebook_link'));
            $social_link['twitter'] = html_escape($this->input->post('twitter_link'));
            $social_link['linkedin'] = html_escape($this->input->post('linkedin_link'));
			$social_link['instagram'] = html_escape($this->input->post('instagram_link'));
			$data['facebook']   = $social_link['facebook'];
			$data['twitter']   = $social_link['twitter'];
			$data['linkedin']   = $social_link['linkedin'];
			$data['instagram']   = $social_link['instagram'];
            $data['social_links'] = json_encode($social_link);
        $this->db->where('first_name', $data['first_name'])->where('video_url', $data['video_url'])->where('country_id', $data['country_id']);
        $previous_data = $this->db->get('review')->num_rows();
		
		$get_cat               = $this->db->where('c_id', $data['country_id'])->get('country')->row();
		$course_name = $get_crse->c_code;
        if ($previous_data == 0) {
               
        }

        $this->db->where('first_name', $data['first_name'])->where('video_url', $data['video_url'])->where('country_id', $data['country_id']);
        $previous_data = $this->db->get('review')->result_array();
        $checker = true;
        foreach ($previous_data as $row) {
            if ($row['id'] != $param1) {
                $checker = false;
                break;
            }
        }

        if ($checker) {
        	 if (!file_exists('uploads/review/email_template/profile_image')) {
                    mkdir('uploads/review/email_template/profile_image', 0777, true);
                }
                if ($_FILES['profile_image']['name'] == "") {
                    $data['profile_image'] = $data['first_name'].'_'.md5(rand(10000000, 20000000)).'.png';
                } else {
                    $data['profile_image'] = $data['first_name'].'_'.md5(rand(10000000, 20000000)) . '.jpg';
                    move_uploaded_file($_FILES['profile_image']['tmp_name'], 'uploads/review/email_template/profile_image/' . $data['profile_image']);
                }
				
				if (!file_exists('uploads/review/email_template/video_image')) {
                    mkdir('uploads/review/email_template/video_image', 0777, true);
                }
                if ($_FILES['review_video_image']['name'] == "") {
                    $data['review_video_image'] = $course_name.'_'.md5(rand(10000000, 20000000)).'.png';
                } else {
                    $data['review_video_image'] = $course_name.'_'.md5(rand(10000000, 20000000)).'.jpg';
                    move_uploaded_file($_FILES['review_video_image']['tmp_name'], 'uploads/review/email_template/video_image/' . $data['review_video_image']);
                }
            $data['added_date'] = strtotime(date('D, d-M-Y'));
			$data['updated_date'] = strtotime(date('D, d-M-Y'));
            $this->db->where('id', $param1);
            $this->db->update('review', $data);

            return true;
        }
        return false;
    }

}
