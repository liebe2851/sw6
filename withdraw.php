<?php
session_start();

$connect = mysqli_connect("localhost", "root", "", "cose451") or die("connect failed");

//입력 받은 id와 password
$id = $_POST['group_withdraw_id'];
$pw = $_POST['group_pw'];
$amount=$_POST['amount'];
if(strlen($id)<1||strlen($pw)<1||$amount<0){
?>
	<script>alert("입력이 잘못되었습니다.")
	history.back();</script><?php
}
//echo $amount;
//아이디가 있는지 검사
$query = "select money from `groups` where id='$id' and pw='$pw';";
//echo $query;
$result = $connect->query($query);

$row = mysqli_fetch_assoc($result);

$origin_money=$row['money'];

$new_money=$origin_money-$amount;
//echo $new_money;
if($mysqli_num_rows($result)>0&&$new_money<0){
?>
	<script>alert("돈이 모자라요!");
	history.back();
	</script>
<?php
}

$query2= "update `groups` set money='$new_money' where id='$id' and pw='$pw';";

//echo $query2;



if (mysqli_num_rows($result) == 1){

$result2 = $connect->query($query2);

?>

	<script> alert("입금 되었습니다.");
	location.replace("/mainpage.php");
	</script>
		<?php
}
else{ 
?>
<script> alert("아이디 비밀번호가 잘못된거 같아요");
history.back();</script><?php

}
?>
