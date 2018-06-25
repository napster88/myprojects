<?php 
session_start();

$uid=$_SESSION['id'];

require_once('get-common/dbconnect.php'); 
?>
<form action="" method="post">
<div class="login_dashboard">

<label>Enter New Password</label><input required type="password" name="userpwd">
<label>Confirm Password</label><input required type="password" name="password">
<input type="submit" name="save" value="Change Password">
</div>
</form>

<?php 
if(isset($_POST['save']))
{
$upwd=$_POST['userpwd'];
$query="UPDATE `user_detail` SET `user_pwd`='$upwd' WHERE `user_id`='$uid'";
	 $result = mysqli_query($dbc,$query);
	 session_destroy();
 header('location:login.php');
}
?>
<style>
.login_dashboard span{
	display:block;
}
.login_dashboard{
	width: 264px;
height: 214px;
border: solid 1px #000;
padding: 28px;
margin: 134px 0 0 475px;

}
</style>