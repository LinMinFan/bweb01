<?php
include "../base.php";
$do=$_GET['do'];

foreach ($_POST['id'] as $key => $id) {
    if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
        $$do->del($id);
    }else {
        switch ($do) {
            case 'title':
            case 'ad':
            case 'news':
                $data=$$do->find($id);
                $data['text']=$_POST['text'][$key];
                $data['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                break;
            case 'menu':
                $data=$$do->find($id);
                $data['text']=$_POST['text'][$key];
                $data['href']=$_POST['href'][$key];
                $data['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                break;
            case 'admin':
                $data=$$do->find($id);
                $data['acc']=$_POST['acc'][$key];
                $data['pw']=$_POST['pw'][$key];
                break;
            case 'mvim':
            case 'image':
                $data=$$do->find($id);
                $data['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                break;
            
            default:
                # code...
                break;
        }
        $$do->save($data);
    }
}





to("../back.php?do=$do");
