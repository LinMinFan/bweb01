<?php
$do = $_GET['do'];
include "../base.php";
$str = new str($do);
$parent=$_GET['parent'];
?>

<h3 class="cent"><?= $str->ahd; ?></h3>
<hr>
<form action="./api/edit_sub.php?do=<?= $do; ?>&parent=<?=$parent;?>" enctype="multipart/form-data" method="POST">
    <table style="width:60%;margin:0 auto;" id="mytb">

        <tr>
            <td><?= $str->atd[0]; ?></td>
            <td><?= $str->atd[1]; ?></td>
            <td>刪除</td>
        </tr>
        <?php
        $dataall=$$do->all(['parent'=>$parent]);
        foreach ($dataall as $key => $data) {
        ?>
        <tr>
            <td>
                <input type='text' name='text[]' value='<?=$data['text'];?>'>
            </td>
            <td>
                <input type='text' name='href[]' value='<?=$data['href'];?>'>
            </td>
            <td>
                <input type="checkbox" name="del[]" value="<?=$data['id'];?>">
            </td>
        </tr>
        <input type="hidden" name="id[]" value="<?=$data['id'];?>">
        <?php
        }
        ?>
        
    </table>
    <div class="cent">
        <input type="submit" value="修改確定"><input type="reset" value="重置"><input type="button" value="更多次選單" onclick="add()">
    </div>
</form>


<script>
function add(){
    $('#mytb').append("<tr><td><input type='text' name='text2[]'></td><td><input type='text' name='href2[]'></td></tr>");
}

</script>