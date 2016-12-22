<?php
namespace Admin\Controller;
class IndexController extends CommonController {
    public function index(){ 
    	$this->display();
    }
    public function Pic(){
    	$this->quiry('index',array('deleted'=>'0','type=1'),'pic,sort,id,is_on,updatetime,link_url','sort asc,id desc');
    	
    	$this->display();
    }
    public function Submit(){
       
        $id=I('post.id/d');
        $sort=I('post.sort/d');
        $deleted=I('post.deleted/d');
        $is_on=I('post.is_on/d');
        $link_url=I('post.link_url');
        $type=I('post.type/d');
        $text=I('post.text');
        if (empty($sort) || empty($type)) {
            $this->error('排序不能为空');
        }
        $pic_v='';
        if ($_FILES['file']['error']=='0') {
            $info=$this->Uploads($_FILES['file']);
            $pic_v=$info['savepath'].$info['savename'];
        }else if ($_FILES['file']['error']!='4') {
            $this->error('上传失败');
        }
        
        if (empty($id)) {
            if (empty($pic_v)) {
                $this->error('图片必填');
            }
            $val=array(
                'sort'=>$sort,
                'deleted'=>$deleted,
                'is_on'=>$is_on,
                'pic'=>$pic_v,
                'link_url'=>$link_url,
                'type'=>$type,
                'text'=>$text,
                'updatetime'=>date('Y-m-d H:i:s'),
                'createtime'=>date('Y-m-d H:i:s'),
                );
            M('index')->add($val);
            
        }else{
            $val=array(
                'sort'=>$sort,
                'deleted'=>$deleted,
                'is_on'=>$is_on,
                'text'=>$text,
                'link_url'=>$link_url,
                'updatetime'=>date('Y-m-d H:i:s'),
                );

            if (!empty($pic_v)) {
                $val['pic']=$pic_v;
            }
            M('index')->where(array('id'=>$id))->save($val);
        }
        $this->success('提交成功');
    }
    

    //导航按钮
    public function Button(){
        $this->quiry('index',array('deleted'=>'0','type'=>'2'),'pic,sort,id,is_on,updatetime,link_url,text','sort asc,id desc','2');
        $this->display();
    }

    //专题
    public function Topic(){
        $this->quiry('index',array('deleted'=>'0','type'=>'3'),'pic,sort,id,is_on,updatetime,link_url','sort asc,id desc','2');
        $this->display();
    }

    //热门职位推荐
    public function Inform(){
        $this->quiry('inform',array('deleted'=>'0'),'title,id,content,updatetime,sort','sort asc,id desc');
        $this->display();
    }
    public function SubmitInform(){
        $id=I('post.id/d');
        $content=I('post.content');
        $title=I('post.title');
        $deleted=I('post.deleted/d');
        $sort=I('post.sort/d');
        empty($title)?$this->error('标题不能为空'):'';
        empty($content)?$this->error('内容不能为空'):'';
        empty($sort)?$this->error('排序不能为空'):'';
        $v=array(
            'title'=>$title,
            'content'=>$content,
            'sort'=>$sort,
            'deleted'=>$deleted,
            'updatetime'=>date('Y-m-d H:i:s'),
            );
        if (empty($id)) {
            $v['createtime']=date('Y-m-d H:i:s');
            M('inform')->add($v);
        }else{
            M('inform')->where(array('id'=>$id))->save($v);
        }
        $this->success('提交成功');
    }

}