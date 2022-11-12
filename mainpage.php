<head>
<link rel="stylesheet" href="global.css">
<meta charset='utf-8'>
</head>

<?php 
session_start();
$connect = mysqli_connect('localhost', 'root', 'sjoo', 'cose451') or die("connect failed");
$id=$_SESSION['id'];

$query1= "select gid,name,cnt,money from (select `group` as gid ,count(*) as cnt from group_user where user='$id'  group by `group`) A right join `groups` on A.gid=`groups`.id where gid is not null;";

//echo $query1;

$result= mysqli_query($connect, $query1);
//echo $query1;

?>


<form use:form>

    <div class="main_pic_bg">
        <div class="city_edit"> 
	    <h1>자산 관리</h1>
	    <b><?php 
	session_start();
	echo $_SESSION['id']; ?> 님 안녕하세요! </b>
            <p>속한 그룹과 잔고를 확인할 수 있습니다.</p>
            <div class="mypage_box">
                    <div class="mypage_title">
                        <div class="reg_svc_list_title">
                            현재 속한 그룹
                        </div>
                    </div>
                    <div class="table_box">
                        <table class="data_table">
                            <thead>
                                <tr>
                                    <th width="10%">번호</th>				    
                                    <th width="30%">그룹id</th>
                                    <th width="30%">그룹명</th>
                                    <th width="10%">소속 인원수</th>
                                    <th width="20%">그룹 돈</th> 
                                    
                                </tr>
                            </thead>
                            <tbody id="mytable">
</tbody>
</table>
<?php
	 $total = mysqli_num_rows($result);
	while ($rows = mysqli_fetch_assoc($result)) { 
?>
<table class="data_table">
<thead>
<tr>	
  <th width="10%"><?php echo $total;?></th>
	<th width="30%"><?php echo $rows['gid'];?></th>
	<th width="30%"><?php echo $rows['name'];?></th>
	<th width="10%"><?php echo $rows['cnt'];?></th>
	<th width="20%"><?php echo $rows['money'];?></th>		
</tr>
<tbody id="mytable">
</thead>
<br>	

<?php
$total--;	}?>
		</table>
     
                    </div>
                <a class="test_manage_btn" href="/group.php">그룹 관리</a>
		<a class="test_manage_btn" href="/groupcreate.php">그룹생성</a>
<a class="test_manage_btn" href="/groupinvite.php">그룹초대</a>
<a class="test_manage_btn" href="/write.php">메모작성</a>
<a class="test_manage_btn" href="/memo.php">메모보기</a>
<a class="test_manage_btn" href="/logout.php" >로그아웃</a>
	</div>
    </div>
</form>

<?php
		while ($rows = mysqli_fetch_assoc($result)) { 
			echo $rows['`group`'];
			echo $rows['count(*)'];
		}
/*		
$connect = mysqli_connect('localhost', 'root', '', 'cose451') or die("connect failed");
$id=$_SESSION['id'];
$query1 = "select `group`,count(*) from group_user where `user`='$id' group by `group`";
$result= mysqli_query($connect, $query);
echo $query1;
echo $result;
$query2 = "select * from Users where id='$id'";
*/
?>

<!--
<div class="justBox">
    <form use:form>
        <div class="input" style="width: 500px; height:300px; margin-right:50px">
            <form class="loginBox" method="POST" action="/group_deposit">
              <div class="inputBox">
                <input type="text" id="id" name="group_deposit_id" placeholder="Enter your group id" >
              </div>
              <div class="inputBox">
                <input type="password" id="id" name="groupd_deposit_amount" placeholder="Enter amount" >
              </div>
              <div class="btn">
                <button type="submit" class="loginBtn"><strong>Deposit</strong></button><br>
              </div>
            </form>
            
          </div>
    
      </form>
    
      <form use:form>
    
        <div class="input" style="width: 500px; height:300px; margin-left:50px" >
            <form class="loginBox" method="POST" action="/group_withdraw">
              <div class="inputBox">
                <input type="text" id="id" name="group_withdraw_id" placeholder="Enter your group id" >
              </div>
              <div class="inputBox">
                <input type="password" id="id" name="group_withdraw_amount" placeholder="Enter amount" >
              </div>
              <div class="btn">
                <button type="submit" class="loginBtn"><strong>Withdraw</strong></button><br>
              </div>
            </form>
            
          </div>
    
      </form>
</div>
