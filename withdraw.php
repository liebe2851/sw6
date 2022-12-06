<?php
session_start();

$connect = mysqli_connect("localhost", "root", "sjoo", "cose451") or die("connect failed");

//입력 받은 id와 password
$id = $_POST['group_withdraw_id'];
$id = preg_replace('/[^A-Za-z0-9 ]/', '', $id);
$pw = $_POST['group_pw'];
$pw = preg_replace('/[^A-Za-z0-9 ]/', '', $pw);
$amount=$_POST['amount'];
$amount = preg_replace('/[^A-Za-z0-9 ]/', '', $amount);
if(strlen($id)<1||strlen($pw)<1||$amount<0||strlen($amount)>9){
?>
	<script>alert("입력이 잘못되었습니다.")
	history.back();</script><?php
}
if(is_numeric($amount)){
//echo $amount;
//아이디가 있는지 검사
$query = "select money from `groups` where id='$id' and pw='$pw';";
//echo $query;
$result = $connect->query($query);

$row = mysqli_fetch_assoc($result);

$origin_money=$row['money'];

$new_money=$origin_money-$amount;
//echo $new_money;
$query2= "update `groups` set money='$new_money' where id='$id' and pw='$pw';";

//echo $query2;



if (mysqli_num_rows($result) == 1&&$new_money>0){

$result2 = $connect->query($query2);

?>

	<script> alert("출금  되었습니다.");
	location.replace("/mainpage.php");
	</script>
		<?php
}
else if($new_money<0){
?>
	<script>alert("돈이 모자라요 .. 1원은 남겨주세요");
	history.back();</script><?php
}
else{ 
?>
<script> alert("그룹정보를 확인해주세요");
history.back();</script><?php

}}

else{ ?> <script>alert("숫자를 입력해주세요!");history.back();</script><?php
}
?>

