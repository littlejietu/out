<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('get_json') ){
	function _get_json($data)
	{
		$callback = isset($_GET['callback']) ? $_GET['callback'] : '';
		$data = json_encode($data);
		if ($callback && preg_match('~^(jQuery)[\d\_]+$~', $callback))
		{
			echo $callback.'('.$data.')';
		}
		else
		{
			echo $data;
		}
		exit;
	}
}

if ( ! function_exists('ip_long') ){
	function _ip_long($ip='')
	{
		$CI =& get_instance();
		return sprintf('%u', ip2long( $ip ? $ip : $CI->input->ip_address() ));
	}
}

function _current_url(){//获取当前URL
	$url = $_SERVER['PHP_SELF']; 
	$filename= substr( $url , strrpos($url , '/')+1 );
	return $filename;
}


function _get_db($group='xt')
{
	static $db=array();
	if (!isset($db[$group])){
		$CI =& get_instance();
		$db[$group] = $CI->load->database($group, TRUE);
		$db_name = 'xt_'.$group;
		$CI->$db_name = $db[$group];
	}
	return $db[$group];
}

function _get_config($key)
{
	$CI     =& get_instance();
	return $CI->config->item($key);
}

/**
 * 返回加密串
 * @param $val
 * @param $flag
 * @return unknown_type
 */
function _get_key_val($val, $flag=FALSE)
{
	if (!$val)return '';
	if ($flag)
	{
		$md5 = substr($val, -32);
		$str = substr($val,0,-32);
		if(_get_config('encrypt_open'))
		{
			if ( $md5 == md5(session_id().'!#%&)'.$str))
				return $str;
			else
			{
				//redirect('/home/expired');
				return '';
			}
			
		}
		else
			return $str;

	}
	else
	{
		return $val.md5(session_id().'!#%&)'.$val);
	}
}


function _get_html_cssjs($pathKey, $files, $type='css')
{
	$strResult = '';

	$path = _get_cfg_path($pathKey);
	$files = trim($files, ',');
	$arr = explode(',', $files);
	foreach ($arr as $v) {
		$v = trim($v);
		if($type=='css')
			$strResult .='<link rel="stylesheet" href="'.$path.$v.'" />'."\r\n";
		else
			$strResult .='<script src="'.$path.$v.'"></script>'."\r\n";
	}

	return $strResult;
}


function _get_cfg_path($key)
{
	$CI     =& get_instance();
	$arrCfgpath = $CI->config->item('cfg_path');
	if(!empty($arrCfgpath[$key]))
		return $arrCfgpath[$key];
	else
		return '';
}

function _get_array_value($arr)
{
	$strResult = "";
	foreach ($arr as $key => $value) {
		$k = empty($key)?'':$key.':';
		$strResult .= $k.$value.'|';
	}

	return trim($strResult,'|');
}

function _create_url($base_url, $params=array())
{
	if (substr($base_url, 0, 7) !='http://')$base_url = base_url($base_url);
	return $base_url._array_to_url($params);
}

function _array_to_url($params=array())
{
	$url = array();
	if ($params)
	foreach($params as $k=>$v)
	{
		if (strlen($v)==0)continue;
		$url[] = $k.'='.urlencode($v);
	}
	return $url ? '?'.join('&',$url):'';
}

function _get_page($name='page')
{
	$CI =& get_instance();
	$page = (int)$CI->input->get($name);
	return max($page,1);
}

function _is_empty($val)
{
	if(empty($val))
		return '';
	else
		return $val;
}


function http_post_data($url, $data_string){

	$ch = curl_init();  
    curl_setopt($ch, CURLOPT_POST, 1);  
    curl_setopt($ch, CURLOPT_URL, $url);  
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);  
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(  
        'Content-Type: application/json; charset=utf-8',  
        'Content-Length: ' . strlen($data_string))  
    );  
    ob_start();  
    curl_exec($ch);  
    $return_content = ob_get_contents();  
    ob_end_clean();  

    $return_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
    return array($return_code, $return_content); 

}


?>