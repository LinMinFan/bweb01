<?php
$do = $_GET['do'];
include "../base.php";
$str = new str($do);
$parent=$_GET['id'];
?>

<div>
    <h3 class="cent"><?= $str->uhd; ?></h3>
    <hr>
    <form action="./api/edit_sub.php?do=<?= $do; ?>&parent=<?=$parent;?>" method="POST" enctype="multipart/form-data">
        <table style="width:60%;margin:0 auto" id="mytb">
            
            <tr>
                <td><?= $str->utd[0]; ?></td>
                <td><?= $str->utd[1]; ?></td>
                <td></td>
            </tr>
            <?php
            $subs=$$do->all(['parent'=>$parent]);
            foreach ($subs as $sub) {
            ?>
            <tr>
                <td>
                    <input type='text' name='text[]' value='<?=$sub['text'];?>'>
                </td>
                <td>
                    <input type='text' name='href[]' value='<?=$sub['href'];?>'>
                </td>
                <td>
                    <input type="checkbox" name="del[]" value="<?=$sub['id'];?>">
                </td>
                <input type="hidden" name="id[]"value="<?=$sub['id'];?>">
            </tr>
            <?php
            }
            ?>
        
            
        </table>
        <div class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"><input type="button" value="更多次選單" onclick="add()"></div>
    </form>
</div>

<script>
function add(){
    $('#mytb').append("<tr><td><input type='text' name='text2[]' value=''></td><td><input type='text' name='href2[]' value=''></td></tr>");
}
</script>