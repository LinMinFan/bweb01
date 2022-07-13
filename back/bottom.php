<?php
$vist = $$do->find(1);
//dd($vist);
?>
<div class="add_box">
<h3><?=$str->addmodalheader;?></h3>
<form action="./api/update.php" method="post">
    <div>
        <label for=""><?=$str->addmodaltext;?></label>
        <input type="text" name="text" value="<?=$vist[$do];?>">
    </div>
    <div class="add_btn">
        <input type="hidden" name="table" value="<?=$do;?>">
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
    </div>
</form>
</div>