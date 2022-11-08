<?php
function alert()
{
    $CI = & get_instance();
    if ($CI->session->flashdata('alert_success'))
    {
        echo '<div class="alert alert-success alert-auto-close"><button data-dismiss="alert" class="close" type="button">x</button> ' . $CI->session->flashdata('alert_success') . "</div>";
    }
    if ($CI->session->flashdata('alert_error'))
    {
        echo '<div class="alert alert-danger alert-auto-close"><button data-dismiss="alert" class="close" type="button">x</button>' . $CI->session->flashdata('alert_error') . "</div>";
    }
    if ($CI->session->flashdata('alert_warning'))
    {
        echo '<div class="alert alert-warning alert-auto-close"><button data-dismiss="alert" class="close" type="button">x</button>' . $CI->session->flashdata('alert_warning') . "</div>";
    }
}

function url_params_to_url()
{
    $get_params = '';
    if (!empty($_GET))
    {
        $i = 0;
        foreach ($_GET as $key => $value)
        {
            if ($key == 'start' && empty($value))
            {

            }
            else
            {
                $get_params .= ($i == 0 ? "?" : "&") . $key . "=" . $value;
                $i++;
            }
        }
    }
    return $get_params;
}

function time_elapsed_string($ptime)
{
    $etime    = time() - $ptime;
    if ($etime < 1)
        return "Just now";
    $a        = array(365 * 24 * 60 * 60 => 'year',
        30 * 24 * 60 * 60  => 'month',
        24 * 60 * 60       => 'day',
        60 * 60            => 'hr',
        60                 => 'min',
        1                  => 'second'
    );
    $a_plural = array('year'   => 'years',
        'month'  => 'months',
        'day'    => 'days',
        'hr'     => 'hours',
        'min'    => 'mins',
        'second' => 'Just now'
    );
    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            if ($str == 'second')
                return "Just now";
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str); // . ' ago';
        }
    }
}

function img_placeholder($img_type = false)
{
    return base_url("asset/admin/img/placeholder" . ($img_type ? '-' . $img_type : '') . ".jpg");
}

function validate_ext($file_name, $ext)
{
    return pathinfo($file_name, PATHINFO_EXTENSION) == $ext;
}

function get_xl_header($filePath, $header = true)
{
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
    $CI            = get_instance();
    $CI->load->library('PHPExcel');
// echo $filePath;die;
//Create excel reader after determining the file type
    $inputFileName = $filePath;
    /** Identify the type of $inputFileName * */
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    /** Create a new Reader of the type that has been identified * */
    $objReader     = PHPExcel_IOFactory::createReader($inputFileType);
    /** Set read type to read cell data onl * */
    $objReader->setReadDataOnly(true);
    /** Load $inputFileName to a PHPExcel Object * */
    $objPHPExcel   = $objReader->load($inputFileName);
//Get worksheet and built array with first row as header
    $objWorksheet  = $objPHPExcel->getActiveSheet();
//excel with first row header, use header as key
    if ($header)
    {
        $highestRow    = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
        $headingsArray = $objWorksheet->rangeToArray('A1:' . $highestColumn . '1', null, true, true, true);
        $headingsArray = $headingsArray[1];
    }
    // echo'<pre>';print_r($headingsArray);exit;
    return $headingsArray;
}

function import_xl($filePath, $header = true)
{
    error_reporting(E_ALL);
    ini_set('display_errors', TRUE);
    ini_set('display_startup_errors', TRUE);
    $CI            = get_instance();
    $CI->load->library('PHPExcel');
//Create excel reader after determining the file type
    $inputFileName = $filePath;
    /** Identify the type of $inputFileName * */
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    /** Create a new Reader of the type that has been identified * */
    $objReader     = PHPExcel_IOFactory::createReader($inputFileType);
    /** Set read type to read cell data onl * */
    $objReader->setReadDataOnly(true);
    /** Load $inputFileName to a PHPExcel Object * */
    $objPHPExcel   = $objReader->load($inputFileName);
//Get worksheet and built array with first row as header
    $objWorksheet  = $objPHPExcel->getActiveSheet();
//excel with first row header, use header as key
    if ($header)
    {
        $highestRow     = $objWorksheet->getHighestRow();
        $highestColumn  = $objWorksheet->getHighestColumn();
        $headingsArray  = $objWorksheet->rangeToArray('A1:' . $highestColumn . '1', null, true, true, true);
        $headingsArray  = $headingsArray[1];
        $r              = -1;
        $namedDataArray = array();
        for ($row = 1; $row <= $highestRow; ++$row)
        {
            $dataRow = $objWorksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, true, true);
            if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > ''))
            {
                ++$r;
                foreach ($headingsArray as $columnKey => $columnHeading)
                {
                    $namedDataArray[$r][$columnKey] = $dataRow[$row][$columnKey];
                }
            }
        }
    }
    else
    {
//excel sheet with no header
        $namedDataArray = $objWorksheet->toArray(null, true, true, true);
    }
    return $namedDataArray;
}


?>