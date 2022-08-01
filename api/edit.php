<?php
$do = $_GET['do'];
include "../base.php";

if (isset($_POST['del'])) {
    $idx=$_POST['id'];
    foreach ($idx as $key => $id) {
        if (in_array($id,$_POST['del'])) {
            $$do->del($id);
        }
    }
}else {
    $idx=$_POST['id'];
    foreach ($idx as $key => $id) {
        $data=$$do->find($id);
        switch ($do) {
            case 'title':
            case 'ad':
            case 'news':
                $data['text']=$_POST['text'][$key];
                $data['sh']=(in_array($id,$_POST['sh']))?1:0;
                break;
            case 'mvim':
            case 'image':
                $data['sh']=(in_array($id,$_POST['sh']))?1:0;
                break;
            case 'menu':
                $data['text']=$_POST['text'][$key];
                $data['href']=$_POST['href'][$key];
                $data['sh']=(in_array($id,$_POST['sh']))?1:0;
                break;
            
            default:
                # code...
                break;
        }
        $$do->save($data);
    }
}

to("../back.php?do=$do");
?>