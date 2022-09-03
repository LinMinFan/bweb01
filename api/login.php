<?php
include "../base.php";

if ($admin->find($_POST)>0) {
    $_SESSION['acc']=1;
    to("../back.php");
}else {
    ?>
      <script>
        alert("帳號或密碼錯誤");
        location.href="../index.php?do=login";
      </script>  
    <?php
}