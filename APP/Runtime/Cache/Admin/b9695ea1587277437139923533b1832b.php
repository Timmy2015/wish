<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="__ROOT__/App/Modules/Admin/Tpl/Public/Css/public.css"/>
    <link rel="stylesheet" type="text/css" href="__ROOT__/App/Modules/Admin/Tpl/Public/Css/node.css">
</head>
<body>
    <div id='wrap'>
    	<a href="<?php echo U('Admin/Rbac/addNode');?>" class='add-app'>添加应用</a>
    	<?php if(is_array($node)): foreach($node as $key=>$app): ?><div class='app'>
    			<p>
    				<strong><?php echo ($app["title"]); ?></strong>
    				[<a href="<?php echo U('Admin/Rbac/addNode',array('pid'=>$app['id'],'level'=>2));?>">添加控制器</a>]
                    [<a href="">修改</a>]
                    [<a href="">删除</a>]
                 </p>
                    <!--艹！！！原来前后有关联的！只看到一点是调不了错误的，这个问题也太屌了吧！！MotherFucker  -->
                 <?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dl>
                        <dt>
                            <strong><?php echo ($action["title"]); ?></strong>
                            [<a href="<?php echo U('Admin/Rbac/addNode',array('pid'=>$action['id'],'level'=>3));?>">添加方法</a>]
                        </dt>
                        <?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd>
                              <span><?php echo ($method["title"]); ?></span>
                              [<a href="">修改</a>]
                              [<a href="">删除</a>]
                          </dd><?php endforeach; endif; ?>
                    </dl><?php endforeach; endif; ?>   
    			
    		</div><?php endforeach; endif; ?>
    </div>
	
</body>
</html>