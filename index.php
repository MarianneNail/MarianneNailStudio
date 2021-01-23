<!DOCTYPE html>
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
$conn=new mysqli('%.%.%.%','marianne','ncutm514','nail');
$query="SELECT * FROM `帳戶`";
$result=$conn->query($query);
$rows=$result->num_rows;
for($j=0;$j<$rows;$j++)
{
	$row=$result->fetch_array(MYSQLI_ASSOC);
	if($row['id']==1)
	{
		if($row['帳號']==$_POST['user'] && $row['密碼']==$_POST['pass'])
		{
			$_SESSION['manager']="管理者";
			$_SESSION['user']=$_POST['user'];
			$_SESSION['pass']=$_POST['pass'];
		}
	}
	else
	{
		if($row['帳號']==$_POST['user'] && $row['密碼']==$_POST['pass'])
		{
			$_SESSION['manager']="使用者";
			$_SESSION['user']=$_POST['user'];
			$_SESSION['pass']=$_POST['pass'];
		}
	}
}
if($_SESSION['manager']=="管理者" && isset($_SESSION['user']) && isset($_SESSION['pass']))
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
        		<li><a href="javascript:void(0)"><span class="icon-bar glyphicon glyphicon-heart"></span>  線上預約</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="glyphicon glyphicon-user"></span>
					</a>
					<ul class="dropdown-menu">
						<li align="center">權限:$manager</li>
						<li align="center">Hi！$user</li>
						<li align="center"><a href="login.php"><span class="icon-bar glyphicon glyphicon glyphicon-log-out">登出</span></a></li>
					</ul>
				</li>
			</ul>
    		</div>
		</div>
	</nav>
_END;
}
else if($_SESSION['manager']=="使用者" && isset($_SESSION['user']) && isset($_SESSION['pass']))
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
							<button type="submit" method="POST" class="glyphicon glyphicon-log-out btn btn-link" onclick="location.href='login.php'" name="logout" value="logout">登出</button>
						</li>
					</ul>
				</li>
			</ul>
    		</div>
		</div>
	</nav>
_END;
}
else if(isset($_POST['log']))
{
	echo "<script>alert('帳號或密碼錯誤，請重新輸入')</script>";
	echo "<script>window.history.go(-1);</script>";
}
else
{
	echo <<<_END
	<!-- 導覽列 -->
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="art.php">Marianne Nail Studio</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="#"><span class="glyphicon glyphicon-align-justify"></span></a></li>
        		<li><a href="javascript:void(0)"><span class="icon-bar glyphicon glyphicon-heart">  線上預約</span></a></li>
        		<li><a href="login.php"><span class="icon-bar glyphicon glyphicon glyphicon-log-in"></span></a></li>
			</ul>
    		</div>
		</div>
	</nav>
_END;
}
$result->close();
$conn->close();
?>

<div class="container">	
<div id="myCarousel" class="carousel slide">
    <!-- 輪播（Carousel）指標 -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>   
    <!-- 輪播（Carousel）項目 -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="nail/20201217_201228_1.jpg" alt="First slide">
            <div class="carousel-caption">標題 1</div>
        </div>
        <div class="item">
            <img src="nail/20201217_201228_7.jpg" alt="Second slide">
        </div>
		<div class="item">
            <img src="nail/20201217_201228_8.jpg" alt="Second slide">
        </div>
		<div class="item">
            <img src="nail/20201217_201228_12.jpg" alt="Second slide">
        </div>
    </div>
    <!-- 輪播（Carousel）導航 -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<br><br><br>
<?php
if($_SESSION['manager']=="管理者")
{
	echo "<a href='change new.php' class='btn btn-primary' style='margin:right;'>修改</a>";
}
?>
	<!--最新消息-->
<div class="table-responsive">
<table class="table table-striped">
	<caption><h3>最新消息</h3></caption>
	<tbody>
	    <?php
		$conn=new mysqli('127.0.0.1','root','ncutm514','nail');
		$query="SELECT * FROM `最新消息`";
		$result=$conn->query($query);
		$rows=$result->num_rows;
		for($j=0;$j<$rows;$j++)
		{
			$row=$result->fetch_array(MYSQLI_ASSOC);
			$r1=$row['new'];
			echo <<<_END
<tr>
	<td><a href="javascript:void(0)" class="alert-link"> $r1 ！</a></td>
</tr>
_END;
			}
$result->close();
$conn->close();
?>
	</tbody>
</table>
</div><br><br>
<?php
if($_SESSION['manager']=="管理者")
{
	echo "<a href='change.php' class='btn btn-primary' style='margin: right;'>修改</a>";
}
?>	
<div class="row text-center">
<?php
$conn=new mysqli('127.0.0.1','root','ncutm514','nail');
if($_POST['cid']!=null && $_SESSION['user']!=null)
{
	$cid=$_POST['cid'];
	$cimg=$_POST['cimg'];
	echo $_POST['cimg'];
	$query="INSERT INTO `購物車`(`id`, `圖片`) VALUES ('$cid','$cimg')";
	$result=$conn->query($query);
	if(!$result)
	{
		echo("新增失敗");
	}
	else
	{
		echo "<script>alert('成功加入!可前往線上預約確定時間')</script>";
	}
}
else if($_POST['cid']!=null && $_SESSION['user']==null)
{
	echo "<script>alert('請先登入會員')</script>";
}
$query="SELECT * FROM `平常`";
$result=$conn->query($query);
$rows=$result->num_rows;
	for($j=0;$j<$rows;$j++)
	{
		$row=$result->fetch_array(MYSQLI_ASSOC);
		$r0=$row['id'];
		$r1=$row['圖片'];
		echo <<<_END
<form method="POST">
<div class="col-md-3">
	<div class="thumbnail">  <!--thumbnail:縮圖類別-->
		<img src="$r1" alt="">
		<div class="caption">
			<button type="submit" class="glyphicon glyphicon-heart btn btn-info" style="border-radius:100%">
			<input type="hidden" name="cid" value='$r0'>
			<input type="hidden" name="cimg" value='$r1'>
		</div>
	</div>
</div>
</form>
_END;
	}
$result->close();
$conn->close();
?>
</div>
<!--<div class="jumbotron text-center" style="margin-bottom:-2cm">
  <p>底部内容</p>
</div>-->
</div>
</body>
</html>





