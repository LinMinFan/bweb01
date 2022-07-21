<?php
$do = $_GET['do'];
include "../base.php";
$ids=$_POST['id'];

if(!empty($_POST['del'])){
    foreach ($ids as $id) {
        if (in_array($id,$_POST['del'])) {
            $$do->del($id);
        }
    }
}else {
    foreach ($ids as $key => $id) {
        $data=$$do->find($id);

        switch ($do) {
            case 'title':
                $data['text']=$_POST['text'][$key];
                $data['sh']=(in_array($id,$_POST['sh']))?1:0;
                break;
            case 'ad':
            case 'news':
                $data['text']=$_POST['text'][$key];
                $data['sh']=(in_array($id,$_POST['sh']))?1:0;
                break;
            case 'mvim':
            case 'image':
                $data['sh']=(in_array($id,$_POST['sh']))?1:0;
                break;
            case 'admin':
                $data['acc']=$_POST['acc'][$key];
                $data['pw']=$_POST['pw'][$key];
                break;
            
            default:
                # code...
                break;
        }
        $$do->save($data);
    }

}


to("../back.php?do=".$do);


?>