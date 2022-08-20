<?php
include "../base.php";
$do = $_GET['do'];



switch ($do) {
    case 'title':
        $name = $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], "../img/$name");
        $data['img'] = $name;
        $data['text'] = $_POST['text'];
        $data['sh'] = 0;
        break;
    case 'mvim':
    case 'image':
        $name = $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'], "../img/$name");
        $data['img'] = $name;
        $data['sh'] = 1;
        break;
    case 'ad':
    case 'news':
        $data['text'] = $_POST['text'];
        $data['sh'] = 1;
    case 'menu':
        $data['text'] = $_POST['text'];
        $data['href'] = $_POST['href'];
        $data['sh'] = 1;
        $data['parent'] = 0;
        break;
    case 'admin':
        $data['acc'] = $_POST['acc'];
        $data['pw'] = $_POST['pw'];
        break;

    default:
        # code...
        break;
}
$$do->save($data);




to("../back.php?do=$do");
