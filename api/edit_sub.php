<?php
include "../base.php";
$table = $_GET['do'];
$dels = ($_POST['del'])??"";
$parent=$_POST['parent'];

if (isset($_POST['id'])) {
    $ids = $_POST['id'];
    $texts = $_POST['text'];
    $hrefs = $_POST['href'];
    foreach ($ids as $key => $id) {
        if (!empty($dels) && in_array($id, $dels)) {
            
                    $$table->del($id);
        }else {
            $data=$$table->find($id);
            
                    $data['text']=$texts[$key];
                    $data['href']=$hrefs[$key];
                    
                $$table->save($data);
        }
    }
}

if (isset($_POST['text2'])) {
    $data=[];
    foreach ($_POST['text2'] as $key => $tx2) {
        $data['text']=$_POST['text2'][$key];
        $data['href']=$_POST['href2'][$key];
        $data['parent']=$_POST['parent'];
        $$table->save($data);   
    }
}
$url="../back.php?do=".$table;
to($url);

?>