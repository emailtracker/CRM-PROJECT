<?php
defined('BASEPATH') or exit('No direct script access allowed');
//v5.7
class Custom_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
	// Murugan Added
	
	public function add_city()
    {
        $data['cc_name']   = html_escape($this->input->post('cc_name'));
        $data['cc_address']   = html_escape($this->input->post('cc_address'));
        $data['cc_about'] = html_escape($this->input->post('cc_about'));
        $data['cc_countryid']   = html_escape($this->input->post('cc_countryid'));
		$data['cc_status']   = html_escape($this->input->post('cc_status'));

        // CHECK IF THE CATEGORY NAME ALREADY EXISTS
        $this->db->where('cc_name', $data['cc_name']);
        $previous_data = $this->db->get('city')->num_rows();
        if ($previous_data == 0) {
            $data['cc_created_date'] = strtotime(date('D, d-M-Y'));
            $this->db->insert('city', $data);
			//print_r($this->db->last_query());exit;
            return true;
        }

        return false;
    }
	public function edit_city($param1)
    {
        $data['cc_name']   = html_escape($this->input->post('cc_name'));
        $data['cc_address']   = html_escape($this->input->post('cc_address'));
        $data['cc_about'] = html_escape($this->input->post('cc_about'));
        $data['cc_countryid']   = html_escape($this->input->post('cc_countryid'));
		$data['cc_status ']   = html_escape($this->input->post('cc_status '));

        // CHECK IF THE CATEGORY NAME ALREADY EXISTS
         $this->db->where('cc_name', $data['cc_name']);
        $previous_data = $this->db->get('city')->result_array();
        $checker = true;
        foreach ($previous_data as $row) {
            if ($row['cc_id'] != $param1) {
                $checker = false;
                break;
            }
        }

        if ($checker) {
            $data['cc_created_date'] = strtotime(date('D, d-M-Y'));
            $this->db->where('cc_id', $param1);
            $this->db->update('city', $data);

            return true;
        }
        return false;
    }
	public function get_city($param1 = "")
    {
        if ($param1 != "") {
            $this->db->where('cc_id', $param1);
        }
        $this->db->where('cc_status  ', 0);
		$this->db->or_where('cc_status  ', 1);
        return $this->db->get('city');
    }

    public function get_city_details_by_id($id)
    {
        return $this->db->get_where('city', array('cc_id' => $id));
    }
	public function delete_city($id)
    {
				$this->db->where('cc_id', $id);
		        $this->db->delete('city');
    }

    public function get_city_id($c_code = "")
    {
        $category_details = $this->db->get_where('city', array('c_code' => $c_code))->row_array();
        return $city_details['cc_id'];
    }
	public function add_country()
    {
        $data['c_name']   = html_escape($this->input->post('c_name'));
        $data['c_code']   = html_escape($this->input->post('c_code'));
        $data['c_timezone'] = html_escape($this->input->post('c_timezone'));
        $data['c_currency_name']   = html_escape($this->input->post('c_currency_name'));
		$data['c_currency_symbol']   = html_escape($this->input->post('c_currency_symbol'));
		$data['c_cnumber']   = html_escape($this->input->post('c_cnumber'));
		$data['c_status']   = html_escape($this->input->post('c_status'));

        // CHECK IF THE CATEGORY NAME ALREADY EXISTS
        $this->db->where('c_name', $data['c_name']);
        $previous_data = $this->db->get('country')->num_rows();

        if ($previous_data == 0) {
                // Country flag adding
                if (!file_exists('uploads/country/flag')) {
                    mkdir('uploads/country/flag', 0777, true);
                }
                if ($_FILES['country_thumbnail']['name'] == "") {
                    $data['country_flag'] = 'country-flag.png';
                } else {
                    $data['country_flag'] = md5(rand(10000000, 20000000)) . '.jpg';
                    move_uploaded_file($_FILES['country_thumbnail']['tmp_name'], 'uploads/country/flag/' . $data['country_flag']);
                }
            $data['c_created_date'] = strtotime(date('D, d-M-Y'));
            $this->db->insert('country', $data);
            return true;
        }

        return false;
    }
	public function edit_country($param1)
    {
        $data['c_name']   = html_escape($this->input->post('c_name'));
        $data['c_code']   = html_escape($this->input->post('c_code'));
        $data['c_timezone'] = html_escape($this->input->post('c_timezone'));
        $data['c_currency_name']   = html_escape($this->input->post('c_currency_name'));
		$data['c_currency_symbol']   = html_escape($this->input->post('c_currency_symbol'));
		$data['c_cnumber']   = html_escape($this->input->post('c_cnumber'));
		$data['c_status']   = html_escape($this->input->post('c_status'));

        // CHECK IF THE CATEGORY NAME ALREADY EXISTS
         $this->db->where('c_name', $data['c_name']);
        $previous_data = $this->db->get('country')->result_array();
        $checker = true;
        foreach ($previous_data as $row) {
            if ($row['c_id'] != $param1) {
                $checker = false;
                break;
            }
        }

        if ($checker) {
        
                // category thumbnail adding
                if (!file_exists('uploads/country/flag')) {
                    mkdir('uploads/country/flag', 0777, true);
                }
                if ($_FILES['country_thumbnail']['name'] != "") {
                    $data['country_flag'] = md5(rand(10000000, 20000000)) . '.jpg';
                    move_uploaded_file($_FILES['country_thumbnail']['tmp_name'], 'uploads/country/flag/' . $data['country_flag']);
                }
            $data['c_created_date'] = strtotime(date('D, d-M-Y'));
            $this->db->where('c_id', $param1);
            $this->db->update('country', $data);

            return true;
        }
        return false;
    }
	public function get_country($param1 = "")
    {
        if ($param1 != "") {
            $this->db->where('c_id', $param1);
        }
        $this->db->where('c_status ', 0);
		$this->db->or_where('c_status ', 1);
        return $this->db->get('country');
    }

    public function get_country_details_by_id($id)
    {
        return $this->db->get_where('country', array('c_id' => $id));
    }
	public function delete_country($id)
    {
    	$this->db->where('c_id', $id);
        $previous_data = $this->db->get('country')->row();
		unlink('uploads/country/flag/' . $previous_data->country_flag);
				$this->db->where('c_id', $id);
		        $this->db->delete('country');
    }

    public function get_country_id($c_code = "")
    {
        $category_details = $this->db->get_where('country', array('c_code' => $c_code))->row_array();
        return $country_details['c_id'];
    }
	
	
}
