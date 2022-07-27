<div class="di" style="height:540px; border:#999 1px solid; width:76.5%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->
    <table width="100%">
        <tbody>
            <tr>
                <td style="width:70%;font-weight:800; border:#333 1px solid; border-radius:3px;" class="cent"><a href="?do=title" style="color:#000; text-decoration:none;">後台管理區</a></td>
                <td><button onclick="lo(&#39;./api/logout.php&#39;)" style="width:99%; margin-right:2px; height:50px;">管理登出</button></td>
            </tr>
        </tbody>
    </table>
    <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
        <p class="t cent botli"><?= $str->bhd; ?></p>
        <form method="post" action="./api/edit.php?do=<?= $do; ?>">
            <table width="100%">
                <tbody>
                    <tr class="yel">
                        <td width="75%"><?= $str->btd; ?></td>
                        <td width="10%">顯示</td>
                        <td>刪除</td>
                    </tr>
                    <?php
                    $p=$_GET['p'] ?? 1;
                    if (($p-1)>0) {
                        $pre=$p-1;
                    }
                    $div=5;
                    $counts=$$do->math('count','id');
                    $pages=ceil($counts/$div);
                    if (($p+1)<=$pages) {
                        $next=$p+1;
                    }
                    $start=($p-1)*$div;
                    $dataTis = $$do->all(" limit ".$start.",".$div);
                    foreach ($dataTis as $key => $value) {
                    ?>
                        <tr>
                            <td>
                                <textarea name="text[]" style="width:90%; height:60px"><?=$value['text'];?></textarea>
                            </td>
                            <td>
                                <input type="checkbox" name="sh[]" value="<?=$value['id'];?>" <?=($value['sh']==1)?"checked":"";?>>
                            </td>
                            <td>
                                <input type="checkbox" name="del[]" value="<?=$value['id'];?>">
                            </td>
                        </tr>
                        <input type="hidden" name="id[]" value="<?=$value['id'];?>">
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="cent">
                <a href="./back.php?do=<?=$do;?>&p=<?=$pre;?>"><</a>
                <?php
                for ($i=1; $i <= $pages ; $i++) {
                ?>
                <a href="./back.php?do=<?=$do;?>&p=<?=$i;?>" <?=(($p==$i))?"style='font-size:20px';":"";?>><?=$i;?></a>
                <?php
                }
                ?>
                <a href="./back.php?do=<?=$do;?>&p=<?=$next;?>">></a>
            </div>
            <table style="margin-top:40px; width:70%;">
                <tbody>
                    <tr>
                        <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?= $do; ?>.php?do=<?= $do; ?>&#39;)" value="<?= $str->adbtn; ?>"></td>
                        <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                    </tr>
                </tbody>
            </table>

        </form>
    </div>
</div>