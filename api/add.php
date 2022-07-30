<?php
$do = $_GET['do'];
include "../base.php";

$data=[];
if (isset($_FILES['img'])) {
    $name=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/$name");
    $data['img']=$name;
}

switch ($do) {
    case 'title':
        $data['text']=$_POST['text'];
        $data['sh']=0;
        break;
    case 'ad':
    case 'news':
        $data['text']=$_POST['text'];
        $data['sh']=1;
        break;
    case 'mvim':
    case 'image':
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

to("../back.php?do=$do");

?>