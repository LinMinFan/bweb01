<?php
include "../base.php";

if (!empty($_POST['id'])) {
    foreach ($_POST['id'] as $key => $id) {
        if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
            ${$_GET['do']}->del($id);
        }else{
            $data=${$_GET['do']}->find($id);
            switch ($_GET['do']) {
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
                case 'admin':
                    $data['acc']=$_POST['acc'][$key];
                    $data['pw']=$_POST['pw'][$key];
                    break;
                case 'menu':
                    $data['text']=$_POST['text'][$key];
                    $data['href']=$_POST['href'][$key];
                    $data['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
                    break;
                
                default:
                    # code...
                    break;
            }
            ${$_GET['do']}->save($data);
        }
    }
}

to("../back.php?do={$_GET['do']}");
?>