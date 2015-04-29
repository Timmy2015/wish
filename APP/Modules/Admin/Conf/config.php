<?php
return array(
   
   'RBAC_SUPERADMIN'=>'admin',        //超级管理员名称
   'ADMIN_AUTH_KEY'=>'superadmin',  //超级管理员识别
   'USER_AUTH_ON'=>true,//        //是否开启验证
   'USER_AUTH_TYPE'=>1,//       //验证类型（1:登录验证，2：时时验证）    
   'USER_AUTH_KEY'=>'uid',     //用户认证识别号
   'NOT_AUTH_MODULE'=>'Index',                       //无需认证的控制器
   'NOT_AUTH_ACTION'=>'addUserHandle,addRoleHandle,addNodeHandle,setAccess',   //无需认证的动作方法
   'RBAC_ROLE_TABLE'=>'han_role',           //角色表名称
   'RBAC_USER_TABLE'=>'han_role_user',   //角色与用户的中间表
   'RBAC_ACCESS_TABLE'=>'han_access',   //权限表名称
   'RBAC_NODE_TABLE'=>'han_node',    //节点表名称

	'TMPL_PARSE_STRING'=>array(
    '__PUBLIC__'=>__ROOT__.'/'.APP_NAME.'/Modules/'.GROUP_NAME.'Tpl/Public',
		),
	'APP_GROUP_LIST'=>'Index,Admin',
	'DEFAULT_GROUP'=>'Index',

    //显示调试的详细信息，挺有用的啊
	'SHOW_PAGE_TRACE'=>true,

	//默认0是应用分组，1是独立分组
	//'APP_GROUP_MODE'=1,

	'DB_HOST'=>'127.0.0.1',
	'DB_USER'=>'root',
	'DB_PWD'=>'root',
	'DB_NAME'=>'think',
	'DB_PREFIX'=>'han_',

	'TMPL_VAR_IDENTIFY'=>'array',

   
    //模版路径
	'TMPL_FILE_DEPR'=>'_',

	//模版过虑函数
	'DEFAULT_FILTER'=>'htmlspecialchars',
    'SESSION_TYPE'=>'Db',
//    'SESSION_EXPIRE' => 60,
    //'SESSION_TYPE'=>'Db',
    //'SESSION_TYPE' => 'Redis',
    
    //艹！！！太粗心了！！set $key{(;)可有可无｜get $key(禁止(;)结尾}
    //太粗心是干不了这个编程的，同时还得要脑，体力活太累了
  /* 'SESSION_TYPE' => 'Redis',
   'SESSION_PREFIX'=>'sess_',
    'REDIS_HOST' => '127.0.0.1',
    'REDIS_PORT' =>6379,*/

    //'SESSION_TYPE' => 'Redis',*/
	//session保存类型
	/*'SESSION_TYPE' => 'Redis',
	'SESSION_PREFIX' => 'sess_', //session前缀
	'REDIS_HOST' => '127.0.0.1' ,//REDIS服务器地址
	'REDIS_PORT' => 6379, //REDIS连接端口号
	'SESSION_EXPIRE' => 3600, //SESSION过期时间*/

);
?>

