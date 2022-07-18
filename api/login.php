<?php
include "../base.php";

$acc = $_POST['acc'];
$pw = $_POST['pw'];
$adm = $admin->math('count','id',['acc' => $acc, 'pw' => $pw]);
dd($adm);
if (empty($adm)) {
?>
    <script>
        alert('帳號或密碼輸入錯誤');
        location.href="../index.php?do=login"
    </script>
<?php
} else {
    $_SESSION['adm'] = $acc;
    to("../back.php?do=title");
}


?>