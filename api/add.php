<?php
include "../base.php";
$table=$_POST['table'];
$data=[];
if(isset($_FILES['img']['tmp_name'])){
    $imgname=$_FILES['img']['name'];
    $imgtmp=$_FILES['img']['tmp_name'];
    move_uploaded_file($imgtmp,"../img/".$imgname);
    $data['img']=$imgname;
}

switch ($table) {
    case 'title':
        $data['text']=($_POST['text'])??"";
        $data['sh']=0;
        break;
    case 'ad':
    case 'news':
        $data['text']=($_POST['text'])??"";
        $data['sh']=1;
        break;
    case 'mvim':
    case 'image':
        $data['sh']=1;
        break;
    case 'admin':
        $data['acc']=($_POST['acc'])??"";
        $data['pw']=($_POST['pw'])??"";
        break;
    case 'menu':
        $data['text']=($_POST['text'])??"";
        $data['href']=($_POST['href'])??"";
        $data['parent']=0;
        $data['sh']=1;
        break;
        default:
        # code...
        break;
}

$$table->save($data);

$url="../back.php?do=".$table;
to($url);
?>