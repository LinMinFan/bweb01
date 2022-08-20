<?php
include "../base.php";
$do = $_GET['do'];
$parent = $_GET['parent'];




if (isset($_POST['text2'])) {
    $newsub = [];
    foreach ($_POST['text2'] as $key => $text2) {
        $newsub['text'] = $text2;
        $newsub['href'] = $_POST['href2'][$key];
        $newsub['sh'] = 0;
        $newsub['parent'] = $parent;
        $$do->save($newsub);
    }
}
if (!empty($_POST['id'])) {
    foreach ($_POST['id'] as $key => $id) {
        if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
            $$do->del($id);
        } else {
            $sub=$$do->find($id);
            $sub['text'] = $_POST['text'][$key];
            $sub['href'] = $_POST['href'][$key];
            $sub['sh'] = 0;
            $sub['parent'] = $parent;
            $$do->save($sub);
        }
    }
}





to("../back.php?do=$do");
