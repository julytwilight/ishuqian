<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title> <?if(isset($title)):?> <?=$title?> <?else:?> 爱书签 <?endif?> </title>
<base href='<?= base_url() ?>' />
<link rel="stylesheet" type="text/css" href="css/common.css">
<script type="text/javascript" src='js/jquery.js'></script>
<script type="text/javascript" src='js/common.js'></script>
</head>
<body>

<div class='header left'>
	<h1>爱书签</h1>
	<ul class='nav'>
		<a href="/"><li>首页</li></a>
		<a href="javascript:"><li>意见反馈</li></a>
		<a href="javascript:"><li>关于我们</li></a>
	</ul>
	<? if ($this->session->userdata('email')): ?>
		<div class='left'><a href="home">
			<? if ($this->session->userdata('username')): ?>
				<?=$this->session->userdata('username')?>
			<? else: ?>
				no setting username
			<? endif ?></a>
			, <a href="<?=base_url('logout')?>">Logout</a>
		</div>
	<? endif?>
</div>

<!-- Sign in && Sign up  -->
	<? if (!$this->session->userdata('email')): ?>
		<div class="sign-in-out">
			<div class='signin'>
				<?= validation_errors() . '<br />'; ?>
				<?= form_open('login', array('name'=>'signin')) ?>
					email: <input name='email' />
					password: <input name='password' type='password' />
					<input name='is_remember' type='checkbox' />remember me
					<input type='submit' value='sign in' />
				</form>
			</div>

			<div class='signup'>
				<?= form_open('register', array('name'=>'signup')) ?>
					email: <input name='email' />
					password: <input name='password' type='password' />
					comfirm : <input name='passconf' type='password' />
					<input type='submit' value='sign up' />
				</form>
			</div>
		</div>		
	<? endif ?>