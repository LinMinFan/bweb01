<?php
include "../base.php";
$do=$_GET['do'];
if (!empty($_FILES['img'])) {
    $_POST['img']=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/{$_POST['img']}");
    $$do->save($_POST);
}
to("../back.php?do=$do");