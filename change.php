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
    	width:50%;
    	margin: auto;
	 	height: 12cm;
		}
		.col-md-2 > .thumbnail > img{
		height:5cm;
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
<div class="row text-center">
<?php
$conn=new mysqli('127.0.0.1','root','ncutm514','nail');
if(isset($_POST['delete']))
{
	$id=get_post($conn,'id');
	$query="DELETE FROM `平常` WHERE `id`=$id";
	$result=$conn->query($query);
	if(!$result) echo("刪除失敗<br>");
}
if($_POST['insert']!=null)
{
	switch($_FILES['filename']['type'])
	{
		case'image/jpeg': $ext='jpg';break;
		case'image/gif':  $ext='gif';break;
		case'image/png':  $ext='png';break;
		case'image/tiff': $ext='tif';break;
		default:          $ext='';break;
	}
	if($ext)
	{
		$n="image.$ext";
		move_uploaded_file($_FILES["filename"]["tmp_name"],$n);
		$query="INSERT INTO `平常`(`圖片`) VALUES ('$n')";
		$result=$conn->query($query);
		if(!$result) echo("新增失敗");
	}
	else
	{
		$name=$_FILES["filename"]["name"];
		move_uploaded_file($_FILES["filename"]["tmp_name"],$name);
		echo "<pre>";
		echo file_get_contents($name);
		echo "</pre>";
	}
}
echo <<<_END
<form method="POST" enctype="multipart/form-data" class="text-left">
新增<br><br>
<input type="file" name="filename" size="10"><br>
<input type="submit" value="新增" name="insert"><hr>
刪除<br><br>
ID: <input type="text" name="id">  <input type="submit" value="刪除" name="delete">
<hr>
</form>

_END;
$query="SELECT * FROM `平常`";
$result=$conn->query($query);
$rows=$result->num_rows;
	for($j=0;$j<$rows;$j++)
	{
		$row=$result->fetch_array(MYSQLI_ASSOC);
		$r0=$row['id'];
		$r1=$row['圖片'];
		echo <<<_END
<div class="col-md-2">
ID: $r0
	<div class="thumbnail">  <!--thumbnail:縮圖類別-->
		<img src="$r1" alt="">
		<div class="caption">
			<a href="#" class="btn btn-info icon-bar glyphicon glyphicon-shopping-cart" style="border-radius:50%; margin: left;"></a>
		</div>
	</div>
</div>
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
</div>
</body>
</html>