<?php
require_once("../functions/checklogin.php");
if(!isLogin()) header("Location: ../");
?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>图书管理系统</title>
<link rel="shortcut icon" type="image/x-icon" href="../style/images/favicon.png" />
<link rel="stylesheet" type="text/css" href="../style.css" media="all" />
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="style/css/ie7.css" media="all" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="style/css/ie9.css" media="all" />
<![endif]-->
<script type="text/javascript" src="../style/js/jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="../style/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="../style/js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="../style/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="../style/js/carousel.js"></script>
<script type="text/javascript" src="../style/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="../style/js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="../style/js/jquery.slickforms.js"></script>

</head>
<body>
<!-- Begin Wrapper -->
<div id="wrapper">
	<!-- Begin Sidebar -->
	<div id="sidebar">
		 <div id="logo"><a href="./"><img src="../style/images/logo.png" alt="HOMEPAGE" /></a></div>
		 
	<!-- Begin Menu -->
    <div id="menu" class="menu-v">
      <ul>
        <li><a href="./" class="active">主页</a></li>
        <li><a href="#">管理书库</a>
        	<ul>
        		<li><a href="bookquery.html">图书查询</a></li>
        		<li><a href="addbook.html">图书入库</a></li>
        		
        	</ul>
        </li>
        <li><a href="#">管理借书证</a>
        	<ul>
        		<li><a href="idinfo.html">借书证信息查询</a></li>
                <li><a href="borrowlist.html">借书证借书记录查询</a></li>
        		<li><a href="opidcard.html">增加/删除借书证</a></li>
        		
        	</ul>
        </li>
        <li><a href="#">借还书</a>
        	<ul>
        		<li><a href="borrow.html">借书</a></li>
        		<li><a href="return.html">还书</a></li>
        		
        	</ul>
        </li>
        <li><a href="#">账号设置</a>
        	<ul>
        		<li><a href="addadmin.html">添加新管理员账号</a></li>
        		<li><a href="changepw.html">修改密码</a></li>
        		<li><a href="deleteadmin.html">删除本管理员账号</a></li>
        	</ul>
        </li>
        <li><a href="./logout.php">登出</a></li>
      </ul>
    </div>
    <!-- End Menu -->
   
    
    <div class="sidebox">
    <!--<ul class="share">
    	<li><a href="#"><img src="style/images/icon-rss.png" alt="RSS" /></a></li>
    	<li><a href="#"><img src="style/images/icon-facebook.png" alt="Facebook" /></a></li>
    	<li><a href="#"><img src="style/images/icon-twitter.png" alt="Twitter" /></a></li>
    	<li><a href="#"><img src="style/images/icon-dribbble.png" alt="Dribbble" /></a></li>
    	<li><a href="#"><img src="style/images/icon-linkedin.png" alt="LinkedIn" /></a></li>
    </ul>-->
    </div>

    
	</div>
	<!-- End Sidebar -->
	
	<!-- Begin Content -->
	<div id="content">
	<h1 class="title">图书管理系统V1.0</h1>
	<div class="line"></div>
	<div class="intro">欢迎使用图书管理系统</div>
	您现在看到的是管理员界面，您可以查询图书信息，或对书库进行操作。<br /><br />
    同时您可以操作借书证与处理借还书。<br /><br />
    首次配置系统后，默认创建管理员账户root,密码为123456。<br /><br />
    如您使用root用户首次登录请尽快新建自己的管理员账户然后登陆root账户删除该账户。<br /><br />
    <!-- Begin Footer -->
    <div id="footer">
  	&copy;Jeffery Zhao; 2014. Alpha<br /><br />
    </div>
    <!-- End Footer -->
    
    
	</div>
	<!-- End Content -->

</div>
<!-- End Wrapper -->
<div class="clear"></div>
<script type="text/javascript" src="../style/js/scripts.js"></script>
<!--[if !IE]> -->
<script type="text/javascript" src="../style/js/jquery.corner.js"></script>
<!-- <![endif]-->

</body>
</html>