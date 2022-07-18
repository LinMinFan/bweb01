<?php
include "../base.php";
$table = $_POST['table'];
$dels = ($_POST['del']) ?? "";
$ids = $_POST['id'];

foreach ($ids as $key => $id) {
    if (!empty($dels) && in_array($id, $dels)) {
        $$table->del($id);
    } else {
        $data = $$table->find($id);
                $data['text'] = $_POST['text'][$key];
                $data['href'] = $_POST['href'][$key];
                $data['sh'] = 1;
        //dd($data);
        $$table->save($data);
    }
}

if(isset($_POST['text2'])){
    $data2=[];
    foreach ($_POST['text2'] as $key => $value) {
        $data2['text'] = $_POST['text2'][$key];
        $data2['href'] = $_POST['href2'][$key];
        $data2['parent'] = $_POST['parent'];
        $data2['sh'] = 1;
        //dd($data2);
        $$table->save($data2);
    }
}

to("../back.php?do=$table");
?>