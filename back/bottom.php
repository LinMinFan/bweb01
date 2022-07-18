<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $str->header; ?></p>
    <form method="post" action="./api/update.php">
        <table width="60%" style="margin: 0 auto;">
            <tbody>
                <tr class="yel">
                    <td width="50%"><?= $str->td; ?></td>
                    <td width="50%"><input type="text" name="bottom" value="<?= $bottom->find(1)['bottom']; ?>"></td>
                </tr>

                <input type="hidden" name="table" value="<?= $do; ?>">
            </tbody>
        </table>
        <table class="cent" style="margin:40px auto 0; width:70%;">
            <tbody>
                <tr>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>