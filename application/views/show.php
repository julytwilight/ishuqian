<?php $this->load->view('layout/header_show');?>

        <div class="i_bar">
        	<div class="i_logo"><a href='<?php echo site_url();?>'><img src="./imgs/logo.png"></a></div>
            <ul class="i_bar_left">
                <li class="i_logo" tooltip="爱书签"></li>
                <li class="i_title"><a href='<?php echo site_url("show/{$info[0]['id']}") ?>'><?php echo $info[0]['title'] ?></a></li>
            </ul>
            <ul class="i_bar_right">
                <li tooltip="喜欢就收藏吧~"><span class="i_icon icon_like">收藏</span></li>
                <li tooltip="分享给好友~"><span class="i_icon icon_share">分享</span></li>
                <li tooltip="说两句评论"><span class="i_icon icon_comment">评论</span></li>
                <li tooltip=""><span class="i_icon"></span></li>
            </ul>
            
			<div class="ik_hove_panel" style="display:none;">
				<div class="keepWrap">
					<form method="post" action="<?php echo site_url("like") ?>">				
						<input type="hidden" value="<?php echo $info[0]['url'] ?>" name="url">			
						<h3>收藏网站</h3>
						<div class="item">
							<label>标题：</label>
							<div class="input">
								<input type="text" value="<?php echo $info[0]['title'] ?>" name="title">			
							</div>						
						</div>
						<div class="item">
							<label>分类：</label>
							<div class="select selectCategory">
								<select class='item_select' name='cat'>
									<?php if (!empty($cat_info) ): ?>
										<?php foreach ($cat_info as $key => $value): ?>
											<option value='<?php echo $value['id'] ?>'><?php echo $value['name'] ?></option>
										<?php endforeach ?>
									<?php else: ?>
										<option value='0'>默认</option>
									<?php endif ?>
									
								</select>
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
								<label><input type="checkbox"  ekey="is_private"  checked="checked" value='1' name="is_private" onclick='if(this.value==1){this.value=0}else{this.value=1}'>私藏</label>							
							</div>
							<div class="checkbox">
								<label><input type="checkbox" checked="checked" ekey="syncall">同步到</label>
								<label><input type="checkbox" checked="checked" value="sina" name="share"><span class="icon_sina"></span></label>
								
							</div>
							
							
						</div>					
					</form>		
					<button type="submit" class="main_btn">提交</button>		
				</div>			
			</div>            
        </div>

       <iframe class="i_frame" frameborder="0" src="<?php echo $info[0]['url'] ?>" noresize="noresize">
<?php $this->load->view('layout/footer');?>
