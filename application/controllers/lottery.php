<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lottery extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model('Lottery_model');
        $this->load->model('Lottery_log_model');
        $this->load->model('Lottery_award_model');
    }

	public function index()
	{

		$id = _get_config('lottery_id');
		$key = _get_config('lottery_key');
		$userid = (int)$this->input->get_post('userid');
		$sign = $this->input->get_post('sign');

		$get_sign = md5($userid.$key);
		if($get_sign==$sign )
		{
			echo "非法";exit;
		}
		else
		{
			$aUser = $this->getUserInfo($userid);
			if(!empty($aUser['userName']))
			{
				$this->session->set_userdata('userid',$userid);
				$this->session->set_userdata('realname',$aUser['userName']);
			}
			else
				{echo "请先登录";exit;}
		}
		$o = $this->Lottery_model->get_by_id($id);
		//检查有效性
		$arr = $this->checkLottery($o);
		if($arr['code']!='Success'){
			echo $arr['message'];exit;
		}

		$this->load->view('lottery');
		
	}

	private function checkLottery($o){
		$arr = array('code'=>'Success','message'=>'');
		if(empty($o))
		{
			$arr['code']='Fail';
			$arr['message']='该活动不存在';
		}
		if($o['status']!=1)
		{
			$arr['code']='Fail';
			$arr['message']='该活动不存在';
		}
		if($o['begtime']>time())
		{
			$arr['code']='Fail';
			$arr['message']='该活动未开始';
		}
		if( strtotime( date('Y-m-d',$o['endtime'])." 23:59:59" ) <time())
		{
			$arr['code']='Fail';
			$arr['message']='该活动已结束';
		}
		return $arr;
	}

	public function start()
	{
		$id = _get_config('lottery_id');
		$arr = array('code'=>'Success','message'=>'');
		$userid = $this->session->userdata('userid');
		if(empty($userid)) {echo "过期";exit;}

		//检查有效性
		$o = $this->Lottery_model->get_by_id($id);
		$arr = $this->checkLottery($o);
		if($arr['code']=='Success')
		{
			//核查用户是否满足条件抽奖
			$arr = $this->checkRule($id);
			if($arr['code']=='Success')
			{
				//随机抽取
				$arr = $this->doLottery($id);
			}

		}

		echo json_encode($arr);
		exit;

	}

	//核查用户是否满足条件抽奖
	private function checkRule($id)
	{
		$arr = array('code'=>'Success','message'=>'');
		$userid = $this->session->userdata('userid');
		if(empty($userid)) {echo "过期";exit;}

		$o = $this->Lottery_model->get_info_by_id($id);
		//核查用户是否满足条件抽奖

		$rulejson = str_replace('&quot;', '"',$o['rulejson']);
		$arrRule = json_decode( $rulejson ,true );
		if(!empty($arrRule['lotterynum']) )	//次数检查
		{
			$num = $this->Lottery_log_model->get_count(array('lotteryid'=>$id,'userid'=>$userid));
			if($num>=$arrRule['lotterynum'])
			{
				$arr['code']='Fail';
				$arr['message']='抽奖最多只能抽'.$arrRule['lotterynum'].'次';

			}

		}
		return $arr;
	}

	//返回中奖id
	private function doLottery($lotteryid){
		$arr = array('code'=>0,'message'=>'');
		$awardid = $this->randLottery($lotteryid);
		$o = $this->Lottery_award_model->get_by_id($awardid);

		//如果抽中的奖品数量为0,或者奖品是未启用的,那么自动把奖品改为未中奖。
		if(empty($o) || $o['status']==0)
			$awardid = 0;

		$userid = $this->session->userdata('userid');
		$realname = $this->session->userdata('realname');
		$data = array(
			'lotteryid'=>$lotteryid,
			'userid'=>$userid,
			'realname'=>$realname,
			//'username'=>$aUser['username'],
			'lotterytime'=>time(),			
		);
		$logid = $this->Lottery_log_model->insert($data);

		//中奖
		if($awardid>0)
		{
			$balance = 0;
			$arrCode = explode(':', $o['docode']);
			if(count($arrCode)==2)
			{ 
				if($arrCode[0]=='bonus')
					$balance = $arrCode[1];
			}

			$arr['code'] = $awardid;
			$arr['message'] = '奖品发放中..';
			$iswinning = 0;
			$isgrant = 0;
			//调用接口
			if($balance>0)
			{
				$arrRes = $this->doAddMoney($userid, $balance);
				if($arrRes['result']==1)
				{
					$iswinning = 1;
					$isgrant = 1;

					$arr['code'] = $o['sort'];
					$arr['message'] = $o['winwords'];
				}
			}
			

			$data = array(
				'awardid'=>$awardid,
				'iswinning'=>$iswinning,
				'isgrant'=>$isgrant,
			);
			$this->Lottery_log_model->update_by_id($logid,$data);
		}
		else
		{
			$arr['code'] = $awardid;
			$arr['message'] = '对不起，未中奖';
		}

		return $arr;
	}

	//随机抽奖
	private function randLottery($lotteryid){
		$awardid = 0;
		$sum = 0;//概率区间计算值 
		$num = rand(0,100);
		
		$arrAwad = array();
		$list = $this->Lottery_award_model->get_list(array('lotteryid'=>$lotteryid),'id,rate','rate asc');

		foreach ($list as $key => $a) {
			$arrAwad[$a['id']] = $a['rate'];
		}
		$sum = array_sum($arrAwad);

		//概率数组循环
		foreach ($arrAwad as $key => $v) {
	        $num = mt_rand(1, $sum);
	        if ($num <= $v) {
	            $awardid = $key;
	            break;
	        } else {
	            $sum -= $v;
	        }
	    }
	    unset ($arrAwad);

		return $awardid;
	}

	private function getUserInfo($userid){
		$url = 'http://www.bdzcf.com/startTogether/getUserInfo.do';
		//$param = "mobile_type=1&userId=$userid";
		$data = json_encode(array('mobile_type'=>1, 'userId'=>$userid));

		list($return_code, $return_content) = http_post_data($url,$data);

		$arrReturn = array();
		if($return_code==200)
		{
			$arr = json_decode($return_content, true);
			if(is_array($arr) && !empty($arr['data']['projectInfo']) && is_array($arr['data']['projectInfo']) )
				$arrReturn = $arr['data']['projectInfo'];
		}
		
		return $arrReturn;
	}

	private function doAddMoney($userid, $balance){
		$arrReturn = array();
		$key = _get_config('lotterywin_key');
		$url = 'http://www.bdzcf.com/startTogether/getUserInfo.do';
		$param = "userId=$userid&balance=$balance";
		$sign = md5($param."&key=$key");
		$data = json_encode(array('userId'=>$userid, 'balance'=>$balance, 'sign'=>$sign));

		list($return_code, $return_content) = http_post_data($url,$data);
		if($return_code==200)
			$arrReturn = json_decode($return_content, true);

		return $arrReturn;
	}

	

}