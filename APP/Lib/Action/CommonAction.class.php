<?php
//真的是搞死我啊！这个公共控制器在根目录下是前后台公共！必须要Git吧！这个细节累死人啊
  Class CommonAction extends Action{
  	Public function _initialize(){
  		if(!isset($_SESSION[C('USER_AUTH_KEY')])){
        $this->redirect('Admin/Login/index');
        }
        $notAuth=in_array(MODULE_NAME,explode(',',C('NOT_AUTH_MODULE')))||
        in_array(ACTION_NAME,explode(',',C('NOT_AUTH_ACTION')));

        if(C('USER_AUTH_ON')&& !$notAuth){
        import('ORG.Util.RBAC');
        RBAC::AccessDecision(GROUP_NAME) || $this->error('没有权限');
      }
  	}
  }
?>