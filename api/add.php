<?php
include "../base.php";
$table = $_POST['table'];
echo $table;
$DB = new DB($table);
dd($DB->all());
$data = [];
if (isset($_FILES['img']['tmp_name'])) {
    //dd($_FILES['img']);
    $imagename = $_FILES['img']['name'];
    $imagetmp = $_FILES['img']['tmp_name'];
    move_uploaded_file($imagetmp, "../img/" . $imagename);
    $data['img'] = $imagename;
}

switch ($table) {
    case 'title':
    case 'ad':
        $text = ($_POST['text']) ? ($_POST['text']) : "";
        $data['text'] = $text;
        $data['sh'] = 0;
        dd($data);
        break;
    case 'mvim':
    case 'image':
        $data['sh'] = 1;
        dd($data);
        break;
    case 'news':
        $text = ($_POST['text']) ? ($_POST['text']) : "";
        $data['text'] = $text;
        $data['sh'] = 1;
        dd($data);
        break;
    case 'admin':
        $acc = ($_POST['acc']) ? ($_POST['acc']) : "";
        $pw = ($_POST['pw']) ? ($_POST['pw']) : "";
        $data['acc'] = $acc;
        $data['pw'] = $pw;
        dd($data);
        break;
    case 'menu':
        $text = ($_POST['text']) ? ($_POST['text']) : "";
        $href = ($_POST['href']) ? ($_POST['href']) : "";
        $data['sh'] = 1;
        $data['text'] = $text;
        $data['href'] = $href;
        dd($data);
        break;

    default:
        # code...
        break;
}

$DB->save($data);

to("../back.php?do=$table");
