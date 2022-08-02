<?php
$do=$_GET['do'];
include "../base.php";
$parent=$_GET['parent'];

if (isset($_POST['text2'])) {
    $data=[];
    foreach ($_POST['text2'] as $key => $text2) {
    
    $data['text']=$text2;
    $data['href']=$_POST['href2'][$key];
    $data['parent']=$parent;
    $data['sh']=0;
    
    $$do->save($data);
    }
}

if (isset($_POST['del'])) {
    $idx=$_POST['id'];
    foreach ($idx as $id) {
        if (in_array($id,$_POST['del'])) {
            $$do->del($id);
        }
    }
}else {
    $idx=$_POST['id'];
    foreach ($idx as $key => $id) {
    $data=$$do->find($id);
    $data['text']=$_POST['text'][$key];
    $data['href']=$_POST['href'][$key];
    $$do->save($data);
    }
}

to("../back.php?do=$do");

