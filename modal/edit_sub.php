<?php
include "../base.php";
$do = $_GET['do'];
$parent = $_GET['id'];
$subs = $$do->all(['parent' => $parent]);
$str = new str($do);
?>
<h3 class="cent"><?= $str->ahd; ?></h3>
<hr>
<div class="w100">
    <form action="./api/edit_sub.php?do=<?= $do; ?>&parent=<?= $parent; ?>" method="post" enctype="multipart/form-data">
        <table class="w80 mg" id="mytb">

            <tr>
                <td><?= $str->atd[0]; ?></td>
                <td><?= $str->atd[1]; ?></td>
                <td>刪除</td>

            </tr>

            <?php
            foreach ($subs as $key => $sub) {
            ?>
                <tr>
                    <td>
                        <input type="text" name="text[]" value="<?=$sub['text'];?>">
                    </td>
                    <td>
                        <input type="text" name="href[]" value="<?=$sub['href'];?>">
                    </td>
                    <td>
                        <input type="checkbox" name="del[]" value="<?=$sub['id'];?>">
                    </td>
                    <input type="hidden" name="id[]" value="<?=$sub['id'];?>">
                </tr>
            <?php
            }
            ?>

        </table>
        <div class="cent">
            <input type="submit" value="修改確定">
            <input type="reset" value="重置">
            <button type="button" onclick="add()">更多次選單</button>
        </div>
    </form>
</div>
<script>
    function add(){
        $('#mytb').append(`
        <tr>
                    <td>
                        <input type="text" name="text2[]" >
                    </td>
                    <td>
                        <input type="text" name="href2[]" >
                    </td>

                </tr>
        `)
    }
</script>