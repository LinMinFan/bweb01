<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <?php include "marquee.php"; ?>
    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    <div class="cent">更多最新消息顯示</div>
    <hr>
    <?php

    $all = $news->math('count', "id", ['sh' => 1]);
    $div = 5;
    $pages = ceil($all / $div);
    $now = $_GET['p'] ?? 1;
    $start = ($now - 1) * $div;
    //select * from table limit 0,3   
    $rows = $news->all(" limit $start,$div");
    ?>
    <ol start="<?=$start+1;?>">
        <?php
        foreach ($rows as $row) {
        ?>
            <li class='sswww'>
                <?= mb_substr($row['text'], 0, 20); ?>
                <span class='all' style='display:none'>
                    <?= $row['text']; ?>
                </span>
            </li>
        <?php
        }
        ?>
    </ol>
    </tbody>
    </table>
    <div class="cent">

        <?php

        if (($now - 1) > 0) {
            $p = $now - 1;
        ?>
            <a href="?do=<?= $do; ?>&p=<?= $p; ?>">
                < </a>
                <?php
            }
            for ($i = 1; $i <= $pages; $i++) {
                $fontsize = ($now == $i) ? "20px" : "";
                ?>
                    <a href="?do=<?= $do; ?>&p=<?= $i; ?>" style="font-size:<?= $fontsize; ?>;"><?= $i; ?></a>
                <?php
            }
            if (($now + 1) <= $pages) {
                $p = $now + 1;
                ?>
                    <a href="?do=<?= $do; ?>&p=<?= $p; ?>"> > </a>
                <?php
            }
                ?>

    </div>


</div>
<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;">
</div>
<script>
    $(".sswww").hover(
        function() {
            $("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>").css({
                "top": $(this).offset().top - 50
            })
            $("#alt").show()
        }
    )
    $(".sswww").mouseout(
        function() {
            $("#alt").hide()
        }
    )
</script>