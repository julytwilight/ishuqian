<!-- <script type="text/javascript" src="js/jquery.simple-color.js"></script> -->
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" media="all" href="css/main.css" />
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/js.js'></script>
<script type='text/javascript' src='js/move.js'></script>

<!--输入url-->
<div id="MarkList" class="MarkList">
	<h3>创建新书签</h3>
    <div class="markCont">
    	<p><span>链接：</span><input class='bookmark_link' name='url' type="text" /></p>
    	<p class="markTure">
    	   <input type="button" class="btn_bookmark_link markSub" value="提交"/>
    	   <input type="button" class="markCancel" id="markCancel" value="取消"/>
    	</p>
    </div>
</div>
<!--创建书签-->
<div id="CreateList" class="MarkList">
	<h3>创建新书签</h3>
    <div class="markCont">
    	<?php echo  form_open('bookmarks/create', array('name'=>'form_add_bookmark')) ?>
	    	<p><span>链接：</span><input name='url' type="text" /></p>
	        <p><span>标题：</span><input name='title' type="text" /></p>
	        <p><span>分类：</span>
	        	<select name='list' style='display:inline'>
		        	<option value='0'>无分类</option>
		        	<?php foreach ($lists as $key => $value): ?>
		        		<option value='<?php echo $value['id']?>'><?php echo $value['name']?></option>
		        	<?php endforeach ?>
	        	</select>
	        </p>
	        <p><span>私有：</span><input name='is_private' type='checkbox' /><em>选中别人无法浏览</em></p>
	        <p><span>备注：</span><textarea name='commnet'></textarea></p>
	        <p class="markTure">
	           <input type="submit" class="markSub" value="提交"/>
	           <input type="button" class="markCancel" id="markCancel" value="取消"/>
	        </p>
        </form>
    </div>
</div>

 <div id="ClassList" class="MarkList">
	<h3>添加新分类</h3>
    <div class="markCont classCont">
    	<p><span>分类名称：</span><input type="text" /></p>
        <p><span>分类颜色：</span><input class='simple_color_kitchen_sink' value='#993300'/></p>
        <p class="markTure">
           <input type="submit" class="markSub" value="提交"/>
           <input type="button" class="markCancel" id="classCancel" value="取消"/>
        </p>
    </div>
</div>
<div class="mask" id="addMask"></div>
<div class="mask" id="classMask"></div>
<div class="mask" id="inMask"></div>
 <div id="InmarkList" class="MarkList">
	<h3>导入书签</h3>
    <div class="markCont inCont">
    	<p><span>链接：</span><input type="file" class="hide"/>
        </p>
        <p class="markTure">
           <input type="submit" class="markSub" value="提交"/>
           <input type="button" class="markCancel" id="inCancel" value="取消"/>
        </p>
    </div>
</div>

<div id='p_content' class='clearfix'>
	<div id='p_leftcon'>
		<div id='p_prebg'>
			<div id="grzx">
				<div id="p_gl"></div>
				<div id="p_gz">个人中心</div>
				<div id="p_gr"></div>
			</div>
			<div id='p_himg'>
				<img src='./imgs/prehead.png'>
			</div>
			<div id='p_hname'>jammy</div>
			<div id='p_lfixed'>
                <div id='p_dcr'>
					<ul>
						<li id="addMark">添加书签</li>
						<li id="addClass">添加分类</li>
						<li id="inMark">导入书签</li>
					</ul>
				</div>
                <div id='p_fl'>
                    <ul>
                        <li>
                            <div class='li_l' style="background:#bdb9b8"></div>
                            <div class='li_r' style="background:#e0dedf"><a href="home/favorites_list/">全部分类</a></div>
                        </li>
                        <?php foreach ($lists as $key => $value): ?>
                        	<li>
                        	    <div class='li_l' style="background:#bdb9b8"></div>
                        	    <div class='li_r' style="background:#e0dedf"><a href="home/favorites_list/"><a href="home/favorites_list/<?php echo $value['id']?>"><?php echo $value['name']?></a></a></div>
                        	</li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
	</div>
	<div id='p_rightcon'>
		<ul>
			<?php foreach ($bookmarks as $key => $value): ?>
				<a href="" target='_blank'><li></li></a>
				<li class='p_conlist'>
				    <ul>
				      <li></li>
				      <li></li>
				      <li></li>
				      <li></li>
				    </ul> 
				    <div class='rlitop'>
				       <p><img src="imgs/favicon.png" width="16" height="16"><br><a href="<?php echo $value['url']?>"><?php echo $value['title']?></a></p>
				    </div>
				    <div class='rlimid'>浏览<span>[931]</span> 赞<span>[89]</span></div>
				    <div class='rlibottom'></div>
				</li>
			<?php endforeach ?>
		</ul>
    </div>
