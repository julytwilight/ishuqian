<div class='container'>
	<!-- bookmark list -->
	<ul class='bookmark-list'>
		<?php foreach ($bookmarks as $key => $value): ?>
			<a href="<?=$value['url']?>" target='_blank'><li><?=$value['title']?></li></a>
		<?php endforeach ?>
	</ul>
</div>