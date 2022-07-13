<?php
include "../base.php";
$text = $_POST['text'];
$table = $_POST['table'];
//echo $table;
$DB = new DB($table);

$data=[];
$data['id'] = 1;
$data[$table] = $text;


$DB->save($data);

to("../back.php?do=$table");

?>