<?php
include "../base.php";

$chk_acc=$admin->math('count','id',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);

if ($chk_acc>0) {
    $_SESSION['acc']=1;
    to("../back.php");
}else{
    ?>
    <script>
        alert("帳號或密碼輸入錯誤");
        location.href="../index.php?do=login";
    </script>
    <?php
    
}
