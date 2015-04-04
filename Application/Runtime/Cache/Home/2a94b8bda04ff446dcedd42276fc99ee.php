<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页-泉州标准化协会</title>
	<!-- <link rel="shortcut icon" href="/qzas/Public/images/icon.png" type="image/x-icon"> -->
<link rel="stylesheet" href="/qzas/Public/bootstrap/css/bootstrap.min.css">
<!-- <link href="/qzas/Public/css/flat-ui.css" rel="stylesheet"> -->
<!-- <link rel="stylesheet" href="/qzas/Public/css/animate.css"> -->
<!-- <link rel="stylesheet" href="/qzas/Public/css/Home/common.css"> -->
	<link rel="stylesheet" href="/qzas/Public/Home/css/common.css">
	<link rel="stylesheet" href="/qzas/Public/Home/css/index.css">
</head>
<body>
	<div id="header" class="wrapper">
		<div class="toplink">

		</div>
		<div class="nav">
			<ul>
				<?php if(is_array($nav)): foreach($nav as $k=>$vo): ?><li>
						<!-- <a href="/qzas/index.php/Index/<?php echo ($vo["navigation_url"]); ?>"><?php echo ($vo["category_name"]); ?></a> -->

						<a <?php if(($vo["url"] == '')): ?>href="/qzas/index.php/Index/<?php echo ($vo["navigation_url"]); ?>"<?php else: ?>href="<?php echo ($vo["url"]); ?>"<?php endif; ?>><?php echo ($vo["category_name"]); ?></a>
					</li><?php endforeach; endif; ?>
			</ul>
		</div>
	</div>
	<div id="container" class="wrapper">
		<div class="login">
			<form action="">邮箱登陆入口：<input type="text"><input type="submit" value="登陆"></form>
		</div>
		<div class="subnav">			
			<div class="general">
				<div class="title">
					协会概况
				</div>
				<ul>
