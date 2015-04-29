<?php
/*
后台登录控制器
 */
  Class LoginAction extends Action{
    Public function index(){
/*     $_SESSION['username']='admin';
     $_SESSION['uid']=1;
     session_destroy();
     die;*/
      $this->display();
    }
    Public function login(){
       if(!IS_POST) halt('页面不存在');
       if(I('code','','md5')!=session('verify')){
        $this->error('验证码错误');
       }
       $username=I('username');
       $pwd=I('password','','md5');
       $user=M('user')->where(array('username'=>$username))->find();
       if(!$user||$user['password']!=$pwd){
        $this->error('帐号或密码错误');
       }
       if($user['lock']) $this->error('用户被锁定');
       //user这里的居然加多了一个下划线，看不出来！这么粗心，干嘛啊
       //var_dump($user);
       /*$username=I('username');
       $user=M('user')->where(array('username'=>$username))->find();
       p($user);*/
       $data=array(
         'id'=>$user['id'],
         'logintime'=>time(),
         'loginip'=>get_client_ip(),
        );
       M('user')->save($data);
 


      session(C('USER_AUTH_KEY'),$user['id']);
       /*session('uid',$user['id']);*/
       session('username',$user['username']);
       session('logintime',date('Y-m-d H:i:s',$user['logintime']));
       session('loginip',$user['loginip']);
       

       //超级管理员识别
       //TM的，是不是又挖坑了，怎么清除Cookie就登不进去了！
       //黄yongcheng,艹他妈B的！！！
       //这里是不是又挖坑了！先登录不进去（显示没有权限或者直接合并到上面的数组了，
       //然后开启下面的验证，在登录才有superadmin=1!
       if($user['username']==C('RBAC_SUPERADMIN')){
        session(C('ADMIN_AUTH_KEY'),true);
       }

      //根本就引入不进来这个RBAC
      //读取用户权限
      //卧槽！果然高手啊！黄yongcheng个煞笔！害苦了！还是年轻人有良心，
      //老师都他妈的坑爹！！为什么设置要先全选，然后在一个个消除，才能
      //出现在这里的递归呢？这个是什么屌权限啊！这个坑够大的！看，绝对是
      //看不出来的！必须要思考才可以！即使第一次做对了，不明白原理，下次在
      //公司操作，那是没有办法调试的！太可怕了！
      import('ORG.Util.RBAC');
      RBAC::saveAccessList();  

      /*p($_SESSION);
      die;
    */
     
       $this->redirect('Admin/Index/index');

    }
    Public function verify(){
      import('ORG.Util.Image');
      //4个数字，5大小敏感
      Image::buildImageVerify(1,1,'png');
    }
  }
?>