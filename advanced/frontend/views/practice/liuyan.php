<?php
use yii\helpers\Html;
?>

<div class='users-index'>
<form action='?r=practice/show' method='post'>	
		<table class='table'>
		<input type="hidden" name='action' value=''>
			<tr>
				<td>留言内容：</td>
				<td><textarea rows='5' clos='10' name='contents'></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<!-- <input type="submit" value='提交'> -->
					<button type='submit'>提交</button>
				</td>
			</tr>
		</table>
</form>	
</div>
