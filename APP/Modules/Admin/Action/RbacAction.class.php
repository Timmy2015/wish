<?php
header("Content-Type:text/html;charset=utf-8");
  Class RbacAction extends CommonAction{
//    Class RbacAction extends Action{


  	Public function index(){
      $this->user=D('UserRelation')->field('password',true)->relation(true)->select();
      /*$result=D('UserRelation')->field('password',true)->relation(true)
      ->select();
      p($result);
      die;*/
      
      $this->display();

  	}
  	//角色列表
  	Public function role(){
  		$this->role=M('role')->select();
  		$this->display();

  	}
  	//节点列表
  	//好奇怪的问题，第一运行出错后，第二次在怎么修改都能修改正确；只有重新在输入才能解决问题，
  	//什么原因呢，是bug没打开还是cookie没有清除干净呢！发生好多次这样的现象了！
  	//但是视频中为什么可以呢？
  	Public function node(){
//  		$this->node=M('node')->order('sort')->select();

//  		p($node);die;
//  		$this->display();
    		$field=array('id','name','title','pid');
    		$node=M('node')->field($field)->order('sort')->select(); 
//        $node=node_merge($node);
        // p($node);
        // die;
//        $this->display();

        
        //怎么这里一分配就错了呢？艹，瞎了狗眼了吗，上下俩句有那么大的不同
        //都看不出来！！！！
        
//        $this->node=M('node')->field($field)->order('sort')->select();
//    		$this->display();
   		$this->node=node_merge($node);
      $this->display();
  		//p($node);
  		//$this->node=M('node')->field($field)->order('sort')->select();
  		//p($node);die;
  		
  		
  		

  	}
  	//添加用户
  	Public function addUser(){
      $this->role=M('role')->select();
      $this->display();

  	}
    //添加用户表单处理
    Public function addUserHandle(){
      //用户信息
      $user=array(
        'username'=>I('username'),
        'password'=>I('password','','md5'),
        'logintme'=>time(),
        'loginip'=>get_client_ip()
        );
      //所属角色
      $role=array();
      if($uid=M('user')->add($user)){
        foreach ($_POST['role_id'] as $v){
          $role[]=array(
            'role_id'=>$v,
            'user_id'=>$uid
            );
        }
        //添加用户角色
        M('role_user')->addAll($role);
        $this->success('添加成功',U('Admin/Rbac/index'));
      }else{
        $this->error('添加失败');
      }
    }
  	//添加角色
  	Public function addRole(){
  		$this->display();
  	}
  	//角色表单处理
  	Public function addRoleHandle(){
  		//P($_POST);
  		if (M('role')->add($_POST)){
  			$this->success('添加成功',U('Admin/Rbac/role'));
  		}else{
  			$this->error('添加失败');
  		}
  	}
  	//添加节点
  	Public function addNode(){
  		//$this->应该就是相当于是assign=('pid',"$pid")分配到模版上面去
  		//函数重写，需要先清理之前一些有关信息在，重新插入，才会生效，好多细节啊
  		
      $this->pid=I('pid',0,'intval');
  		$this->level=I('level',1,'intval');
      
      //  p($_GET);die;
        
        switch($this->level){
        	case 1:
        	  $this->type='应用';
        	  break;
        	case 2:
        	  $this->type='控制器'  ;
        	  break;
        	case 3:
        	   $this->type='动作方法';
        	   break;
        }
  		$this->display();

  	}
  	//添加节点表单处理
  	Public function addNodeHandle(){
      if(M('node')->add($_POST)){
      	$this->success('添加成功',U('Admin/Rbac/node'));
      }else{
      	$this->error('添加失败');
      }
  	}

    //终于好了，但是那个环节出错了呢?更好的调节方式是什么呢?
    //配置权限
    Public function access(){
      $rid=I('rid',0,'intval');
      $field=array('id','name','title','pid');
      $node=M('node')->order('sort')->field($field)->select();
      // $this->node=node_merge($node);
      $access=M('access')->where(array('role_id'=>$rid))->getField('node_id',true);
     
      $this->node=node_merge($node,$access);


      //$access=M('access')->where(array('role_id'=>$rid))->getField('node_id',true);
    //  $this->node=node_merge($node,$access);
    //  p($node);die;

      $this->rid=$rid;
      $this->display();
    }
     
// //原有权限
//       $access=M('access')->where(array('role_id'=>$rid))->getField('
//         node_id',true);
//       $this->node=node_merge($node,$access);
      
//       $this->rid=$rid;
//       $this->display();
       
       //修改权限
    Public function setAccess(){
      //p($_POST);
      $rid=I('rid',0,'intval');
      $db=M('access');
      $db->where(array('role_id'=>$rid))->delete();

       $data=array();
          foreach ($_POST['access'] as $v){
            //重组_的数据
            $tmp=explode('_',$v);
            $data[]=array(
              'role_id'=>$rid,
              'node_id'=>$tmp[0],
              'level'=>$tmp[1]
              );
          }
            if($db->addAll($data)){
            $this->success('修改成功',U('Admin/Rbac/role'));
          }else{
            $this->error('修改失败');
            
          }
        }

  }
?>