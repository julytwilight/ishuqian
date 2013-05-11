<!DOCTYPE html>
<html dir="ltr" lang="zh-CN">
<head>
<base href='<?php echo base_url() ?>' />
<meta charset="UTF-8"/>
<meta http-equiv="Cache-Control" content="no-cache" />
<meta name="viewport" id="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no;" >
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="tencent-x5-page-direction" content="landscape" />
<meta name="description" content=""/>
<title> <?php if(isset($title)):?> <?php echo $title?> <?php else:?> 爱书签 <?php endif?> </title>

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
    			<?php if ($this->session->userdata('userid')): ?>
    				<div class='left'><a href="home">
    					<?php if ($this->session->userdata('username')): ?>
    						<?php echo $this->session->userdata('username')?>
    					<?php else: ?>
    						no setting username
    					<?php endif ?></a>
    					, <a href="<?php echo base_url('logout')?>">Logout</a>
    				</div>
    			<?php endif?>
    		</div>
    		<div class='header_menu'>
    			<ul>
    				<li><a href='javascript:void(0)'>首页</a></li>
    				<li><a href='javascript:void(0)'>意见反馈</a></li>
    				<li><a href='javascript:void(0)'>关于我们</a></li>
    			</ul>
    		</div>
    	</div>