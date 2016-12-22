<?php
//商品活动
namespace Admin\Controller;
class ActivityController extends AdminController {
	public function _initialize(){
		parent::_initialize();
		if ($_SESSION['login']['admin']['productactivity']!='1') {
			cookie('hint','无权限访问');
			$this->redirect('Index/index');
		}
	}
	public function index(){
		$product=M('product')->where('productcategoryid="6" and isdelete!="1"')->field('id,productname,currentavailable,description,imagemassive1,imagemassive2,imagemassive3,imagemassive4,imagemassive5,endtime,starttime')->limit('1')->select();
		if (empty($product)) {
			cookie('hint','活动商品不存在，请先添加活动商品');
 			$this->redirect('Product/lists');
		}
		$activity_where['activityid']=$product[0]['id'];
		//$activity_where['isdelete']='0';
		$activity=M('productactivity')->where($activity_where)->order('id')->field('id,productno,skuid,isdelete')->select();
		$list=M('product')->where('isdelete!="1" and currentavailable="1" and  skunumber is not null and productcategoryid!="6"')->field('productno')->select();
		$attr=M('attribute')->where('productid='.$product[0]['id'])->field('inventory,conversionintegral,sale,id')->select();
		$this->assign('attr',$attr[0]);
		$this->assign('activity',$activity);
		$this->assign('product',$product[0]);
		$this->assign('list',$list);
		$this->display();
	}
	//获取sku信息
	public function productno_sel(){
		$product=M('product')->where('productno='.$_GET['id'])->field('productname,id,imageful1,fullurl,skunumber,attroptionname1,attroptionname2,attroptionname3,attroptionname4,attroptionname5')->select();
		$sku_where['number']=$product[0]['skunumber']=='0'?'0':'1';
		$sku_where['productid']=$product[0]['id'];
		$sku_where['skudelete']='0';
		$sku=M('attribute')->where($sku_where)->field('id,attrtypeid1,attrtypeid2,attrtypeid3,attrtypeid4,attrtypeid5,conversionintegral')->select();
		if ($product[0]['skunumber']!="0") {
			foreach ($sku as $value) {
				for($i=1;$i<6;$i++){
					if (!empty($value['attrtypeid'.$i])) {
						$typeid.=','.$value['attrtypeid'.$i];
					}
				}
			}
			$typeid=ltrim($typeid,',');
			$skutype=M('skutype')->where("id in ($typeid)")->select();
		}else{
			$skutype[0]=array('id'=>"0");
		}
		$data=array('product'=>$product[0],'sku'=>$sku,'skutype'=>$skutype);
		$this->ajaxReturn($data);
	}
	//添加活动/修改
	public function activity_add(){
		//验证
		
		for ($i=1; $i <=$_GET['number'] ; $i++) { 
			if (empty($_GET['productno'.$i])) {
				$emp+=1;
			}
			if (empty($_GET['skuid'.$i]) && !empty($_GET['productno'.$i])) {
				cookie('hint','商品sku必选');
				redirect($_SERVER['HTTP_REFERER']);
			}
			for ($a=$i+1; $a <=$_GET['number'] ; $a++) { 
				if ($_GET['skuid'.$i]==$_GET['skuid'.$a]) {
					cookie('hint','活动商品不能重复');
					redirect($_SERVER['HTTP_REFERER']);
				}
			}
		}
		if ($emp==$_GET['number']) {
			cookie('hint','商品不能为空');
			redirect($_SERVER['HTTP_REFERER']);
		}
		
		//商品表
		$pro_where['id']=$_GET['activityid'];
		$pro_val=array('currentavailable'=>$_GET['currentavailable']=='1'?'1':'0','productname'=>$_GET['productname'],'endtime'=>strtotime($_GET['endtime']),'starttime'=>strtotime($_GET['starttime']),'skunumber'=>'0');
		if (M('product')->where($pro_where)->save($pro_val)>0) {
			$hint.='商品表更新成功  ';
		}else{
			$hint.='商品表更新成功  ';
		}
		//sku表
		if (empty($_GET['attrid'])) {
			$attr_val=array('conversionintegral'=>$_GET['activityconversionintegral'],'inventory'=>$_GET['inventory'],'number'=>'0','productid'=>$_GET['activityid']);
			if (M('attribute')->add($attr_val)>0) {
				$hint.='sku表添加成功  ';
			}else{
				$hint.='sku表添加失败  ';
			}
		}else{
			$attr_val=array('conversionintegral'=>$_GET['activityconversionintegral'],'inventory'=>$_GET['inventory'],'number'=>'0');
			if (M('attribute')->where('id='.$_GET['attrid'])->save($attr_val)>0) {
				$hint.='sku表修改成功  ';
			}else{
				$hint.='sku表修改失败  ';
			}
		}
		//活动表
		for ($i=1; $i <=$_GET['number'] ; $i++) { 
			if (!empty($_GET['skuid'.$i])) {
				if (empty($_GET['activityid'.$i]) && empty($_GET['isdelete'.$i])) {
					$val[]=array('productno'=>$_GET['productno'.$i],'skuid'=>$_GET['skuid'.$i],'activityid'=>$_GET['activityid']);
				}else{
					$acti_val['productno']=$_GET['productno'.$i];
					$acti_val['skuid']=$_GET['skuid'.$i];
					$acti_val['activityid']=$_GET['activityid'];
					$acti_val['isdelete']=empty($_GET['isdelete'.$i])?'0':'1';

					$acti['id']=$_GET['activityid'.$i];

					if (M('productactivity')->where($acti)->save($acti_val)>0) {
						$success+=1;
					}else{
						$error+=1;
					}
				}
			}
		}
		if (M('productactivity')->addAll($val)>0) {
			$hint.='活动表添加成功';
		}else{
			$hint.='活动表添加失败';
		}
		!empty($success)? $hint.= '  成功修改'.$success.'条' :'';
		!empty($error)? $hint.= '  修改失败'.$error.'条' :'';
		cookie('hint',$hint);
		redirect($_SERVER['HTTP_REFERER']);
	}
	//其他活动
	public function singleproduct(){
		$list=M('product pro,lp_singleproduct sin')->where('pro.id=sin.productid')->field('sin.id,pro.productname,pro.productno,pro.imageful1,pro.fullurl,pro.currentavailable as proble,sin.currentavailable')->order('sin.id')->select();
		$productno=M('product')->where('isdelete!=1 and skunumber is not null')->field('id,productno')->order('id')->select();
		$this->assign('productno',$productno);
		$this->assign('list',$list);
		$this->display();
	}
	//活动修改
	public function singleproduct_upl(){
		
		if ($_GET['productid']=='0') {
			cookie('hint','数据不能为空');
			$this->redirect('singleproduct');
		}
		
		$where['id']=$_GET['id'];
		$set['productid']=$_GET['productid'];
		
		if (M('singleproduct')->where($where)->save($set)>0) {
			cookie('hint','修改成功');
			$this->redirect('singleproduct');
		}else{
			cookie('hint','修改删除');
			$this->redirect('singleproduct');
		}
	}
	//活动下线
	public function singleproduct_currentavailable(){

		if ($_GET['productno']=='0') {
			cookie('hint','数据不能为空');
			$this->redirect('singleproduct');
		}
		$where['id']=$_GET['id'];
		$set['currentavailable']=$_GET['currentavailable'];
		
		if (M('singleproduct')->where($where)->save($set)>0) {
			cookie('hint','修改成功');
			$this->redirect('singleproduct');
		}else{
			cookie('hint','修改删除');
			$this->redirect('singleproduct');
		}
	}
}