<table class='table'>
	<tr>
		<td>id</td>
		<td>contents</td>
		<td>operate</td>
	</tr>
	<?php foreach($info as $v){?>
	<tr>
		<td><?php echo $v['id']?></td>
		<td><?php echo $v['contents']?></td>
		<td>
			<a href="?r=practice/del&id=<?php echo $v['id']?>">删除</a>
			<a href="?r=practice/update&id=<?php echo $v['id']?>">编辑</a>
		</td>
	</tr>
	<?php }?>
</table>

<?php
//分页样式
use yii\widgets\LinkPager;

echo LinkPager::widget([
    'pagination' => $pagination,
]);
?>