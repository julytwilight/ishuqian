<script type="text/javascript" src="js/jquery.simple-color.js"></script>
<script type='text/javascript' src='js/js.js'></script>
<script type='text/javascript' src='js/move.js'></script>
<div class='left fleft' style='width:300px; border:solid 1px; margin-top:20px; margin-left: 20px;padding:20px'>
	<a href='javascript:' class='add_bookmark'>add a bookmark</a>

	<div class='input_add_bookmark hide'>
		Url<input class='bookmark_link' style='width: 200px;' />
		<button class='btn_bookmark_link'>submit</button>
	</div>

	<div class='bookmark_setting hide'>
		<?= form_open('bookmarks/create', array('name'=>'form_add_bookmark')) ?>
			url: <input name='url' /><br />
			title: <input name='title' /><br />
			list: <select name='list'>
					<option value='0'>无分类</option>
					<?php foreach ($lists as $key => $value): ?>
						<option value='<?=$value['id']?>'><?=$value['name']?></option>
					<?php endforeach ?>
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
			<?php foreach ($lists as $key => $value): ?>
				<a href="home/favorites_list/<?=$value['id']?>"><li><?=$value['name']?></li></a>
			<?php endforeach ?>
		</ul>
	</div>
</div>
<div class='bookmarks fleft' style='margin-top:20px; margin-left:20px; border:solid 1px; width:500px'>
	Bookmarks:
	<ul class=''>
		<?php foreach ($bookmarks as $key => $value): ?>
			<a href="<?=$value['url']?>" target='_blank'><li><?=$value['title']?></li></a>
		<?php endforeach ?>
	</ul>
</div>

<script type="text/javascript">
	
	//add bookmark
	$('.add_bookmark').click(function(){
		$('.input_add_bookmark').toggle();
	});
	$('.btn_bookmark_link').click(function(){
		var is = true, link = $('.bookmark_link').val();
		if (is && link) {
			$.post('readlink', {link: link}, function(data){
				is = false;
				$('.add_bookmark').click();
				$('input[name=title]').val(data);
				$('input[name=url]').val(link);
				$('.bookmark_setting').show();
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
</script>