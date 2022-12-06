<head>
<link rel="stylesheet" href="global.css">
<meta charset='utf-8'>
</head>

    

    <div class="input">
       <form action=<?php echo $_SERVER['PHP_SELF'];?> method ="post" class="joinBox">
            <div class="inputJBox">
                <span class="star">*</span>
                <input  id="nickname" name="name" placeholder="닉네임 입력 (5 ~ 20자)" required="required" autofocus="autofocus">	    
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
                <button type="submit" class="loginBtn" style="padding: 10px 35px; border-radius:5px !important; font-size: 13px;"><strong>회원가입 완료</strong></button><br>
<p class="loginBtn" onclick="location.href='./index.php'" style="padding: 10px 35px; border-radius:5px !important; font-size: 13px;oi">돌아가기</p>	    
</div>
        </form>
    </div>
</form>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = $_POST['name'];
	#$name= str_replace(' ' ,'',$name);
	$id = $_POST['id'];
	$id=str_replace(' ' ,'', $id);
	$pw = $_POST['pw'];
	$pw=str_replace(' ','',$id);
	$pw_check = $_POST['pw_check'];
	$pw_check=str_replace(' ','', $id);
        
    $id = preg_replace('/[^A-Za-z0-9 ]/', '', $id);
    $pw = preg_replace('/[^A-Za-z0-9 ]/', '', $pw);
	
    if(strlen($id)<3||strlen($pw)<3||strlen($name)<3)
    {
?>
<script>alert("더 길게 입력 해 주세요!");
	    history.back();
	    </script>
<?php
	
    }
    else{
    if($pw==$pw_check){	
    $argument = "./signin ". $id . " ". $pw ." ". $pw_check ." ". $name;
    exec($argument,$output,$ret);
   # echo $argument;

    if($ret==21)
    {
?>
	    <script>alert("signin success!")
		location.replace("./index.php");	    
</script><?php
    		
    }
    if($ret==11)
    { 
	    system($name);
?>
	    <script>
	    location.replace("/index.php");
	    alert("id is already exist");
	    </script>
		<?php

	    
    }
    }
    else{
?>
	    <script>alert("pw is not same")</script><?php
    }
    
echo json_encode($output);    
}
}
?>

