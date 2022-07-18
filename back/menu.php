<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $str->header; ?></p>
    <form method="post" action="./api/edit.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="30%"><?= $str->td[0]; ?></td>
                    <td width="30%"><?= $str->td[1]; ?></td>
                    <td width="10%"><?= $str->td[2]; ?></td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $mains =['parent'=>0];
                $titles = $$do->all($mains);
                foreach ($titles as $key => $value) {
                ?>
                    <tr>
                        <td><input type="text" name="text[]" value="<?= $value['text']; ?>" style="width:90%;" ></td>
                        <td><input type="text" name="href[]" value="<?= $value['href']; ?>" style="width:90%;" ></td>
                        <td>
                            <?=$$do->math('count','id', ['parent'=>$value['id']]);?>
                        </td>
                        <td><input type="checkbox" name="sh[]" value="<?=$value['id'];?>" <?=($value['sh']==1)? "checked":"";?>></td>
                        <td><input type="checkbox" name="del[]" value="<?=$value['id'];?>"></td>
                        <td><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/edit_sub.php?do=<?=$do;?>&id=<?= $value['id']; ?>&#39;)" value="<?= $str->updbtn; ?>"></td>
                        <input type="hidden" name="id[]" value="<?=$value['id'];?>">
                    </tr>
                    
                    <?php
                }
                ?>
                <input type="hidden" name="table" value="<?=$do;?>">
            </tbody>
        </table>
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