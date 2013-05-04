<!DOCTYPE html>
<html dir="ltr" lang="zh-CN">
<head>
<base href='<?= base_url() ?>' />
<meta charset="UTF-8"/>
<meta http-equiv="Cache-Control" content="no-cache" />
<meta name="viewport" id="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no;" >
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="tencent-x5-page-direction" content="landscape" />
<meta name="description" content=""/>
<title> <?if(isset($title)):?> <?=$title?> <?else:?> 爱书签 <?endif?> </title>

<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" media="all" href="css/main.css" />
<script type="text/javascript" src='js/jquery.js'></script>
<script type="text/javascript" src='js/common.js'></script>
</head>
<body>
    <div id='pager'>
    	<div id='header'>
    		<div class='header_top clearfix'>
    			<div class='logo'><img src='./imgs/logo.png'></div>
    			<div class='web_name'>ishuqian</div>
    			<!--登陆后显示用户名密码-->
    			<? if ($this->session->userdata('userid')): ?>
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
    		<div class='header_menu'>
    			<ul>
    				<li><a href='javascript:void(0)'>首页</a></li>
    				<li><a href='javascript:void(0)'>意见反馈</a></li>
    				<li><a href='javascript:void(0)'>关于我们</a></li>
    			</ul>
    		</div>
    	</div>