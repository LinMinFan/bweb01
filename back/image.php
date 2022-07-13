<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<!-- 改字 -->
	<p class="t cent botli"><?= $str->header; ?></p>
	<form method="post" action="./api/edit.php">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<!-- 改字 -->
					<td width="60%"><?= $str->tdheader; ?></td>
					<td width="10%">顯示</td>
					<td width="10%">刪除</td>
					<td></td>
				</tr>
				<?php
				$img_sum = $$do->math('count', 'id');
				$div = 3;
				$pages = ceil(($img_sum / $div));
				$now = $_GET['p'] ?? 1;
				$start = ($now - 1) * $div;
				//seclet * from table limit 0,3

				$rows = $$do->all(" limit $start,$div");
				//dd($rows);
				foreach ($rows as $key => $value) {
				?>
					<tr>
						<td style="text-align:center;">
							<img src="./img/<?= $value['img']; ?>" style="width: 100px;height:68px">
						</td>
						<td>
							<input type="checkbox" name="sh[]" value="<?= $value['id']; ?>" <?= ($value['sh'] == 1) ? 'checked' : ''; ?>>
						</td>
						<td>
							<input type="checkbox" name="del[]" value="<?= $value['id']; ?>">
						</td>
						<td>
							<!-- 改字 -->
							<input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/upload.php?id=<?= $value['id']; ?>&table=<?= $do; ?>&#39;)" value="<?= $str->updatebtn; ?>">
						</td>
						<input type="hidden" name="id[]" value="<?= $value['id']; ?>">
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<div class="cent">
			<?php
			if (($now - 1) > 0) {
				$p = $now - 1;
			?>
			<a href="?do=<?=$do;?>&p=<?=$p;?>"> < </a>
			<?php
			}
			for ($i=1; $i <= $pages; $i++) { 
				$fontsize=($now == $i)?"20px":"";
			?>
			<a href="?do=<?=$do;?>&p=<?=$i;?>" style="font-size:<?=$fontsize;?>;"><?=$i;?></a>
			<?php
			}
			if (($now+1) <= $pages) {
				$p = $now + 1;
			?>
			<a href="?do=<?=$do;?>&p=<?=$p;?>"> > </a>
			<?php
			}
			?>
		</div>
		<table style="margin-top:40px; width:70%;">
			<tbody>
				<tr>
					<!-- 改字 -->
					<td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?= $do; ?>.php?do=<?= $do; ?>&#39;)" value="<?= $str->addmodalbtn; ?>"></td>
					<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
					<input type="hidden" name="table" value="<?= $do; ?>">
				</tr>
			</tbody>
		</table>

	</form>
</div>