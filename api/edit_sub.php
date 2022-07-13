<?php
include "../base.php";

//編輯和刪除,依據$_POST['id']

if(!empty($_POST['id'])){
    foreach($_POST['id'] as $idx=>$id){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $menu->del($id);
        }else{
            $row=$menu->find($id);
            $row['text']=$_POST['text'][$idx];
            $row['href']=$_POST['href'][$idx];
            $menu->save($row);
        }
    }
}

//新增資料,依據$_POST['text2']或是$_POST['href2']
if(isset($_POST['text2'])){
    foreach($_POST['text2'] as $idx => $text){
        if($text!=''){
            $data['text']=$text;
            $data['href']=$_POST['href2'][$idx];
            $data['parent']=$_POST['parent'];
            $menu->save($data);
        }
    }
}

to("../back.php?do=menu");