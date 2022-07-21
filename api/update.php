<?php
$do = $_GET['do'];
include "../base.php";

$data=$$do->find(1);

$data[$do]=$_POST[$do];
           
$$do->save($data);

to("../back.php?do=".$do);


?>