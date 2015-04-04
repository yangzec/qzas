<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>资讯动态-泉州标准化协会</title>
	<!-- <link rel="shortcut icon" href="/qzas/Public/images/icon.png" type="image/x-icon"> -->
<link rel="stylesheet" href="/qzas/Public/bootstrap/css/bootstrap.min.css">
<!-- <link href="/qzas/Public/css/flat-ui.css" rel="stylesheet"> -->
<!-- <link rel="stylesheet" href="/qzas/Public/css/animate.css"> -->
<!-- <link rel="stylesheet" href="/qzas/Public/css/Home/common.css"> -->
	<link rel="stylesheet" href="/qzas/Public/Home/css/common.css">
	<link rel="stylesheet" href="/qzas/Public/Home/css/news.css">
</head>
<body>
	<div id="header" class="wrapper">
		<div class="toplink">

		</div>
		<div class="nav">
			<ul>
				<?php if(is_array($nav)): foreach($nav as $k=>$vo): ?><li>
						<a <?php if(($vo["url"] == '')): ?>href="/qzas/index.php/Index/<?php echo ($vo["navigation_url"]); ?>"<?php else: ?>href="<?php echo ($vo["url"]); ?>"<?php endif; ?>><?php echo ($vo["category_name"]); ?></a>
					</li><?php endforeach; endif; ?>
			</ul>
		</div>
	</div>
	<div id="container" class="wrapper">
		
		<div class="subnav">			
			<div class="general">
				<div class="title">
					协会概况
				</div>
				<ul>
					<li><a href="">协会简介</a></li>
					<li><a href="">协会章程</a></li>
					<li><a href="">组织机构</a></li>
					<li><a href="">交通位置图</a></li>
				</ul>
			</div>
			<div class="secretary">
				<div class="title">
					秘书处
				</div>
				<ul>
					<li><a href="">行政部</a></li>
					<li><a href="">标准咨询处</a></li>
					<li><a href="">编码服务部</a></li>
					<li><a href="">标准培训部</a></li>
					<li><a href="">项目合作部</a></li>
				</ul>
			</div><!-- 
			<div class="branch">
				<div class="title">
					标准分会
				</div>
				<ul>
					<li><a href="">纺织服装标准分会</a></li>
					<li><a href="">制鞋皮革标准分会</a></li>
					<li><a href="">机械电子标准分会</a></li>
					<li><a href="">化工塑料标准分会</a></li>
					<li><a href="">食品包装标准分会</a></li>
					<li><a href="">条码技术与应用分会</a></li>
					<li><a href="">墙体材料标准分会</a></li>
				</ul>
			</div> -->
		</div>
		<div class="content">
			<div class="title">
				资讯动态
			</div>			
	 		<ul class="news_list">
	 			<?php if(is_array($posts)): foreach($posts as $k=>$vo): ?><li><a href="<?php echo U('Index/post',array('pid'=>$vo['post_id']));?>"><?php echo ($vo["post_title"]); ?><span class="time"><?php echo (date('Y-m-d H:i:s',$vo["post_date"])); ?></span></a></li><?php endforeach; endif; ?>	
	 		</ul>
		</div>
 		<div class="page"><?php echo ($Page); ?></div>
	</div>

	<div id="footer" class="wrapper">
		主管单位：泉州市科协技术协会		协作单位：泉州市标准化研究所		国际标准组织	ISO	IEC	ITU	CAC	ASTM	JIS	DIN	EN <br>
		<?php echo date("Y年m月d日",time());?>	泉州市标准化协会	版权所有		ICP备案号：<?php echo $icp=M('setting')->where(array('key'=>'icp'))->select()[0]['value'];?>		地址：		邮政编码
	</div>
	<script src="/qzas/Public/js/jquery/jquery-min.js"></script>
<script src="/qzas/Public/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="/qzas/Public/js/jquery-ui.js"></script> -->
</body>
</html>