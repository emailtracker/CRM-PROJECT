<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        // THIS FUNCTION DECIDES WHTHER THE ROUTE IS REQUIRES PUBLIC INSTRUCTOR.
        $this->get_protected_routes($this->router->method);
       // $this->get_protected_routes_f0r_sales_manager($this->router->method);

        // THIS MIDDLEWARE FUNCTION CHECKS WHETHER THE USER IS TRYING TO ACCESS INSTRUCTOR STUFFS.
        $this->instructor_authorization($this->router->method);
        
        // CHECK CUSTOM SESSION DATA
        $this->user_model->check_session_data('user');
    }


    public function get_protected_routes($method)
    {
        // IF ANY FUNCTION DOES NOT REQUIRE PUBLIC INSTRUCTOR, PUT THE NAME HERE.
        $unprotected_routes = ['save_course_progress'];
        if (!in_array($method, $unprotected_routes)) {
            if (get_settings('allow_campaign_manager') != 1  ) {
                redirect(site_url('home'), 'refresh');
            }
        }
    }

    // public function get_protected_routes($method)
    // {

    //     $unprotected_routes = ['save_course_progress'];
    //     if(!in_array())
    // }
 

    public function instructor_authorization($method)
    {
        // IF THE USER IS NOT AN INSTRUCTOR HE/SHE CAN NEVER ACCESS THE OTHER FUNCTIONS EXCEPT FOR BELOW FUNCTIONS.
        if ($this->session->userdata('is_campaign_manager') != 1 && ('is_sales_manager') != 0) {
            if (!in_array($method, $unprotected_routes)) {
                redirect(site_url('login/logout'), 'refresh');
            }
        }
    }

   


    public function index()
    {
        if ($this->session->userdata('user_login') == true) {
            $this->dashboard();
        } else {
            redirect(site_url('login'), 'refresh');
        }
    }

    public function dashboard()
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'dashboard';
        $page_data['page_title'] = get_phrase('dashboard');
        $this->load->view('backend/index.php', $page_data);
    }


    public function country($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('country');

        if ($param1 == 'add') {

            $response = $this->custom_model->add_country();
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('country_name_already_exists'));
            }
            redirect(site_url('user/country'), 'refresh');
        } 

        elseif ($param1 == "edit") {

            $response = $this->custom_model->edit_country($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('country_name_already_exists'));
            }
            redirect(site_url('user/country'), 'refresh');
        }

        elseif ($param1 == "delete") {

            $this->custom_model->delete_country($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
        }
        
        $page_data['page_name'] = 'country';
        $page_data['page_title'] = get_phrase('country');
        $page_data['country'] = $this->custom_model->get_country($param2);
        $this->load->view('backend/index', $page_data);
    }
	public function country_form($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('country');

        if ($param1 == "add_country") {

            $page_data['page_name'] = 'country_add';
            $page_data['country'] = $this->custom_model->get_country()->result_array();
            $page_data['page_title'] = get_phrase('add_country');
        }
        if ($param1 == "edit_country") {

            $page_data['page_name'] = 'country_edit';
            $page_data['page_title'] = get_phrase('edit_country');
            $page_data['country'] = $this->custom_model->get_country()->result_array();
            $page_data['country_id'] = $param2;
        }

        $this->load->view('backend/index', $page_data);
    }


    public function city($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('city');

        if ($param1 == 'add') {

            $response = $this->custom_model->add_city();
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('city_name_already_exists'));
            }
            redirect(site_url('user/city'), 'refresh');
        } elseif ($param1 == "edit") {

            $response = $this->custom_model->edit_city($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('city_name_already_exists'));
            }
            redirect(site_url('user/city'), 'refresh');
        } elseif ($param1 == "delete") {

            $this->custom_model->delete_city($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('user/city'), 'refresh');
        }
        $page_data['page_name'] = 'city';
        $page_data['page_title'] = get_phrase('city');
        $page_data['city'] = $this->custom_model->get_city($param2);
        $this->load->view('backend/index', $page_data);
    }


	public function city_form($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
       check_permission('city');

        if ($param1 == "add_city") {

            $page_data['page_name'] = 'city_add';
            $page_data['city'] = $this->custom_model->get_city()->result_array();
            $page_data['page_title'] = get_phrase('add_city');
        }
        if ($param1 == "edit_city") {

            $page_data['page_name'] = 'city_edit';
            $page_data['page_title'] = get_phrase('edit_city');
            $page_data['city'] = $this->custom_model->get_city()->result_array();
            $page_data['city_id'] = $param2;
        }

        $this->load->view('backend/index', $page_data);
    }

    public function categories($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('category');

        if ($param1 == 'add') {

            $response = $this->crud_model->add_category();
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('category_name_already_exists'));
            }
            redirect(site_url('user/categories'), 'refresh');
        } elseif ($param1 == "edit") {

            $response = $this->crud_model->edit_category($param2);
            if ($response) {
                $this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('category_name_already_exists'));
            }
            redirect(site_url('user/categories'), 'refresh');
        } elseif ($param1 == "delete") {

            $this->crud_model->delete_category($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
            redirect(site_url('user/categories'), 'refresh');
        }
        $page_data['page_name'] = 'categories';
        $page_data['page_title'] = get_phrase('categories');
        $page_data['categories'] = $this->crud_model->get_categories($param2);
        $this->load->view('backend/index', $page_data);
    }

    public function category_form($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('category');

        if ($param1 == "add_category") {

            $page_data['page_name'] = 'category_add';
            $page_data['categories'] = $this->crud_model->get_categories()->result_array();
            $page_data['page_title'] = get_phrase('add_category');
        }
        if ($param1 == "edit_category") {

            $page_data['page_name'] = 'category_edit';
            $page_data['page_title'] = get_phrase('edit_category');
            $page_data['categories'] = $this->crud_model->get_categories()->result_array();
            $page_data['category_id'] = $param2;
        }

        $this->load->view('backend/index', $page_data);
    }

    public function sub_categories_by_category_id($category_id = 0)
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $category_id = $this->input->post('category_id');
        redirect(site_url("user/sub_categories/$category_id"), 'refresh');
    }

    public function sub_category_form($param1 = "", $param2 = "")
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        // CHECK ACCESS PERMISSION
        check_permission('category');

        if ($param1 == 'add_sub_category') {
            $page_data['page_name'] = 'sub_category_add';
            $page_data['page_title'] = get_phrase('add_sub_category');
        } elseif ($param1 == 'edit_sub_category') {
            $page_data['page_name'] = 'sub_category_edit';
            $page_data['page_title'] = get_phrase('edit_sub_category');
            $page_data['sub_category_id'] = $param2;
        }
        $page_data['categories'] = $this->crud_model->get_categories();
        $this->load->view('backend/index', $page_data);
    }


   
}
