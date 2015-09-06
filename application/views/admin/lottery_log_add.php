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
	

	<a href="/admin/lottery_log" class="topBtn">返回列表</a>
	<?php echo validation_errors('<div class="valid_error">', '</div>');?>
	<form action="/admin/lottery_log/save<?php if( !empty($info['id']) ) echo '?id='. _get_key_val( $info['id'] ); ?>" method="post">

		<table class="addTable">
			<tbody>
				<tr>
		            <td width="150" height="25" align="right"><span class="tips">*</span> 抽奖活动id：</td>
		            <td align="left" class="padL10"><input type="text" name="lotteryid" value="<?php if( !empty($info['lotteryid']) ) echo $info['lotteryid']; ?>" /></td>
		        </tr>
		        <tr>
		            <td height="25" align="right"><span class="tips">*</span> 抽奖人id：</td>
		            <td align="left" class="padL10"><input type="text" name="userid" value="<?php if( !empty($info['userid']) ) echo $info['userid']; ?>" /></td>
		        </tr>
		        <tr>
		            <td height="25" align="right"><span class="tips">*</span> 用户名：</td>
		            <td align="left" class="padL10"><input type="text" name="username" value="<?php if( !empty($info['username']) ) echo $info['username']; ?>" /></td>
		        </tr>
		        <tr>
		            <td height="25" align="right"><span class="tips">*</span> 姓名：</td>
		            <td align="left" class="padL10"><input type="text" name="realname" value="<?php if( !empty($info['realname']) ) echo $info['realname']; ?>" /></td>
		        </tr>
		        <tr>
		            <td height="25" align="right"><span class="tips">*</span> 性别：</td>
		            <td align="left" class="padL10">
		            	<input type="radio" name="sex" value="1" <?php if( !empty($info['sex']) && $info['sex']==1 ) echo ' checked' ?> />男
	            		<input type="radio" name="sex" value="0" <?php if( !empty($info['sex']) && $info['sex']==0 ) echo ' checked' ?> />女
		            </td>
            	</tr>
		         <tr>
		            <td height="25" align="right"><span class="tips">*</span> 抽奖时间：</td>
		            <td align="left" class="padL10"><input type="text" name="lotterytime" value="<?php if( !empty($info['lotterytime']) ) echo date('Y-m-d',$info['lotterytime']); ?>" readonly="readonly" onclick="WdatePicker()" /></td>
		        </tr>
		         <tr>
		            <td height="25" align="right"><span class="tips">*</span> 是否中奖：</td>
		            <td align="left" class="padL10">
		            	<input type="radio" name="iswinning" value="1" <?php if( !empty($info['iswinning']) && $info['iswinning']==1 ) echo ' checked' ?> />中奖
	            		<input type="radio" name="iswinning" value="0" <?php if( !empty($info['iswinning']) && $info['iswinning']==0 ) echo ' checked' ?> />没中
		            </td>
            	</tr>
		        <tr>
		            <td height="25" align="right"><span class="tips">*</span> 是否发放：</td>
		            <td align="left" class="padL10">
		            	<input type="radio" name="isgrant" value="1" <?php if( !empty($info['isgrant']) && $info['isgrant']==1 ) echo ' checked' ?> />发放
	            		<input type="radio" name="isgrant" value="0" <?php if( !empty($info['isgrant']) && $info['isgrant']==0 ) echo ' checked' ?> />未发放
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