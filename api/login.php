<?php
include "../base.php";

$acc=$_POST["acc"];
$pw=$_POST["pw"];

$chk=$admin->math("count","id",["acc"=>$acc,"pw"=>$pw]);

if ($chk==1) {
    $_SESSION['acc']=1;
    $url="../back.php?do=title";
    to($url);
}else {
?>
<script>
    alert("「帳號或密碼輸入錯誤");
    location.href="../index.php?do=login";
</script>
<?php
}
?>


