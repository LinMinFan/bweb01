<?php
$do=$_GET['do'];
include "../base.php";
$id=$_GET['id'];
if (isset($_FILES['img'])) {
    $data=$$do->find($id);
    $name=$_FILES['img']['name'];
    $tmp=$_FILES['img']['tmp_name'];
    move_uploaded_file($tmp,"../img/$name");
    $data['img']=$name;
    $$do->save($data);
}

$url="../back.php?do=$do";
to($url);
?>