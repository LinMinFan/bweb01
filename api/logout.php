<?php
include "../base.php";
session_start();
unset($_SESSION['user']);
to("../index.php?do=login");
?>