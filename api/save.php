<?php
include "../base.php";
$do=$_GET['do'];
if (!empty($_FILES['img'])) {
    $_POST['img']=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/{$_POST['img']}");
    switch ($do) {
        case 'title':
            $_POST['sh']=0;
            break;
        case 'mvim':
        case 'image':
            $_POST['sh']=1;
            break;
        
        default:
            
            break;
    }
    $$do->save($_POST);
}

if (!empty($_POST['id'])) {
    foreach ($_POST['id'] as $key => $id) {
        if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
            $$do->del($id);
        }else{
            $data=$$do->find($id);
            switch ($do) {
                case 'title':
                case 'ad':
                case 'news':
                    $data['text']=$_POST['text'][$key];
                    $data['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                    break;
                case 'mvim':
                case 'image':
                    $data['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                    break;
                case 'menu':
                    $data['text']=$_POST['text'][$key];
                    $data['href']=$_POST['href'][$key];
                    $data['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                    break;
                case 'admin':
                    $data['acc']=$_POST['acc'][$key];
                    $data['pw']=$_POST['pw'][$key];
                    break;
                
                default:
                    
                    break;
            }
            $$do->save($data);
        }
    }
}

if (!isset($_FILES['img']) && !isset($_POST['id'])) {
    switch ($do) {
        case 'ad':
        case 'news':
            $_POST['sh']=1;
            break;
        case 'admin':
            unset($_POST['pw2']);
            break;
        case 'menu':
            $_POST['parent']=0;
            $_POST['sh']=1;
            break;
        
        default:
            
            break;
    }
    $$do->save($_POST);
}

to("../back.php?do=$do");