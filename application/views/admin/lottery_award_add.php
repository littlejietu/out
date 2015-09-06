<html>
<head>
	<link href="<?php echo _get_cfg_path('admin_css')?>base.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo _get_cfg_path('admin_css')?>common.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo _get_cfg_path('admin_css')?>main.css" rel="stylesheet">
    <link href="<?php echo _get_cfg_path('admin_css')?>right.css" rel="stylesheet">
    <link href="<?php echo _get_cfg_path('admin_css')?>index.css" rel="stylesheet">
    <link href="<?php echo _get_cfg_path('lib')?>uploadify/uploadify.css" type="text/css" rel="stylesheet" />
</head>

<body>

<div class="right_con common adduser">
	

	<a href="/admin/lottery_award?lotteryid=<?php if(empty($info['lotteryid']) ) echo $this->input->get('lotteryid'); else echo _get_key_val( $info['lotteryid'] ); ?>" class="topBtn">返回列表</a>
	<?php echo validation_errors('<div class="valid_error">', '</div>');?>
	<form action="/admin/lottery_award/save<?php if( !empty($info['id']) ) echo '?id='. _get_key_val( $info['id'] ); ?>" method="post">
		<input type="hidden" name="lotteryid" value="<?php if(empty($info['lotteryid']) ) echo _get_key_val($this->input->get('lotteryid'),TRUE); else echo $info['lotteryid']; ?>" />
		<table class="addTable">
			<tbody>
				<tr>
		            <td width="150" height="25" align="right"> 奖品：</td>
		            <td align="left" class="padL10"><input type="text" name="title" value="<?php if( !empty($info['title']) ) echo $info['title']; ?>" /></td>
		        </tr>		        
		        <tr>
		            <td height="25" align="right"><span class="tips">*</span> 处理代码：</td>
		            <td align="left" class="padL10"><input type="text" name="docode" value="<?php if( !empty($info['docode']) ) echo $info['docode']; ?>" /></td>
		        </tr>		        
		         <tr>
		            <td height="25" align="right"><span class="tips">*</span> 奖品说明：</td>
		            <td align="left" class="padL10"><input type="text" name="memo" value="<?php if( !empty($info['memo']) ) echo $info['memo']; ?>" /></td>
		        </tr>
		         <tr>
		            <td height="25" align="right"><span class="tips">*</span> 排序：</td>
		            <td align="left" class="padL10"><input type="text" name="sort" value="<?php if( !empty($info['sort']) ) echo $info['sort']; ?>" /></td>
		        </tr>
		        <tr>
		            <td height="25" align="right"><span class="tips">*</span> 奖品数量：</td>
		            <td align="left" class="padL10"><input type="text" name="num" value="<?php if( !empty($info['num']) ) echo $info['num']; ?>" /></td>
		        </tr>
		         <tr>
		            <td height="25" align="right"><span class="tips">*</span> 中奖恭喜用词：</td>
		            <td align="left" class="padL10"><input type="text" name="winwords" value="<?php if( !empty($info['winwords']) ) echo $info['winwords']; ?>" /></td>
		        </tr>
		        <tr>
		            <td height="25" align="right"><span class="tips">*</span> 中奖概率：</td>
		            <td align="left" class="padL10"><input type="text" name="rate" value="<?php if( !empty($info['rate']) ) echo $info['rate']; ?>" /></td>
		        </tr>
		        <tr>
		            <td height="25" align="right"><span class="tips">*</span> 启用：</td>
		            <td align="left" class="padL10">
		            	<input type="radio" name="status" value="1" <?php if( !empty($info['status']) && $info['status']==1 ) echo ' checked' ?> />启用
	            		<input type="radio" name="status" value="-1" <?php if( !empty($info['status']) && $info['status']==-1 ) echo ' checked' ?> />不启用
					</td>
		        </tr>
				<tr>
		            <td></td>
		            <td class="padL10"><input type="submit" class="sub" value="提交"></td>
		        </tr>
		    </tbody>
		</table>
	</form>
</div>

<script type="text/javascript" src="<?php echo _get_cfg_path('lib')?>My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript" src="<?php echo _get_cfg_path('js')?>jquery-1.11.2.min.js"></script>
<script src="<?php echo _get_cfg_path('lib')?>uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<script type="text/javascript">
<?php $timestamp = $this->timestamp;?>
</script>
</body>
</html>