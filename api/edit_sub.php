<?php
$do = $_GET['do'];
include "../base.php";
$parent=$_GET['parent'];
$data=[];

if (isset($_POST['text2'])) {
    foreach (($_POST['text2']) as $key => $text2) {
        $data['text']=$text2;
        $data['href']=$_POST['href2'][$key];
        $data['parent']=$parent;
        $data['sh']=0;
        $$do->save($data);
    }
}else {
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
            $data['text']=$_POST['text'][$key];
            $data['href']=$_POST['href'][$key];
            $$do->save($data);
        }
    }
}
to("../back.php?do=".$do);

?>

