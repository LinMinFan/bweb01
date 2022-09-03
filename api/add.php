<?php
include "../base.php";
$do=$_GET['do'];

if (!empty($_FILES['img'])) {
  $_POST['img']=$_FILES['img']['name'];
  move_uploaded_file($_FILES['img']['tmp_name'],"../img/{$_POST['img']}");
}
switch ($do) {
  case 'title':
    $_POST['sh']=0;
    break;
  case 'ad':
  case 'mvim':
  case 'image':
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



to("../back.php?do={$do}");
