<head>
<link rel="stylesheet" href="global.css">
<meta charset='utf-8'>
</head>

<?php
session_start();

$connect = mysqli_connect("localhost", "root", "", "cose451") or die("connect failed");

//입력 받은 id와 password
$id = $_GET['id'];
$pw = $_GET['pw'];

$argument = "./login ". $id . " ". $pw;

exec($argument,$output,$ret);

if($retval == 11) {
      echo '<div class="info">Login success!</div>';
      $_SESSION["connected"] = 1;
      $_SESSION["username"] = $login;
      $_SESSION["pass"] = $pass;
      $_SESSION["voted"] = $voted[0];
      header("Location: main_page.php");
    }
    else if ($retval == 12) {
      $_SESSION["connected"] = 0;
      echo '<div class="wrong">'.$voted[0].'</div>';
    }
    ?>
<?php
//아이디가 있는지 검사

#$query = "select * from Users where id='$id'";
#$result = $connect->query($query);

/*
//아이디가 있다면 비밀번호 검사
if (mysqli_num_rows($result) == 1) {

    $row = mysqli_fetch_assoc($result);

    //비밀번호가 맞다면 세션 생성
    if ($row['passwd'] == $pw) {    //password 평문비교 취약!
	    $_SESSION['userid'] = $id;
	    $_SESSION['level'] = $row['level'];
        if (isset($_SESSION['userid'])) {
?> <script>
                location.replace("./index.php");
            </script>
        <?php
        } else {
            echo "session failed";
        }
    } else {
        ?> <script>
            alert("아이디 또는 비밀번호를 확인해주세요.");
            history.back(); //js 이 전페이지(login.php)로 돌아가기
        </script>
    <?php
    }
} else {
    ?> <script>
        alert("아이디 또는 비밀번호를 확인해주세요.");
        history.back();

    </script>
<?php
}
?>
 */
