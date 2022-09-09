<?php
include "../base.php";
$do=$_GET['do'];
$parent=$_GET['parent'];
if (!empty($_POST['id'])) {
    foreach ($_POST['id'] as $key => $id) {
        if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
            $$do->del($id);
        }else{
            $data=$$do->find($id);
            $data['text']=$_POST['text'][$key];
            $data['href']=$_POST['href'][$key];
            $data['sh']=0;
            $$do->save($data);
        }
    }
}

if(isset($_POST['text2'])){
    $data=[];
    foreach ($_POST['text2'] as $key => $tex2) {
        $data['text']=$tex2;
        $data['href']=$_POST['href2'][$key];
        $data['parent']=$parent;
        $data['sh']=0;
        $$do->save($data);
    }
}

to("../back.php?do=$do");