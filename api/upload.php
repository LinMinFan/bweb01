<?php
$do = $_GET['do'];
$id = $_GET['id'];
include "../base.php";

if(isset($_FILES['img'])){
    $data=$$do->find($id);
    $name=$_FILES['img']['name'];
    $tn=$_FILES['img']['tmp_name'];
    move_uploaded_file($tn,"../img/".$name);
    $data['img']=$name;
    $$do->save($data);
}


to("../back.php?do=".$do);


?>