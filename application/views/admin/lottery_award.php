<html>
<head>
	<link href="<?php echo _get_cfg_path('admin_css')?>base.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo _get_cfg_path('admin_css')?>common.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo _get_cfg_path('admin_css')?>main.css" rel="stylesheet">
    <link href="<?php echo _get_cfg_path('admin_css')?>right.css" rel="stylesheet">

</head>

<body>

<div class="right_con common">

	<h1>奖品管理</h1>
	<a href='/admin/lottery/' class="sub">抽奖列表</a>
	<a href='/admin/lottery_award/add?lotteryid=<?=_get_key_val($arrParam['lotteryid'])?>' class="sub">添加</a>
	<table cellpadding="0" cellspacing="0" align="center" bordercolor="#eee" border="1" width="100%" class="listTab">
		<tbody>
			<tr height="39" style="font-size:13px;">
	            <td width="250" height="25" align="center">奖品</td>
	            <td>处理代码</td>
	            <td>奖品说明</td>
	            <td>奖品对应</td>
	            <td>奖品数量</td>
	            <td>中奖恭喜用词</td>
	            <td>中奖概率</td>
	            <td>活动id</td>
	            <td>启用</td>
	            <td>操作</td>
	        </tr>
	        <?php foreach ($list['rows'] as $key => $a): ?>
			<tr>
				<td height="30"><?php echo $a['title'];?></td>
				<td><?php echo $a['docode'];?></td>
				<td><?php echo $a['memo'];?></td>
				<td><?php echo $a['sort'];?></td>
				<td><?php echo $a['num'];?></td>
				<td><?php echo $a['winwords'];?></td>
				<td><?php echo $a['rate'];?></td>
				<td><?php echo $a['lotteryid'];?></td>
				<td><?php echo $a['status']==1?'启用':'不启用';?></td>
				<td class="con_title">
					<a href="/admin/lottery_award/add?id=<?php echo _get_key_val($a['id']);?>">修改</a>
					<a href="/admin/lottery_award/del?id=<?php echo _get_key_val($a['id']);?>">删除</a>
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