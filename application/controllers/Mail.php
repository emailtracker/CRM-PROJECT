<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mail extends CI_Controller
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
    }


    public function mail()
    {
        if ($this->session->userdata('user_login') != true) {
            redirect(site_url('login'), 'refresh');
        }

        $page_data['page_name'] = 'mail/manage_mail';
        $page_data['page_title'] = get_phrase('manage_mail');
        $this->load->view('backend/index.php', $page_data);
    }






}

