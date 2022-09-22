<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2018, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2018, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		https://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		self::$instance =& $this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');
		$this->load->initialize();
		log_message('info', 'Controller Class Initialized');
		
		$this->load->library('session');
 		if (!$this->session->userdata('country_ip_city'))
        {
            $ipaddress                     = '';
            if (getenv('HTTP_CLIENT_IP'))
                $ipaddress                     = getenv('HTTP_CLIENT_IP');
            else if (getenv('HTTP_X_FORWARDED_FOR'))
                $ipaddress                     = getenv('HTTP_X_FORWARDED_FOR');
            else if (getenv('HTTP_X_FORWARDED'))
                $ipaddress                     = getenv('HTTP_X_FORWARDED');
            else if (getenv('HTTP_FORWARDED_FOR'))
                $ipaddress                     = getenv('HTTP_FORWARDED_FOR');
            else if (getenv('HTTP_FORWARDED'))
                $ipaddress                     = getenv('HTTP_FORWARDED');
            else if (getenv('REMOTE_ADDR'))
                $ipaddress                     = getenv('REMOTE_ADDR');
            else
                $ipaddress                     = 'UNKNOWN';
            $user_data                     = [];
            $user_data['country_ip_code'] = "us";
            $user_data['country_ip_symbol']         = "$";
            $user_data['country_ip_city']       = "1_1";
            $user_data['country_ip_number']       = "8973856546";
            $user_data['country_ip_course_type']        = "LV1";
			$user_data['country_ip_city_name'] = 'Albany NY';
            if ($ipaddress != "")
            {
                $ipaddress_ck = explode(", ", $ipaddress);
                if (count($ipaddress_ck < 1))
                {
                    $ipaddress = $ipaddress_ck[0];
                }
                $data = file_get_contents("http://www.geoplugin.net/json.gp?ip=$ipaddress");
                $data = json_decode($data);
                if (!empty($data))
                {
                    $get_country = $this->db->where('c_name', $data->geoplugin_countryName)->where('c_status', 1)->get('country')->row();
                    if ($data->geoplugin_countryName && !empty($get_country))
                    {
                        $user_data['country_ip_number']       = $get_country->c_cnumber;
                        $user_data['country_ip_code'] = $get_country->c_code;
                        $user_data['country_ip_symbol']         = $get_country->c_currency_symbol;
                        $get_city                      = $this->db->where('cc_status', 1)->like('cc_name', $data->geoplugin_city)->get('city')->row();
                        if ($data->geoplugin_city && !empty($get_city))
                        {
                            $user_data['country_ip_city'] = $get_country->c_id . "_" . $get_city->cc_id;
                            $user_data['country_ip_city_name'] = $get_city->cc_name;
                        }
                        else
                        {
                            $get_city = $this->db->where('cc_status', 1)->where('cc_countryid', $get_country->c_id)->order_by('cc_name', 'ASC')->get('city')->row();
                            if (!empty($get_city))
                            {
                                $user_data['country_ip_city'] = $get_country->c_id . "_" . $get_city->cc_id;
								$user_data['country_ip_city_name'] = $get_city->cc_name;
                            }
                        }
                    }
                }
            }
            $this->session->set_userdata($user_data);
        }

		
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
	}

}
