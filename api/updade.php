<?php
include "../base.php";

$_POST['id']=1;
${$_GET['do']}->save($_POST);
to("../back.php?do={$_GET['do']}");
?>