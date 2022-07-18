<?php
$p=($_GET['p'])??1;
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $str->header; ?></p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="80%"><?= $str->td; ?></td>
                    <td width="10%">顯示</td>
                    <td>刪除</td>
                </tr>
                <?php
                $imgid=['sh'=>1];
                $counts=$$do->math('count','id');
                $div=5;
                $pages=ceil($counts/$div);
                $start=$p;
                $limit=" limit ".($start-1)*$div.",".$div;
                $titles = $$do->all($limit);
                foreach ($titles as $key => $value) {
                ?>
                    <tr>
                        <td><textarea name="text[]" style="width:90%;height:60px;"><?= $value['text']; ?></textarea></td>
                        <td><input type="checkbox" name="sh[]" value="<?=$value['id'];?>" <?=($value['sh']==1)? "checked":"";?>></td>
                        <td><input type="checkbox" name="del[]" value="<?=$value['id'];?>"></td>
                        <input type="hidden" name="id[]" value="<?=$value['id'];?>">
                    </tr>
                    
                    <?php
                }
                ?>
                <input type="hidden" name="table" value="<?=$do;?>">
            </tbody>
        </table>
        <div class="cent" style="letter-spacing:10px;">
            <?php
                $pre=(($start-1) == 0)?1:($start-1);
                $next=(($start+1) < $pages)?($start+1):$pages;

                echo "<a href='?do=$do&p=$pre'><span><</span></a>";

            for ($i=1; $i <= $pages; $i++) { 
                if ($i == $start) {
                    echo "<a href='?do=$do&p=$start'><span style='font-size:20px'>$start</span></a>";
                }else {
                    echo "<a href='?do=$do&p=$i'><span>$i</span></a>";
                }
            }

            echo "<a href='?do=$do&p=$next'><span>></span></a>";
            ?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?= $do; ?>.php?do=<?= $do; ?>&#39;)" value="<?= $str->addbtn; ?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>