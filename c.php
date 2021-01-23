<html>
	<head>
	<meta charset="utf-8"> 
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
	<body style="padding-top:51px">
<?php
session_start();
if($_SESSION['manager']=="管理者")
{
	$user=$_SESSION['user'];
	$manager=$_SESSION['manager'];
	echo <<<_END
	<!-- 導覽列 -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="art.php">Marianne Nail Studio</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
        		<li><a href="m time.php"><span class="icon-bar glyphicon glyphicon-cog"></span>  查看預約</a></li>
        		<li><a href="c.php"><span class="icon-bar glyphicon glyphicon-heart"></span>  線上預約</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="glyphicon glyphicon-user"></span>
					</a>
					<ul class="dropdown-menu">
						<li align="center">權限:$manager</li>
						<li align="center">Hi！$user</li>
						<li align="center">
							<button type="submit" class="glyphicon glyphicon-log-out btn btn-link" onclick="location.href='login.php'" name="logout" method="POST">登出</button>
						</li>
					</ul>
				</li>
			</ul>
    		</div>
		</div>
	</nav>
_END;
}
else if($_SESSION['manager']=="使用者")
{
	$user=$_SESSION['user'];
	$manager=$_SESSION['manager'];
	echo <<<_END
	<!-- 導覽列 -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="art.php">Marianne Nail Studio</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
        		<li><a href="c.php"><span class="icon-bar glyphicon glyphicon-heart"></span>  線上預約</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="glyphicon glyphicon-user"></span>
					</a>
					<ul class="dropdown-menu">
						<li align="center">權限:$manager</li>
						<li align="center">Hi！$user</li>
						<li align="center">
							<button type="submit" class="glyphicon glyphicon-log-out btn btn-link" onclick="location.href='login.php'" name="logout" method="POST">登出</button>
						</li>
					</ul>
				</li>
			</ul>
    		</div>
		</div>
	</nav>
_END;
}
?>
		<div class="container">	
		<table class="table">
		<caption><h3>未確定時間</h3></caption>
			<thead>
				<tr class="info">
					<th style="vertical-align: middle;text-align:center;">圖片</th>
					<th style="vertical-align: middle;text-align:center;">預約時間</th>
					<th style="vertical-align: middle;text-align:center;">刪除</th>
				</tr>
			</thead>
			<tbody>
<?php
if($_SESSION['user']==null)
{
	echo "<script>alert('請先登入會員')</script>";
	echo "<script>window.history.go(-1);</script>";
}
$conn=new mysqli('127.0.0.1','root','ncutm514','nail');
if(isset($_POST['cdelete']) && isset($_POST['ccid']))
{
	$ccid=$_POST['ccid'];
	$query="delete from `購物車` where `id`='$ccid'";
	$result=$conn->query($query);
	if(!$result) echo("刪除失敗<br>");
}
if(isset($_POST['tdelete']) && isset($_POST['dtid']))
{
	$dtid=$_POST['dtid'];
	$query="delete from `預約時間` where `id`='$dtid'";
	$result=$conn->query($query);
	if(!$result) echo("刪除失敗<br>");
}
if(isset($_POST['check']) && isset($_POST['img']))
{
	echo "<script>alert('成功預約時間')</script>";
	$user=$_SESSION['user'];
	$id=$_POST['ccid'];
	$img=$_POST['img'];
	$time=$_POST['time'];
	$query="INSERT INTO `預約時間`(`預約者`, `id`, `圖片`, `時間`) VALUES ('$user','$id','$img','$time')";
	$result=$conn->query($query);
	if(!$result) echo("預約失敗<br>");
	
	$ccid=$_POST['ccid'];
	$query="delete from `購物車` where `id`='$ccid'";
	$result=$conn->query($query);
	if(!$result) echo("刪除失敗<br>");
}
$date=date('Y-m-d H:i');
$today = str_replace(' ','T','$date');
$query="SELECT * FROM `購物車`";
$result=$conn->query($query);
$rows=$result->num_rows;
for($j=0;$j<$rows;$j++)
{
	$row=$result->fetch_array(MYSQLI_ASSOC);
	$r0=$row['id'];
	$r1=$row['圖片'];
	echo <<<_END
	<form method="POST">
		<tr>
			<td style="vertical-align: middle;text-align:center;" width="500"><img src="$r1" style="width:50%"></td>
			<td style="vertical-align: middle;text-align:center;"><input type="datetime-local" name="time" min='$today'>&emsp;<button type="submit" class="btn btn-info" name="check" value="check">確認預約</button></td>
			<td style="vertical-align: middle;text-align:center;">
				<input type="hidden" name="img" value='$r1'>
				<input type="hidden" name="ccid" value='$r0'>
				<button type="submit" class="btn btn-info" name="cdelete">刪除</button>
			</td>
		</tr>
	</form>
_END;
}
?>
			</tbody>
		</table><br><br>
<table class="table">
<caption><h3>已確定時間</h3></caption>
			<thead>
				<tr class="info">
					<th style="vertical-align: middle;text-align:center;">圖片</th>
					<th style="vertical-align: middle;text-align:center;">已預約時間</th>
					<th style="vertical-align: middle;text-align:center;">刪除</th>
				</tr>
			</thead>
			<tbody>
<?php
$query="SELECT * FROM `預約時間`";
$result=$conn->query($query);
$rows=$result->num_rows;
for($j=0;$j<$rows;$j++)
{
	$row=$result->fetch_array(MYSQLI_ASSOC);
	$r0=$row['id'];
	$r1=$row['圖片'];
	$r2=$row['時間'];
	$r3=$row['預約者'];
	echo <<<_END
	<form method="POST">
		<tr>
			<td style="vertical-align: middle;text-align:center;" width="500"><img src="$r1" style="width:50%"></td>
			<td style="vertical-align: middle;text-align:center;">$r2</td>
			<td style="vertical-align: middle;text-align:center;">
				<input type="hidden" name="dtimg" value='$r1'>
				<input type="hidden" name="dtid" value='$r0'>
				<button type="submit" class="btn btn-info" name="tdelete">刪除</button>
			</td>
		</tr>
	</form>
_END;
}
$result->close();
$conn->close();
?>
			</tbody>
		</table>
		
		</div>
	</body>
</html>

