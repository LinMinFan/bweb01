<?php
include "../base.php";
$do = $_GET['do'];

$name = $_FILES['img']['name'];
move_uploaded_file($_FILES['img']['tmp_name'], "../img/$name");

$data=$$do->find($_GET['id']);

$data['img']=$name;

$$do->save($data);




to("../back.php?do=$do");
