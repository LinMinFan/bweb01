<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$str->hdr;?></p>
    <form method="post" action="./api/edit.php?do=<?=$do;?>">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="75%"><?=$str->hdrtd;?></td>
                    <td width="12%">顯示</td>
                    <td>刪除</td>
                </tr>
                <?php
                $p=($_GET['p'])??1;
                $counts=$$do->math("count","id");
                $div=5;
                $pages=ceil(($counts/$div));
                $start=($p - 1)*$div;
                $limit=" limit "."$start,$div";
                $titles = $$do->all($limit);
                foreach ($titles as $key => $value) {
                    ?>
                <tr>
                <td><textarea name="text[]" style="width:80%;height:60px"><?=$value['text'];?></textarea></td>   
                <td><input type="checkbox" name="sh[]" value="<?=$value['id'];?>" <?=($value['sh']==1)?"checked":"";?>></td>
                <td><input type="checkbox" name="del[]" value="<?=$value['id'];?>"></td>
                <input type="hidden" name="id[]" value="<?=$value['id'];?>">
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <?php
            $pre=$p-1;
            $next=$p+1
            ?>
            <div class="cent" style="letter-spacing:5px;">
                <?php
                if (($p-1)>0) {
                ?>
                <a class="bl" href="?do=<?=$do;?>&p=<?=$pre;?>"><</a>
                <?php
                }
                for ($i=1; $i <= $pages; $i++) { 
                $style="style='font-size:20px'";
                ?>
                <a class="bl" href="?do=<?=$do;?>&p=<?=$i;?>" <?=($p==$i)?$style:"";?>><?=$i;?></a>
                <?php
                }
                if (($p+1)<=$pages) {
                ?>
                    <a class="bl" href="?do=<?=$do;?>&p=<?=$next;?>">></a>
                <?php
                }
                ?>
            </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?=$do;?>.php?do=<?=$do;?>&#39;)" value="<?=$str->addbtn  ;?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>