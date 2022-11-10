<head>
<link rel="stylesheet" href="global.css">
<meta charset='utf-8'>
</head>

<?php
session_start();
$connect = mysqli_connect('localhost', 'root', 'sjoo', 'cose451') or die("connect failed");

$query= "select memo,id from board;";

$result = mysqli_query($connect, $query);


$total = mysqli_num_rows($result);
?>
<?php 
while ($rows = mysqli_fetch_assoc($result)) {
?>

<div class="table_box">
<table class="data_table">
<thead>
<tr>	<td width="100" align="center"><?php echo $total;?></td>
	<td width="100" align="center"><?php echo $rows['memo'];?></td>
	<td width="100" align="center"><?php echo $rows['id'];?></td>

</tr>
<tbody id="mytable">
</tbody>
</thead>
<br>
<?php
$total--;	}?>

</table>
</div>
<p class="loginBtn" onclick="location.href='./mainpage.php'" style="padding: 10px 35px; border-radius:5px !important; font-size: 13px;oi">돌아가기</p> 
