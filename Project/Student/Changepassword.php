<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<div id="tab" align="center">
<h1 align="center">Change Password</h1>
<?php
ob_start();

include('Head.php');
include("../Assets/Connection/Connection.php");

$studentid=$_SESSION['sid'];

if(isset($_POST["btn_submit"]))
{
	$selQry="select * from tbl_student where student_id='".$studentid."'";
	$result=$con->query($selQry);
	$row=$result->fetch_assoc();
	
	$currpass=$_POST["txt_currentpassword"];
	$newpass=$_POST["txt_newpassword"];
	$repass=$_POST["txt_repassword"];
	$oldpass=$row['student_password'];
	
	if($oldpass==$currpass)
	{
		if($currpass==$newpass)
		{
			?>
			<script>
			alert("PASSWORLD ALREADY EXISTS");
			</script>
			<?php
		}
		elseif($newpass==$repass)
		{
			$upQry="update tbl_student set student_password='".$newpass."' where student_id='".$studentid."'";
			$con->query($upQry);
		}
		else
		{
			?>
			<script>
			alert("PASSWORDS ARE NOT MATCHING");
			</script>
			<?php
		}
	}
}
include("Head.php");
?>
<form id="form1" name="form1" method="post" action="">
  <table width="370" border="1">
    <tr>
      <td width="167">Current Password</td>
      <td width="187"><label for="txt_currentpassword"></label>
      <input type="password" required name="txt_currentpassword" id="txt_currentpassword" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_newpassword"></label>
      <input type="password" required name="txt_newpassword" id="txt_newpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" /></td>
    </tr>
    <tr>
      <td>Re-enter Password</td>
      <td><label for="txt_repassword"></label>
      <input type="password" required name="txt_repassword" id="txt_repassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </td>
    </tr>
  </table>
</form>
</div>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>