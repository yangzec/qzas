<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo ($post['post_title']); ?>-泉州标准化协会</title>
	<!-- <link rel="shortcut icon" href="/qzas/Public/images/icon.png" type="image/x-icon"> -->
<link rel="stylesheet" href="/qzas/Public/bootstrap/css/bootstrap.min.css">
<!-- <link href="/qzas/Public/css/flat-ui.css" rel="stylesheet"> -->
<!-- <link rel="stylesheet" href="/qzas/Public/css/animate.css"> -->
<!-- <link rel="stylesheet" href="/qzas/Public/css/Home/common.css"> -->
	<link rel="stylesheet" href="/qzas/Public/Home/css/common.css">
	<link rel="stylesheet" href="/qzas/Public/Home/css/post.css">
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
		<div class="content">
			<h2 class="post_title">
				<?php echo ($post['post_title']); ?>
			</h2>
			<div class="infos">
				时间：<?php echo (date('Y-m-d h:i:s',$post['post_date'])); ?>
			</div>
			<div class="post_content">
				<?php echo ($post['post_content']); ?>
				<div class="comment">
					<div class="title">评论</div>
					<ul class="comment_list">
						<?php if(is_array($comment)): foreach($comment as $k=>$vo): ?><li>
								<?php echo ($vo["comment_author"]); ?> 于<?php echo ($vo["comment_date"]); ?>留言<br/>
								<div class="comment_content">
									<?php echo ($vo["comment_content"]); ?>
								</div>
							</li><?php endforeach; endif; ?>
					</ul>
					<div class="post_comment">
						<input id="comment_author" type="text" placeholder="用户"><br>
						<input id="comment_authro_email" type="text" placeholder="邮箱"><br>
						<textarea name="comment_content" id="comment_content" cols="30" rows="10"></textarea>
						<input id="post_comment" type="button" value="评论">
					</div>
				</div>
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
	// $("#post_comment").click(function(event) {
	// 	/* Act on the event */
	// 	$.ajax({
	// 		url: '<?php echo U("Index/postComment");?>',
	// 		type: 'POST',
	// 		dataType: 'json',
	// 		data: {comment_author: $('#comment_author').val(),comment_authro_email :$('#comment_authro_email').val(), comment_content:$('#comment_content').val()},
	// 	})
	// 	.success(function() {
	// 		// console.log("success");
	// 		$("<li>"+$('#comment_author').val()+"<br/>"+$('#comment_author').val()+"</li>").appendTo('.comment .comment_list');
	// 	})
	// 	.fail(function() {
	// 		console.log("error");
	// 	})
	// 	.always(function() {
	// 		console.log("complete");
	// 	});
		
	// });
	</script>