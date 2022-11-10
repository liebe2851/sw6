<head>
<link rel="stylesheet" href="global.css">
<meta charset='utf-8'>
</head>

<?php
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
  $retval = 0;
  $_SESSION["connected"] = 0;
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $pw = $_POST['pw'];
    $id = preg_replace('/[^A-Za-z0-9 ]/', '', $pw);
    $pw = preg_replace('/[^A-Za-z0-9 ]/', '', $pw);
    
    //construct command which will be passed to exec
    $argument = "./login ". $id . " ". $pw;
    
    // call login.c with entered id and password
    exec($argument, $voted, $retval);
    
  }
  ?>
  <div class="input">
    
    <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?> method ="post">
      <div class="inputBox">
        <input type="text"id='id' name="id" placeholder="Enter your id">
      </div>
      <div class="inputBox">
        <input type="password"id='id' name="pw" placeholder="Enter your pw"> 
      </div>
      <a>
        <span></span>
        <span></span>
	<div class='btn'>
	<button type="submit" class="loginBtn"><strong>로그인</strong></button>
	</div>      
</a>
<div class='btn'>
<p class="loginBtn" onclick="location.href='./signin.php'" style="padding: 10px 35px; border-radius:5px !important; font-size: 13px;"><strong>회원가입</strong></p>
    </form>
    
    <?php
    // check whether login was successful
    // login.c returns 11 if successful, 12 otherwise
    if($retval == 11) {
      echo '<div class="info">Login success!</div>';
      $_SESSION["connected"] = 1;
      $_SESSION["id"] = $id;
      
      $_SESSION["voted"] = $voted[0];
?>
<script>
      location.replace("./mainpage.php");
</script>
<?php
    }
    else if ($retval == 12) {
      $_SESSION["connected"] = 0;
      echo '<div class="wrong">'.$voted[0].'</div>';
    }
    ?>
  </div> 
</body>
</html>
