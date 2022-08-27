<?php
include "../base.php";

if (!empty($_FILES['img'])) {
    $_POST['img']=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/{$_POST['img']}");
    switch ($_GET['do']) {
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
}else{
    switch ($_GET['do']) {
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
}
${$_GET['do']}->save($_POST);
to("../back.php?do={$_GET['do']}");
?>