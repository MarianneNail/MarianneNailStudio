<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>全屏背景切换</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">  
	<script src="http://api.asilu.com/cdn/jquery.js,jquery.backstretch.min.js" type="text/javascript"></script>
	<style>
	
	</style>
	
</head>
<body style="padding-top:51px">
<?php
session_start();
session_destroy();

	echo <<<_END
	<!-- 導覽列 -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="art.php">Marianne Nail Studio</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
        		<li><a href="login.php"><span class="icon-bar glyphicon glyphicon glyphicon-log-in"></span></a></li>
			</ul>
    		</div>
		</div>
	</nav>
_END;
?>
<div style="background:rgba(255,255,255,0.4); height:935px; width:400px; position:absolute; margin-left:500px;"><br><br><br><br><br><br><br><br><br><br>
	<form method="POST" action="art.php" align="center" valign="center" class="form-inline"><br><br>
		<div class="form-group" style="margin:auto;">
			<label>帳號：</label>
			<input type="text" class="form-control" name="user"><br><br><br>
			<label>密碼：</label>
			<input type="password" class="form-control" name="pass"><br><br><br>
			<input type="submit" class="btn btn-default" value="登入" name="log">
			<input type="button" class="btn btn-default" value="註冊" onclick="location.href='reg.php'">
		</div>
	</form>
</div>
<!--<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>-->

<script type="text/javascript">
$.backstretch([
		
'back4.gif',
		
	], {
		fade : 1000, // 动画时长
		duration : 2000 // 切换延时
});
</script>
</body>
</html>

<meta http-equiv="Content-Type"content="text/html; charset=UTF-8"/>
<div id="bg"></div>
<script>
// 定义图片路径 {num} 为 可变的图片序号
var bgImgUrl = 'back{num}.gif', bgNum,
	bgImgArr = [],
	bgDiv = document.getElementById("bg");
// 组合数组 此处 200 为 图开始序号 结束 210
for (var i=1; i <= 3; i++){
	bgImgArr.push(bgImgUrl.replace('{num}', i));
}
setBGimg();
function setBGimg(d){
	if(!bgNum || bgNum >= bgImgArr.length) bgNum = 0;
	bgDiv.style.opacity = .001;
	setTimeout(function(){
		bgDiv.style.backgroundImage = 'url('+ bgImgArr[bgNum] +')';
		bgNum++;
		bgDiv.style.opacity = 1;
	}, 1000);
	if(typeof d == 'undefined')
	setInterval(function(){setBGimg(true);}, 6000);
	// 上一行的 6000 是背景图片自动切换时间(单位 毫秒)
}
</script>