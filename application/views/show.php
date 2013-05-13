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
        </div>

        <iframe class="i_frame" frameborder="0" src="<?php echo $info[0]['url'] ?>" noresize="noresize" style='height:825px;'>

<?php $this->load->view('layout/footer');?>
