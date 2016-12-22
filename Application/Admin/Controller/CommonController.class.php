<?php 
//公共控制器  所有的控制器 继承本控制器
namespace Admin\Controller;

use \Think\Controller;

class CommonController extends Controller{

	public function _initialize(){
		//一定时间不存在，重新登录
		if($_COOKIE['login_success']=='1'){
 			cookie('login_time',time()+3600);//实在不操作时间
 			cookie('login_success',null);
 		}
 		//判断时间是否过期
 		if (!empty($_COOKIE['login_time'])) {
 			if(time() > $_COOKIE['login_time']){
				cookie('login_lose','1');
				cookie(null);
				unset($_SESSION['zhigoong']['login']['admin']);
			}
 		}
 		
 		//未登录跳回首页
 		if(empty($_SESSION['zhigoong']['login']['admin'])){
 			redirect(U('Login/index'));
 		}
 		//重置时间
 		cookie('login_time',time()+1800);
 		
	}
	/*
	*用户信息搜索分页
	*$data str 指定要搜索是表名
	*$wheer array or string 搜索条件
	*$page str 分页显示数
	*$order str 字段排序
	*$field array 指定要显示的字段
	*输出页面 page 分页字符(分页按钮)
	*/
	public function quiry($data,$where,$field,$order,$page=10){
		$_GET['p']=empty($_GET['p'])?'1':$_GET['p'];
		$db = M ($data);
		$list = $db-> where($where)->field($field)->order($order)-> page($_GET['p'].','.$page)-> select();
		$this-> assign('list',$list);
		$count = $db-> where($where)-> count();
		$Page = new \Think\Page($count,$page);
		$show = $Page->show();
		$this-> assign('page',$show);
	}

	public function quiryjoin($data,$join,$where,$field,$order,$page=10){
		$_GET['p']=empty($_GET['p'])?'1':$_GET['p'];
		$db = M ($data);
		$list = $db->join($join)-> where($where)->field($field)->order($order)-> page($_GET['p'].','.$page)-> select();
		$this-> assign('list',$list);
		$count = $db->join($join)-> where($where)-> count();
		$Page = new \Think\Page($count,$page);
		$show = $Page->show();
		$this-> assign('page',$show);
	}

	/*
	*图片上传
	*$array指定上传的图片信息数组
	*/
	public function Uploads($array){
		$upload = new \Think\Upload();// 实例化上传类
		$upload-> maxSize = 3145728 ;// 设置附件上传大小
		$upload-> exts = array('jpg', 'gif', 'png', 'jpeg');
		$upload-> rootPath = './Uploads/';
		$upload-> saveName = array('date','YmdHis'.rand(0,99).rand(0,99));
		$upload-> savePath = 'image/'; 
		$info = $upload-> uploadOne($array);
		if (!$info) {
			$this->error('上传失败');
		}
		return $info;
	}
	/**
     * 缩放图片
     * string $path 图片路径
     * string $name 图片名
     *	string $details 是不是详情图
     * string $key 图像形式  主图还是其它,主图压缩需要指定1,2级主图2
     *处理结束后把原图删了还没做
     **/
  	function zoom($path,$name,$details,$key){
        //图片处理
		$image = new \Think\Image();
		$image-> open('./Public/'.$path.$name);
		$width = $image-> width(); // 返回图片的宽度
		$height = $image-> height(); // 返回图片的高度
		switch ($details) {
			case '1':
				//主图压缩
				if($key=='1'){
					$image-> thumb(360 , $height/($width/360) )-> save('./Public/'.$path.'300-'.$name);
					$image-> thumb(200 , $height/($width/200) )-> save('./Public/'.$path.'150-'.$name);
					@unlink('./Public/'.$path.$name);
				}else{
					//其它主图//暂无功能
					@unlink('./Public/'.$path.$name);
					$image-> thumb(360 , $height/($width/360) )-> save('./Public/'.$path.$name);
				}
				break;
			
			case '2':
				//详情图压缩
				@unlink('./Public/'.$path.$name);//删除原图
				$image-> thumb(350 , $height/($width/350) )-> save('./Public/'.$path.$name);
				break;
			case '3':
				//详情图压缩
				$image-> thumb(345 , 137 ,\Think\Image::IMAGE_THUMB_FIXED )-> save('./Public/'.$path.'694-'.$name);
				@unlink('./Public/'.$path.$name);
				break;
		}
		
    }

    /** 
    *删除图片
    *string $img_path:绝对图片路径
    *string $type:图片类型 1：主图
    *string $img_name:图片名
    **/
     function delimg($img_path,$type,$img_name){
     	switch ($type) {
     		case '1':
        		@unlink($img_path.'300-'.$img_path);
        		@unlink($img_path.'150-'.$img_path);
     			break;
     		
     		default:
     			@unlink($img_path);
     			break;
     	}
    }
    
}