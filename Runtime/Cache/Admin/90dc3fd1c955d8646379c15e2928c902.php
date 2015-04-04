<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>编辑-<?php echo ($post['post_title']); ?></title>
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
			<!-- <form action="" method="post"> -->
				<input id="title" type="text" class="title"  maxlength="35" value="<?php echo ($post['post_title']); ?>" placeholder="请输入标题">
				<input id="submit_post" type="button" value="提交">
				<div id="hint"></div>
				<label for="pic_news"><input id="pic_news" type="checkbox">图片推送到首页</label>
				<!-- <label for="block_news"><input id="block_news" type="checkbox">模块新闻</label> -->
				<div class="option">
					<div class="post_cate">
						<input id="new_cate" type="text" placeholder="新增分类">
						<a class="btn" id="add_cate">增加</a>					
							————————分类————————
						<select name="categories" id="categories2add">
							<?php if(is_array($categories)): foreach($categories as $k=>$vo): ?><option value="categories-<?php echo ($vo["category_id"]); ?>">
									<?php echo ($vo["category_name"]); ?>
								</option><?php endforeach; endif; ?>
						</select>
						<a class="btn" id="add_cate_relation">新增</a>
						<ul>
							<?php if(is_array($my_categories)): foreach($my_categories as $k=>$vo): ?><li>
									<?php echo ($vo["category_name"]); ?>
									<a class="btn del-cate" catename='<?php echo ($vo["category_name"]); ?>' cate2del="<?php echo ($vo["relation_id"]); ?>">X</a>
								</li><?php endforeach; endif; ?>
						</ul>
					</div>
				</div>
				<script id="content" name="content" type="text/plain">
					<?php echo ($post['post_content']); ?>
				</script>
			<!-- </form> -->
		</div>
	</div>
	<script type="text/javascript" src="/qzas/Public/js/jquery/jquery-min.js">
		
	</script>
    <!-- UEditor配置文件 -->
    <script type="text/javascript" src="/qzas/Public/ueditor/ueditor.config.js"></script>
    <!-- UEditor编辑器源码文件 -->
    <script type="text/javascript" src="/qzas/Public/ueditor/ueditor.all.js"></script>
    <!-- UEditor实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('content');
        
        // var lang = ue.getOpt('textarea');
        // alert(lang);
    </script>
    <script>
    	// $("#add_cate_relation").click(function(event) {
    	// 	/* Act on the event */
    	// 	$.ajax({
    	// 		url: "<?php echo U('POST/addCate');?>",
    	// 		type: 'default GET (Other values: POST)',
    	// 		dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    	// 		data: {param1: 'value1'},
    	// 	})
    	// 	.done(function() {
    	// 		console.log("success");
    	// 	})
    	// 	.fail(function() {
    	// 		console.log("error");
    	// 	})
    	// 	.always(function() {
    	// 		console.log("complete");
    	// 	});
    		
    	// });
		
		$('.del-cate').click(function(event) {
			/* Act on the event */
			if(confirm("是否删除类别“‘"+$(this).attr('catename')+"”")){
				$.ajax({
					url: "<?php echo U('Post/delCateRelation/');?>",
					type: 'POST',
					dataType: 'json',
					data: {cate2del: parseInt($(this).attr('cate2del'))},
				})
				.always(function() {
					// console.log("complete");
					// $(this).parent('li').remove();
				});
				$(this).parent('li').remove();
				}
		});
    	$("#add_cate_relation").click(function(event) {
    		/* Act on the event */  		
    		// alert(parseInt($("#categories2add").val().substr(11,2)));
    		category_id=parseInt($("#categories2add").val().substr(11,2));
    		$.ajax({
    			url: "<?php echo U('Post/addCateRelation');?>",
    			type: 'POST',
    			dataType: 'json',
    			data: {cate2add: category_id}
    		})
    		.success(function(data) {
    			// alert("success");  
    			// alert($("#categories2add option:selected").text());  			
    			$('<li>' + $("#categories2add option:selected").text() + '<a class="del-cate" cate2del="'+ data +'">X</a></li>').appendTo('#container .post_cate ul');
    		});
    		// .fail(function() {
    		// 	console.log("error");
    		// });		
    	});

    	$("#add_cate").click(function(event) {
    		new_cate=$("#new_cate").val();
    		if(confirm('增加类别“'+ new_cate +'”？')){
	    		$.ajax({
	    			url: "<?php echo U('Post/addCate');?>",
	    			type: 'POST',
	    			dataType: 'json',
	    			data: {category_name: new_cate},
	    		})
	    		.success(function(data) {
	    			// alert("success");    			
	    			$('<option value="categories-' + data + '>'+ new_cate +'</option>').appendTo('#categories2add');
	    		})
	    		.fail(function() {
	    			// console.log("error");
	    		});
    		}		
		});


		// $('#content img').click(function(event) {
		// 		 //Act on the event 
		// 		alert("hello");
		// 	});
		
		$("#submit_post").click(function(event) {

    		pic_news=$("#pic_news").prop('checked');
    		pic_news_url='';
    		if(pic_news){
    			var pattern = "/Public/upload/images/[0-9]{8}/[0-9]{16}.(?:jpg|png|bmp|jpeg)";
				//  /20150102/1420211101100418.png

			    html = ue.getPlainTxt();

			    if(pic_news_url=html.match(pattern)){
			    	// alert(pic_news);
			    	// alert(pic_news_url);
			    }
    		}
			$.ajax({
				url: '<?php echo U("Post/saveNews");?>',
				type: 'POST',
				dataType: 'json',
				data: {
					content: ue.getContent(),
					title:$("#title").val(),
					post_general:ue.getContentTxt(),
					pic_news: pic_news,
					pic_news_url:pic_news_url,
					post_status:$("#block_news").prop('checked')
				},
			})
			.success(function(data) {
				// console.log("success");
				// alert(pic_news_url);
				$("#hint").html("保存成功");
			})
			.fail(function() {
				// console.log("error");
			})
			.always(function() {
				// console.log("complete");
			});
			
		});
    </script>
<script src="/qzas/Public/js/jquery/jquery-min.js"></script>
<script src="/qzas/Public/bootstrap/js/bootstrap.min.js"></script>
<!-- <script src="/qzas/Public/js/jquery-ui.js"></script> -->
</body>
</html>