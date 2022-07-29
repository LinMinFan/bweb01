<?php
$do=$_GET['do'];
include "../base.php";
//dd($_FILES['img']);
//$ids=$_POST['id'];
$parent = $_GET['parent'];

if (isset($_POST['text2'])){
    $data=[];
    foreach ($_POST['text2'] as $key => $text2) {
        $data['text']=$text2;
        $data['href']=$_POST['href2'][$key];
        $data['parent']=$parent;
        $data['sh']=0;
        $$do->save($data);
    }
}

if (!empty($_POST['del'])) {
    foreach ($_POST['id'] as $id) {
        if (in_array($id,$_POST['del'])) {
            $$do->del($id);
        }
    }
}else {
    foreach ($_POST['id'] as $key => $id) {
        $data=$$do->find($id);
        $data['text']=$_POST['text'][$key];
        $data['href']=$_POST['href'][$key];
        $$do->save($data);
    }
}

$url="../back.php?do=$do";

to($url);
?>