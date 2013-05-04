<div class='header_info'>
    <ul>
        <li>
            <img src='./imgs/shu_heart.png' class=''>
            <div class='info_right'>
                <p>丰富的书签</p>
                <p class='gray'>Millions of BookMark</p>
            </div>
        </li>
        <li>
            <img src='./imgs/shu_heart.png' class=''>
            <div class='info_right'>
                <p>发现喜爱的书签</p>
                <p  class='gray'>Recommend & Discover</p>
            </div>
        </li>
        <li>
            <img src='./imgs/shu_heart.png' class=''>
            <div class='info_right'>
                <p>与朋友们分享好书签</p>
                <p class='gray'>Share BookMark with friends</p>
            </div>
        </li>
        <li>
            <img src='./imgs/shu_heart.png' class=''>
            <div class='info_right'>
                <p>随时随地，爱书签</p>
                <p class='gray'>Anytime,Anywhere,Anyway </p>
            </div>
        </li>
    </ul>
</div>
<div id='content'>
    <div id='left_content'>
        <ul>
        <? $i = 1; ?>
    	<? foreach ($bookmarks as $key => $value): ?>
            <li class='li_nav'>
                <div class='web_title blue'><?=$i++?>. <a href='<?=$value['url']?>' target='_blank'><?=$value['title']?></a></div>
                <div class='gray'>
                    <span class='web_url'>&nbsp;</span>
                    <span class=' float-right'>11分钟前</span>
                </div> 
            </li>
        <? endforeach ?>                                                          
        </ul>
    </div>

    <div id='right_content'>
    	<? if (! $this->session->userdata('userid')): ?>
        <div class='login'>
            <?= form_open('login', array('name'=>'signin', 'class'=>'login_form signin')) ?>
                <input type='text' name='email' placeholder='Email' class='login_email fix_input radius' maxlenght='12'>
                <input type='password' name='password' class='login_password fix_input radius' maxlenght='12'>
                <input type='submit' value='登录' class='fix_button radius'>
                <a href='javscript:void(0)' class='forget'>忘记密码?</a>
                <p class='login_message'></p>
            </form>
            <div class='cooper'>
                <p class='cooper_title'>Or 合作网站登录</p>
                    <a href="<?=$weibo_url?>" class="sina"></a>
                    <a href="javascript:void(0)" class="qq"></a>
                    <!--
                    <a href="javascript:void(0)" class="sohu"></a>
                    <a href="javascript:void(0)" class="douban"></a>
                    -->
                    <div class='reg_button radius'>立即注册</div>
            </div>
        </div>

        <div class='reg'>
        	<p class='reg_message'></p>
            <?= form_open('register', array('name'=>'signup', 'class'=>'login_form signup')) ?>
                <span class='reg_name'>邮箱：</span><input name='email' type='text' placeholder='Email' class='reg_email fix_input radius' maxlenght='12'><br/>
                <span class='reg_name'>密码：</span><input name='password' type='password' class='reg_password fix_input radius' maxlenght='12' placeholder='密码'><br/>
                <span class='reg_name'>确认密码：</span><input name='passconf' type='password' class='reg_passconf fix_input radius' maxlenght='12' placeholder='确认密码'><br/>
                <input type='submit' value='注册' class='fix_button radius new_reg'>
            </form>
        </div>
        <? endif ?>
    </div>
</div>

<script type="text/javascript">
	$('.signup').submit(function(){
		$.post('register', {email: $('.reg_email').val(), password: $('.reg_password').val(), passconf: $('.reg_passconf').val()}, function(data){
			if (data == 'success')
				window.location.href='home';
			else
				$('.reg_message').html(data);
		});
		return false;
	});
	$('.signin').submit(function(){
		$.post('login', {email: $('.login_email').val(), password: $('.login_password').val()}, function(data){
			if (data == 'success')
				window.location.href='home';
			else
				$('.login_message').html(data);
		});
		return false;
	});
</script>

