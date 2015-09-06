<html>
<head>
	<link href="<?php echo _get_cfg_path('admin_css')?>base.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo _get_cfg_path('admin_css')?>common.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo _get_cfg_path('admin_css')?>main.css" rel="stylesheet">
    <link href="<?php echo _get_cfg_path('admin_css')?>right.css" rel="stylesheet">

</head>

<body>

<div class="right_con common">

	<h1>抽奖记录</h1>
	<a href='/admin/lottery/' class="sub">抽奖列表</a>
	<table cellpadding="0" cellspacing="0" bordercolor="#eee" border="0" width="100%">
		<tr>
            <td height="32">
                <form class="form-horizontal" role="form" method="post">                    
                    <select name="field">
                      <option value="username"<?php if(!empty($arrParam['field']) && $arrParam['field']=='username') echo ' selected';?>>用户名</option>
                      <option value="realname"<?php if(!empty($arrParam['field']) && $arrParam['field']=='realname') echo ' selected';?>>姓名</option>
                    </select>
                    <input type="text" name="txtKey" value="<?=!empty($arrParam['key']) ? $arrParam['key']:'';?>" class="w150">
                    <select name="fieldDate">
                      <option value="lotterytime"<?php if(!empty($arrParam['fieldDate']) && $arrParam['fieldDate']=='lotterytime') echo ' selected';?>>抽奖时间</option>
                    </select>
                    <input type="text" name="begtime" class="w100" value="<?php if( !empty($arrParam['begtime']) ) echo $arrParam['begtime']; ?>"  readonly="readonly" onclick="WdatePicker()" placeholder="请选择日期">
                    <input type="text" name="endtime" class="w100" value="<?php if( !empty($arrParam['endtime']) ) echo $arrParam['endtime']; ?>" readonly="readonly" onclick="WdatePicker()" placeholder="请选择日期">
                    <select name="iswinning">
                      <option value="">是否中奖</option>
                      <option value="1"<?php if(!empty($arrParam['iswinning']) && $arrParam['iswinning']=='1') echo ' selected';?>>是</option>
                      <option value="-1"<?php if(!empty($arrParam['iswinning']) && $arrParam['iswinning']=='-1') echo ' selected';?>>否</option>
                    </select>
                    <select name="isgrant">
                      <option value="">是否发放</option>
                      <option value="1"<?php if(!empty($arrParam['isgrant']) && $arrParam['isgrant']=='1') echo ' selected';?>>是</option>
                      <option value="-1"<?php if(!empty($arrParam['isgrant']) && $arrParam['isgrant']=='-1') echo ' selected';?>>否</option>
                    </select>
                    <button type="submit" class="btn">查  询</button>
                  </form>
            </td>
        </tr>
    </table>
	<table cellpadding="0" cellspacing="0" align="center" bordercolor="#eee" border="1" width="100%" class="listTab">
		<tbody>
			<tr height="39" style="font-size:13px;">
	            <td width="250" height="25" align="center">抽奖活动id</td>
	            <td>抽奖人id</td>
	            <td>用户名</td>
	            <td>姓名</td>
	            <td>性别</td>
	            <td>抽奖时间</td>
	            <td>是否中奖</td>
	            <td>是否发放</td>
	            <td>操作</td>
	        </tr>
	        <?php foreach ($list['rows'] as $key => $a): ?>
			<tr>
				<td height="30"><?php echo $a['lotteryid'];?></td>
				<td><?php echo $a['userid'];?></td>
				<td><?php echo $a['username'];?></td>
				<td><?php echo $a['realname'];?></td>
				<td><?php if($a['sex']==1) echo '男'; else if($a['sex']==0) echo '女';  else echo '';?></td>
				<td><?php echo date('Y-m-d H:i:s',$a['lotterytime']);?></td>
				<td><?php if($a['iswinning']==1) echo '中奖'; else echo '没中';?></td>
				<td><?php if($a['isgrant']==1) echo '发放'; else echo '未发放'; ?></td>
								
				<td class="con_title">
					<a href="/admin/lottery_log/del?id=<?php echo _get_key_val($a['id']);?>">删除</a>
				</td>
			</tr>
			<?php endforeach;?>
			
	    </tbody>
	</table>
	<table cellpadding="0" cellspacing="0" bordercolor="#eee" border="0" width="100%">
		<tr>
            <td colspan="2" height="32" align="right">
                <div class="page">
                	<?=$list['pages']?>
                </div>
            </td>
        </tr>
    </table>
</div>
<script type="text/javascript" src="<?php echo _get_cfg_path('lib')?>My97DatePicker/WdatePicker.js"></script>
</body>
</html>