</div>

<!--
<div class='left fleft' style='width:300px; border:solid 1px; margin-top:20px; margin-left: 20px;padding:20px'>
	<a href='javascript:' class='add_bookmark'>add a bookmark</a>

	<div class='input_add_bookmark hide'>
		Url<input class='bookmark_link' style='width: 200px;' />
		<button class='btn_bookmark_link'>submit</button>
	</div>

	<div class='bookmark_setting hide'>
		<?//= form_open('bookmarks/create', array('name'=>'form_add_bookmark')) ?>
			url: <input name='url' /><br />
			title: <input name='title' /><br />
			list: <select name='list'>
					<option value='0'>无分类</option>
					<?//php foreach ($lists as $key => $value): ?>
						<option value='<//?=$value['id']?>'><?//=$value['name']?></option>
					<?//php endforeach ?>
				 </select><br />
			private: <input name='is_private' type='checkbox' /><br />
			comment: <textarea name='commnet'></textarea>
			<input type='submit' />
		</form>
	</div>

	<div class=''>
		fovorites list: <a class='add_list' href='javascript:'>new list</a>
		<div class='input_add_list hide'>
			list name: <input class='list_name' style='width: 200px;' />
			<button class='btn_add_list'>submit</button>
		</div>
		<ul class='lists'>
			<a href="home/favorites_list/"><li>all</li></a>
			<?//php foreach ($lists as $key => $value): ?>
				<a href="home/favorites_list/<?//=$value['id']?>"><li><?//=$value['name']?></li></a>
			<?//php endforeach ?>
		</ul>
	</div>
</div>
<div class='bookmarks fleft' style='margin-top:20px; margin-left:20px; border:solid 1px; width:500px'>
	Bookmarks:
	<ul class=''>
		<?//php foreach ($bookmarks as $key => $value): ?>
			<a href="<?//=$value['url']?>" target='_blank'><li><?//=$value['title']?></li></a>
		<//?php endforeach ?>
	</ul>
</div>
-->
<script type="text/javascript">
	
	//add bookmark
	$('.btn_bookmark_link').click(function(){
		var is = true, link = $('.bookmark_link').val();
		if (is && link) {
			$.post('readlink', {link: link}, function(data){
				is = false;
				$('.add_bookmark').click();
				$('input[name=title]').val(data);
				$('input[name=url]').val(link);
				$('.markCancel').click();
				//$('#CreateList').show();
				woyun('#CreateList','#markCancel')
				is = true;
			});
		}
	});

	//add list
	$('.add_list').click(function(){
		$('.input_add_list').toggle();
	});
	$('.btn_add_list').click(function(){
		var is = true, name = $('.list_name').val();
		if (is && name) {
			$.post('home/addlist', {name: name}, function(data){
				is = false;
				if (data.status == 100){
					$('.lists').append('<a href="home/favorites_list/' + data.data + '"><li>' + name + '</li>');
				} else {
					alert(data.data);
				}
				$('.add_list').click();
				is = true;
			}, 'json');
		}
	});

	//显示
	function woyun(Tdiv,clos)
	{
		$(Tdiv).css('left',($(window).width()-$(Tdiv).outerWidth())/2);
		$(Tdiv).css('top',($(window).height()-$(Tdiv).outerHeight())/2+$(window).scrollTop());
		$(Tdiv).css('display','block');
		startMove(Tdiv,{opacity:100});
		$(clos).click(function()
		{
			startMove($(Tdiv),{opacity:0},function(){$(Tdiv).css('display','none');})
		})
		$(window).on('scroll resize',function()
		{
			$(Tdiv).css('left',($(window).width()-$(Tdiv).outerWidth())/2);
			$(Tdiv).css('top',($(window).height()-$(Tdiv).outerHeight())/2+$(window).scrollTop());
		})
	}
</script>