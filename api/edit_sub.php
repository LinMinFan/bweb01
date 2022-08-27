<?php
include "../base.php";
$parent=$_GET['parent'];
if (!empty($_POST['text2'])) {
    $data=[];
    foreach ($_POST['text2'] as $key => $text2) {
        $data['text']=$text2;
        $data['href']=$_POST['href2'][$key];
        $data['parent']=$parent;
        $data['sh']=0;
        ${$_GET['do']}->save($data);
    }
}
if (!empty($_POST['id'])) {
    foreach ($_POST['id'] as $key => $id) {
        if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
            ${$_GET['do']}->del($id);
        }else{
            $edit=$menu->find($id);
            $edit['text']=$_POST['text'][$key];
            $edit['href']=$_POST['href'][$key];
            ${$_GET['do']}->save($edit);
        }
    }
}
to("../back.php?do={$_GET['do']}");
?>