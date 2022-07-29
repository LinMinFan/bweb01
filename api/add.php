<?php
$do = $_GET['do'];
include "../base.php";
//dd($_FILES['img']);

$data = [];
if (isset($_FILES['img'])) {
    $name = $_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_namr'];
    move_uploaded_file($tmp, "../img/$name");
    $data['img'] = $name;
    switch ($do) {
        case 'title':
            $data['text'] = $_POST['text'];
            $data['sh'] = 0;
            break;
        case 'mvim':
        case 'image':
            $data['sh'] = 1;
            break;

        default:
            break;
    }

    $$do->save($data);
} else {
    switch ($do) {
        case 'ad':
        case 'news':
            $data['text'] = $_POST['text'];
            $data['sh'] = 1;
            break;
        case 'admin':
            $data['acc'] = $_POST['acc'];
            $data['pw'] = $_POST['pw'];
            break;
        case 'menu':
            $data['text'] = $_POST['text'];
            $data['href'] = $_POST['href'];
            $data['parent'] = 0;
            $data['sh'] = 1;
            break;

        default:
            # code...
            break;
    }
    $$do->save($data);
}

$url = "../back.php?do=$do";

to($url);
