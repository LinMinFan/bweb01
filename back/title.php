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
                        <td width="45%"><?= $str->btd[0]; ?></td>
                        <td width="23%"><?= $str->btd[1]; ?></td>
                        <td width="7%">顯示</td>
                        <td width="7%">刪除</td>
                        <td></td>
                    </tr>
                    <?php
                    $dataTis = $$do->all();
                    foreach ($dataTis as $key => $value) {
                    ?>
                        <tr>
                            <td>
                                <img src="./img/<?=$value['img'];?>" width="300px" height="30px">
                            </td>
                            <td>
                                <input type="text" name="text[]" value="<?=$value['text'];?>">
                            </td>
                            <td>
                                <input type="radio" name="sh[]" value="<?=$value['id'];?>" <?=($value['sh']==1)?"checked":"";?>>
                            </td>
                            <td>
                                <input type="checkbox" name="del[]" value="<?=$value['id'];?>">
                            </td>
                            <td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/upload.php?do=<?= $do; ?>&id=<?=$value['id'];?>&#39;)" value="<?= $str->upbtn; ?>"></td>
                        </tr>
                        <input type="hidden" name="id[]" value="<?=$value['id'];?>">
                    <?php
                    }
                    ?>
                </tbody>
            </table>
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