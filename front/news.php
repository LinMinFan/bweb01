<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<?php include "./marquee.php"; ?>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<div>
		<?php
		$now = ($_GET['p']) ?? 1;
		$counnts = $$do->math('count', 'id', ['sh' => 1]);
		$div = 5;
		$pages = ceil(($counnts / $div));
		$start = (($now - 1) * $div);
		$see = " limit $start,$div";
		$allob = $$do->all($see);
		?>

		<ol start="<?= $start+1; ?>">
			<?php
			foreach ($allob as $key => $ob) {
			?>
				<li class="sswww">

				<?= mb_substr($ob['text'],0,20); ?>
					<span class="all" style="display:none;"><?= $ob['text']; ?></span>
				</li>
			<?php
			}
			?>

		</ol>
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
	</div>
</div>


<div id="alt" style="position: absolute; width: 350px; min-height: 100px; word-break:break-all; text-align:justify;  background-color: rgb(255, 255, 204); top: 50px; left: 400px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
<script>
	$(".sswww").hover(
		function() {
			$("#alt").html("" + $(this).children(".all").html() + "").css({
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