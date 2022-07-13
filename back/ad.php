<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<!-- 改字 -->
	<p class="t cent botli"><?=$str->header;?></p>
	<form method="post" action="./api/edit.php">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<!-- 改字 -->
					<td width="70%"><?=$str->tdheader;?></td>
					<td width="10%">顯示</td>
					<td width="10%">刪除</td>
					<td></td>
				</tr>
				<?php
				$rows = $$do->all();
				//dd($rows);
				foreach ($rows as $key => $value) {
				?>
					<tr>
						<td>
							<input type="text" name="text[]" value="<?= $value['text']; ?>" style="width: 90%;">
						</td>
						<td>
							<input type="checkbox" name="sh[]" value="<?= $value['id']; ?>" <?= ($value['sh'] == 1) ? 'checked' : ''; ?>>
						</td>
						<td>
							<input type="checkbox" name="del[]" value="<?= $value['id']; ?>">
						</td>
						<input type="hidden" name="id[]" value="<?= $value['id']; ?>">
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<table style="margin-top:40px; width:70%;">
			<tbody>
				<tr>
					<!-- 改字 -->
					<td width="200px"><input type="button" onclick="op(&#39;#cover&#39;,&#39;#cvr&#39;,&#39;./modal/<?= $do; ?>.php?do=<?= $do; ?>&#39;)" value="<?=$str->addmodalbtn;?>"></td>
					<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
					<input type="hidden" name="table" value="<?= $do; ?>">
				</tr>
			</tbody>
		</table>

	</form>
</div>