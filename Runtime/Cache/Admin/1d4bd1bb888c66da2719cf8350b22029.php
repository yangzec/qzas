<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>附件</title>
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
			<li><a href="">QZAS</a></li>
			<li><a href="./">站点</a></li>
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
				<li><a href="<?php echo U('Attach/index');?>">附件</a></li>
				<li><a href="<?php echo U('User/index');?>">用户</a></li>
				<li><a href="<?php echo U('Setting/index');?>">设置</a></li>
			</ul>
		</div>
	<div class="operate">
		<div class="attach_list">
			<table class="comment_list">
		 		<thead>
		 			<tr>
			 			<th id="name">附件名</th>
			 			<th id="count">下载量</th>
			 			<!-- <th id="post">文章</th> -->
		 			</tr>
		 		</thead>
		 		<tfoot>
		 			<tr>
			 			<th id="name">附件名</th>
			 			<th id="count">下载量</th>
		 			</tr>
		 		</tfoot>
		 		<tbody>
		 			<?php if(is_array($attach)): foreach($attach as $k=>$vo): ?><tr>
							<td><?php echo ($vo["comment_author"]); ?></td>
							<td><?php echo ($vo["comment_content"]); ?></td>
							<!-- <td><?php echo ($vo["comment_post_id"]); ?></td> -->
			 			</tr><?php endforeach; endif; ?>		 			
		 		</tbody>
		 	</table>
		</div>
	</div>
<script src="/qzas/Public/js/jquery/jquery-min.js"></script>
<script src="/qzas/Public/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="/qzas/Public/js/jquery-ui.js"></script> -->
</body>
</html>