<!-- 					<li><a href="">协会简介</a></li>
					<li><a href="">协会章程</a></li>
					<li><a href="">组织机构</a></li>
					<li><a href="">交通位置图</a></li> -->
					<?php if(is_array($jggk)): foreach($jggk as $k=>$vo): ?><li>
							<a href="<?php echo U('Index/about');?>/#cate-<?php echo ($vo["category_id"]); ?>"><?php echo ($vo["category_name"]); ?></a>
						</li><?php endforeach; endif; ?>
				</ul>
			</div>
			<div class="secretary">
				<div class="title">
					秘书处
				</div>
				<ul>
					<!-- <li><a href="">行政部</a></li>
					<li><a href="">标准咨询处</a></li>
					<li><a href="">编码服务部</a></li>
					<li><a href="">标准培训部</a></li>
					<li><a href="">项目合作部</a></li> -->
					<?php if(is_array($msc)): foreach($msc as $k=>$vo): ?><li>
							<a href="<?php echo U('Index/about');?>/#cate-<?php echo ($vo["category_id"]); ?>"><?php echo ($vo["category_name"]); ?></a>
						</li><?php endforeach; endif; ?>
				</ul>
			</div>
			<div class="branch">
				<div class="title">
					标准分会
				</div>
				<ul>
					<!-- <li><a href="">纺织服装标准分会</a></li>
					<li><a href="">制鞋皮革标准分会</a></li>
					<li><a href="">机械电子标准分会</a></li>
					<li><a href="">化工塑料标准分会</a></li>
					<li><a href="">食品包装标准分会</a></li>
					<li><a href="">条码技术与应用分会</a></li>
					<li><a href="">墙体材料标准分会</a></li> -->
					<?php if(is_array($bzfh)): foreach($bzfh as $k=>$vo): ?><li>
							<a href="<?php echo U('Index/about');?>/#cate-<?php echo ($vo["category_id"]); ?>"><?php echo ($vo["category_name"]); ?></a>
						</li><?php endforeach; endif; ?>
				</ul>
			</div>
		</div>
		<div class="content">
			<div class="middle">
				<div class="infos block">
					<div class="title">
						标准资讯
					</div>
					<ul>
						<?php if(is_array($block1)): foreach($block1 as $k=>$vo): ?><li>
								<a href="<?php echo U('Index/post',array('pid'=>$vo['post_id']));?>"><span class="ptime"><?php echo (date('m-d',$vo["post_date"])); ?></span><span class="ptitle"><?php echo ($vo["post_title"]); ?></span></a>
							</li><?php endforeach; endif; ?>
					</ul>
				</div>
				<div class="notice block">
					<div class="title">
						标准公告
					</div>
					<ul>
						<?php if(is_array($block2)): foreach($block2 as $k=>$vo): ?><li>
								<a href="<?php echo U('Index/post',array('pid'=>$vo['post_id']));?>"><span class="ptime"><?php echo (date('m-d',$vo["post_date"])); ?></span><span class="ptitle"><?php echo ($vo["post_title"]); ?></span></a>
							</li><?php endforeach; endif; ?>
					</ul>
				</div>
				<div class="exchange block">
					<div class="title">
						标准法规
					</div>
					<ul>
						<?php if(is_array($block4)): foreach($block4 as $k=>$vo): ?><li>
								<a href="<?php echo U('Index/post',array('pid'=>$vo['post_id']));?>"><span class="ptime"><?php echo (date('m-d',$vo["post_date"])); ?></span><span class="ptitle"><?php echo ($vo["post_title"]); ?></span></a>
							</li><?php endforeach; endif; ?>
					</ul>
				</div>
				<div class=" block">
					<div class="title">
						科技扶持政策
					</div>
					<ul>
						<?php if(is_array($block5)): foreach($block5 as $k=>$vo): ?><li>
								<a href="<?php echo U('Index/post',array('pid'=>$vo['post_id']));?>"><span class="ptime"><?php echo (date('m-d',$vo["post_date"])); ?></span><span class="ptitle"><?php echo ($vo["post_title"]); ?></span></a>
							</li><?php endforeach; endif; ?>
					</ul>
				</div>
				<div class="slogan">
					泉州市实施标准技术战略专业服务平台
				</div>
				<div class="slogan">
					美丽乡村规划建设标准专业服务平台
				</div>
				<div class="cooperate block">
					<div class="title">
						标准合作交流
					</div>
					<ul>
						<?php if(is_array($block6)): foreach($block6 as $k=>$vo): ?><li>
								<a href="<?php echo U('Index/post',array('pid'=>$vo['post_id']));?>"><span class="ptime"><?php echo (date('m-d',$vo["post_date"])); ?></span><span class="ptitle"><?php echo ($vo["post_title"]); ?></span></a>
							</li><?php endforeach; endif; ?>
					</ul>
				</div>
				<div class="services">
					ENA条形码注册应用技术服务平台
				</div>
				<div class="services">
					<a href="http://www.testingdb.cn/trcn/">产品标准测试机构查询与服务</a>
				</div>
				<div class="knowledge block">
					<div class="title">
						标准化知识
					</div>
					<ul>
						<?php if(is_array($block7)): foreach($block7 as $k=>$vo): ?><li>
								<a href="<?php echo U('Index/post',array('pid'=>$vo['post_id']));?>"><span class="ptime"><?php echo (date('m-d',$vo["post_date"])); ?></span><span class="ptitle"><?php echo ($vo["post_title"]); ?></span></a>
							</li><?php endforeach; endif; ?>
					</ul>
				</div>
				<div class="engineer block">
					<div class="title">
						标准工程师论坛
					</div>
					<ul>
						<?php if(is_array($block8)): foreach($block8 as $k=>$vo): ?><li>
								<a href="<?php echo U('Index/post',array('pid'=>$vo['post_id']));?>"><span class="ptime"><?php echo (date('m-d',$vo["post_date"])); ?></span><span class="ptitle"><?php echo ($vo["post_title"]); ?></span></a>
							</li><?php endforeach; endif; ?>
					</ul>
				</div>
			</div>
			<div class="sidebar">
				<div class="block">
					<div class="title">标准在线服务咨询</div>
					<div class="link"><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=5638214&site=qq&menu=yes"><img border="0" src="/qzas/Public/Home/images/counseling_style_53.png" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></div>
				</div>
				<div class="services">标准查新、查询服务</div>
				<div class="services">企业标准编制与服务</div>
				<div class="services">标准翻译专业服务</div>
				<div class="services">标准水平评价服务</div>
				<div class="services">定题项目标准服务</div>
			</div>
		</div>
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
<script>
	$('#pic_news').carousel();
</script>