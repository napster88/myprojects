<html>

<head>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/jquery-ui.min.js"></script>
</head>
<body>
<form class="form login-form" action="" method="post">
<div class="container">

<input class="input" placeholder="Username" required type="text" name="username">
<input class="input"  placeholder="Password" required type="password" name="password">
<input class="button" type="submit" name="login" value="Login">


</div>
</form>

<?php  


 require_once('get-common/dbconnect.php'); 
 if(isset($_POST['login']))
 {
	echo  $uname=$_POST['username'];
	 echo $upwd=$_POST['password'];
	$query="SELECT * FROM `user_detail` WHERE `user_name`='$uname'&&`user_pwd`='$upwd'";
	 $result = mysqli_query($dbc,$query);
	 $row=mysqli_fetch_array($result);
	 $count=mysqli_num_rows($result);
	echo $count;
	if($count==1)
	{
		session_start();
		
		echo $_SESSION['id']=$row['user_id'];
		header('location:dashboard.php');
	}
 }

?>
</style>
</body>
</html>
<style>


@import url(https://fonts.googleapis.com/css?family=Roboto:300);

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 100px auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form .input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #76b852;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #000;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.button:hover,.form .button:active,.form .button:focus {
  background: #43A047;
}

.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #76b852; 
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}