<?php $this->load->view('layout/header_show');?>

        <div class="i_bar">
        	<div class="i_logo"><a href='<?php echo site_url();?>'><img src="./imgs/logo.png"></a></div>
            <ul class="i_bar_left">
                <li class="i_logo" tooltip="爱书签"></li>
                <li class="i_title"><a href='<?php echo site_url("show/{$info[0]['id']}") ?>'><?php echo $info[0]['title'] ?></a></li>
            </ul>
            <ul class="i_bar_right">
                <li tooltip="喜欢就收藏吧~"><span class="i_icon icon_like">收藏 102</span></li>
                <li tooltip="分享给好友~"><span class="i_icon icon_share">分享</span></li>
                <li tooltip="说两句评论"><span class="i_icon icon_comment">评论 3</span></li>
                <li tooltip=""><span class="i_icon"></span></li>
            </ul>
            
			<div class="ik_hove_panel" style="left: 819px; top: 36px;">
				<div class="keepWrap">
					<form method="post" action="/cmd/keep">
						<h3>收藏网站</h3>
						<div class="item">
							<label>标题：</label>
							<div class="input">
								<input type="text" value="开发者问答" name="title">			
							</div>						
						</div>
						<div class="item">
							<label>分类：</label>
							<div class="select selectCategory">
								<span>请选择分类</span>
							</div>					
						</div>
						<div class="item">
							<label>标签：</label>
							<div class="input inputTag">
								<input type="text" name="tag" hint="请用逗号或空格分割" class="hint_blank">							
							</div>						
						</div>
						<div class="show_btn">
							<div class="checkbox">
								<label><input type="checkbox" value="true" ekey="privacy" name="privacy">私藏</label>							
							</div>
							<div class="checkbox">
								<label><input type="checkbox" checked="checked" ekey="syncall">同步到</label>
								<label><input type="checkbox" checked="checked" value="sina" name="share"><span class="icon_sina"></span></label>
								
							</div>
							<button type="submit" class="main">提交</button>
							
						</div>					
					</form>				
				</div>			
			</div>            
        </div>

        <iframe class="i_frame" frameborder="0" src="<?php echo $info[0]['url'] ?>" noresize="noresize" style='height:825px;'>

<?php $this->load->view('layout/footer');?>
