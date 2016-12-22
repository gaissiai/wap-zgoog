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
                    <a href="<?php echo U('Activity/singleproduct');?>" id="authority2" class="MenuSubButton">单品活动设置</a>
                    <a id="authority3" class="MenuSubButton" style="color: #aaaaaa;">商品兑换查询</a>

                    <a href="javascript:void(0);" id="authorityGroup2" class="MenuButton">会员管理</a>
                    <a href="<?php echo U('Member/lists');?>" id="authority6" class="MenuSubButton">会员列表</a>
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
                        
	<style>
		.uplode{
			width: 80px;
			height: 25px;
			margin-top: 20px;
		}
		.disnone{
			display: none;
		}
	</style>
	<script>
	    <?php if(!empty($_COOKIE['hint'])){ echo 'alert("'.$_COOKIE['hint'].'")'; cookie('hint',null); }?>
	</script>
    
    <div id="PageTitle">按钮管理</div>
	<table cellspacing="0" cellpadding="3" rules="cols" style="color:Black;background-color:White;border-color:#999999;border-width:1px;border-style:Solid;width:80%;border-collapse:collapse;border:1px solid #555">
		<tbody>
			<tr style="color:White;background-color:Black;font-weight:bold;" >
				<th scope="col">id</th>
				<th scope="col" width=60>标题</th>
				<th scope="col">内容</th>
				<th scope="col">排序</th>
				<th scope="col" width=130>是否上线</th>
				<th scope="col">最后更新时间</th>
				<th>删除</th>
				<th>提交</th>
			</tr>

			

			<?php if(is_array($list)): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr <?php echo ($k=='0'||$k%2=='') ?'style="background-color:#ddd"':''; ?>>
					<form method="post" enctype="multipart/form-data" action="<?php echo U('Index/SubmitInform');?>">
					<input type="hidden" name='type'value="3">
					<input type="hidden" name='id' value="<?php echo ($vo["id"]); ?>">
					<td><?php echo ($vo["id"]); ?></td>
					<td>
						<input type="text" name="title" value="<?php echo ($vo["title"]); ?>">
					</td>
					<td><textarea name='content'><?php echo ($vo["content"]); ?></textarea></td>
					<td><input type="number" style="width:50px" name='sort' value="<?php echo ($vo["sort"]); ?>"></td>
					<td>否<input type="radio"checked <?php echo $vo['is_on']=='0'?'checked':'';?> name="is_on" value="0">&nbsp;&nbsp;&nbsp;是<input type="radio" <?php echo $vo['is_on']=='1'?'checked':'';?> name="is_on" value="1"> </td>

					<td align="center">
		               	<?php echo ($vo["updatetime"]); ?>
		            </td>
		            <td width="40px"><input type="checkbox" name='deleted' value="1"></td>
		            <td><button>提交</button></td>
		            </form>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>

			<tr class="add_div" style="opacity:0;">
				<form method="post" enctype="multipart/form-data" action="<?php echo U('Index/SubmitInform');?>" >
				<input type="hidden" name='type'value="3">
				<td></td>
				<td >
					<input type="text" name="title" >
				</td>
				<td><textarea name="content"></textarea></td>
				<td><input type="number" style="width:50px" name='sort' value="50"></td>
				<td>否<input type="radio" checked  name="is_on" value="0">&nbsp;&nbsp;&nbsp;是<input type="radio" name="is_on" value="1"> </td>
	            <td width="40px"></td>
	            <td></td>
	            <td><button>提交</button></td>
	            </form>
			</tr>

			<?php if($page != "<div>    </div>"): ?>
				<tr style="border:1px solid #111">
					<td colspan='9'><div id='page' style='text-align:right'><?php echo ($page); ?></div></td>
				</tr>
			<?php endif;?>
		</tbody>
	</table>
	<br>
	<button class="add_but">新增</button>
	

	<script type="text/javascript">
		var add='0';

		$('.add_but').click(function(){
			if (add=='1') {
				alert('只能逐个添加');
				return false;
			};

			$('.add_div').css('opacity','1');
			add='1';
		})
	</script>



                    </div>
                </td>
            </tr>
        </tbody></table>
    </div>
    <div id="Footer">
        ©2013 LeClub, All Rights Reserved
    </div>

</body></html>