<?php
$do = $_GET['do'];
include "../base.php";

if(isset($_FILES['img'])){
    $data=[];
    $name=$_FILES['img']['name'];
    $tn=$_FILES['img']['tmp_name'];
    move_uploaded_file($tn,"../img/".$name);
    $data['img']=$name;
    $data['text']=$_POST['text'];
    $data['sh']=0;
    $$do->save($data);
}else {
    $data=[];
    switch ($do) {
        case 'ad':
        case 'news':
            $data['text']=$_POST['text'];
            $data['sh']=1;
            break;
        case 'admin':
            $data['acc']=$_POST['acc'];
            $data['pw']=$_POST['pw'];
            break;
        case 'menu':
            $data['text']=$_POST['text'];
            $data['href']=$_POST['href'];
            $data['parent']=0;
            $data['sh']=1;
            break;
        
        default:
            # code...
            break;
    }
    $$do->save($data);
}


to("../back.php?do=".$do);


?>