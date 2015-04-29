<?php
/*
 这是前端首页控制器
 */
  Class IndexAction extends Action{
  	Public function index(){
  		/*echo 'This is Index';
  		echo '<br/>';
  		echo C('index');
  		echo '<br/>';
  		talk();
  		echo '<br/>';
  		p($_SERVER);*/
      $wish=M('wish')->select();
      $this->assign('wish',$wish)->display();

  	}
  	/*
  	异步发布处理
  	 */
  	Public function handle () {
      // p(I('post.'));
      // 这个感叹号让我找了又找，颜色，还是没有逻辑去判断！Pig
      if(!IS_AJAX) halt('您不是合法用户');
      $data=array(
 			'username'=>I('username'),
 			'content'=>I('content'),
 			'time'=>time()
 			);
 		//p($data);
 		/*$phiz=array(
                    'zhuakuang'=>抓狂,
					   'baobao'=>抱抱,
					   'haixiu'=>害羞,
                           'ku'=>酷,
					     'xixi'=>嘻嘻,
					'taikaixin'=>太开心,
					  'touxiao'=>偷笑,
					      'qian'=>钱,
					    'huaxin'=>花心,
					     'jiyan'=>挤眼,
 			);
           F('phiz',$phiz,'./Data/');*/
       /*$phiz=F('phiz','','./Data/');
       p($phiz);*/
      // $this->ajaxReturn(array('status'=>0),'json');
      
      //replace_phiz($data['content']);

  
       if($id=M('wish')->data($data)->add()){
        //Fuck!这里不用加=，妈的，害我找那么久！！用点逻辑好不好！！！
        $data['id']=$id;
        $data['content']=replace_phiz($data['content']);
        $data['time']=date('y-m-d H:i',$data['time']);
        $data['status']=1;
        $this->ajaxReturn($data,'json');
       }else{
        $this->ajaxReturn(array('status'=>0),'json');
        }

      
  	}
  }
?>