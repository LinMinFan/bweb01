<?php
$do=$_GET['do'];
include "../base.php";
$ids=$_POST['id'];

if (!empty($_POST['del'])) {
    foreach ($ids as $key => $id) {
        if (in_array($id,$_POST['del'])) {
            $$do->del($id);
        }
    }
}else {
    foreach ($ids as $key => $id) {
        $data=$$do->find($id);
        switch ($do) {
            case 'title':
            case 'ad':
            case 'news':
                $data['text']=$_POST['text'][$key];
                $data['sh']=((isset($_POST['sh'])) && in_array($id,$_POST['sh']))?1:0;
                break;
            case 'mvim':
            case 'image':
                $data['sh']=((isset($_POST['sh'])) &&in_array($id,$_POST['sh']))?1:0;
                break;
            case 'image':
                $data['acc']=$_POST['acc'][$key];
                $data['pw']=$_POST['pw'][$key];
                break;
            case 'menu':
                $data['text']=$_POST['text'][$key];
                $data['href']=$_POST['href'][$key];
                $data['sh']=((isset($_POST['sh'])) &&in_array($id,$_POST['sh']))?1:0;
                break;
            
            default:
                # code...
                break;
        }
        $$do->save($data);
    }
}




$url="../back.php?do=$do";
to($url);
?>