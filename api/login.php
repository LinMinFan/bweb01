<?php
include "../base.php";
$chk=$admin->math('count','id',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);

if ($chk == 1) {
    to("../back.php?do=title");
}else {
?>
<script>
    alert("帳號或密碼輸入錯誤");
    location.href="../index.php?do=login";
</script>
<?php
}
?>