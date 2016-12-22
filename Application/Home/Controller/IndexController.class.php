<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function Index(){
        $pic=M('index')->where(array('is_on'=>'1','type'=>'1','deleted'=>'0'))->field('pic,link_url')->limit('6')->order('sort asc,id desc')->select();
        $this->assign('pic',$pic);
       	$this->display();
    }

    public function Zhaokao(){
    	$this->assign('title','招考资讯');
    	$this->assign('daohan','志公教育 > 招考资讯');

       	$this->display('list');
    }

    public function ZhaokaoDet(){
    	//$id=I('id/d');
        $this->assign('data',array(
            'title'=>'2016上半年北京各区公务员招录考试综合成绩(汇总)',
            'daohan'=>'志公教育 > 招考资讯 > 资讯详情',
            'time'=>date('Y-m-d H:i'),
            'content'=>'  2016年上半年北京市公务员招录工作已进入公布综合成绩的阶段了，参加了面试的考生们一定非常关注综合成绩，北京华图小编特汇总各区公务员招录考试综合成绩公告，以供大家参考。在此，北京华图恭喜进入体检的各位考生朋友，没有进入体检范围的考生也不要心灰意冷，还有5月份的二次调剂等着大家呢。<br>
    　　2016年上半年北京市公务员招录工作已进入公布综合成绩的阶段了，参加了面试的考生们一定非常关注综合成绩，北京华图小编特汇总各区公务员招录考试综合成绩公告，以供大家参考。在此，北京华图恭喜进入体检的各位考生朋友，没有进入体检范围的考生也不要心灰意冷，还有5月份的二次调剂等着大家呢。'
            ));
    	

    	$this->display('details');
    }

    public function Tiku(){
    	$this->assign('title','考试题库');
    	$this->assign('daohan','志公教育 > 考试题库');

       	$this->display('list');
    }

    //名师团队
    public function Teacher(){
        $this->assign('title','名师团队');
        $this->assign('daohan','志公教育 > 名师团队');
        $data=M('teacher')->where(array('deleted'=>'0'))->field('name,pic,aptitude,subject')->order('sort asc')->select();
        $this->assign('data',$data);
        $this->display('Teacher');
    }
    //分校
    public function School(){
        $this->assign('title','地市分校');
        $this->assign('daohan','志公教育 > 地市分校');

        $this->display('School');
    }

    //时间
    public function Time(){
        $this->assign('title','时间选择');
        $this->assign('daohan','志公教育 > 时间选择');

        $this->display('Time');
    }
}