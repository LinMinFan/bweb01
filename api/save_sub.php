<?php
include "../base.php";
$do=$_GET['do'];
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

if (!empty($_POST['id'])) {
  foreach ($_POST['id'] as $key => $id){
    if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
      $$do->del($id);
    }else{
      $data=$$do->find($id);
      $data['text']=$_POST['text'][$key];
      $data['href']=$_POST['href'][$key];
      $$do->save($data);
  }
  }
}



to("../back.php?do={$do}");
