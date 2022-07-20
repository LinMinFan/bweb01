<?php
include "../base.php";
$table=$_POST['table'];
$id=$_POST['id'];

$data=$$table->find($id);

if (isset($_FILES['img']['name'])) {
    $name=$_FILES['img']['name'];
    $tmp_name=$_FILES['img']['tmp_name'];
    move_uploaded_file($tmp_name,"../img/".$name);
    $data['img']=$name;
}


$$table->save($data);
$url="../back.php?do=".$table;
to($url);

?>