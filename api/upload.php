<?php
include "../base.php";
$id = $_POST['id'];
$table = $_POST['table'];
//echo $table;
$DB = new DB($table);
dd($DB->all());
$data=[];
$data['id'] = $id;
if(isset($_FILES['img']['tmp_name'])){
    //dd($_FILES['img']);
    $imagename = $_FILES['img']['name'];
    $imagetmp = $_FILES['img']['tmp_name'];
    move_uploaded_file($imagetmp,"../img/".$imagename);
    $data['img']=$imagename;
}

dd($data);

$DB->save($data);

to("../back.php?do=$table");

?>