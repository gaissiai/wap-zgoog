<?php
//登录
namespace Admin\Controller;
use \Think\Controller;

class LoginController extends Controller {
    public function index(){
        $this->display('index');
    }
    //登录
    public function enter(){
        if(empty($_POST['AdminPassword']) || empty($_POST['AdminName'])){
            redirect(U('Login/index'));
        }
        $_POST['adminname']=$_POST['AdminName'];
    	$password=md5($_POST['AdminPassword']);

        $adminname=M('admins')->create();//过滤
        
    	$list=M('admins')->where($adminname)->limit('1')->select();
    	if($list[0]['adminpassword']==$password){
    		unset($list[0]['adminpassword']);
            cookie('hint','登录成功');//提示信息
            cookie('login_success','1');//加时间
    		$_SESSION['zhigoong']['login']['admin']=array('id'=>$list['0']['id'],'name'=>$list[0]['adminname'],'orderinglistingpag'=>$list[0]['orderinglistingpag'],'orderingclassify'=>$list[0]['orderingclassify'],'orderingexchangedemand'=>$list[0]['orderingexchangedemand'],'memberlist'=>$list[0]['memberlist'],'memberexchangedemand'=>$list[0]['memberexchangedemand'],'memberinformationsynchronization'=>$list[0]['memberinformationsynchronization'],'orderdistribute'=>$list[0]['orderdistribute'],'orderrepertory'=>$list[0]['orderrepertory'],'memberexchangestatement'=>$list[0]['memberexchangestatement'],'backstagemember'=>$list[0]['backstagemember'],'productactivity'=>$list[0]['productactivity'],'memberinformation'=>$list[0]['memberinformation']);
    		redirect(U('Index/index'));
    	}else{
            cookie('login_error','1');
    		redirect(U('Login/index'));
    	}
    }
    //退出
    public function quit(){
        unset($_SESSION['zhigoong']['login']['admin']);
        cookie(null);
        redirect(U('Login/index'));
    }
}