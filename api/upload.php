<?php
include "../base.php";

if (!empty($_FILES['img'])) {
    $data=${$_GET['do']}->find($_GET['id']);
    $data['img']=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/{$data['img']}");
}
${$_GET['do']}->save($data);
to("../back.php?do={$_GET['do']}");
?>