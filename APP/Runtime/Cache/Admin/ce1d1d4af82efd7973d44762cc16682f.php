<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css"/>
</head>
<body>
     <table class="table">
     	<tr>
     		<th>ID</th>
     		<th>角色名称</th>
     		<th>角色描述</th>
     		<th>开启状态</th>
     		<th>操作</th>
     	</tr>
     	<!-- 有些问题根本就看不出来的，看起来一样，但是就是不对，最好就是重写，可能是中文状态 -->
     	<?php if(is_array($role)): foreach($role as $key=>$v): ?><tr>
     			<td><?php echo ($v["id"]); ?></td>
     			<td><?php echo ($v["name"]); ?></td>
     			<td><?php echo ($v["remark"]); ?></td>
     			<td>
     			  <?php if($v["status"]): ?>开启<?php else: ?>关闭<?php endif; ?>
     			<td>
     			    <a href="<?php echo U('Admin/Rbac/access',array('rid'=>$v['id']));?>">配置权限</a>
     			</td>
     		</tr><?php endforeach; endif; ?>
     </table>
	
</body>
</html>