<?php
include "../base.php";
$do = $_GET['do'];

$data=$$do->find(1);
$data[$do]=$_POST[$do];


$$do->save($data);




to("../back.php?do=$do");
