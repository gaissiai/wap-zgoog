<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <link rel="stylesheet" href="/Public/Home/css/common.css" type="text/css"/>
    <link rel="stylesheet" href="/Public/Home/css/style.css" type="text/css"/>   
    <title>无标题</title>
</head>
<script type="text/javascript" src="/Public/Home/js/jquery-1.11.1.min.js"></script>
<body>

<div id='obox'>

	<div id='top_img'>
		<!-- 焦点图 -->
		<div class="id-banner swiper-container swiper-container-horizontal">
			
			<div class="swiper-wrapper" style="width:100%">
				<?php if(is_array($pic)): $key = 0; $__LIST__ = $pic;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($key % 2 );++$key;?><div class="swiper-slide" data-swiper-slide-index="key" style='width:100%'>
				    	<a <?php echo empty($value['link_url'])?'':'href="'.$value['link_url'].'"';?>>
				    		<img class='lunbou_img' src="/Uploads/<?php echo ($value["pic"]); ?>" >
				    	</a>
				    </div><?php endforeach; endif; else: echo "" ;endif; ?>
				
			</div>

			<div class="swiper-pagination">
			</div>
		</div>
	</div>


	<div class='nav'>
		<div class='nav_but'>
			<img src="/Public/Home/img/but-1.png">
			<p class='nva_p'>招考资讯</p>
		</div>
		<div class='nav_but'>
			<img src="/Public/Home/img/but-2.png">
			<p class='nva_p'>课程介绍</p>
		</div>
		<div class='nav_but'>
			<img src="/Public/Home/img/but-3.png">
			<p class='nva_p'>考试题库</p>
		</div>

		<div class='nav_but'>
			<img src="/Public/Home/img/but-4.png">
			<p class='nva_p'>城市分校</p>
		</div>
		<div class='nav_but'>
			<img src="/Public/Home/img/but-5.png">
			<p class='nva_p'>名师团队</p>
		</div>
		<div class='nav_but'>
			<img src="/Public/Home/img/but-6.png">
			<p class='nva_p'>结构优势</p>
		</div>

		<div class='nav_but'>
			<img src="/Public/Home/img/but-7.png">
			<p class='nva_p'>历史成绩</p>
		</div>
		<div class='nav_but'>
			<img src="/Public/Home/img/but-8.png">
			<p class='nva_p'>状元点评</p>
		</div>
		<div class='nav_but'>
			<img src="/Public/Home/img/but-9.png">
			<p class='nva_p'>优惠政策</p>
		</div>
	</div>
	
	<div class='h_div'></div>

	<div class='topic'>
		<div class='topic_v topic_1'>
			<img src="/Public/Home/img/zt-1.jpg">
		</div>
		<div class='topic_v topic_2'>
			<img src="/Public/Home/img/zt-2.jpg">
		</div>
	</div>

	<div id='inform'>
		<div class="inform_t">
			<div class='inform_t_v'>
				<span>热门职位推荐</span>	
			</div>
			
		</div>

		<div class="inform_v">
			<div class="inform_title">
				<p>2016华东公务员职位推荐</p>
			</div>
			<div class="inform_cent">
				<p>上课时间：2016年11月29日-12月6日（7天7晚课程+赠送1天模考，赠食宿，共计8天7晚）</p>
			</div>
		</div>

		<div class="inform_v">
			<div class="inform_title">
				<p>2016华东公务员职位推荐</p>
			</div>
			<div class="inform_cent">
				<p>上课时间：2016年11月29日-12月6日（7天7晚课程+赠送1天模考，赠食宿，共计8天7晚）</p>
			</div>
		</div>

		<div class="inform_v">
			<div class="inform_title">
				<p>2016华东公务员职位推荐</p>
			</div>
			<div class="inform_cent">
				<p>上课时间：2016年11月29日-12月6日（7天7晚课程+赠送1天模考，赠食宿，共计8天7晚）</p>
			</div>
		</div>

		<div class="inform_v">
			<div class="inform_title">
				<p>2016华东公务员职位推荐</p>
			</div>
			<div class="inform_cent">
				<p>上课时间：2016年11月29日-12月6日（7天7晚课程+赠送1天模考，赠食宿，共计8天7晚）</p>
			</div>
		</div>

		<div class="inform_v">
			<div class="inform_title">
				<p>2016华东公务员职位推荐</p>
			</div>
			<div class="inform_cent">
				<p>上课时间：2016年11月29日-12月6日（7天7晚课程+赠送1天模考，赠食宿，共计8天7晚）</p>
			</div>
		</div>
	</div>
	
	<div class='h_div'></div>

	<div id='contact'>
		<div class='contact_v contact_1'>
			<p>成"公"电话</p>
		</div>
		<div class='contact_v contact_2'>
			<p>资讯QQ</p>
		</div>
		<div class='contact_v contact_3'>
			<p>在线报名</p>
		</div>
	</div>

	<div class='bottom'>
		<p>触屏版 电脑版  电话：4006-xxx-xxxx</p>
		<p>Copyright @ 2004-</p>
		<p>志公教育版权所有</p>
	</div>

</div>


</body>
<link rel="stylesheet" href="/Public/Home/css/swiper.min.css">

<script type="text/javascript" src="/Public/Home/js/swiper.min.js"></script>
<script>
	$(function(){
		var swiper = new Swiper('.swiper-container', {
			pagination: '.swiper-pagination',
			paginationClickable: true,
			loop: true,
			autoplay: 4000,
			autoplayDisableOnInteraction: false
		})
	})
</script>

</html>