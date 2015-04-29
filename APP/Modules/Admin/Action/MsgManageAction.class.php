<?php
  
//后台帖子管理控制器
//小心还是小心，小心踩地雷啊！建控制器，错了就重新写，不要移动路径，怀疑第一次就是这样犯错的！
    Class MsgManageAction extends CommonAction{
//    Class MsgManageAction extends Action{
  	Public function index(){
  		import('ORG.Util.Page');
  		$count=M('wish')->count();
  		$page=new Page($count,5);
  		$limit=$page->firstRow.','.$page->listRows;
  		$wish=M('wish')->order('time desc')->limit($limit)->select();
  		$this->wish=$wish;
  		//把page方法分配过去，是不是说左边是调用方法，右边是变量或其他呢
  		$this->page=$page->show();

  		$this->display();
  	}
  	Public function delete(){
  		$id=I('id','','intval');
  		if(M('wish')->delete($id)){
           $this->success('删除成功',U('Admin/MsgManage/index'));
       }else{
       	$this->error('删除失败');
       }
  	}
  }
?>
