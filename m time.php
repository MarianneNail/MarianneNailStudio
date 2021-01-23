<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap網頁</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">    
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
	@media(min-width: 992px){
		.carousel-inner > .item > img{
    	width:100%;
    	margin: auto;
		}
		.col-md-3 > .thumbnail > img{
		height:8cm;
		}
	}
	@media(max-width: 991px){
		.carousel-inner > .item > img{
    	width: 50%;
    	margin: auto;
	 	height: 5cm;
		}
	}
	</style>	
  </head>
<body style="padding-top:51px">
<?php
session_start();
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
        		<li><a href="javascript:void(0).php"><span class="icon-bar glyphicon glyphicon-heart"></span>  線上預約</a></li>
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
?>
<div class="container">
<table class="table">
<caption><h3></h3></caption>
			<thead>
				<tr class="info">
					<th style="vertical-align: middle;text-align:center;">預約者</th>
					<th style="vertical-align: middle;text-align:center;">圖片</th>
					<th style="vertical-align: middle;text-align:center;">預約時間</th>
					<th style="vertical-align: middle;text-align:center;">刪除</th>
				</tr>
			</thead>
			<tbody>
<?php
$conn=new mysqli('127.0.0.1','root','ncutm514','nail');
if(isset($_POST['tdelete']) && isset($_POST['dtid']))
{
	$dtid=$_POST['dtid'];
	$query="delete from `預約時間` where `id`='$dtid'";
	$result=$conn->query($query);
	if(!$result) echo("刪除失敗<br>");
}
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
			<td style="vertical-align: middle;text-align:center;">$r3</td>
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