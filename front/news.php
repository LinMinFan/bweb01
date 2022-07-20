<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <?php
    include "./marquee.php";
    ?>
    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    <div style="width:95%; padding:2px; margin-top:10px; padding:5px 10px 5px 10px; position:relative;">
                    		<span class="t botli">
								更多最新消息區
								
                            </span>
							<?php
                            $p=($_GET['p'])??1;
                            $counts=$$do->math("count","id");
                            $div=5;
                            $pages=ceil(($counts/$div));
                            $start=($p - 1)*$div;
                            $limit=" limit "."$start,$div";
                            $titles = $news->all($limit);
                            ?>
                            <ol class="ssaa" style="list-style-type:decimal;" start="<?=($start+1);?>">
                            <?php
							foreach ($titles as $key => $show) {
                            ?>
							<li>
								<?=mb_substr($show['text'],0,20);?>
								<span class="all" style="display:none;"><?=$show['text'];?></span>
							</li>
							<?php
							}
							?>
                            </ol>
        			<div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
                    	<script>
						$(".ssaa li").hover(
							function ()
							{
								$("#altt").html("<pre>"+$(this).children(".all").html()+"</pre>")
								$("#altt").show()
							}
						)
						$(".ssaa li").mouseout(
							function()
							{
								$("#altt").hide()
							}
						)
                        </script>
                    </div>
    <div style="text-align:center;">
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
</div>
</div>