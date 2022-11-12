<?php
session_start();
session_destroy();
?>
<script>
    alert("로그아웃 했어요!");
    location.replace('index.php');
</script>
