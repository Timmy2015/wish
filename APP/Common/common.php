<?php
 
 /* function p ($array) {
    dump($array, 1, '<pre>', 0);
  }*/
  
 //这个好！好牛逼啊，怎么写出来可以解决我的问题了，真是有高手啊
  function p($array){
     if(is_array($array)){
          echo '<pre>';
          print_r($array);
     }else{
          var_dump($array);
     }
}

//有小瑕疵
/*function p($arr){
        echo '<pre>';
        var_dump($arr);
        echo '</pre>';
    }*/
  /*
  发布内容表情替换
   */
  function replace_phiz($content){
    preg_match_all('/\[.*?\]/is',$content,$arr);
    //p($arr);
//}

    if($arr[0]){
    	$phiz=F('phiz','','./Data/');
    	foreach ($arr[0] as $v){
    		foreach($phiz as $key=>$value){
    			if($v=='['.$value.']'){
    				$content=str_replace($v,'<img src="' .__ROOT__.'
    					/Public/Images/phiz/'.$key.'.gif"/>', $content);
    			   break;
          }
    		}
    	}
    }
    return $content;
  }
?>