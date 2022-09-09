<?php
include "../base.php";

if ($admin->math('count','id',$_POST)>0) {
    $_SESSION['acc']=$_POST['acc'];
    to("../back.php");
}else{
?>
<script>
    alert("帳號或密碼錯誤");
    location.href="../index.php?do=login";
</script>
<?php
}