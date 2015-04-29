<?php
  return array(
   // 'admin'=>'this is admin config',
   'RBAC_SUPERADMIN'=>'admin',
   'ADMIN_AUTH_KEY'=>'superadmin',//
   'USER_AUTH_ON'=>true,//
   'USER_AUTH_TYPE'=>1,//
   'USER_AUTH_KEY'=>'uid',
   'NOT_AUTH_MODULE'=>'',
   'NOT_AUTH_ACTION'=>'',
   'RBAC_ROLE_TABLE'=>'han_role',
   'RBAC_USER_TABLE'=>'han_role_user',
   'RBAC_ACCESS_TABLE'=>'han_access',
   'RBAC_NODE_TABLE'=>'han_node',



   'TMPL_PARSE_STRING'=>array(
   	'__PUBLIC__'=>__ROOT__.'/'.APP_NAME.'/Tpl/Admin/Public',
   ),
   'URL_HTML_SUFFIX'=>'',
  );
?>