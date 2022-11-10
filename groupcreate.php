<head>
<link rel="stylesheet" href="global.css">
<meta charset='utf-8'>
</head>

<?php
session_start();
if($_SESSION["connected"]==1){?>

    <div class="input">
       <form action=<?php echo $_SERVER['PHP_SELF'];?> method ="post"class="joinBox">
            <div class="inputJBox">
                <span class="star">*</span>
                <input type="text" id="nickname" name="name" placeholder="그룹 이름 입력 (5 ~ 20자)" required="required" autofocus="autofocus">
            </div>
            <span class="error_next_box"></span>
            <div class="inputJBox">
                <span class="star">*</span>
                <input type="text" id="id" name="id" placeholder="아이디 입력 (5 ~ 20자)" required="required" autofocus="autofocus">
            </div>
            <span class="error_next_box"></span>
            <div class="inputJBox">
                <span class="star">*</span>
                <input type="password" id="pw" name="pw" placeholder="비밀번호 입력 (문자, 숫자, 특수문자 포함 8 ~ 16자)" required="required" autofocus="autofocus">
            </div>
            <span class="error_next_box"></span>
            <div class="inputJBox">
                <span class="star">*</span>
                <input type="password" id="pw_check" name="pw_check" placeholder="비밀번호 재입력" required="required" autofocus="autofocus">
            </div>
            <span class="error_next_box"></span>
           <br> 

            <div class="btn" style="padding-top: 0;">
                <button type="submit" class="loginBtn" style="padding: 10px 35px; border-radius:5px !important; font-size: 13px;"><strong>그룹생성  완료</strong></button><br>
<p class="loginBtn" onclick="location.href='./mainpage.php'" style="padding: 10px 35px; border-radius:5px !important; font-size: 13px;oi">돌아가기</p>	    
</div>
        </form>
    </div>
</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $pw_check = $_POST['pw_check'];
    $name=htmlentities($name);
    $id = preg_replace('/[^A-Za-z0-9 ]/', '', $id);
    $pw = preg_replace('/[^A-Za-z0-9 ]/', '', $pw);
    $user_id=$_SESSION['id'];
    if($pw==$pw_check){	
    $argument = "./groupcreate ". $id . " ". $pw ." ". $pw_check ." ". $name ." ".$user_id;
    exec($argument,$output,$ret);
    echo $argument;

    if($ret==21)
    {
?>
	    <script>alert("signin success!")
		location.replace("./mainpage.php");	    
</script><?php
    		
    }
    if($ret==11)
    {
?>
	    <script>alert("id is already exist")</script><?php
    }
    }
    else{
?>
	    <script>alert("pw is not same")</script><?php
    }
    
    
}
}
?>

