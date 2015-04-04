<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>设置</title>
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
		<div class="site_name">
			<div class="title">
				站名：
			</div>
			<input id="site_name" type="text" value="<?php echo ($site_name["value"]); ?>">
		</div>		
		<div class="icp">
			<div class="title">
				ICP备案号：
			</div>
			<input id="icp" type="text" value="<?php echo ($icp["value"]); ?>">
		</div>
		<div class="set_navigation">
			<div class="title">首页导航</div>
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<?php if(is_array($nav)): foreach($nav as $k=>$vo): ?><li role="presentation">
						<a href="#<?php echo ($vo["navigation_url"]); ?>" data-toggle="tab"><?php echo ($vo["category_name"]); ?></a>
					</li><?php endforeach; endif; ?>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<?php if(is_array($nav)): foreach($nav as $k=>$vo): ?><div role="tabpanel" class="tab-pane" id="<?php echo ($vo["navigation_url"]); ?>"><input class="nav-<?php echo ($vo["category_id"]); ?>-name" type="text" value="<?php echo ($vo["category_name"]); ?>"><input class="nav-<?php echo ($vo["category_id"]); ?>-nav_url" type="text" value="<?php echo ($vo["navigation_url"]); ?>"><input class="nav-<?php echo ($vo["category_id"]); ?>-url" type="text" value="<?php echo ($vo["url"]); ?>"><input class="updatenav" data-id="nav-<?php echo ($vo["category_id"]); ?>" type="button" value="更新"></div><?php endforeach; endif; ?>
			</div>

			<!-- <select>
				<?php if(is_array($nav)): foreach($nav as $k=>$vo): ?><option>
						<?php echo ($vo["category_name"]); ?>
					</option><?php endforeach; endif; ?>
			</select> -->
		</div>
		<div class="set_column">
			<div class="title">首页栏目</div>
		</div>
		<div class="set_block">
			<div class="title">模块内容</div>
			 <h3>
			 	机构概况
			 </h3>
			 <ul>
			 	<?php if(is_array($jggk)): foreach($jggk as $k=>$vo): ?><li role="presentation">
							<a href="<?php echo U('Admin/Post/editPost',array('pid'=>$vo['post_id']));?>"><?php echo ($vo["category_name"]); ?></a>
						</li><?php endforeach; endif; ?>
			 </ul>
			 <h3>
			 	秘书处
			 </h3>
			 <ul>
			 	<?php if(is_array($msc)): foreach($msc as $k=>$vo): ?><li role="presentation">
							<a href="<?php echo U('Admin/Post/editPost',array('pid'=>$vo['post_id']));?>"><?php echo ($vo["category_name"]); ?></a>
						</li><?php endforeach; endif; ?>
			 </ul>
			 <h3>
			 	标准分会
			 </h3>
			 <ul>
			 	<?php if(is_array($bzfh)): foreach($bzfh as $k=>$vo): ?><li role="presentation">
							<a href="<?php echo U('Admin/Post/editPost',array('pid'=>$vo['post_id']));?>"><?php echo ($vo["category_name"]); ?></a>
						</li><?php endforeach; endif; ?>
			 </ul>
		</div>
	</div>
<script src="/qzas/Public/js/jquery/jquery-min.js"></script>
<script src="/qzas/Public/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="/qzas/Public/js/jquery-ui.js"></script> -->
</body>
</html>
	<script>
	$(".updatenav").click(function(event) {
		/* Act on the event */
		$.ajax({
			url: '<?php echo U("Setting/updateNav");?>',
			type: 'POST',
			dataType: 'json',
			data: {
				category_id : parseInt($(this).attr('data-id').substring(4)),
				category_name: $('.'+$(this).attr('data-id')+'-name').val(),
				navigation_url : $('.'+$(this).attr('data-id')+'-nav_url').val(),
				url:$('.'+$(this).attr('data-id')+'-url').val(),
			} 
		})
		.success(function() {
			// console.log("success");
			// $("<li>"+$('#comment_author').val()+"|"+$('#comment_author').val()+"</li>").appendTo('.comment .comment_list');
			alert('success');
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		// alert(parseInt($(this).attr('data-id').substring(4)));
	});
	</script>