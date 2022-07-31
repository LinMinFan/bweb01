
<?php
$do=$_GET['do'];
include "../base.php";

if (isset($_FILES['img'])) {
    $data=$$do->find($_GET['id']);
    $name=$_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../img/$name");
    $data['img']=$name;
    $$do->save($data);

}

to("../back.php?do=".$do);
