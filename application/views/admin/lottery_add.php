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
	

	<a href="/admin/lottery" class="topBtn">返回列表</a>
	<?php echo validation_errors('<div class="valid_error">', '</div>');?>
	<form action="/admin/lottery/save<?php if( !empty($info['id']) ) echo '?id='. _get_key_val( $info['id'] ); ?>" method="post">

		<table class="addTable">
			<tbody>
				<tr>
		            <td width="150" height="25" align="right"><span class="tips">*</span> 标题：</td>
		            <td align="left" class="padL10"><input type="text" name="title" value="<?php if( !empty($info['title']) ) echo $info['title']; ?>" /></td>
		        </tr>
		        <tr>
		            <td height="25" align="right"><span class="tips">*</span> 内容：</td>
		            <td align="left" class="padL10"><textarea class="txt text" placeholder=""  name="content" cols="60" rows="3"><?php if( !empty($info['content']) ) echo $info['content']; ?></textarea></td>
		        </tr>

		         <tr>
		            <td height="25" align="right"><span class="tips">*</span> 开始时间：</td>
		            <td align="left" class="padL10"><input type="text" name="begtime" value="<?php if( !empty($info['begtime']) ) echo date('Y-m-d',$info['begtime']); ?>" readonly="readonly" onclick="WdatePicker()" /></td>
		        </tr>
		         <tr>
		            <td height="25" align="right"><span class="tips">*</span> 结束时间：</td>
		            <td align="left" class="padL10"><input type="text" name="endtime" value="<?php if( !empty($info['endtime']) ) echo date('Y-m-d',$info['endtime']); ?>" readonly="readonly" onclick="WdatePicker()" /></td>
		        </tr>
		        <tr>
		            <td height="25" align="right"><span class="tips">*</span> 满足条件抽奖：</td>
		            <td align="left" class="padL10"><input type="text" name="rulejson" value="<?php if( !empty($info['rulejson']) ) echo $info['rulejson']; ?>" /></td>
		        </tr>
		         <tr>
		            <td height="25" align="right"><span class="tips">*</span> 状态：</td>
		            <td align="left" class="padL10">
		            	<input type="radio" name="status" value="1" <?php if( !empty($info['status']) && $info['status']==1 ) echo ' checked' ?> />显示
	            		<input type="radio" name="status" value="0" <?php if( !empty($info['status']) && $info['status']==0 ) echo ' checked' ?> />不显示
		            </td>
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