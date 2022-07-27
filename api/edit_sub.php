<?php
$do=$_GET['do'];
include "../base.php";
$ids=$_POST['id'];

if (isset($_POST['text2'])) {
    $data=[];
    foreach ($_POST['text2'] as $key => $value) {
        $data['text']=$value;
        $data['href']=$_POST['href2'][$key];
        $data['parent']=$_GET['parent'];
        $data['sh']=0;
    }
    
    $$do->save($data);
    }
    if (!empty($_POST['del'])) {
        foreach ($ids as $key => $id) {
            if (in_array($id,$_POST['del'])) {
                $$do->del($id);
            }
        }
    }else {
        foreach ($ids as $key => $id) {
            $data=$$do->find($id);
            $data['text']=$_POST['text'][$key];
            $data['href']=$_POST['href'][$key];
    
            $$do->save($data);
        }
    }
    

    

$url="../back.php?do=$do";
to($url);
?>