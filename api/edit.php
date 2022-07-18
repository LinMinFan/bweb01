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
        switch ($table) {
            case 'title':
                $data['text'] = $_POST['text'][$key];
                $data['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh'])) ? 1 : 0;
                break;
            case 'ad':
            case 'news':
                $data['text'] = $_POST['text'][$key];
                $data['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh'])) ? 1 : 0;
                break;
            case 'image':
            case 'mvin':
                $data['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh'])) ? 1 : 0;
                break;
            case 'admin':
                $data['acc'] = $_POST['acc'][$key];
                $data['pw'] = $_POST['pw'][$key];
                break;    
            case 'menu':
                $data['text'] = $_POST['text'][$key];
                $data['href'] = $_POST['href'][$key];
                $data['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh'])) ? 1 : 0;
                break;    
            default:
                break;
        }
        //dd($data);
        $$table->save($data);
    }
}

to("../back.php?do=$table");
?>