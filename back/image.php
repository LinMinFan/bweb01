    <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
        <p class="t cent botli"><?=$str->hdr;?></p>
        <form method="post" action="./api/edit.php?do=<?=$do;?>">
            <table width="100%">
                <tbody>
                    <tr class="yel">
                        <td width="55%"><?=$str->htd;?></td>
                        <td width="10%">顯示</td>
                        <td width="10%">刪除</td>
                        <td></td>
                    </tr>
                    <?php
                    $now=($_GET['p'])??1;
                    $counnts=$$do->math('count','id');
                    $div=3;
                    $pages=ceil(($counnts/$div));
                    $start=(($now-1)*$div);
                    $see=" limit $start,$div";
                    $allob=$$do->all($see);
                    foreach ($allob as $key => $ob) {
                    ?>
                    <tr>
                        <td class="cent">
                            <img src="./img/<?=$ob['img'];?>" width="100px" height="68px">
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" value="<?=$ob['id'];?>" <?=($ob['sh']==1)?"checked":"";?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?=$ob['id'];?>">
                        </td>
                        <td>
                        <input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/upload.php?do=<?=$do;?>&id=<?=$ob['id'];?>&#39;)" value="<?=$str->upbtn;?>">
                        </td>
                        <input type="hidden" name="id[]" value="<?=$ob['id'];?>">
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <div class="cent">
                <?php
                if (($now-1)>0) {
                ?>
                <a class="bl" href="?do=<?=$do;?>&p=<?=($now-1);?>"><</a>
                <?php
                }
                $fontsize="font-size:20px";
                for ($i=1; $i <= $pages; $i++) { 
                ?>
                <a class="bl" href="?do=<?=$do;?>&p=<?=$i;?>" <?=($i == $now)?"style='$fontsize'":"";?>><?=$i;?></a>
                <?php
                }
                if (($now+1)<=$pages) {
                ?>
                <a class="bl" href="?do=<?=$do;?>&p=<?=($now+1);?>">></a>
                <?php
                }
                ?>
            </div>
            <table style="margin-top:40px; width:70%;">
                <tbody>
                    <tr>
                        <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?=$do;?>.php?do=<?=$do;?>&#39;)" value="<?=$str->addbtn;?>"></td>
                        <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                    </tr>
                </tbody>
            </table>

        </form>
    </div>