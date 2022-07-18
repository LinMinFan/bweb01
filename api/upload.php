<?php
include "../base.php";
$table=$_POST['table'];
$id=$_POST['id'];
$data=$$table->find($id);
if(isset($_FILES['img']['tmp_name'])){
    $imgname=$_FILES['img']['name'];
    $imgtmp=$_FILES['img']['tmp_name'];
    move_uploaded_file($imgtmp,"../img/".$imgname);
    $data['img']=$imgname;
}


$$table->save($data);

to("../back.php?do=".$table);
?>