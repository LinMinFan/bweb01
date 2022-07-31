
<?php
$do=$_GET['do'];
include "../base.php";

if (isset($_FILES['img'])) {
    $data=[];
    $name=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/$name");
    $data['img']=$name;
    switch ($do) {
        case 'title':
            $data['text']=$_POST['text'];
            $data['sh']=0;
            break;
        case 'mvim':
        case 'image':
            $data['sh']=1;
            break;
        
        default:
            # code...
            break;
    }
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
            $data['sh']=1;
            $data['parent']=0;
            break;
        
        default:
            # code...
            break;
    }
    $$do->save($data);
}

to("../back.php?do=".$do);
