<html>
<head>
	<link href="<?php echo _get_cfg_path('admin_css')?>base.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo _get_cfg_path('admin_css')?>common.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo _get_cfg_path('admin_css')?>main.css" rel="stylesheet">
    <link href="<?php echo _get_cfg_path('admin_css')?>right.css" rel="stylesheet">

</head>

<body>

<div class="right_con common">

	<h1>抽奖活动</h1>
	<table cellpadding="0" cellspacing="0" bordercolor="#eee" border="0" width="100%">
		<tr>
            <td height="32">
                <form class="form-horizontal" role="form" method="post">                    
                    <select name="field">
                      <option value="title"<?php if(!empty($arrParam['field']) && $arrParam['field']=='title') echo ' selected';?>>标题</option>
                      <option value="content"<?php if(!empty($arrParam['field']) && $arrParam['field']=='content') echo ' selected';?>>内容</option>
                      <option value="rulejson"<?php if(!empty($arrParam['field']) && $arrParam['field']=='rulejson') echo ' selected';?>>满足条件抽奖</option>
                      
                    </select>
                    <input type="text" name="txtKey" value="<?=!empty($arrParam['key']) ? $arrParam['key']:'';?>" class="w150">
                    <select name="fieldDate">
                      <option value="addtime"<?php if(!empty($arrParam['fieldDate']) && $arrParam['fieldDate']=='addtime') echo ' selected';?>>创建时间</option>
                      <option value="inendtime"<?php if(!empty($arrParam['fieldDate']) && $arrParam['fieldDate']=='inendtime') echo ' selected';?>>截止时间</option>
                    </select>
                    <input type="text" name="begtime" class="w100" value="<?php if( !empty($arrParam['begtime']) ) echo $arrParam['begtime']; ?>"  readonly="readonly" onclick="WdatePicker()" placeholder="请选择日期">
                    <input type="text" name="endtime" class="w100" value="<?php if( !empty($arrParam['endtime']) ) echo $arrParam['endtime']; ?>" readonly="readonly" onclick="WdatePicker()" placeholder="请选择日期">
                    <select name="orderby">
                     
                      <option value="begtime desc"<?php if(!empty($arrParam['orderby']) && $arrParam['orderby']=='begtime desc') echo ' selected';?>>开始时间倒序</option>
                      <option value="endtime desc"<?php if(!empty($arrParam['orderby']) && $arrParam['orderby']=='endtime desc') echo ' selected';?>>结束时间倒序</option>
                    </select>
                    <button type="submit" class="btn">查  询</button>
                  	
                  </form>
            </td>
            <td><a href='/admin/lottery/add' class="sub">添加</a></td>
        </tr>
    </table>
	
	<table cellpadding="0" cellspacing="0" align="center" bordercolor="#eee" border="1" width="100%" class="listTab">
		<tbody>
			<tr height="39" style="font-size:13px;">
	            <td width="250" height="25" align="center">标题</td>
	            <td>内容</td>
	            <td>开始时间</td>
	            <td>结束时间</td>
	            <td>满足条件抽奖</td>
	            <td>状态</td>
	            <td>添加时间</td>
	            <td>操作</td>
	        </tr>
	        <?php foreach ($list['rows'] as $key => $a): ?>
			<tr>
				<td height="30"><?php echo $a['title'];?></td>
				<td><?php echo $a['content'];?></td>
				<td><?php echo date('Y-m-d',$a['begtime']);?></td>
				<td><?php echo date('Y-m-d',$a['endtime']);?></td>
				<td><?php echo $a['rulejson'];?></td>
				<td><?php if($a['status']==1) echo '正常'; else if($a['status']==-1) echo '删除';  else echo '';?></td>
				<td><?php echo date('Y-m-d H:i:s',$a['addtime']);?></td>				
				<td class="con_title">
					<a href="/admin/lottery_award/?lotteryid=<?php echo _get_key_val($a['id']);?>">奖品列表</a>
					<a href="/admin/lottery_log/?lotteryid=<?php echo _get_key_val($a['id']);?>">奖品记录</a>
					<a href="/admin/lottery/add?id=<?php echo _get_key_val($a['id']);?>">修改</a>
					<a href="/admin/lottery/del?id=<?php echo _get_key_val($a['id']);?>">删除</a>
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