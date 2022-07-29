<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $str->hd; ?></p>
    <form method="post" action="./api/edit.php?do=<?= $do; ?>">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="50%"><?= $str->td; ?></td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $p = ($_GET['p']) ?? 1;
                $div = 3;
                $countsig = $$do->math('count', 'id');
                $pages = ceil($countsig / $div);
                $start = ($p - 1) * $div;
                $pre = (($p - 1) > 0) ? ($p - 1) : "1";
                $next = (($p + 1) <= $pages) ? ($p + 1) : $pages;
                $tts = $$do->all(" limit " . $start . "," . $div);
                foreach ($tts as  $tt) {
                ?>
                    <tr>
                        <td class="cent"><img src="./img/<?= $tt['img']; ?>" width="100px" height="68px"></td>
                        <td><input type="checkbox" name="sh[]" value="<?= $tt['id']; ?>" <?= ($tt['sh'] == 1) ? "checked" : ""; ?>></td>
                        <td><input type="checkbox" name="del[]" value="<?= $tt['id']; ?>"></td>
                        <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/upload.php?do=<?= $do; ?>&id=<?= $tt['id']; ?>&#39;)" value="<?= $str->ubtn; ?>"></td>
                        <td><input type="hidden" name="id[]" value="<?= $tt['id']; ?>"></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="cent">
            <a class="bl" href="./back.php?do=<?=$do;?>&p=<?= $pre; ?>"><</a>
                    <?php
                    for ($i = 1; $i <= $pages; $i++) {
                    ?>
                    <a class="bl" href="./back.php?do=<?=$do;?>&p=<?= $i;?>" <?=($p==$i)?"style='font-size:24px'":"";?>><?=$i;?></a>
                    <?php
                    }
                    ?>
            <a class="bl" href="./back.php?do=<?=$do;?>&p=<?= $next; ?>">></a>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?= $do; ?>.php?do=<?= $do; ?>&#39;)" value="<?= $str->abtn; ?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>