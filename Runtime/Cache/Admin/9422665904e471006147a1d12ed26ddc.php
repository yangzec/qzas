<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>评论</title>
	<!-- <link rel="shortcut icon" href="/qzas/Public/images/icon.png" type="image/x-icon"> -->
<link rel="stylesheet" href="/qzas/Public/bootstrap/css/bootstrap.min.css">
<!-- <link href="/qzas/Public/css/flat-ui.css" rel="stylesheet"> -->
<!-- <link rel="stylesheet" href="/qzas/Public/css/animate.css"> -->
<!-- <link rel="stylesheet" href="/qzas/Public/css/Home/common.css"> -->
	<link rel="stylesheet" href="/qzas/Public/Admin/css/common.css">
	<link rel="stylesheet" href="/qzas/Public/Admin/css/comment.css">
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
			<table class="comment_list">
		 		<thead>
		 			<tr>
		 				<th class="check">审批</th>
			 			<th class="author">作者</th>
			 			<th class="comment">评论</th>
			 			<th class="post">文章</th>
		 			</tr>
		 		</thead>
		 		<tfoot>
		 			<tr>
		 				<th class="check">审批</th>
			 			<th class="author">作者</th>
			 			<th class="comment">评论</th>
			 			<th class="post">文章</th>
		 			</tr>
		 		</tfoot>
		 		<tbody>
		 			<?php if(is_array($comment)): foreach($comment as $k=>$vo): ?><tr>
							<td><?php if(($vo["comment_approved"] == 0)): ?><a class="approve" href="<?php echo U('Comment/approve',array('cid'=>$vo['comment_id']));?>">批准</a><?php else: ?><a class="cancel" href="<?php echo U('Comment/cancel',array('cid'=>$vo['comment_id']));?>">撤销</a><?php endif; ?></td>
							<td><?php echo ($vo["comment_author"]); ?></td>
							<td>提交于<?php echo ($vo["comment_date"]); ?><br><?php echo ($vo["comment_content"]); ?></td>
							<td><a href="/qzas/index.php/Index/post/pid/<?php echo ($vo['post_id']); ?>"><?php echo ($vo["post_title"]); ?></a></td>
			 			</tr><?php endforeach; endif; ?>		 			
		 		</tbody>
		 	</table>
		 	<?php echo ($page); ?>
		</div>		
<script src="/qzas/Public/js/jquery/jquery-min.js"></script>
<script src="/qzas/Public/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="/qzas/Public/js/jquery-ui.js"></script> -->
</body>
</html>