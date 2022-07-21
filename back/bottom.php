    <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
        <p class="t cent botli"><?=$str->hdr;?></p>
        <form method="post" action="./api/update.php?do=<?=$do;?>">
            <table width="60%" style="margin:0 auto;">
                <tbody>
                    <?php
                    $allob=$$do->find(1);
                    ?>
                    <tr class="yel">
                        <td width="50%"><?=$str->htd;?></td>
                        <td width="50%">
                            <input type="text" name="<?=$do;?>" value="<?=$allob[$do];?>">
                        </td>
                    </tr>
                </tbody>
            </table>
            <table style="margin:0px auto; width:70%;">
                <tbody>
                    <tr>
                        <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                    </tr>
                </tbody>
            </table>

        </form>
    </div>