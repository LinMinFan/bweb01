<?php
include "../base.php";
$table = $_GET['do'];
echo $table;
$data=$$table->find(1);
$data[$table]=$_POST[$table];
dd($data);

$$table->save($data);



$url="../back.php?do=".$table;
to($url);

?>