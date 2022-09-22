<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->load->library('session');
        // $this->load->library('stripe');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');

        // CHECK CUSTOM SESSION DATA
        $this->user_model->check_session_data();
    }
    public function index()
    {
        $this->home();
    }

    public function verification_code()
    {
        if (!$this->session->userdata('register_email')) {
            redirect(site_url('home/sign_up'), 'refresh');
        }
        $page_data['page_name'] = "verification_code";
        $page_data['page_title'] = site_phrase('verification_code');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }
    public function home()
    {
        $page_data['page_name'] = "login";
        $page_data['page_title'] = site_phrase('home');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }
    public function login()
    {
        //Check custom session data
        $this->user_model->check_session_data('login');

        $page_data['page_name'] = 'login';
        $page_data['page_title'] = site_phrase('login');
        $this->load->view('frontend/' . get_frontend_settings('theme') . '/index', $page_data);
    }
}
