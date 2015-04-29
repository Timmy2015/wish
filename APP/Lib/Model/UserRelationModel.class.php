<?php
  //好奇怪哦，重名命会使函数失效，需要重新！重启动环境可以吗？
  //用户与角色的关联模型
  Class UserRelationModel extends RelationModel{
     Protected $tableName='user';
     Protected $_link=array(
        'role'=>array(
            'mapping_type'=>MANY_TO_MANY,       //多对多
            'foreign_key'=>'user_id',           //主表在中间表中的字段名称
            'relation_key'=>'role_id',          //副表在中间表中的字段名称
            'relation_table'=>'han_role_user',  //
            'mapping_fields'=>'id,name,remark'  //中间表名称
        	)
     	);
  }
?>