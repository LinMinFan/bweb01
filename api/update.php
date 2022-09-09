<?php
include "../base.php";
$do=$_GET['do'];
$$do->save($_POST);
to("../back.php?do=$do");