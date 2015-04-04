<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>标准样品-泉州标准化协会</title>
	<!-- <link rel="shortcut icon" href="/qzas/Public/images/icon.png" type="image/x-icon"> -->
<link rel="stylesheet" href="/qzas/Public/bootstrap/css/bootstrap.min.css">
<!-- <link href="/qzas/Public/css/flat-ui.css" rel="stylesheet"> -->
<!-- <link rel="stylesheet" href="/qzas/Public/css/animate.css"> -->
<!-- <link rel="stylesheet" href="/qzas/Public/css/Home/common.css"> -->
	<link rel="stylesheet" href="/qzas/Public/Home/css/common.css">
	<link rel="stylesheet" href="/qzas/Public/Home/css/code.css">
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