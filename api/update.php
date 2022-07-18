<?php
include "../base.php";
$table=$_POST['table'];
$data=$$table->find(1);
dd($data);
$data[$table]=$_POST[$table];
dd($data);
$$table->save($data);

to("../back.php?do=".$table);
?>