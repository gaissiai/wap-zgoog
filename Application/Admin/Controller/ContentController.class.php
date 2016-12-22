<?php
namespace Admin\Controller;
class ContentController extends CommonController {
	public function ZhaokaoList(){
		//$this->quiry('classify',array('deleted'=>'0'),'id,level,name,sort','sort asc,id desc');
		$_GET['p']=empty($_GET['p'])?'1':$_GET['p'];
		$data=M('classify')->where(array('deleted'=>'0','level'=>'0'))->field('id,level,name,sort,is_on,updatetime')->order('sort asc,id desc')-> page($_GET['p'].',2')->select();

		$count = M('classify')->where(array('deleted'=>'0','level'=>'0'))->count();
		$Page = new \Think\Page($count,'2');
		$show = $Page->show();
		$this-> assign('page',$show);

		foreach ($data as $key => $value) {

			$data[$key]['data']=M('classify')->where(array('deleted'=>'0','level'=>$value['id']))->field('id,level,name,sort,is_on,updatetime')->order('sort asc,id desc')->select();
		}
		$this->assign('data',$data);
    	$this->display();
	}
	public function Zhaokaodet(){
		$id=I('get.id/d');
		$type=I('get.type/d');
		if (empty($type)) {
			$this->error('非法访问');
		}
		$level=$data=array();

		if ($type=='2') {
			$level=M('classify')->where(array('deleted'=>'0','level'=>'0'))->select();
		}
		if (!empty($id)) {
			$data=M('classify')->where(array('deleted'=>'0','id'=>$id))->find();
		}
		$this->assign('id',$id);
		$this->assign('type',$type);
		$this->assign('level',$level);
		$this->assign('data',$data);
		$this->display();
	}
	public function ZhaokaoSubmit(){
		$id=I('post.id/d');
		$type=I('post.type/d');
		$name=I('post.name');
		$sort=I('post.sort/d');
		$level=I('post.level/d');
		$is_on=I('post.is_on/d');
		!empty($name)?'':$this->error('名称必填');
		!empty($sort)?'':$this->error('排序必填');
		$type=='2'&&empty($level)?$this->error('父级必选'):'';
		if (empty($type)) {
			$this->error('参数错误');
		}
		$v=array(
			'level'=>$level,
			'name'=>$name,
			'sort'=>$sort,
			'is_on'=>$is_on,
			);
		if (empty($id)) {
			$v['createtime']=date('Y-m-d H:i:s');
			M('classify')->add($v);
		}else{
			$v['updatetime']=date('Y-m-d H:i:s');
			M('classify')->where(array('id'=>$id))->save($v);
		}
		$this->success('提交成功',U('Content/ZhaokaoList'));
	}
	//招考资讯文字列表
	public function ZhaokaoCont(){
		$this->quiryjoin('information i',array('left join zg_classify c on c.id=i.type'),array('i.deleted'=>'0'),'i.title,i.id,i.content,i.updatetime,i.sort,c.name as type_name','i.sort asc,i.id desc');
        $this->display();
	}

	public function actionZhaokaoContdet(){
		$id=I('post.id/d');
		if (!empty($id)) {
			$data=M('information')->where(array('id'=>$id))->select();
			$this->assign($data);
		}
		$this->display();
	}

}