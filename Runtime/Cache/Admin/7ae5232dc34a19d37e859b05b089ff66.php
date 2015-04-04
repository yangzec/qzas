<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>文章</title>
	<!-- <link rel="shortcut icon" href="/qzas/Public/images/icon.png" type="image/x-icon"> -->
<link rel="stylesheet" href="/qzas/Public/bootstrap/css/bootstrap.min.css">
<!-- <link href="/qzas/Public/css/flat-ui.css" rel="stylesheet"> -->
<!-- <link rel="stylesheet" href="/qzas/Public/css/animate.css"> -->
<!-- <link rel="stylesheet" href="/qzas/Public/css/Home/common.css"> -->
	<link rel="stylesheet" href="/qzas/Public/Admin/css/common.css">
	<link rel="stylesheet" href="/qzas/Public/Admin/css/post.css">
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
			<!-- <a class="btn btn-info" href="<?php echo U('Post/postNews');?>">发布新文章</a> -->
			<!-- <a class="btn btn-info" href="<?php echo U('Post/editAbout');?>">修改概况</a> -->
			<a class="btn btn-info" href="<?php echo U('Post/index');?>">文章</a>
			<div class="pagination-links"><?php echo ($page); ?></div>
		 	<table>
		 		<thead>
		 			<tr>
			 			<th class="title">标题</th>
			 			<th class="category">分类</th>
			 			<th class="comment">评论</th>
			 			<th class="author">作者</th>
			 			<th class="date">日期</th>
			 			<th class="modified">更新日期</th>
			 			<th class="count">访问量</th>
		 			</tr>
		 		</thead>
		 		<tfoot>
		 			<tr>
			 			<th>标题</th>
			 			<th>分类</th>
			 			<th>评论</th>
			 			<th>作者</th>
			 			<th>日期</th>
			 			<th>更新日期</th>
			 			<th>访问量</th>
		 			</tr>
		 		</tfoot>
		 		<tbody>
		 			<?php if(is_array($posts)): foreach($posts as $k=>$vo): ?><tr id="post-<?php echo ($vo['post_id']); ?>">
							<th class="column-title">
								<a href="<?php echo U('Admin/Post/editPost',array('pid'=>$vo['post_id']));?>"><?php echo ($vo["post_title"]); ?></a>
								<span class="action">
									<span class="edit"><a href="<?php echo U('Admin/Post/editPost',array('pid'=>$vo['post_id']));?>">编辑</a></span>
									<span class="del"><a href="<?php echo U('Admin/Post/delNews',array('pid'=>$vo['post_id']));?>">删除</a></span>
								</span>
							</th>
							<th class="column-category">2</th>
							<th class="column-comment">3</th>
							<th class="column-author">4</th>
							<th class="column-date"><?php echo ($vo["post_date"]); ?></th>
							<th class="column-modified"><?php echo ($vo["post_modified"]); ?></th>
							<th class="column-count"><?php echo ($vo["view_count"]); ?></th>
			 			</tr><?php endforeach; endif; ?>		 			
		 		</tbody>
		 	</table>
		 	<?php echo ($page); ?>
		</div>
	</div>
	<script type="text/javascript" src="/qzas/Public/js/jquery/jquery-min.js">	
	</script>
	<script>
		$('tbody tr').mouseover(function(event) {
			/* Act on the event */
			// alert('helo');
			// $('this').hide();
			$('tbody .action').show();
		});
	</script>
<script src="/qzas/Public/js/jquery/jquery-min.js"></script>
<script src="/qzas/Public/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="/qzas/Public/js/jquery-ui.js"></script> -->
</body>
</html>