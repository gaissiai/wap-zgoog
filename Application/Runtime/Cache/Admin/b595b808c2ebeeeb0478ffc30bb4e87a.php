<?php if (!defined('THINK_PATH')) exit(); session_start();?>
<!DOCTYPE html>
<!-- saved from url=(0045)http://www.lp-leclub.com/admin/AdminHome.aspx -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>
	志公|后台管理系统
</title>
<meta charset="UTF-8">
<link href="/Public/Admin/css/Default.css" rel="stylesheet" type="text/css">
<script src="/Public/Admin/js/jquery-1.8.0.min.js" type="text/javascript"></script>
<script src="/Public/Admin/js/page.js" type="text/javascript"></script>
</head>
<body>
   
<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['form1'];
if (!theForm) {
    theForm = document.form1;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>
<div class="aspNetHidden">

	<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWAgK9ofbMAwKx5LjAAdyxiRbh2mCS/PUzQZ1020vrzPxQWOZKKDzKxn5MExe3">
</div>
    <div id="Header">
    </div>
    <div id="Content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody><tr>
                <td width="166" bgcolor="#f4f4f4" valign="top">
                    <a href="javascript:void(0);" id="authorityGroup1" class="MenuButton">首页管理</a>
                    <a href="<?php echo U('Index/pic');?>" id="authority1" class="MenuSubButton">轮播图管理</a>
                    <a href="<?php echo U('Index/button');?>" id="authority1" class="MenuSubButton">导航设置</a>
                    <a href="<?php echo U('Index/topic');?>" id="authority2" class="MenuSubButton">专题管理</a>
                    <a href="<?php echo U('Index/inform');?>" id="authority2" class="MenuSubButton">热门职位推荐</a>

                    <a href="javascript:void(0);" id="authorityGroup2" class="MenuButton">内容</a>
                    <a href="<?php echo U('content/lists');?>" id="authority6" class="MenuSubButton">招考资讯</a>
                    <a href="<?php echo U('Member/not_verified',array('status'=>'not_verified'));?>" id="authority6b" class="MenuSubButton">待验证会员列表</a>
                    <a href="<?php echo U('Member/not_verified',array('status'=>'not_registered'));?>" id="authority6a" class="MenuSubButton">未注册会员列表</a>
                    <a href="<?php echo U('Order/lists');?>" id="authority7" class="MenuSubButton">会员订单列表</a>
                    <a href="<?php echo U('Order/lists',array('status'=>'1'));?>" id="authority7a" class="MenuSubButton">待确认订单列表 (<span class="red"><?php echo ($_COOKIE["status2"]); ?></span>)</a>
                    <a href="<?php echo U('Member/synchronization');?>" id="authority8" class="MenuSubButton">会员信息同步</a>
                    <a href="<?php echo U('Information/index');?>" id="authority8" class="MenuSubButton">会员消息表</a>
                    <a href="<?php echo U('Information/integralpresentation');?>" id="authority8" class="MenuSubButton">积分赠送消息表</a>

                    <a href="javascript:void(0);" id="authorityGroup3" class="MenuButton">物流/库存管理</a>
                    <a href="<?php echo U('Order/lists',array('status'=>'3'));?>" id="authority11" class="MenuSubButton">待派发订单列表(<span class="red"><?php echo ($_COOKIE["status1"]); ?></span>)</a>
                    <a href="<?php echo U('Classify/inventory');?>" id="authority12" class="MenuSubButton">库存商品列表</a>
                    <a href="<?php echo U('Logisticscompany/index');?>" id="authority12" class="MenuSubButton">物流公司管理</a>
                    <a href="<?php echo U('Order/lists',array('status'=>'4'));?>" id="authority11" class="MenuSubButton">已派发订单列表</a>

                    <a href="javascript:void(0);" id="authorityGroup4" class="MenuButton">报表统计管理</a>
                    <a href="<?php echo U('Member/points_page');?>" id="authority16" class="MenuSubButton">会员积分报表</a>
                    <a href="<?php echo U('Order/statistics');?>" id="authority16a" class="MenuSubButton">订单统计报表</a>
                    <a href="<?php echo U('Classify/statistics_sku');?>" id="authority16b" class="MenuSubButton">库存统计报表</a>
                    <!-- 销售 -->
                    <a href="javascript:void(0);" id="authorityGroup4" class="MenuButton">销售管理</a>
                    <a href="<?php echo U('Sales/index');?>" id="authority16" class="MenuSubButton">销售人员列表</a>
                    <a href="<?php echo U('Sales/add');?>" id="authority16a" class="MenuSubButton">新增销售人员</a>
                    <a href="<?php echo U('Sales/export_page');?>" id="authority16a" class="MenuSubButton">导出销售人员</a>
                    <a href="<?php echo U('Sales/import_page');?>" id="authority16a" class="MenuSubButton">更新销售人员</a>
                    <!-- 销售 -->
                    <!--博卡-->
                    <a href="javascript:void(0);" id="authorityGroup5" class="MenuButton">博卡管理</a>
                    <a href="<?php echo U('Boka/lists');?>" id="authority21" class="MenuSubButton">会员信息同步</a>
                    <a href="<?php echo U('boka/order_lists');?>" id="authority16a" class="MenuSubButton">订单管理</a>
                    <a href="<?php echo U('Boka/points_page');?>" id="authority21" class="MenuSubButton">用户信息导出</a>
                    <a href="<?php echo U('boka/statistics');?>" id="authority16a" class="MenuSubButton">订单统计报表</a>

                    <a href="javascript:void(0);" id="authorityGroup5" class="MenuButton">后台权限管理</a>
                    <a href="<?php echo U('adminuser/index');?>" id="authority21" class="MenuSubButton">后台用户列表</a>

                    <a href="javascript:void(0);" class="MenuButton">帐户信息</a>
                    <a  class="MenuSubButton" href="<?php echo U('Login/quit');?>">退出登录</a>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </td>
                <td width="10" bgcolor="#ffffff">
                </td>
                <td bgcolor="#f4f4f4" valign="top">
                    <div style="padding-left: 20px; padding-right: 40px; padding-top: 10px; padding-bottom: 40px;">
                        <input type="button" value="返回" style="width: 80px; float:right;" onclick="history.back();">
                        
<script type="text/javascript">
    <?php if(!empty($_COOKIE['hint'])){ echo 'alert("'.$_COOKIE['hint'].'")'; cookie('hint',null); }?>
</script>
	<div id="PageTitle"><span id="ContentPlaceHolder1_MessageTitle">欢迎您回来，<?php echo $_SESSION['zhigong']['login']['admin']['name'];?></span></div>
	<div style="width: 100%; padding-top: 100px; text-align: center; font-size: 16px;">
	    <span id="ContentPlaceHolder1_MessageText">请通过左边栏的菜单来进行您需要的网站或商品管理操作。</span>
	    <br>
	</div>
	<br>


                    </div>
                </td>
            </tr>
        </tbody></table>
    </div>
    <div id="Footer">
        ©2013 LeClub, All Rights Reserved
    </div>

</body></html>