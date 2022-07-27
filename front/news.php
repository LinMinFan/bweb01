<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <?php
    include "./marquee.php";
    ?>
    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    <p class="t botli">更多最新消息</p>
    <?php
    $countns = $news->math('count', 'id', ['sh' => 1]);
    $p = $_GET['p'] ?? 1;
    if (($p - 1) > 0) {
        $pre = $p - 1;
    }
    $div = 5;
    $pages = ceil($countns / $div);
    if (($p + 1) <= $pages) {
        $next = $p + 1;
    }
    $start = ($p - 1) * $div;
    ?>
    <ol class="ssaa" style="list-style-type:decimal;" start="<?= ($start+1); ?>">
        <?php
        $nns = $news->all(['sh' => 1], " limit " . $start . "," . $div);
        foreach ($nns as $key => $nn) {
        ?>
            <li>
                <?= mb_substr($nn['text'], 0, 20); ?>
                <span class="all" style="display:none;"><?= $nn['text']; ?></span>
            </li>
        <?php
        }
        ?>
    </ol>
    <div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
    <div class="cent">
                <a class="bl" href="./index.php?do=<?=$do;?>&p=<?=$pre;?>"><</a>
                <?php
                for ($i=1; $i <= $pages ; $i++) {
                ?>
                <a class="bl" href="./index.php?do=<?=$do;?>&p=<?=$i;?>" <?=(($p==$i))?"style='font-size:20px';":"";?>><?=$i;?></a>
                <?php
                }
                ?>
                <a class="bl" href="./index.php?do=<?=$do;?>&p=<?=$next;?>">></a>
            </div>
</div>
<script>
    $(".ssaa li").hover(
        function() {
            $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
            $("#altt").show()
        }
    )
    $(".ssaa li").mouseout(
        function() {
            $("#altt").hide()
        }
    )
</script>