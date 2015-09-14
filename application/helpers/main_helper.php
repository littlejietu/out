<?php
/*公用函数库*/
function _get_nav_isactive($arr)
{
	$uri = '/'.uri_string();

	if(!empty($arr['page']) && $arr['page']==$uri)
		return true;
	
	if(!empty($arr['submenu']))
	{
		foreach ($arr['submenu'] as $arrSub) {
			if($arrSub['page']==$uri)
				return true;
		}
	}

	return false;	
}

function _get_breadcrumb_url()
{
	$result = array();
	$uri = '/'.uri_string();
	$arrNav=_get_config('nav_list');
	foreach ($arrNav as $a) {
		if(!empty($a['page']) && $a['page']==$uri)
		{
			$result[]=array('title'=>$a['title'],'page'=>$a['page'],'active'=>1);
			return $result;
		}

		if(!empty($a['submenu']))
		{
			foreach ($a['submenu'] as $arrSub) {
				if($arrSub['page']==$uri)
				{
					$result[]=array('title'=>$a['title'],'page'=>$a['page'],'active'=>0);
					$result[]=array('title'=>$arrSub['title'],'page'=>$arrSub['page'],'active'=>1);
					return $result;
				}
			}
		}

	}
	
	return $result; 
}

function _get_userlogo_url($userlogo){

    return $userlogo? '/'.trim($userlogo,'/') : _get_cfg_path('images').'imghead.jpg';

}

function _get_companylogo_url($logo){

    return $logo? '/'.trim($logo,'/') : _get_cfg_path('images').'imghead.jpg';

}

function _get_login_agent_user(){
	$CI =& get_instance();

	$agentUser = $CI->cache->get('agentUser');
	if(!empty($agentUser))
		return $agentUser;
	else
		return $CI->loginUser;
}

function _get_image_url($img){

    return $img? '/'.trim($img,'/') : '';

}

function _check_password_safe($pwd){
	$res = 1;
	if(preg_match('/^[0-9]{1,6}$/', $pwd))
		$res = 1;
	else if(preg_match('/^([a-z]+(?=[0-9])|[0-9]+(?=[a-z]))[a-z0-9]+$/i',$pwd))
		$res = 3;
	else
		$res = 2;

	return $res;
}

function _get_timehello()
{
	$res = '';
	$arrHello = _get_config('timehello');
	$h = date('h',time());
	if($h>=6 && $h< 12)
		$res = $arrHello[1];
	else if($h>=12 && $h< 2)
		$res = $arrHello[2];
	else if($h>=2 && $h< 6)
		$res = $arrHello[3];
	else
		$res = $arrHello[4];

	return $res;
}

/**
 * add_option 
 * 操作日志
 * 
 * @param mixed $option 操作行为
 * @param mixed $content 内容
 * @access public
 * @return void
 */
function add_member_option($option,$item_id,$content='')
{
	$CI =& get_instance();
	$options = array(
	'`option`'=>$option,
	'content'=>is_array($content) ? '@'.encode_value($content) : $content,
	'poster'=>$CI->loginAccount,
	'poster_id'=>$CI->loginID,
	'item_id'=>$item_id,
	'created'=>$CI->timestamp,
	'ip'=>$CI->input->ip_address(),
	);

	return XTM('Admin_option')->insert($options);
}

?>