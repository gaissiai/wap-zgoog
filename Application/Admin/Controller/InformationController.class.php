<?php
//消息管理页
namespace Admin\Controller;
class InformationController extends AdminController {
	public function _initialize(){
		parent::_initialize();
		if ($_SESSION['login']['admin']['memberinformation']!='1') {
			cookie('hint','无权限访问');
			$this->redirect('Index/index');
		}
	}
	//消息页
	public function index(){
		$_GET['p']=empty($_GET['p'])?'1':$_GET['p'];
		$page='10';
		$information = M ('information');
		$list=$information->order('id desc')-> page($_GET['p'].','.$page)-> select();
		$this-> assign('list',$list);
		$count = $information-> count();
		$Page = new \Think\Page($count,$page);
		$show = $Page->show();
		$this-> assign('page',$show);
 		$this->display();
	}
	//查看发送用户
	public function cate_alter(){
		if (empty($_GET['recipientsid'])) {
			cookie('hint','非法操作');
			$this->redirect('Index/index');
		}
		$where['recipientsid']=$_GET['recipientsid'];
		$_GET['p']=empty($_GET['p'])?'1':$_GET['p'];
		$page='10';
		$recipients = M('recipients');
		$list=$recipients->where($where)->order('id desc')-> page($_GET['p'].','.$page)-> select();
		//echo $User->getLastSql();
		$this-> assign('list',$list);
		$count = $recipients->where($where)-> count();
		$Page = new \Think\Page($count,$page);
		$show = $Page->show();
		$this-> assign('page',$show);
		$this->display();
	}
	//发送消息页
	public function release(){
		
		$this->display();
	}
	//发送消息
	public function release_int(){
		if (empty($_POST['title']) || empty($_POST['content'])) {
			cookie('hint','请填写补全信息');
			redirect($_SERVER['HTTP_REFERER']);
		}
		$val=array('content'=>$_POST['content'],'title'=>$_POST['title'],'informationtype'=>$_POST['informationtype'],'departuretime'=>date('Y-m-d H:i:s'));
		$recipientsid=M('information')->add($val);
		
		if ($recipientsid>0) {
			$memberno=M('member')->where('status=1')->field('id,contactname')->select();
			foreach ($memberno as $value) {
				$recipients[]=array('memberno'=>$value['id'],'contactname'=>$value['contactname'],'recipientsid'=>$recipientsid);	
			}
			
			if (M('recipients')->addAll($recipients)>0) {
				cookie('hint','消息发送成功');
				$this->redirect('index');
			}else{
				cookie('hint','消息发送失败');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}else{
			cookie('hint','消息发送失败');
			redirect($_SERVER['HTTP_REFERER']);
		}
		
	}
	//积分赠送信息
	public function integralpresentation(){
		$_GET['p']=empty($_GET['p'])?'1':$_GET['p'];
		$page='20';
		$integralpresentation = M('integralpresentation');
		$list=$integralpresentation->order('id desc')-> page($_GET['p'].','.$page)-> select();
		$count = $integralpresentation-> count();
		$Page = new \Think\Page($count,$page);
		$show = $Page->show();
		$this-> assign('page',$show);

		foreach ($list as $value) {
			if (!in_array($value['memberphone'],$phones)) {
				$phone.=','.$value['memberphone'];
				$phones[]=$value['memberphone'];
			}
			if (!in_array($value['bememberphone'],$phones)) {
				$phone.=','.$value['bememberphone'];	
				$phones[]=$value['bememberphone'];
			}
			
		}
		if (!empty($phone)) {
			$phone=ltrim($phone,',');
			$member=M('member')->where("phone in ($phone)")->field('contactname,phone')->order('id desc')->select();
		}
		foreach ($list as $key => $value) {
			foreach ($member as $val) {
				if ($value['memberphone']==$val['phone']) {
					$list[$key]['membername']=$val['contactname'];
				}
				if ($value['bememberphone']==$val['phone']) {
					$list[$key]['bemembername']=$val['contactname'];
				}
			}
		}
		$this->assign('list',$list);
		$this->display('integralpresentation');
	}
}