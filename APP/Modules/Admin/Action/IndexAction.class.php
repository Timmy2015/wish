<?php
/*
这是后端首页控制器
 */
    Class IndexAction extends CommonAction{
//  Class IndexAction extends CommonAction{

  	Public function index(){
  		/*echo 'This is Admin';
  		echo '<br/>';
  	
  		echo C('admin');*/
  		$this->display();
  	}
  	function logout(){
  		session_unset();
  		session_destroy();
  		$this->redirect('Admin/Login/index');
  	}
  }
?>