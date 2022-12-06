<?php

$connect = mysqli_connect("localhost", "root", "sjoo", "cose451") or die("fail");
session_start();
$memo=$_POST['memo'];
$id = $_SESSION['id'];
$memo=str_replace("'","",$memo);
$memo = preg_replace('/[^A-Za-z0-9 ]/', '', $memo);
$query = "INSERT INTO board values('$memo', '$id');";

$result = $connect->query($query);

?>

<script> location.replace("/memo.php");</script>
