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
<body style="padding-top:60px">
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
        		<li><a href="javascript:void(0)"><span class="icon-bar glyphicon glyphicon-heart"></span>  線上預約</a></li>
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
<form method="POST">
新增<br><br>
新增消息:<input type="text" name="new">  <input type="submit" value="新增" name="qinsert">
<hr>
刪除<br><br>
ID: <input type="text" name="id">  <input type="submit" value="刪除" name="qdelete">
<hr>
更新<br><br>
ID: <input type="text" name="uid">	修改消息:<input type="text" name="unew">  <input type="submit" value="確認" name="update">
<hr>
</form>
<?php
		$conn=new mysqli('127.0.0.1','root','ncutm514','nail');
		if(isset($_POST['qdelete']))
		{
			$id=get_post($conn,'id');
			$query="DELETE FROM `最新消息` WHERE `id`='$id'";
			$result=$conn->query($query);
			if(!$result) echo("刪除失敗<br>");
		}
		if($_POST['qinsert']!=null)
		{
			$new=$_POST['new'];
			$query="INSERT INTO `最新消息`(`new`) VALUES ('$new')";
			$result=$conn->query($query);
			if(!$result) echo("新增失敗");
		}if($_POST['update']!=null && isset($_POST['uid']) && isset($_POST['unew']))
	{
		$uid=$_POST['uid'];
		$unew=$_POST['unew'];
		$query="UPDATE `最新消息` SET `new`='$unew' WHERE `id`='$uid'";
		$result=$conn->query($query);
		if(!$result) echo("修改失敗<br>");
	}
		$query="SELECT * FROM `最新消息`";
		$result=$conn->query($query);
		$rows=$result->num_rows;
		for($j=0;$j<$rows;$j++)
		{
			$row=$result->fetch_array(MYSQLI_ASSOC);
			$r0=$row['id'];
			$r1=$row['new'];
			echo <<<_END
<strong>ID: $r0 </strong><a href="#" class="alert-link"> $r1 ！</a>
<hr>
_END;
			}
$result->close();
$conn->close();
function get_post($conn,$var)
{
	return $conn->real_escape_string($_POST[$var]);
}
		?>
	</div>
</body>
</html>