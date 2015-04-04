<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>基本</title>
	<!-- <link rel="shortcut icon" href="/qzas/Public/images/icon.png" type="image/x-icon"> -->
<link rel="stylesheet" href="/qzas/Public/bootstrap/css/bootstrap.min.css">
<!-- <link href="/qzas/Public/css/flat-ui.css" rel="stylesheet"> -->
<!-- <link rel="stylesheet" href="/qzas/Public/css/animate.css"> -->
<!-- <link rel="stylesheet" href="/qzas/Public/css/Home/common.css"> -->
	<link rel="stylesheet" href="/qzas/Public/Admin/css/common.css">
	<link rel="stylesheet" href="/qzas/Public/Admin/css/index.css">
 </head>
 <body>
	<div id="header">
		<ul>
			<li><a href="/qzas">QZAS</a></li>
			<li><a href="/qzas">站点</a></li>
		</ul>
		<div class="user">
			你好，<?php echo ($username); ?>，<a href="<?php echo U('Index/logout');?>">退出</a>
		</div>
	</div>
	<div id="container">
		<div class="sidemenu">
			<ul>
				<li><a href="<?php echo U('Index/index');?>">基本</a></li>
				<li><a href="<?php echo U('Post/index');?>">文章</a></li>
				<li><a href="<?php echo U('Comment/index');?>">评论</a></li>
				<!-- <li><a href="<?php echo U('Attach/index');?>">附件</a></li> -->
				<!-- <li><a href="<?php echo U('User/index');?>">用户</a></li> -->
				<li><a href="<?php echo U('Setting/index');?>">设置</a></li>
			</ul>
		</div>
		<div class="operate">			
			<div class="infos">
				上次登陆IP：<?php echo ($ip); ?>
				登陆时间：<?php echo ($last_time); ?>
				<!-- 登陆地址：<?php echo ($username); ?> -->
			</div>
			<div class="recent">
				<div class="title">
					最近发布
				</div>
				<ul>
					<?php if(is_array($posts)): foreach($posts as $k=>$vo): ?><li>
							<a href="<?php echo U('Admin/Post/editPost',array('pid'=>$vo['post_id']));?>"><span class="date"><?php echo ($vo["post_date"]); ?></span><span class="title"><?php echo ($vo["post_title"]); ?></span></a>
						</li><?php endforeach; endif; ?>
				</ul>
			</div>
			<div class="comments">
				<div class="title">最近评论</div>
				<ul>					
					<?php if(is_array($comment)): foreach($comment as $k=>$vo): ?><li>
							由<?php echo ($vo["comment_author"]); ?>发表在<a href="<?php echo U('Admin/Post/editPost',array('pid'=>$vo['post_id']));?>"><?php echo ($vo["post_title"]); ?></a> <br>
							<?php echo ($vo["comment_content"]); ?> <?php if($vo["comment_approved"] == 0): ?><a class="approve" id="comment-<?php echo ($vo["comment_id"]); ?>" href="<?php echo U('Admin/Index/approve_comment',array('cid'=>$vo['comment_id']));?>">批准</a><?php endif; ?>
						</li><?php endforeach; endif; ?>
				</ul>
			</div>
		</div>
	</div>
<script src="/qzas/Public/js/jquery/jquery-min.js"></script>
<script src="/qzas/Public/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="/qzas/Public/js/jquery-ui.js"></script> -->
</body>
</html>