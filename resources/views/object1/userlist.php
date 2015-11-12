<html>
<h1>用户列表</h1>
<body>
	<?php if (empty($userList)){?>
		没有用户数据
	<?php } else { ?> 
	<table cellpadding='2'>
		<tr>
			<td>id</td>
			<td>姓名</td>
			<td>创建时间</td>
	</tr>
	<?php foreach ($userList as $user) { ?>
	<tr>
		<?php foreach ($user as $item){?>
		<td><?=$item?></td>
		<?php } ?>
		<td>删除|编辑</td>
	</tr>
	<?php } ?>
	</table>
	总记录数:<?=$totalCount?>
	<a href="/object1/userlist?page=<?=$pre?>">上一页</a>
	<a href="/object1/userlist?page=<?=$next?>">下一页</a>
	<?php } ?>
</body>
<a href="/object1/adduser">添加用户</script>
</html>
